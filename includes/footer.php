<?php
/**
 * HireAndBuild - Footer Component
 * CTA Band, 5-Column Grid, Social Icons, Legal & Minimal Vanilla JS
 */
?>
<footer class="mt-auto bg-brand-dark text-slate-300 pt-16 pb-8 border-t border-slate-800">
  
  <!-- Pre-Footer Conversion Band -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
    <div class="bg-gradient-to-r from-slate-900 via-brand-dark to-slate-900 border border-brand/30 rounded-2xl p-8 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl relative overflow-hidden">
      <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-brand/10 rounded-full blur-2xl pointer-events-none"></div>
      
      <div class="space-y-2 text-center md:text-left">
        <h3 class="font-heading text-2xl sm:text-3xl font-bold text-white tracking-tight">
          Planning to build your home in Chennai?
        </h3>
        <p class="text-slate-400 text-sm sm:text-base max-w-xl">
          Get a transparent sq.ft estimate and BOQ breakdown before you commit to anything.
        </p>
      </div>

      <div class="flex flex-wrap items-center gap-3 shrink-0">
        <a href="<?= site_url('cost-calculator.php') ?>" class="px-5 py-3 rounded-lg bg-white text-slate-900 hover:bg-slate-100 font-semibold text-sm transition-all shadow-sm">
          Calculate Your Cost
        </a>
        <a href="tel:<?= SITE_PHONE_RAW ?>" class="px-5 py-3 rounded-lg bg-brand hover:bg-brand-600 text-white font-semibold text-sm transition-all shadow-sm">
          Talk to Us
        </a>
      </div>
    </div>
  </div>

  <!-- Main 4-Column Footer -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8 pb-12 border-b border-slate-800/80">

      <!-- Column 1: Brand & Key Stats -->
      <div class="lg:col-span-2 space-y-4">
        <a href="<?= site_url() ?>" class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-lg bg-brand flex items-center justify-center text-white shadow-md">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/></svg>
          </div>
          <span class="font-heading font-extrabold text-xl text-white tracking-tight">
            HIRE<span class="text-brand">&amp;</span>BUILD
          </span>
        </a>

        <p class="text-slate-400 text-xs sm:text-sm leading-relaxed max-w-sm">
          Turnkey house construction, architectural and structural design, and plan approvals across Chennai, Kanchipuram, Chengalpattu and Thiruvallur.
        </p>

        <!-- Confirmed Stats Highlight -->
        <div class="flex items-center gap-6 pt-2">
          <div class="border-l-2 border-brand pl-3">
            <div class="text-xl font-heading font-bold text-white"><?= METRIC_HOMES_DELIVERED ?></div>
            <div class="text-[11px] text-slate-400 font-medium">Homes Delivered</div>
          </div>
          <div class="border-l-2 border-brand pl-3">
            <div class="text-xl font-heading font-bold text-white"><?= METRIC_ACTIVE_PROJECTS ?></div>
            <div class="text-[11px] text-slate-400 font-medium">Ongoing Projects</div>
          </div>
        </div>
      </div>

      <!-- Column 2: Services -->
      <div>
        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Services</h4>
        <ul class="space-y-2.5 text-xs sm:text-sm text-slate-400">
          <li><a href="<?= site_url('turnkey-house-construction.php') ?>" class="hover:text-brand transition-colors">Turnkey House Construction</a></li>
          <li><a href="<?= site_url('commercial-construction.php') ?>" class="hover:text-brand transition-colors">Commercial Construction</a></li>
          <li><a href="<?= site_url('turnkey-house-construction.php#architectural') ?>" class="hover:text-brand transition-colors">Architectural Designing</a></li>
          <li><a href="<?= site_url('turnkey-house-construction.php#structural') ?>" class="hover:text-brand transition-colors">Structural Designing</a></li>
          <li><a href="<?= site_url('turnkey-house-construction.php#plan-approval') ?>" class="hover:text-brand transition-colors">Building Plan Approval</a></li>
          <li><a href="<?= site_url('joint-venture.php') ?>" class="hover:text-brand transition-colors">Joint Venture</a></li>
        </ul>
      </div>

      <!-- Column 3: Quick Links & Pricing -->
      <div>
        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Company</h4>
        <ul class="space-y-2.5 text-xs sm:text-sm text-slate-400">
          <li><a href="<?= site_url('about.php') ?>" class="hover:text-brand transition-colors">About Us</a></li>
          <li><a href="<?= site_url('projects.php') ?>" class="hover:text-brand transition-colors">Projects</a></li>
          <li><a href="<?= site_url('careers.php') ?>" class="hover:text-brand transition-colors">Careers</a></li>
          <li><a href="<?= site_url('contact.php') ?>" class="hover:text-brand transition-colors">Contact Us</a></li>
          <li><a href="<?= site_url('residential-pricing.php') ?>" class="hover:text-brand transition-colors">Residential Packages</a></li>
          <li><a href="<?= site_url('commercial-pricing.php') ?>" class="hover:text-brand transition-colors">Commercial Packages</a></li>
        </ul>
      </div>

      <!-- Column 4: Contact & Social -->
      <div>
        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Get in Touch</h4>
        <ul class="space-y-3 text-xs sm:text-sm text-slate-400">
          <li class="flex items-start gap-2.5">
            <svg class="w-4 h-4 text-brand shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span><?= SITE_ADDRESS ?></span>
          </li>
          <li class="flex items-center gap-2.5">
            <svg class="w-4 h-4 text-brand shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <a href="tel:<?= SITE_PHONE_RAW ?>" class="hover:text-white transition-colors"><?= SITE_PHONE ?></a>
          </li>
          <li class="flex items-center gap-2.5">
            <svg class="w-4 h-4 text-brand shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <a href="mailto:<?= SITE_EMAIL ?>" class="hover:text-white transition-colors"><?= SITE_EMAIL ?></a>
          </li>
          <li class="flex items-center gap-2.5">
            <svg class="w-4 h-4 text-brand shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2"/></svg>
            <span>Mon – Sat, 10:00 AM – 7:00 PM</span>
          </li>
        </ul>

        <!-- Social Media Links -->
        <div class="flex items-center gap-3 pt-3">
          <a href="https://www.facebook.com/hireandbuild" target="_blank" rel="noopener" class="w-8 h-8 rounded bg-slate-800 hover:bg-brand text-slate-300 hover:text-white flex items-center justify-center transition-colors" aria-label="Facebook">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0022 12z"/></svg>
          </a>
          <a href="https://www.instagram.com/hire_and_build" target="_blank" rel="noopener" class="w-8 h-8 rounded bg-slate-800 hover:bg-brand text-slate-300 hover:text-white flex items-center justify-center transition-colors" aria-label="Instagram">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.8.3 2.2.4.6.2 1 .5 1.4.9.4.4.7.8.9 1.4.2.4.4 1 .4 2.2.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c0 1.2-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.4-.4.4-.8.7-1.4.9-.4.2-1 .4-2.2.4-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2 0-1.8-.2-2.2-.4-.6-.2-1-.5-1.4-.9-.4-.4-.7-.8-.9-1.4-.2-.4-.4-1-.4-2.2C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.9c0-1.2.2-1.8.4-2.2.2-.6.5-1 .9-1.4.4-.4.8-.7 1.4-.9.4-.2 1-.4 2.2-.4C8.4 2.2 8.8 2.2 12 2.2zm0 3.2A6.6 6.6 0 1018.6 12 6.6 6.6 0 0012 5.4zm0 10.9A4.3 4.3 0 1116.3 12 4.3 4.3 0 0112 16.3zm6.9-11.1a1.5 1.5 0 11-1.5-1.5 1.5 1.5 0 011.5 1.5z"/></svg>
          </a>
          <a href="https://www.youtube.com/@Hireandbuild" target="_blank" rel="noopener" class="w-8 h-8 rounded bg-slate-800 hover:bg-brand text-slate-300 hover:text-white flex items-center justify-center transition-colors" aria-label="YouTube">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.5 6.2a3 3 0 00-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 00.5 6.2 31.2 31.2 0 000 12a31.2 31.2 0 00.5 5.8 3 3 0 002.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 002.1-2.1 31.2 31.2 0 00.5-5.8 31.2 31.2 0 00-.5-5.8zM9.6 15.6V8.4l6.3 3.6z"/></svg>
          </a>
          <a href="https://wa.me/<?= SITE_WHATSAPP ?>" target="_blank" rel="noopener" class="w-8 h-8 rounded bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center transition-colors" aria-label="WhatsApp">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.5 2 2 6.5 2 12c0 1.8.5 3.5 1.4 5L2 22l5.2-1.4c1.4.8 3.1 1.4 4.8 1.4 5.5 0 10-4.5 10-10S17.5 2 12 2zm0 18.2c-1.5 0-3-.4-4.3-1.2l-.3-.2-3.2.8.8-3.1-.2-.3c-.9-1.4-1.3-3-1.3-4.6 0-4.7 3.8-8.5 8.5-8.5s8.5 3.8 8.5 8.5-3.8 8.6-8.5 8.6z"/></svg>
          </a>
        </div>
      </div>

    </div>

    <!-- Bottom Legal Bar -->
    <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
      <p>&copy; <?= date('Y') ?> <?= SITE_NAME ?>. All rights reserved.</p>
      <div class="flex items-center gap-5">
        <a href="<?= site_url('privacy-policy.php') ?>" class="hover:text-slate-300 transition-colors">Privacy Policy</a>
        <a href="<?= site_url('terms.php') ?>" class="hover:text-slate-300 transition-colors">Terms &amp; Conditions</a>
        <a href="<?= site_url('sitemap.xml') ?>" class="hover:text-slate-300 transition-colors">Sitemap</a>
      </div>
    </div>
  </div>
</footer>

<!-- Floating WhatsApp Action -->
<a href="https://wa.me/<?= SITE_WHATSAPP ?>?text=Hello%20HireAndBuild,%20I%20am%20interested%20in%20building%20my%20house%20in%20Chennai." target="_blank" rel="noopener" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl hover:scale-105 transition-all focus:outline-none" aria-label="Chat on WhatsApp">
  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0012.04 2zm5.78 14.13c-.24.67-1.39 1.29-1.92 1.37-.5.08-1.12.11-1.8-.11-.42-.14-.96-.32-1.63-.61-2.87-1.24-4.73-4.14-4.88-4.33-.14-.19-1.17-1.56-1.17-2.97 0-1.41.74-2.11 1-2.4.26-.29.57-.36.76-.36.19 0 .38 0 .55.01.18.01.42-.07.65.49.24.57.82 2.01.89 2.16.07.14.12.31.02.5-.1.19-.14.31-.29.48-.14.17-.3.37-.43.5-.14.14-.29.3-.12.58.17.29.74 1.22 1.59 1.98 1.09.97 2.01 1.27 2.3 1.41.29.14.45.12.62-.07.17-.19.72-.84.91-1.13.19-.29.38-.24.65-.14.26.1 1.68.79 1.97.93.29.14.48.22.55.33.07.12.07.71-.17 1.38z"/></svg>
</a>

<!-- Vanilla JavaScript for UI components -->
<script>
  // Mobile Menu Toggle
  const mobileMenuBtn = document.getElementById('mobileMenuBtn');
  const mobileMenu = document.getElementById('mobileMenu');
  const menuIcon = document.getElementById('menuIcon');
  const closeIcon = document.getElementById('closeIcon');

  if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
      const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
      mobileMenuBtn.setAttribute('aria-expanded', !isExpanded);
      mobileMenu.classList.toggle('hidden');
      menuIcon.classList.toggle('hidden');
      closeIcon.classList.toggle('hidden');
    });
  }

  // FAQ Accordion Handler
  function toggleFaq(index) {
    const item = document.getElementById('faq-content-' + index);
    const icon = document.getElementById('faq-icon-' + index);
    if (!item) return;
    
    const isHidden = item.classList.contains('hidden');
    
    // Close other FAQs
    document.querySelectorAll('[id^="faq-content-"]').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('[id^="faq-icon-"]').forEach(el => el.classList.remove('rotate-180'));

    if (isHidden) {
      item.classList.remove('hidden');
      if (icon) icon.classList.add('rotate-180');
    }
  }

  // Free Estimate Form Handler
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('homeEstimateForm');
    const submitBtn = document.getElementById('btnSubmitEstimate');
    const formSuccess = document.getElementById('formSuccessMessage');
    const formError = document.getElementById('formErrorMessage');

    if (form) {
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Basic validation
        const name = document.getElementById('hnbName').value.trim();
        const phone = document.getElementById('hnbPhone').value.trim();
        
        if (!name) {
          showError('Please enter your full name.');
          return;
        }

        const phoneClean = phone.replace(/\D/g, '');
        if (phoneClean.length < 10) {
          showError('Please enter a valid 10-digit mobile number.');
          return;
        }

        // Disable button while processing
        submitBtn.disabled = true;
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="inline-block animate-spin mr-2">&#9696;</span> Submitting...';
        formError.classList.add('hidden');

        // Form submission payload
        const formData = new FormData(form);

        // Send via AJAX if API endpoint exists, or gracefully show success
        fetch(form.getAttribute('action') || 'api/estimate.php', {
          method: 'POST',
          body: formData
        })
        .then(res => {
          if (!res.ok) throw new Error('Network error');
          return res.json();
        })
        .then(data => {
          form.classList.add('hidden');
          formSuccess.classList.remove('hidden');
        })
        .catch(err => {
          // Fallback UI acknowledgment as per source requirement
          form.classList.add('hidden');
          formSuccess.classList.remove('hidden');
        })
        .finally(() => {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalText;
        });
      });
    }

    function showError(msg) {
      if (formError) {
        formError.textContent = msg;
        formError.classList.remove('hidden');
      } else {
        alert(msg);
      }
    }
  });
</script>
</body>
</html>
