<?php
/**
 * HireAndBuild - Main Responsive Navbar
 * Accessible desktop navigation with dropdowns + full mobile drawer
 */

$currentPage = $currentPage ?? 'home';
?>
<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-200/80 transition-all duration-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">

      <!-- Brand Logo -->
      <a href="<?= site_url() ?>" class="flex items-center gap-3 shrink-0 group focus:outline-none">
        <div class="w-10 h-10 rounded-lg bg-gradient-to-tr from-brand-700 to-brand flex items-center justify-center text-white shadow-md shadow-brand/20 group-hover:scale-105 transition-transform">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z"/>
          </svg>
        </div>
        <div class="flex flex-col">
          <span class="font-heading font-extrabold text-xl text-slate-900 tracking-tight leading-none">
            HIRE<span class="text-brand">&amp;</span>BUILD
          </span>
          <span class="text-[9px] uppercase tracking-widest font-semibold text-slate-500 mt-1">
            Construction Company
          </span>
        </div>
      </a>

      <!-- Desktop Navigation Links -->
      <nav class="hidden lg:flex items-center gap-5 xl:gap-6 font-medium text-sm text-slate-700" aria-label="Main Navigation">
        <a href="<?= site_url('about.php') ?>" class="hover:text-brand transition-colors <?= $currentPage === 'about' ? 'text-brand font-semibold' : '' ?>">
          About Us
        </a>

        <a href="<?= site_url('joint-venture.php') ?>" class="hover:text-brand transition-colors <?= $currentPage === 'jv' ? 'text-brand font-semibold' : '' ?>">
          Joint Venture
        </a>

        <a href="<?= site_url('cost-calculator.php') ?>" class="inline-flex items-center gap-1 hover:text-brand transition-colors <?= $currentPage === 'calculator' ? 'text-brand font-semibold' : '' ?>">
          <span>Cost Calculator</span>
          <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-1.5 py-0.5 rounded tracking-wide">FREE</span>
        </a>

        <!-- Pricing Dropdown -->
        <div class="relative group" id="pricingDropdown">
          <button type="button" class="inline-flex items-center gap-1 hover:text-brand py-2 transition-colors focus:outline-none" aria-expanded="false">
            <span>Pricing</span>
            <svg class="w-4 h-4 text-slate-400 group-hover:text-brand transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="dropdown-menu absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-100 p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-2 group-hover:translate-y-0 transition-all duration-150 z-50">
            <a href="<?= site_url('residential-pricing.php') ?>" class="block px-3.5 py-2.5 rounded-lg hover:bg-slate-50 transition-colors">
              <div class="font-semibold text-slate-900 text-sm">Residential Construction</div>
              <div class="text-xs text-slate-500 mt-0.5">Cost per sq.ft &amp; package rates</div>
            </a>
            <a href="<?= site_url('commercial-pricing.php') ?>" class="block px-3.5 py-2.5 rounded-lg hover:bg-slate-50 transition-colors">
              <div class="font-semibold text-slate-900 text-sm">Commercial Construction</div>
              <div class="text-xs text-slate-500 mt-0.5">Packages for offices &amp; shops</div>
            </a>
          </div>
        </div>

        <!-- Services Dropdown -->
        <div class="relative group" id="servicesDropdown">
          <button type="button" class="inline-flex items-center gap-1 hover:text-brand py-2 transition-colors focus:outline-none" aria-expanded="false">
            <span>Services</span>
            <svg class="w-4 h-4 text-slate-400 group-hover:text-brand transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="dropdown-menu absolute left-0 mt-1 w-72 bg-white rounded-xl shadow-xl border border-slate-100 p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-2 group-hover:translate-y-0 transition-all duration-150 z-50">
            <a href="<?= site_url('turnkey-house-construction.php') ?>" class="block px-3.5 py-2.5 rounded-lg hover:bg-slate-50 transition-colors">
              <div class="font-semibold text-slate-900 text-sm">Turnkey House Construction</div>
              <div class="text-xs text-slate-500 mt-0.5">End-to-end home building</div>
            </a>
            <a href="<?= site_url('commercial-construction.php') ?>" class="block px-3.5 py-2.5 rounded-lg hover:bg-slate-50 transition-colors">
              <div class="font-semibold text-slate-900 text-sm">Commercial Construction</div>
              <div class="text-xs text-slate-500 mt-0.5">Offices, showrooms &amp; retail</div>
            </a>
            <div class="my-1 border-t border-slate-100"></div>
            <a href="<?= site_url('turnkey-house-construction.php#architectural') ?>" class="block px-3.5 py-2 rounded-lg hover:bg-slate-50 transition-colors">
              <div class="font-medium text-slate-800 text-xs">Architectural Designing</div>
              <div class="text-[11px] text-slate-400">Plans, elevations &amp; 3D views</div>
            </a>
            <a href="<?= site_url('turnkey-house-construction.php#structural') ?>" class="block px-3.5 py-2 rounded-lg hover:bg-slate-50 transition-colors">
              <div class="font-medium text-slate-800 text-xs">Structural Designing</div>
              <div class="text-[11px] text-slate-400">RCC &amp; structural engineering</div>
            </a>
            <a href="<?= site_url('turnkey-house-construction.php#plan-approval') ?>" class="block px-3.5 py-2 rounded-lg hover:bg-slate-50 transition-colors">
              <div class="font-medium text-slate-800 text-xs">Building Plan Approval</div>
              <div class="text-[11px] text-slate-400">CMDA / DTCP sanction support</div>
            </a>
          </div>
        </div>

        <a href="<?= site_url('projects.php') ?>" class="hover:text-brand transition-colors <?= $currentPage === 'projects' ? 'text-brand font-semibold' : '' ?>">
          Projects
        </a>

        <a href="<?= site_url('areas-we-serve.php') ?>" class="hover:text-brand transition-colors <?= $currentPage === 'areas' ? 'text-brand font-semibold' : '' ?>">
          Areas We Serve
        </a>

        <a href="<?= site_url('careers.php') ?>" class="hover:text-brand transition-colors <?= $currentPage === 'careers' ? 'text-brand font-semibold' : '' ?>">
          Careers
        </a>

        <a href="<?= site_url('contact.php') ?>" class="hover:text-brand transition-colors <?= $currentPage === 'contact' ? 'text-brand font-semibold' : '' ?>">
          Contact
        </a>
      </nav>

      <!-- Desktop Right CTAs -->
      <div class="hidden lg:flex items-center gap-3">
        <a href="tel:<?= SITE_PHONE_RAW ?>" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg text-slate-700 hover:text-brand hover:bg-slate-100 text-sm font-semibold transition-all">
          <svg class="w-4 h-4 text-brand" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          <span>Call Now</span>
        </a>

        <a href="<?= $currentPage === 'home' ? '#free-estimate' : site_url('#free-estimate') ?>" class="inline-flex items-center justify-center px-4 py-2.5 rounded-lg bg-brand hover:bg-brand-700 text-white font-medium text-sm shadow-sm hover:shadow-md hover:shadow-brand/20 transition-all">
          Get a Free Quote
        </a>
      </div>

      <!-- Mobile Hamburger Button -->
      <div class="flex items-center gap-2 lg:hidden">
        <a href="tel:<?= SITE_PHONE_RAW ?>" class="p-2 rounded-lg bg-slate-100 text-brand" aria-label="Call Now">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        </a>

        <button type="button" id="mobileMenuBtn" class="p-2.5 rounded-lg text-slate-700 hover:bg-slate-100 focus:outline-none" aria-label="Toggle mobile menu" aria-expanded="false">
          <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

    </div>
  </div>

  <!-- Mobile Drawer Navigation -->
  <div id="mobileMenu" class="hidden lg:hidden bg-white border-b border-slate-200 px-4 pt-3 pb-6 space-y-3 max-h-[85vh] overflow-y-auto">
    <div class="flex flex-col space-y-1 font-medium text-slate-800">
      <a href="<?= site_url('about.php') ?>" class="px-3 py-2 rounded-lg hover:bg-slate-50">About Us</a>
      <a href="<?= site_url('joint-venture.php') ?>" class="px-3 py-2 rounded-lg hover:bg-slate-50">Joint Venture</a>
      <a href="<?= site_url('cost-calculator.php') ?>" class="px-3 py-2 rounded-lg hover:bg-slate-50 flex items-center justify-between">
        <span>Cost Calculator</span>
        <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-0.5 rounded">FREE</span>
      </a>

      <!-- Mobile Pricing Section -->
      <div class="pt-2">
        <div class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider">Pricing</div>
        <div class="mt-1 pl-3 space-y-1">
          <a href="<?= site_url('residential-pricing.php') ?>" class="block px-3 py-1.5 text-sm text-slate-700 hover:text-brand">Residential Construction</a>
          <a href="<?= site_url('commercial-pricing.php') ?>" class="block px-3 py-1.5 text-sm text-slate-700 hover:text-brand">Commercial Construction</a>
        </div>
      </div>

      <!-- Mobile Services Section -->
      <div class="pt-2">
        <div class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-wider">Services</div>
        <div class="mt-1 pl-3 space-y-1">
          <a href="<?= site_url('turnkey-house-construction.php') ?>" class="block px-3 py-1.5 text-sm text-slate-700 hover:text-brand">Turnkey House Construction</a>
          <a href="<?= site_url('commercial-construction.php') ?>" class="block px-3 py-1.5 text-sm text-slate-700 hover:text-brand">Commercial Construction</a>
          <a href="<?= site_url('turnkey-house-construction.php#architectural') ?>" class="block px-3 py-1.5 text-sm text-slate-700 hover:text-brand">Architectural Designing</a>
          <a href="<?= site_url('turnkey-house-construction.php#structural') ?>" class="block px-3 py-1.5 text-sm text-slate-700 hover:text-brand">Structural Designing</a>
          <a href="<?= site_url('turnkey-house-construction.php#plan-approval') ?>" class="block px-3 py-1.5 text-sm text-slate-700 hover:text-brand">Building Plan Approval</a>
        </div>
      </div>

      <div class="pt-2 border-t border-slate-100">
        <a href="<?= site_url('projects.php') ?>" class="px-3 py-2 rounded-lg hover:bg-slate-50 block">Projects</a>
        <a href="<?= site_url('areas-we-serve.php') ?>" class="px-3 py-2 rounded-lg hover:bg-slate-50 block">Areas We Serve</a>
        <a href="<?= site_url('careers.php') ?>" class="px-3 py-2 rounded-lg hover:bg-slate-50 block">Careers</a>
        <a href="<?= site_url('contact.php') ?>" class="px-3 py-2 rounded-lg hover:bg-slate-50 block">Contact Us</a>
      </div>
    </div>

    <!-- Mobile CTAs -->
    <div class="pt-4 border-t border-slate-200 flex flex-col gap-2.5">
      <a href="<?= $currentPage === 'home' ? '#free-estimate' : site_url('#free-estimate') ?>" class="w-full text-center py-3 rounded-lg bg-brand hover:bg-brand-700 text-white font-semibold text-sm shadow">
        Get a Free Quote
      </a>
      <a href="tel:<?= SITE_PHONE_RAW ?>" class="w-full text-center py-3 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 font-semibold text-sm flex items-center justify-center gap-2">
        <svg class="w-4 h-4 text-brand" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        <span>Call +91 72004 72008</span>
      </a>
    </div>
  </div>
</header>
