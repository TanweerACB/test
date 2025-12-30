// Vercel Serverless Function for Posts
// Note: This uses in-memory storage which resets on each deployment
// For production, use Vercel KV, PostgreSQL, or MongoDB

let posts = [
  {
    id: 1,
    title: "Understanding Estate Planning",
    excerpt: "Learn the basics of estate planning and why it's important for your family's future.",
    content: "Estate planning is a crucial step in securing your family's financial future...",
    author: "Admin",
    date: new Date().toISOString(),
    published: true
  },
  {
    id: 2,
    title: "The Benefits of Living Trusts",
    excerpt: "Discover how living trusts can help you avoid probate and protect your assets.",
    content: "Living trusts offer numerous advantages over traditional wills...",
    author: "Admin",
    date: new Date().toISOString(),
    published: true
  }
];

export default function handler(req, res) {
  // Enable CORS
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type');

  if (req.method === 'OPTIONS') {
    return res.status(200).end();
  }

  if (req.method === 'GET') {
    return res.status(200).json(posts.sort((a, b) => new Date(b.date) - new Date(a.date)));
  }

  if (req.method === 'POST') {
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
    return res.status(201).json(newPost);
  }

  return res.status(405).json({ error: 'Method not allowed' });
}
