# WordPress Theme Installation Guide

## Quick Start

### Step 1: Package the Theme
1. Compress the entire `wordpress-theme` folder as a ZIP file
2. Name it `vdb-law-firm.zip`

### Step 2: Upload to WordPress
1. Log in to your WordPress admin panel
2. Go to **Appearance → Themes**
3. Click **Add New** button
4. Click **Upload Theme** button
5. Choose the `vdb-law-firm.zip` file
6. Click **Install Now**
7. Once installed, click **Activate**

### Step 3: Initial Setup

#### Set Static Homepage
1. Go to **Settings → Reading**
2. Under "Your homepage displays", select **A static page**
3. For "Homepage", select **Front Page** (create if doesn't exist)
4. For "Posts page", select **Blog** (create if doesn't exist)
5. Click **Save Changes**

#### Create Navigation Menu
1. Go to **Appearance → Menus**
2. Click **create a new menu**
3. Name it "Primary Menu"
4. Add these custom links:
   - **Services**: URL = `#services`, Link Text = `Services`
   - **About**: URL = `#about`, Link Text = `About`
   - **Team**: URL = `#team`, Link Text = `Team`
   - **Contact**: URL = `#contact`, Link Text = `Contact`
5. Add your Blog page
6. Check "Primary Menu" under Menu Settings
7. Click **Save Menu**

### Step 4: Customize Your Site

#### Theme Customizer
1. Go to **Appearance → Customize**
2. Configure these sections:

**Colors**
- Set your brand colors for backgrounds, accents, and text

**Hero Section**
- Update badge text, title, subtitle
- Customize CTA button text
- Set your 3 statistics (years, cases, success rate)

**Contact Information**
- Add phone number, email, address
- Set business hours
- Add Google Maps embed URL

**Styling Options**
- Adjust border radius and section padding

3. Click **Publish** to save changes

### Step 5: Add Content

#### Practice Areas
1. Go to **Practice Areas → Add New**
2. Create 6 practice areas (examples):
   - Property Law
   - Contract Law
   - Family Law
   - Civil Litigation
   - Estate Planning
   - Debt Collection
3. For each:
   - Add title
   - Write description in content editor
   - Add featured image (optional)
   - Publish

#### Team Members
1. Go to **Team Members → Add New**
2. Add your attorneys:
   - Name as title
   - Bio in content editor
   - Fill meta fields: Title/Position, Specialization, LinkedIn
   - Add profile photo as featured image
   - Publish

#### Testimonials
1. Go to **Testimonials → Add New**
2. Add client testimonials:
   - Testimonial text in content editor
   - Client name in meta field
   - Case type in meta field
   - Rating (1-5 stars)
   - Publish

#### Blog Posts
1. Go to **Posts → Add New**
2. Write articles about legal topics
3. Assign categories (Property Law, Family Law, etc.)
4. Add featured image
5. Publish

### Step 6: Install Recommended Plugins

#### Essential Plugins
1. **Contact Form 7**
   - Go to Plugins → Add New
   - Search "Contact Form 7"
   - Install and activate
   - Create a contact form
   - Add shortcode to contact section

2. **WP Mail SMTP**
   - For booking confirmation emails
   - Configure with your email provider

#### Optional Plugins
- **Yoast SEO**: SEO optimization
- **Wordfence Security**: Security
- **WP Super Cache**: Performance

## Troubleshooting

### Theme Not Showing Correctly
- Clear browser cache
- Go to Settings → Permalinks and click Save (flush rewrite rules)
- Check that all required pages are created

### Booking Form Not Working
- Ensure JavaScript is enabled
- Check browser console for errors
- Verify AJAX URL is correct

### Menu Not Appearing
- Go to Appearance → Menus
- Ensure menu is assigned to "Primary Menu" location
- Save menu

### Images Not Displaying
- Check file permissions
- Regenerate thumbnails (use plugin)
- Verify images are uploaded correctly

### Customizer Changes Not Saving
- Check for JavaScript errors
- Try different browser
- Disable conflicting plugins

## Google Maps Setup

1. Go to [Google Maps](https://www.google.com/maps)
2. Search for your office address
3. Click **Share** button
4. Select **Embed a map** tab
5. Copy the URL from the `<iframe src="...">` 
6. Paste in Customizer → Contact Information → Google Maps Embed URL

## Post-Installation Checklist

- [ ] Theme activated
- [ ] Static homepage set
- [ ] Navigation menu created
- [ ] Colors customized
- [ ] Hero section configured
- [ ] Contact information updated
- [ ] Practice areas added (6)
- [ ] Team members added (4+)
- [ ] Testimonials added (3+)
- [ ] Blog posts created (4+)
- [ ] Google Maps embedded
- [ ] Contact Form 7 installed
- [ ] Email notifications configured
- [ ] Site tested on mobile devices
- [ ] All links working
- [ ] Booking form tested

## Support

For technical support or customization requests, contact your web developer.

## Next Steps

1. **Content**: Add more blog posts regularly
2. **SEO**: Install Yoast SEO and optimize pages
3. **Analytics**: Add Google Analytics
4. **Security**: Install security plugin
5. **Backup**: Set up automated backups
6. **Performance**: Install caching plugin
7. **SSL**: Ensure HTTPS is enabled
8. **Testing**: Test on all devices and browsers

Your WordPress theme is now ready to use!
