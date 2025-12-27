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
const contactForm = document.querySelector('.contact-form:not(.booking-form)');
const bookingForm = document.getElementById('bookingForm');

contactTabs.forEach(tab => {
  tab.addEventListener('click', () => {
    contactTabs.forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    
    if (tab.dataset.form === 'booking') {
      if (contactForm) contactForm.style.display = 'none';
      if (bookingForm) bookingForm.style.display = 'block';
    } else {
      if (contactForm) contactForm.style.display = 'block';
      if (bookingForm) bookingForm.style.display = 'none';
    }
  });
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
    
    // Fetch available slots via WordPress AJAX
    try {
      const formData = new FormData();
      formData.append('action', 'get_booking_slots');
      formData.append('nonce', vdbAjax.nonce);
      formData.append('date', bookDate.value);
      
      const response = await fetch(vdbAjax.ajaxurl, {
        method: 'POST',
        body: formData
      });
      
      const result = await response.json();
      
      if (result.success && result.data.length > 0) {
        bookTime.innerHTML = '<option value="">Select a time</option>' + 
          result.data.map(s => `<option value="${s}">${s}</option>`).join('');
        bookTime.disabled = false;
      } else {
        bookTime.innerHTML = '<option value="">No slots available</option>';
        bookTime.disabled = true;
      }
    } catch (err) {
      console.error('Error fetching slots:', err);
      // Fallback slots
      const defaultSlots = ['09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00'];
      bookTime.innerHTML = '<option value="">Select a time</option>' + 
        defaultSlots.map(s => `<option value="${s}">${s}</option>`).join('');
      bookTime.disabled = false;
    }
  });
}

bookingForm?.addEventListener('submit', async (e) => {
  e.preventDefault();
  
  const formData = new FormData();
  formData.append('action', 'submit_booking');
  formData.append('nonce', vdbAjax.nonce);
  formData.append('name', document.getElementById('bookName').value);
  formData.append('email', document.getElementById('bookEmail').value);
  formData.append('phone', document.getElementById('bookPhone').value);
  formData.append('service', document.getElementById('bookService').value);
  formData.append('date', document.getElementById('bookDate').value);
  formData.append('time', document.getElementById('bookTime').value);
  formData.append('notes', document.getElementById('bookNotes').value);
  
  try {
    const response = await fetch(vdbAjax.ajaxurl, {
      method: 'POST',
      body: formData
    });
    
    const result = await response.json();
    
    if (result.success) {
      const date = document.getElementById('bookDate').value;
      const time = document.getElementById('bookTime').value;
      
      bookingForm.innerHTML = `
        <div class="booking-success">
          <div class="booking-success__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
          </div>
          <h3 class="booking-success__title">Booking Confirmed!</h3>
          <p class="booking-success__text">We've received your consultation request for ${date} at ${time}. You'll receive a confirmation email shortly.</p>
        </div>
      `;
    } else {
      alert('Error submitting booking. Please try again.');
    }
  } catch (err) {
    console.error('Booking error:', err);
    alert('Error submitting booking. Please try again.');
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
    const href = this.getAttribute('href');
    if (href === '#') return;
    
    e.preventDefault();
    const target = document.querySelector(href);
    if (target) {
      const navHeight = navbar?.offsetHeight || 0;
      window.scrollTo({ top: target.offsetTop - navHeight, behavior: 'smooth' });
    }
  });
});
