# VDB Law Firm WordPress Theme

A modern, minimalist WordPress theme for law firms with extensive customization options.

## Features

- **Fully Customizable**: Everything is editable through WordPress Customizer
- **Custom Post Types**: Practice Areas, Team Members, Testimonials, Bookings
- **Responsive Design**: Optimized for all devices (desktop, tablet, mobile, smartwatch)
- **Modern UI**: Clean white background with minimalist design
- **Booking System**: Built-in consultation booking with AJAX
- **Blog Integration**: Automatic WordPress blog post integration
- **SEO Friendly**: Clean semantic HTML5 markup
- **Performance Optimized**: Minimal dependencies, fast loading

## Installation

1. **Upload Theme**
   - Compress the `wordpress-theme` folder as a ZIP file
   - Go to WordPress Admin → Appearance → Themes → Add New
   - Click "Upload Theme" and select the ZIP file
   - Click "Install Now" and then "Activate"

2. **Set Homepage**
   - Go to Settings → Reading
   - Set "Your homepage displays" to "A static page"
   - Select "Front Page" as your homepage

3. **Configure Menus**
   - Go to Appearance → Menus
   - Create a new menu and assign it to "Primary Menu"
   - Add pages: Services, About, Team, Insights, Contact

## Customization

### Theme Customizer (Appearance → Customize)

#### Colors Panel
- **Background Colors**: Primary, Secondary, Dark backgrounds
- **Accent Colors**: Primary accent, Blue accent
- **Text Colors**: Primary text, Secondary text

#### Hero Section
- Badge text
- Title and highlighted title
- Subtitle
- CTA button text
- 3 customizable stats (number, suffix, label)

#### Contact Information
- Phone number
- Email address
- Physical address
- Business hours
- Google Maps embed URL

#### Styling Options
- Border radius (0-50px)
- Section padding (0-200px)

### Custom Post Types

#### Practice Areas
1. Go to Practice Areas → Add New
2. Enter title (e.g., "Property Law")
3. Add description in content editor
4. Set featured image (optional)
5. Publish

#### Team Members
1. Go to Team Members → Add New
2. Enter name as title
3. Add bio in content editor
4. Fill in meta fields:
   - Title/Position (e.g., "Senior Partner")
   - Specialization (e.g., "Property & Commercial Law")
   - LinkedIn URL
5. Set featured image for profile photo
6. Publish

#### Testimonials
1. Go to Testimonials → Add New
2. Enter testimonial text in content editor
3. Fill in meta fields:
   - Client Name
   - Case Type
   - Rating (1-5 stars)
4. Publish

#### Bookings
- Bookings are created automatically through the booking form
- View and manage bookings in Bookings admin panel
- Update booking status: Pending, Confirmed, Cancelled

## Booking System

The theme includes a built-in booking system:

1. **Frontend**: Booking form on homepage (#contact section)
2. **Features**:
   - Date picker (weekdays only)
   - Dynamic time slot availability
   - Service selection from Practice Areas
   - Email notifications (requires SMTP plugin)
3. **Backend**: View all bookings in WordPress admin

### Setting Up Email Notifications

Install an SMTP plugin like "WP Mail SMTP" to enable booking confirmation emails.

## Menus

### Primary Menu
Appears in header navigation. Recommended pages:
- Services (link to #services)
- About (link to #about)
- Team (link to #team)
- Insights (link to blog page)
- Contact (link to #contact)

### Footer Menu
Appears in footer. Can use same menu as primary or create separate.

## Blog Setup

1. **Create Blog Page**
   - Go to Pages → Add New
   - Title: "Insights" or "Blog"
   - Leave content empty
   - Publish

2. **Set Blog Page**
   - Go to Settings → Reading
   - Set "Posts page" to your blog page

3. **Create Posts**
   - Go to Posts → Add New
   - Write your article
   - Assign categories (e.g., "Property Law", "Family Law")
   - Set featured image
   - Publish

Posts automatically appear in:
- Blog section on homepage (latest 4)
- Blog archive page (all posts)
- Category archives

## Recommended Plugins

### Essential
- **Contact Form 7**: For contact form functionality
- **WP Mail SMTP**: For email notifications

### Optional
- **Yoast SEO**: SEO optimization
- **Wordfence Security**: Security protection
- **WP Super Cache**: Performance optimization
- **Akismet**: Spam protection

## File Structure

```
wordpress-theme/
├── assets/
│   ├── css/
│   │   └── main.css          # Main stylesheet
│   └── js/
│       └── main.js           # JavaScript functionality
├── inc/
│   ├── customizer.php        # Customizer settings
│   ├── post-types.php        # Custom post types
│   └── template-functions.php # Helper functions
├── functions.php             # Theme setup
├── style.css                 # Theme header
├── header.php                # Header template
├── footer.php                # Footer template
├── front-page.php            # Homepage template
├── index.php                 # Fallback template
├── single.php                # Single post template
├── page.php                  # Page template
├── archive.php               # Blog archive template
└── README.md                 # This file
```

## Customization Tips

### Changing Colors
1. Go to Appearance → Customize → Colors
2. Adjust colors to match your brand
3. Changes apply site-wide automatically

### Adding New Practice Areas
1. Create Practice Area post
2. It automatically appears on homepage
3. Order by drag-and-drop in Practice Areas list

### Modifying Hero Stats
1. Go to Appearance → Customize → Hero Section
2. Change stat numbers, suffixes, and labels
3. Stats animate on page load

### Updating Contact Info
1. Go to Appearance → Customize → Contact Information
2. Update all contact details
3. Changes reflect in header, footer, and contact section

### Google Maps Integration
1. Get Google Maps embed URL:
   - Go to Google Maps
   - Search for your address
   - Click "Share" → "Embed a map"
   - Copy the URL from the iframe src
2. Paste in Customizer → Contact Information → Google Maps Embed URL

## Support

For theme support and customization requests, contact your developer.

## Credits

- **Design**: Modern minimalist law firm design
- **Icons**: Inline SVG icons
- **Fonts**: Inter (Google Fonts)
- **Framework**: Custom WordPress theme

## Changelog

### Version 1.0.0
- Initial release
- Full homepage with all sections
- Custom post types
- Booking system
- Blog integration
- Extensive customizer options
- Responsive design
