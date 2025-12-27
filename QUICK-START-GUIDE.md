# Quick Start Guide - Install Your WordPress Theme

## Step 1: Create the ZIP File

### On Mac:
1. Open Finder and navigate to your project folder
2. Right-click on the `wordpress-theme` folder
3. Select "Compress wordpress-theme"
4. This creates `wordpress-theme.zip`
5. Rename it to `vdb-law-firm.zip` (optional, but cleaner)

### On Windows:
1. Open File Explorer and navigate to your project folder
2. Right-click on the `wordpress-theme` folder
3. Select "Send to" → "Compressed (zipped) folder"
4. Rename to `vdb-law-firm.zip`

### Using Terminal/Command Line:
```bash
cd /path/to/your/project
zip -r vdb-law-firm.zip wordpress-theme/
```

---

## Step 2: Install on WordPress

### Upload Theme
1. Log in to your WordPress admin panel (usually `yoursite.com/wp-admin`)
2. Go to **Appearance** → **Themes**
3. Click the **Add New** button at the top
4. Click **Upload Theme** button
5. Click **Choose File** and select your `vdb-law-firm.zip`
6. Click **Install Now**
7. Wait for upload to complete
8. Click **Activate** button

✅ Your theme is now active!

---

## Step 3: Initial Setup (5 minutes)

### A. Set Your Homepage
1. Go to **Settings** → **Reading**
2. Under "Your homepage displays", select **A static page**
3. For "Homepage": Select **Front Page** (if it doesn't exist, create it first under Pages → Add New)
4. For "Posts page": Select **Blog** (create if needed)
5. Click **Save Changes**

### B. Create Navigation Menu
1. Go to **Appearance** → **Menus**
2. Click **create a new menu**
3. Name it "Main Menu" or "Primary Menu"
4. Add these **Custom Links**:
   - URL: `#services` | Link Text: `Services`
   - URL: `#about` | Link Text: `About`
   - URL: `#team` | Link Text: `Team`
   - URL: `#contact` | Link Text: `Contact`
5. Add your Blog page from the left sidebar
6. Under "Menu Settings", check **Primary Menu**
7. Click **Save Menu**

### C. Customize Your Site
1. Go to **Appearance** → **Customize**
2. Start with these sections:

**Hero Section** (most important!)
- Update the title and subtitle
- Change the statistics numbers
- Update the phone number

**Contact Information**
- Add your phone, email, address
- Set business hours

**Colors** (optional)
- Adjust to match your brand

3. Click **Publish** to save

---

## Step 4: Add Your Content

### Add Practice Areas (6 items recommended)
1. Go to **Practice Areas** → **Add New**
2. Examples to create:
   - Property Law
   - Contract Law
   - Family Law
   - Civil Litigation
   - Estate Planning
   - Debt Collection
3. For each:
   - Enter title
   - Write description (2-3 paragraphs)
   - Click **Publish**

### Add Team Members (4+ recommended)
1. Go to **Team Members** → **Add New**
2. For each attorney:
   - Name as title
   - Bio in content area
   - Fill in: Title/Position, Specialization, LinkedIn URL
   - Upload profile photo (or leave blank for initials)
   - Click **Publish**

### Add Testimonials (3+ recommended)
1. Go to **Testimonials** → **Add New**
2. For each:
   - Testimonial text in content area
   - Fill in: Client Name, Case Type, Rating (1-5)
   - Click **Publish**

### Add Blog Posts (4+ recommended)
1. Go to **Posts** → **Add New**
2. Write articles about legal topics
3. Add featured image (recommended)
4. Assign category (e.g., "Property Law")
5. Click **Publish**

---

## Step 5: Test Your Site

Visit your website and check:
- ✅ Homepage displays correctly
- ✅ Navigation menu works
- ✅ All sections appear (Hero, Services, Team, etc.)
- ✅ Statistics animate when scrolling
- ✅ Testimonials carousel works
- ✅ Blog posts show up
- ✅ Mobile menu works (test on phone)
- ✅ Booking form appears in Contact section

---

## Optional: Install Recommended Plugins

### Contact Form 7 (for contact form)
1. Go to **Plugins** → **Add New**
2. Search "Contact Form 7"
3. Click **Install Now** → **Activate**
4. Go to **Contact** → **Contact Forms**
5. Copy the shortcode (e.g., `[contact-form-7 id="1"]`)
6. You can add this to your contact section if needed

### WP Mail SMTP (for booking emails)
1. Go to **Plugins** → **Add New**
2. Search "WP Mail SMTP"
3. Install and activate
4. Configure with your email provider (Gmail, SendGrid, etc.)
5. This enables booking confirmation emails

---

## Common Customizations

### Change Colors
1. **Appearance** → **Customize** → **Colors**
2. Adjust backgrounds, accents, and text colors
3. Changes apply site-wide automatically

### Update Contact Info
1. **Appearance** → **Customize** → **Contact Information**
2. Update phone, email, address, hours
3. Add Google Maps embed URL (see below)

### Add Google Maps
1. Go to [Google Maps](https://www.google.com/maps)
2. Search for your address
3. Click **Share** → **Embed a map**
4. Copy the URL from `<iframe src="HERE">`
5. Paste in **Customizer** → **Contact Information** → **Google Maps Embed URL**

### Change Hero Statistics
1. **Appearance** → **Customize** → **Hero Section**
2. Update the 3 statistics:
   - Stat 1: Years Experience (default: 25+)
   - Stat 2: Cases Won (default: 2500+)
   - Stat 3: Success Rate (default: 98%)

---

## Troubleshooting

### Theme looks broken after activation
- Go to **Settings** → **Permalinks** and click **Save Changes** (this flushes rewrite rules)
- Clear your browser cache (Cmd+Shift+R on Mac, Ctrl+Shift+R on Windows)

### Menu not showing
- Make sure you assigned the menu to "Primary Menu" location
- Check that menu items were added and saved

### Homepage shows blog posts instead of front page
- Go to **Settings** → **Reading**
- Set "Your homepage displays" to "A static page"
- Select your Front Page

### Booking form not working
- Check browser console for JavaScript errors (F12 → Console tab)
- Ensure date picker allows weekdays only
- Test with a future date

### Images not displaying
- Check that images are uploaded to Media Library
- Verify featured images are set on posts
- Try regenerating thumbnails (use plugin)

---

## Need Help?

### Documentation
- Full documentation: `wordpress-theme/README.md`
- Installation guide: `wordpress-theme/INSTALLATION.md`
- Complete summary: `WORDPRESS-THEME-COMPLETE.md`

### Support
Contact your web developer for:
- Custom functionality
- Advanced styling
- Plugin integrations
- Technical issues

---

## You're Done! 🎉

Your law firm website is now live with:
✅ Fully customizable design
✅ Practice areas showcase
✅ Team member profiles
✅ Client testimonials
✅ Blog integration
✅ Booking system
✅ Contact information
✅ Responsive design

**Next Steps:**
1. Add more content regularly (blog posts, testimonials)
2. Install SEO plugin (Yoast SEO)
3. Set up Google Analytics
4. Enable SSL (HTTPS)
5. Create backup schedule

Enjoy your new website!
