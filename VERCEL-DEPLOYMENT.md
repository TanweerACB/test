# Vercel Deployment Guide

## Overview
This project is deployed on Vercel with serverless functions for the backend API.

## Architecture

### Static Files
- `index.html` - Main website
- `admin.html` - Admin panel
- `css/styles.css` - Stylesheets
- `js/main.js` - Client-side JavaScript

### Serverless Functions
- `api/posts.js` - Handles blog posts (GET, POST)
- `api/bookings.js` - Handles consultation bookings (GET, POST)

## Important Notes

### In-Memory Storage
⚠️ **WARNING**: The current implementation uses in-memory storage which resets on each deployment and function restart.

For production, you should use:
- **Vercel KV** (Redis) - Fast key-value storage
- **Vercel Postgres** - Relational database
- **MongoDB Atlas** - NoSQL database
- **Supabase** - Open-source Firebase alternative

### File System Limitations
Vercel's serverless functions have a **read-only file system**. The original `server.js` used:
- `fs.readFileSync()` - Won't work
- `fs.writeFileSync()` - Won't work
- `fs.mkdirSync()` - Won't work

This is why we created separate API functions in the `/api` directory.

## Deployment Steps

### 1. Push to GitHub
```bash
git add .
git commit -m "Update Vercel configuration"
git push origin main
```

### 2. Deploy to Vercel
```bash
vercel --prod
```

Or use the Vercel dashboard to deploy from GitHub.

## Configuration Files

### vercel.json
Routes configuration:
- `/api/*` → Serverless functions
- `/css/*` → Static CSS files
- `/js/*` → Static JavaScript files
- `/data/*` → Static data files
- `/` → index.html

### .vercelignore
Excludes WordPress themes from deployment:
- `wordpress-theme/`
- `rockwell-wp/`
- `*.zip` files

## Testing

After deployment, verify:
1. ✅ Homepage loads: `https://your-domain.vercel.app`
2. ✅ CSS loads: Check browser console for 404 errors
3. ✅ JS loads: Check browser console for errors
4. ✅ API works: Test booking form
5. ✅ Blog posts load: Check blog section

## Troubleshooting

### CSS/JS Not Loading (404 Errors)
- Check `vercel.json` routes configuration
- Verify file paths in `index.html` are correct
- Clear browser cache and hard refresh (Cmd+Shift+R)

### API Errors
- Check function logs in Vercel dashboard
- Verify CORS headers are set correctly
- Test API endpoints directly: `/api/posts`, `/api/bookings`

### Data Not Persisting
- This is expected with in-memory storage
- Upgrade to Vercel KV or database for persistence

## Upgrading to Persistent Storage

### Option 1: Vercel KV (Recommended for MVP)
```bash
npm install @vercel/kv
```

Update `api/posts.js`:
```javascript
import { kv } from '@vercel/kv';

export default async function handler(req, res) {
  if (req.method === 'GET') {
    const posts = await kv.get('posts') || [];
    return res.json(posts);
  }
  
  if (req.method === 'POST') {
    const posts = await kv.get('posts') || [];
    const newPost = { id: Date.now(), ...req.body };
    posts.push(newPost);
    await kv.set('posts', posts);
    return res.json(newPost);
  }
}
```

### Option 2: Vercel Postgres
```bash
npm install @vercel/postgres
```

Create tables and use SQL queries for data persistence.

### Option 3: MongoDB Atlas
```bash
npm install mongodb
```

Connect to MongoDB Atlas cluster for full database functionality.

## Environment Variables

If using external services, add environment variables in Vercel dashboard:
- `DATABASE_URL` - Database connection string
- `KV_REST_API_URL` - Vercel KV URL
- `KV_REST_API_TOKEN` - Vercel KV token

## Current Deployment

- **URL**: https://test2-lrw2zn7bf-tanweeracbs-projects.vercel.app
- **GitHub**: https://github.com/TanweerACB/test
- **Status**: Active

## Next Steps

1. ✅ Fix static file routing (DONE)
2. 🔄 Push updated configuration to GitHub
3. 🔄 Redeploy to Vercel
4. ⏳ Test all functionality
5. ⏳ Upgrade to persistent storage (optional)
