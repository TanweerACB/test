// Vercel Serverless Function for Bookings
// Note: This uses in-memory storage which resets on each deployment
// For production, use Vercel KV, PostgreSQL, or MongoDB

let bookings = [];

export default function handler(req, res) {
  // Enable CORS
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type');

  if (req.method === 'OPTIONS') {
    return res.status(200).end();
  }

  if (req.method === 'GET') {
    return res.status(200).json(bookings.sort((a, b) => new Date(a.date) - new Date(b.date)));
  }

  if (req.method === 'POST') {
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
    return res.status(201).json(newBooking);
  }

  return res.status(405).json({ error: 'Method not allowed' });
}
