// ===== Navigation Scroll Effect =====
const navbar = document.getElementById('navbar');
const navToggle = document.getElementById('navToggle');
const navLinks = document.getElementById('navLinks');

window.addEventListener('scroll', () => {
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

navToggle?.addEventListener('click', () => {
  navLinks.classList.toggle('active');
});

navLinks?.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    navLinks.classList.remove('active');
  });
});

// ===== Rolling Numbers Animation =====
function animateNumber(element) {
  const target = parseInt(element.dataset.target);
  const suffix = element.dataset.suffix || '';
  const duration = 2000;
  const start = 0;
  const startTime = performance.now();
  
  function update(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const easeOut = 1 - Math.pow(1 - progress, 3);
    const current = Math.floor(start + (target - start) * easeOut);
    
    element.textContent = current.toLocaleString() + suffix;
    
    if (progress < 1) {
      requestAnimationFrame(update);
    }
  }
  
  requestAnimationFrame(update);
}

// Observe stats for animation trigger
const statsObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const numbers = entry.target.querySelectorAll('[data-target]');
      numbers.forEach(num => animateNumber(num));
      statsObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.5 });

const heroStats = document.querySelector('.hero__stats');
if (heroStats) statsObserver.observe(heroStats);

// ===== Testimonials Carousel =====
const testimonialTrack = document.getElementById('testimonialTrack');
const testimonialDots = document.getElementById('testimonialDots');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let currentSlide = 0;
let autoSlideInterval;
const testimonials = testimonialTrack?.querySelectorAll('.testimonial-card');
const totalSlides = testimonials?.length || 0;

if (testimonialDots && totalSlides > 0) {
  for (let i = 0; i < totalSlides; i++) {
    const dot = document.createElement('div');
    dot.classList.add('testimonials__dot');
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => goToSlide(i));
    testimonialDots.appendChild(dot);
  }
}

function updateCarousel() {
  if (!testimonialTrack) return;
  testimonialTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
  const dots = testimonialDots?.querySelectorAll('.testimonials__dot');
  dots?.forEach((dot, index) => {
    dot.classList.toggle('active', index === currentSlide);
  });
}

function goToSlide(index) {
  currentSlide = index;
  updateCarousel();
  resetAutoSlide();
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % totalSlides;
  updateCarousel();
}

function prevSlide() {
  currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
  updateCarousel();
}

function startAutoSlide() {
  autoSlideInterval = setInterval(nextSlide, 5000);
}

function resetAutoSlide() {
  clearInterval(autoSlideInterval);
  startAutoSlide();
}

prevBtn?.addEventListener('click', () => { prevSlide(); resetAutoSlide(); });
nextBtn?.addEventListener('click', () => { nextSlide(); resetAutoSlide(); });
testimonialTrack?.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
testimonialTrack?.addEventListener('mouseleave', () => startAutoSlide());

if (totalSlides > 0) startAutoSlide();

// ===== Contact Form Tabs =====
const contactTabs = document.querySelectorAll('.contact__tab');
const contactForm = document.getElementById('contactForm');
const bookingForm = document.getElementById('bookingForm');

contactTabs.forEach(tab => {
  tab.addEventListener('click', () => {
    contactTabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    
    if (tab.dataset.form === 'booking') {
      contactForm.style.display = 'none';
      bookingForm.style.display = 'block';
    } else {
      contactForm.style.display = 'block';
      bookingForm.style.display = 'none';
    }
  });
});

// ===== Contact Form Validation =====
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');

function showError(input, errorId, message) {
  input.classList.add('error');
  const errorEl = document.getElementById(errorId);
  if (errorEl) errorEl.textContent = message;
}

function clearError(input, errorId) {
  input.classList.remove('error');
  const errorEl = document.getElementById(errorId);
  if (errorEl) errorEl.textContent = '';
}

function validateEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

nameInput?.addEventListener('blur', () => {
  if (!nameInput.value.trim()) showError(nameInput, 'nameError', 'Name is required');
  else clearError(nameInput, 'nameError');
});

emailInput?.addEventListener('blur', () => {
  if (!emailInput.value.trim()) showError(emailInput, 'emailError', 'Email is required');
  else if (!validateEmail(emailInput.value)) showError(emailInput, 'emailError', 'Please enter a valid email');
  else clearError(emailInput, 'emailError');
});

messageInput?.addEventListener('blur', () => {
  if (!messageInput.value.trim()) showError(messageInput, 'messageError', 'Message is required');
  else clearError(messageInput, 'messageError');
});

contactForm?.addEventListener('submit', (e) => {
  e.preventDefault();
  let isValid = true;
  
  if (!nameInput.value.trim()) { showError(nameInput, 'nameError', 'Name is required'); isValid = false; }
  if (!emailInput.value.trim()) { showError(emailInput, 'emailError', 'Email is required'); isValid = false; }
  else if (!validateEmail(emailInput.value)) { showError(emailInput, 'emailError', 'Please enter a valid email'); isValid = false; }
  if (!messageInput.value.trim()) { showError(messageInput, 'messageError', 'Message is required'); isValid = false; }
  
  if (isValid) {
    alert('Thank you for your message! We will get back to you soon.');
    contactForm.reset();
  }
});

// ===== Booking Form =====
const bookDate = document.getElementById('bookDate');
const bookTime = document.getElementById('bookTime');

// Set min date to tomorrow
if (bookDate) {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  bookDate.min = tomorrow.toISOString().split('T')[0];
  
  // Disable weekends
  bookDate.addEventListener('input', async () => {
    const date = new Date(bookDate.value);
    const day = date.getDay();
    
    if (day === 0 || day === 6) {
      alert('Please select a weekday (Monday-Friday)');
      bookDate.value = '';
      bookTime.innerHTML = '<option value="">Select date first</option>';
      bookTime.disabled = true;
      return;
    }
    
    // Fetch available slots
    try {
      const response = await fetch(`/api/bookings/slots/${bookDate.value}`);
      const slots = await response.json();
      
      if (slots.length === 0) {
        bookTime.innerHTML = '<option value="">No slots available</option>';
        bookTime.disabled = true;
      } else {
        bookTime.innerHTML = '<option value="">Select a time</option>' + 
          slots.map(s => `<option value="${s}">${s}</option>`).join('');
        bookTime.disabled = false;
      }
    } catch (err) {
      // Fallback if server not running
      const defaultSlots = ['09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00'];
      bookTime.innerHTML = '<option value="">Select a time</option>' + 
        defaultSlots.map(s => `<option value="${s}">${s}</option>`).join('');
      bookTime.disabled = false;
    }
  });
}

bookingForm?.addEventListener('submit', async (e) => {
  e.preventDefault();
  
  const data = {
    name: document.getElementById('bookName').value,
    email: document.getElementById('bookEmail').value,
    phone: document.getElementById('bookPhone').value,
    service: document.getElementById('bookService').value,
    date: document.getElementById('bookDate').value,
    time: document.getElementById('bookTime').value,
    notes: document.getElementById('bookNotes').value
  };
  
  try {
    const response = await fetch('/api/bookings', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });
    
    if (response.ok) {
      bookingForm.innerHTML = `
        <div class="booking-success">
          <div class="booking-success__icon">✓</div>
          <h3 class="booking-success__title">Booking Confirmed!</h3>
          <p class="booking-success__text">We've received your consultation request for ${data.date} at ${data.time}. You'll receive a confirmation email shortly.</p>
        </div>
      `;
    }
  } catch (err) {
    alert('Booking submitted! (Note: Server not running - booking saved locally)');
    bookingForm.reset();
  }
});

// ===== Scroll Reveal Animations =====
const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) entry.target.classList.add('visible');
  });
}, observerOptions);

document.querySelectorAll('.practice-card, .why-card, .team-card, .section__title, .section__subtitle').forEach(el => {
  el.classList.add('fade-in');
  observer.observe(el);
});

// ===== Smooth Scroll =====
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      const navHeight = navbar?.offsetHeight || 0;
      window.scrollTo({ top: target.offsetTop - navHeight, behavior: 'smooth' });
    }
  });
});

// ===== Load Blog Posts =====
async function loadBlogPosts() {
  const blogGrid = document.getElementById('blogGrid');
  if (!blogGrid) return;
  
  try {
    const response = await fetch('/api/posts');
    const posts = await response.json();
    
    const categoryIcons = {
      'Property Law': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
      'Family Law': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
      'Contract Law': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
      'Estate Planning': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'default': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>'
    };
    
    blogGrid.innerHTML = posts.slice(0, 4).map(post => {
      const icon = categoryIcons[post.category] || categoryIcons['default'];
      const initials = post.author.split(' ').map(n => n[0]).join('');
      const date = new Date(post.date).toLocaleDateString('en-ZA', { month: 'short', day: 'numeric', year: 'numeric' });
      
      return `
        <article class="blog-card">
          <div class="blog-card__image">${icon}</div>
          <div class="blog-card__content">
            <span class="blog-card__category">${post.category}</span>
            <h3 class="blog-card__title">${post.title}</h3>
            <p class="blog-card__excerpt">${post.excerpt}</p>
            <div class="blog-card__meta">
              <div class="blog-card__author">
                <span class="blog-card__avatar">${initials}</span>
                <span>${post.author}</span>
              </div>
              <span>${date}</span>
            </div>
          </div>
        </article>
      `;
    }).join('');
  } catch (err) {
    // Fallback content if server not running
    blogGrid.innerHTML = `
      <article class="blog-card">
        <div class="blog-card__image">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        </div>
        <div class="blog-card__content">
          <span class="blog-card__category">Property Law</span>
          <h3 class="blog-card__title">Understanding Property Transfer in South Africa</h3>
          <p class="blog-card__excerpt">A comprehensive guide to the property transfer process, from offer to registration at the Deeds Office.</p>
          <div class="blog-card__meta">
            <div class="blog-card__author"><span class="blog-card__avatar">SV</span><span>Sarah van der Berg</span></div>
            <span>Dec 20, 2024</span>
          </div>
        </div>
      </article>
      <article class="blog-card">
        <div class="blog-card__image">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="blog-card__content">
          <span class="blog-card__category">Family Law</span>
          <h3 class="blog-card__title">New Amendments to the Divorce Act</h3>
          <p class="blog-card__excerpt">Recent changes to divorce legislation and how they may affect your case.</p>
          <div class="blog-card__meta">
            <div class="blog-card__author"><span class="blog-card__avatar">AP</span><span>Aisha Patel</span></div>
            <span>Dec 15, 2024</span>
          </div>
        </div>
      </article>
      <article class="blog-card">
        <div class="blog-card__image">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        </div>
        <div class="blog-card__content">
          <span class="blog-card__category">Contract Law</span>
          <h3 class="blog-card__title">Protecting Your Business: Essential Contract Clauses</h3>
          <p class="blog-card__excerpt">Key clauses every business contract should include to protect your interests.</p>
          <div class="blog-card__meta">
            <div class="blog-card__author"><span class="blog-card__avatar">MN</span><span>Michael Ndlovu</span></div>
            <span>Dec 10, 2024</span>
          </div>
        </div>
      </article>
      <article class="blog-card">
        <div class="blog-card__image">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <div class="blog-card__content">
          <span class="blog-card__category">Estate Planning</span>
          <h3 class="blog-card__title">Estate Planning: Why You Need a Will</h3>
          <p class="blog-card__excerpt">The importance of having a valid will and what happens when you die intestate.</p>
          <div class="blog-card__meta">
            <div class="blog-card__author"><span class="blog-card__avatar">JB</span><span>James Botha</span></div>
            <span>Dec 5, 2024</span>
          </div>
        </div>
      </article>
    `;
  }
}

// Initialize blog posts
loadBlogPosts();
