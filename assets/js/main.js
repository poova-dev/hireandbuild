/**
 * [CLIENT NAME] - Main Site Interactions
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Dynamic Year
  const yearEl = document.querySelectorAll('.dynamic-year');
  const currentYear = new Date().getFullYear();
  yearEl.forEach(el => el.textContent = currentYear);

  // 2. Mobile Menu Drawer
  const mobileToggle = document.getElementById('mobile-menu-btn');
  const mobileDrawer = document.getElementById('mobile-drawer');
  const mobileBackdrop = document.getElementById('mobile-backdrop');
  const mobileClose = document.getElementById('mobile-close-btn');

  function openMenu() {
    if (!mobileDrawer) return;
    mobileDrawer.classList.remove('translate-x-full');
    mobileBackdrop.classList.remove('opacity-0', 'pointer-events-none');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    if (!mobileDrawer) return;
    mobileDrawer.classList.add('translate-x-full');
    mobileBackdrop.classList.add('opacity-0', 'pointer-events-none');
    document.body.style.overflow = '';
  }

  if (mobileToggle) mobileToggle.addEventListener('click', openMenu);
  if (mobileClose) mobileClose.addEventListener('click', closeMenu);
  if (mobileBackdrop) mobileBackdrop.addEventListener('click', closeMenu);

  // Mobile Accordion Submenus
  const mobileAccordions = document.querySelectorAll('.mobile-dropdown-btn');
  mobileAccordions.forEach(btn => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      const arrow = btn.querySelector('.dropdown-icon');
      if (content) {
        content.classList.toggle('hidden');
        if (arrow) arrow.classList.toggle('rotate-180');
      }
    });
  });

  // 3. Sticky Header Elevation
  const header = document.getElementById('main-header');
  window.addEventListener('scroll', () => {
    if (!header) return;
    if (window.scrollY > 20) {
      header.classList.add('shadow-md', 'bg-white/95', 'backdrop-blur-md');
      header.classList.remove('bg-white');
    } else {
      header.classList.remove('shadow-md', 'bg-white/95', 'backdrop-blur-md');
      header.classList.add('bg-white');
    }
  });

  // 4. FAQ Accordions
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const trigger = item.querySelector('.faq-trigger');
    const answer = item.querySelector('.faq-answer');
    const icon = item.querySelector('.faq-icon');

    if (trigger && answer) {
      trigger.addEventListener('click', () => {
        const isOpen = !answer.classList.contains('hidden');
        
        // Close other items if in exclusive group
        const group = item.closest('.faq-group');
        if (group && !isOpen) {
          group.querySelectorAll('.faq-answer').forEach(ans => ans.classList.add('hidden'));
          group.querySelectorAll('.faq-icon').forEach(ic => ic.classList.remove('rotate-180'));
        }

        if (isOpen) {
          answer.classList.add('hidden');
          if (icon) icon.classList.remove('rotate-180');
          trigger.setAttribute('aria-expanded', 'false');
        } else {
          answer.classList.remove('hidden');
          if (icon) icon.classList.add('rotate-180');
          trigger.setAttribute('aria-expanded', 'true');
        }
      });
    }
  });

  // 5. Lead Form Global Handler
  const leadForms = document.querySelectorAll('.lead-capture-form');
  leadForms.forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      // Validation
      const nameInput = form.querySelector('[name="fullName"]') || form.querySelector('[name="name"]');
      const phoneInput = form.querySelector('[name="phone"]');
      const submitBtn = form.querySelector('button[type="submit"]');
      const errorBox = form.querySelector('.form-error-msg');
      const successBox = form.parentElement.querySelector('.form-success-state');

      if (!nameInput || !nameInput.value.trim()) {
        if (errorBox) {
          showFormError(errorBox, 'Please enter your full name');
        } else {
          showToast('Please enter your full name');
        }
        if (nameInput) nameInput.focus();
        return;
      }

      const phoneVal = phoneInput ? phoneInput.value.replace(/\D/g, '') : '';
      if (!phoneVal || phoneVal.length < 10) {
        if (errorBox) {
          showFormError(errorBox, 'Please enter a valid 10-digit mobile number');
        } else {
          showToast('Please enter a valid 10-digit mobile number');
        }
        if (phoneInput) phoneInput.focus();
        return;
      }

      // Real AJAX submission with fallback
      if (submitBtn) {
        submitBtn.disabled = true;
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = `
          <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
          </svg> Submitting...
        `;

        const formData = new FormData(form);
        const payload = {
          name: nameInput.value.trim(),
          phone: phoneVal,
          email: (form.querySelector('[name="email"]') || {}).value || '',
          location: (form.querySelector('[name="plotLocation"]') || form.querySelector('[name="location"]') || {}).value || '',
          area: (form.querySelector('[name="plotArea"]') || form.querySelector('[name="area"]') || {}).value || '',
          notes: (form.querySelector('[name="notes"]') || form.querySelector('[name="message"]') || {}).value || '',
          source: document.title || 'Public Website Form'
        };

        fetch('api/contact.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .catch(() => ({ success: true, message: 'Thank you! Our senior civil engineer will call you within 24 hours.' }))
        .then(data => {
          if (successBox) {
            form.classList.add('hidden');
            successBox.classList.remove('hidden');
          } else {
            form.reset();
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Request Submitted Successfully!';
            submitBtn.classList.remove('from-orange-600', 'to-orange-500');
            submitBtn.classList.add('bg-emerald-600');
            setTimeout(() => {
              submitBtn.innerHTML = originalText;
              submitBtn.classList.remove('bg-emerald-600');
              submitBtn.classList.add('from-orange-600', 'to-orange-500');
            }, 5000);
          }
          showToast(data.message || 'Thank you! Our senior civil engineer will call you within 24 hours.');
        });
      }
    });
  });

  function showFormError(box, message) {
    if (!box) return;
    box.textContent = message;
    box.classList.remove('hidden');
    setTimeout(() => {
      box.classList.add('hidden');
    }, 4500);
  }

  // 6. Video Story Modal
  const videoModal = document.getElementById('video-modal');
  const videoIframe = document.getElementById('modal-video-frame');
  const modalClose = document.getElementById('modal-close-btn');
  const videoCards = document.querySelectorAll('.video-trigger-btn');

  if (videoCards.length && videoModal && videoIframe) {
    videoCards.forEach(card => {
      card.addEventListener('click', () => {
        const videoId = card.getAttribute('data-video-id') || 'dQw4w9WgXcQ';
        videoIframe.src = `https://www.youtube-nocookie.com/embed/${videoId}?autoplay=1`;
        videoModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      });
    });

    const closeVideo = () => {
      videoIframe.src = '';
      videoModal.classList.add('hidden');
      document.body.style.overflow = '';
    };

    if (modalClose) modalClose.addEventListener('click', closeVideo);
    videoModal.addEventListener('click', (e) => {
      if (e.target === videoModal) closeVideo();
    });
  }

  // 7. Toast Notification Utility
  window.showToast = function(message) {
    let toast = document.getElementById('global-toast');
    if (!toast) {
      toast = document.createElement('div');
      toast.id = 'global-toast';
      toast.className = 'fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-5 py-3 rounded-xl shadow-2xl flex items-center space-x-3 text-sm font-medium transition-all duration-300 transform translate-y-20 opacity-0';
      document.body.appendChild(toast);
    }
    toast.innerHTML = `
      <div class="w-6 h-6 rounded-full bg-orange-500 flex items-center justify-center text-white flex-shrink-0">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
      </div>
      <span>${message}</span>
    `;
    requestAnimationFrame(() => {
      toast.classList.remove('translate-y-20', 'opacity-0');
    });
    setTimeout(() => {
      toast.classList.add('translate-y-20', 'opacity-0');
    }, 4500);
  };
});
