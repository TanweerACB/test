const express = require('express');
const fs = require('fs');
const path = require('path');

const app = express();
const PORT = 3000;

// Middleware
app.use(express.json());
app.use(express.static('.'));

// Data file paths
const DATA_DIR = './data';
const POSTS_FILE = path.join(DATA_DIR, 'posts.json');
const BOOKINGS_FILE = path.join(DATA_DIR, 'bookings.json');

// Ensure data directory and files exist
if (!fs.existsSync(DATA_DIR)) fs.mkdirSync(DATA_DIR);
if (!fs.existsSync(POSTS_FILE)) fs.writeFileSync(POSTS_FILE, '[]');
if (!fs.existsSync(BOOKINGS_FILE)) fs.writeFileSync(BOOKINGS_FILE, '[]');

// Helper functions
const readJSON = (file) => JSON.parse(fs.readFileSync(file, 'utf8'));
const writeJSON = (file, data) => fs.writeFileSync(file, JSON.stringify(data, null, 2));

// ===== BLOG POSTS API =====
app.get('/api/posts', (req, res) => {
  const posts = readJSON(POSTS_FILE);
  res.json(posts.sort((a, b) => new Date(b.date) - new Date(a.date)));
});

app.post('/api/posts', (req, res) => {
  const posts = readJSON(POSTS_FILE);
  const newPost = {
    id: Date.now(),
    title: req.body.title,
    excerpt: req.body.excerpt,
    content: req.body.content,
    author: req.body.author || 'Admin',
    date: new Date().toISOString(),
    published: true
  };
  posts.push(newPost);
  writeJSON(POSTS_FILE, posts);
  res.json(newPost);
});

app.put('/api/posts/:id', (req, res) => {
  const posts = readJSON(POSTS_FILE);
  const index = posts.findIndex(p => p.id === parseInt(req.params.id));
  if (index === -1) return res.status(404).json({ error: 'Post not found' });
  posts[index] = { ...posts[index], ...req.body };
  writeJSON(POSTS_FILE, posts);
  res.json(posts[index]);
});

app.delete('/api/posts/:id', (req, res) => {
  let posts = readJSON(POSTS_FILE);
  posts = posts.filter(p => p.id !== parseInt(req.params.id));
  writeJSON(POSTS_FILE, posts);
  res.json({ success: true });
});

// ===== BOOKINGS API =====
app.get('/api/bookings', (req, res) => {
  const bookings = readJSON(BOOKINGS_FILE);
  res.json(bookings.sort((a, b) => new Date(a.date) - new Date(b.date)));
});

app.post('/api/bookings', (req, res) => {
  const bookings = readJSON(BOOKINGS_FILE);
  const newBooking = {
    id: Date.now(),
    name: req.body.name,
    email: req.body.email,
    phone: req.body.phone,
    date: req.body.date,
    time: req.body.time,
    service: req.body.service,
    notes: req.body.notes || '',
    status: 'pending',
    createdAt: new Date().toISOString()
  };
  bookings.push(newBooking);
  writeJSON(BOOKINGS_FILE, bookings);
  res.json(newBooking);
});

app.put('/api/bookings/:id', (req, res) => {
  const bookings = readJSON(BOOKINGS_FILE);
  const index = bookings.findIndex(b => b.id === parseInt(req.params.id));
  if (index === -1) return res.status(404).json({ error: 'Booking not found' });
  bookings[index] = { ...bookings[index], ...req.body };
  writeJSON(BOOKINGS_FILE, bookings);
  res.json(bookings[index]);
});

app.delete('/api/bookings/:id', (req, res) => {
  let bookings = readJSON(BOOKINGS_FILE);
  bookings = bookings.filter(b => b.id !== parseInt(req.params.id));
  writeJSON(BOOKINGS_FILE, bookings);
  res.json({ success: true });
});

// Get available time slots for a date
app.get('/api/bookings/slots/:date', (req, res) => {
  const bookings = readJSON(BOOKINGS_FILE);
  const allSlots = ['09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00'];
  const bookedSlots = bookings
    .filter(b => b.date === req.params.date && b.status !== 'cancelled')
    .map(b => b.time);
  const available = allSlots.filter(s => !bookedSlots.includes(s));
  res.json(available);
});

// Serve admin page
app.get('/admin', (req, res) => {
  res.sendFile(path.join(__dirname, 'admin.html'));
});

app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
  console.log(`Admin panel at http://localhost:${PORT}/admin`);
});
