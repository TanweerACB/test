# Design Document: Cape Town Law Firm Website

## Overview

This design document outlines the architecture and implementation approach for a premium, technology-forward website for a Cape Town civil law firm. The website will be built as a single-page application using modern web technologies, featuring dark mode aesthetics, glassmorphism effects, and smooth animations to convey innovation and professionalism.

The MVP will be a static website built with HTML, CSS, and vanilla JavaScript to enable rapid development while maintaining the premium visual experience.

## Architecture

### Technology Stack

- **HTML5**: Semantic markup for accessibility and SEO
- **CSS3**: Custom properties, flexbox, grid, animations, and backdrop-filter for glassmorphism
- **Vanilla JavaScript**: Scroll animations, carousel functionality, form validation, and interactive elements
- **Google Fonts**: Inter or similar contemporary sans-serif
- **Google Maps Embed API**: Cape Town location display

### File Structure

```
/
├── index.html          # Main HTML document
├── css/
│   └── styles.css      # All styles including animations
├── js/
│   └── main.js         # JavaScript functionality
└── assets/
    └── images/         # Team photos, icons, backgrounds
```

### Design Patterns

- **CSS Custom Properties**: Centralized design tokens for colors, spacing, and typography
- **BEM Naming Convention**: Block-Element-Modifier for maintainable CSS
- **Progressive Enhancement**: Core content accessible without JavaScript
- **Mobile-First Responsive**: Base styles for mobile, enhanced for larger screens

## Components and Interfaces

### 1. Navigation Component

```
NavigationBar
├── Logo (firm name/logo)
├── NavLinks[]
│   ├── Practice Areas
│   ├── About
│   ├── Team
│   ├── Testimonials
│   └── Contact
├── MobileMenuToggle
└── CTAButton (consultation)
```

**Behavior**:
- Fixed position at top of viewport
- Initial state: semi-transparent with blur (backdrop-filter: blur(10px))
- On scroll (>50px): increased background opacity (0.9)
- Mobile: hamburger menu with slide-in drawer

### 2. Hero Section Component

```
HeroSection
├── AnimatedGradientBackground
├── ContentContainer
│   ├── Headline ("Technology-Driven Legal Solutions")
│   ├── Subheadline (firm description)
│   └── CTAButton
└── GlassmorphicOverlayCard
    ├── StatItem (years experience)
    ├── StatItem (cases won)
    └── StatItem (client satisfaction)
```

**Animations**:
- Gradient background: CSS animation with shifting hue (20s infinite)
- Content fade-in: opacity 0→1, translateY 20px→0 (0.8s ease-out)
- Stats counter: number increment animation on viewport entry

### 3. Practice Area Cards

```
PracticeAreaCard
├── IconContainer
├── Title
├── ShortDescription
├── ExpandedContent (revealed on hover)
│   ├── DetailedDescription
│   └── LearnMoreLink
└── HoverOverlay
```

**Hover Animation**:
- Transform: translateY(-8px)
- Box-shadow: increase spread and blur
- Expanded content: max-height 0→auto, opacity 0→1
- Transition: 300ms ease-out

### 4. Team Profile Cards

```
TeamProfileCard
├── PhotoContainer
│   ├── Photo
│   └── HoverOverlay
├── InfoContainer
│   ├── Name
│   ├── Title
│   ├── Specialization
│   └── SocialLinks (LinkedIn)
└── AccentBorder (gold on hover)
```

### 5. Testimonial Carousel

```
TestimonialCarousel
├── CarouselTrack
│   └── TestimonialCard[]
│       ├── QuoteIcon
│       ├── TestimonialText
│       ├── ClientName
│       └── CaseType
├── NavigationDots
└── ArrowButtons (prev/next)
```

**Carousel Logic**:
- Auto-advance every 5 seconds
- Pause on hover
- Smooth CSS transform transitions
- Infinite loop with clone technique

### 6. Contact Form

```
ContactForm
├── FormField (name, required)
├── FormField (email, required, email validation)
├── FormField (phone, optional)
├── FormField (message, textarea, required)
├── SubmitButton
└── ValidationMessages
```

**Validation**:
- Real-time validation on blur
- Submit validation before form submission
- Visual feedback with border color changes

### 7. Map Integration

```
MapSection
├── GoogleMapsEmbed (Cape Town coordinates)
├── OverlayCard
│   ├── Address
│   ├── Phone
│   └── Email
└── DirectionsLink
```

## Data Models

### Color Palette (CSS Custom Properties)

```css
:root {
  /* Primary Colors */
  --color-bg-primary: #0A1628;      /* Deep navy */
  --color-bg-secondary: #1E293B;    /* Slate gray */
  --color-bg-card: rgba(30, 41, 59, 0.7);
  
  /* Accent Colors */
  --color-accent-gold: #D4AF37;
  --color-accent-gold-light: #E5C158;
  
  /* Text Colors */
  --color-text-primary: #FFFFFF;
  --color-text-secondary: #94A3B8;
  --color-text-muted: #64748B;
  
  /* Glassmorphism */
  --glass-bg: rgba(30, 41, 59, 0.6);
  --glass-border: rgba(255, 255, 255, 0.1);
  --glass-blur: blur(10px);
  
  /* Spacing */
  --radius-sm: 8px;
  --radius-md: 16px;
  --radius-lg: 24px;
  
  /* Typography */
  --font-family: 'Inter', sans-serif;
  --font-size-hero: clamp(48px, 8vw, 72px);
  --font-size-h2: clamp(32px, 5vw, 48px);
  --font-size-h3: clamp(20px, 3vw, 28px);
  --font-size-body: 16px;
  --font-size-small: 14px;
  
  /* Transitions */
  --transition-fast: 200ms ease;
  --transition-medium: 300ms ease;
  --transition-slow: 500ms ease;
}
```

### Practice Areas Data

```javascript
const practiceAreas = [
  {
    id: 'property-law',
    icon: 'building',
    title: 'Property Law',
    shortDesc: 'Expert guidance in property transactions and disputes',
    fullDesc: 'Comprehensive legal services for property purchases, sales, transfers, and dispute resolution in the Western Cape.'
  },
  {
    id: 'contract-law',
    icon: 'document',
    title: 'Contract Law',
    shortDesc: 'Drafting and enforcement of commercial agreements',
    fullDesc: 'Professional contract drafting, review, negotiation, and dispute resolution for businesses and individuals.'
  },
  {
    id: 'family-law',
    icon: 'family',
    title: 'Family Law',
    shortDesc: 'Compassionate support for family legal matters',
    fullDesc: 'Divorce, custody, maintenance, and matrimonial property matters handled with sensitivity and expertise.'
  },
  {
    id: 'civil-litigation',
    icon: 'gavel',
    title: 'Civil Litigation',
    shortDesc: 'Strategic representation in civil disputes',
    fullDesc: 'Experienced litigation team representing clients in High Court and Magistrates Court proceedings.'
  },
  {
    id: 'estate-planning',
    icon: 'shield',
    title: 'Estate Planning',
    shortDesc: 'Secure your legacy with expert planning',
    fullDesc: 'Wills, trusts, estate administration, and succession planning tailored to your needs.'
  },
  {
    id: 'debt-collection',
    icon: 'balance',
    title: 'Debt Collection',
    shortDesc: 'Efficient recovery of outstanding debts',
    fullDesc: 'Professional debt collection services with a focus on maintaining business relationships.'
  }
];
```

### Team Members Data

```javascript
const teamMembers = [
  {
    id: 'partner-1',
    name: 'Sarah van der Berg',
    title: 'Senior Partner',
    specialization: 'Property & Commercial Law',
    image: 'sarah-aka.jpg',
    linkedin: '#'
  },
  {
    id: 'partner-2',
    name: 'Michael Ndlovu',
    title: 'Partner',
    specialization: 'Civil Litigation',
    image: 'michael-n.jpg',
    linkedin: '#'
  },
  {
    id: 'associate-1',
    name: 'Aisha Patel',
    title: 'Senior Associate',
    specialization: 'Family Law',
    image: 'aisha-p.jpg',
    linkedin: '#'
  },
  {
    id: 'associate-2',
    name: 'James Botha',
    title: 'Associate',
    specialization: 'Estate Planning',
    image: 'james-b.jpg',
    linkedin: '#'
  }
];
```

### Testimonials Data

```javascript
const testimonials = [
  {
    id: 1,
    text: 'Their innovative approach to our property dispute saved us months of litigation. Truly ahead of the curve.',
    clientName: 'David M.',
    caseType: 'Property Law'
  },
  {
    id: 2,
    text: 'Professional, responsive, and technologically savvy. They made the entire process seamless.',
    clientName: 'Priya S.',
    caseType: 'Contract Law'
  },
  {
    id: 3,
    text: 'During a difficult divorce, they provided both legal expertise and genuine compassion.',
    clientName: 'Linda K.',
    caseType: 'Family Law'
  }
];
```

### Contact Information

```javascript
const contactInfo = {
  address: '123 Long Street, Cape Town, 8001',
  phone: '+27 21 123 4567',
  email: 'info@capetownlaw.co.za',
  coordinates: { lat: -33.9249, lng: 18.4241 },
  hours: 'Mon-Fri: 8:00 AM - 5:00 PM'
};
```



## Correctness Properties

*A property is a characteristic or behavior that should hold true across all valid executions of a system—essentially, a formal statement about what the system should do. Properties serve as the bridge between human-readable specifications and machine-verifiable correctness guarantees.*

### Property 1: Team Profile Data Completeness

*For any* team member data object rendered as a Team_Profile_Card, the rendered HTML SHALL contain the member's name, title, specialization, and an image element.

**Validates: Requirements 4.3**

### Property 2: Testimonial Data Completeness

*For any* testimonial data object rendered in the Testimonial_Carousel, the rendered HTML SHALL contain the client name, testimonial text, and case type.

**Validates: Requirements 5.3**

### Property 3: Form Validation Prevents Invalid Submission

*For any* Contact_Form submission where one or more required fields (name, email, message) are empty or invalid, the form SHALL prevent submission and display appropriate validation feedback.

**Validates: Requirements 6.3**

### Property 4: Design System Border Radius Consistency

*For any* card, button, or container element in the website, the computed border-radius SHALL be within the range of 16px to 24px.

**Validates: Requirements 7.5**

## Error Handling

### Form Validation Errors

| Error Condition | User Feedback | Recovery Action |
|----------------|---------------|-----------------|
| Empty required field | Red border + "This field is required" message | Focus on first invalid field |
| Invalid email format | Red border + "Please enter a valid email" | Highlight email field |
| Form submission failure | Toast notification with error message | Retain form data, allow retry |

### Map Loading Errors

| Error Condition | User Feedback | Recovery Action |
|----------------|---------------|-----------------|
| Map fails to load | Display static map image fallback | Show address text prominently |
| Slow connection | Loading spinner with timeout | Graceful degradation to address only |

### Image Loading Errors

| Error Condition | User Feedback | Recovery Action |
|----------------|---------------|-----------------|
| Team photo fails to load | Display placeholder avatar | Use CSS background fallback |
| Icon fails to load | Use text fallback | Ensure alt text is descriptive |

### JavaScript Disabled

- Core content remains accessible via semantic HTML
- Carousel displays all testimonials in a static list
- Form submits via standard HTML form action
- Navigation links work without JavaScript

## Testing Strategy

### Unit Tests

Unit tests will verify specific examples and edge cases:

1. **Form Validation Tests**
   - Test empty field detection
   - Test email format validation
   - Test form submission prevention with invalid data

2. **Data Rendering Tests**
   - Test team member card renders all required fields
   - Test testimonial card renders all required fields
   - Test practice area card renders correctly

3. **Navigation Tests**
   - Test all navigation links are present
   - Test mobile menu toggle functionality

### Property-Based Tests

Property-based tests will use a JavaScript PBT library (fast-check) to verify universal properties:

**Configuration:**
- Minimum 100 iterations per property test
- Tag format: **Feature: law-firm-website, Property {number}: {property_text}**

1. **Property 1 Test: Team Profile Data Completeness**
   - Generate random valid team member objects
   - Render each as a card
   - Assert all required fields are present in output

2. **Property 2 Test: Testimonial Data Completeness**
   - Generate random valid testimonial objects
   - Render each as a carousel item
   - Assert all required fields are present in output

3. **Property 3 Test: Form Validation**
   - Generate random form states with various invalid combinations
   - Attempt submission
   - Assert form prevents submission and shows errors

4. **Property 4 Test: Border Radius Consistency**
   - Query all card, button, and container elements
   - Assert computed border-radius is within 16-24px range

### Integration Tests

- Full page load and render verification
- Scroll behavior and navigation opacity changes
- Carousel navigation functionality
- Form submission flow (with mock backend)

### Visual Regression Tests (Optional)

- Screenshot comparison for key viewport sizes
- Component-level visual snapshots

### Accessibility Tests

- WCAG 2.1 AA compliance verification
- Keyboard navigation testing
- Screen reader compatibility
- Color contrast validation
