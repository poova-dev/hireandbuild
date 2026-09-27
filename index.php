<?php
/**
 * Replica Architects & Builders - Index Page (Server-Side Rendered)
 * Environment: Apache / XAMPP / Hostinger
 */
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/schema.php';

$currentPage = 'index';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Construction Company in Chennai | 15-Yr Warranty | Replica Architects & Builders</title>
  <meta name="description" content="Replica Architects & Builders: premier house construction company in Chennai with 400+ homes built. Packages from ₹1,999/sq.ft, dedicated site engineer, zero hidden costs, 15-year warranty.">
  <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg">

  <!-- Tailwind CSS CDN v3 -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              orange: '#FF5E14',
              darkOrange: '#E85D04',
              lightOrange: '#FFF4EE',
              amber: '#F59E0B',
              dark: '#0F172A',
              charcoal: '#1E293B',
              slate: '#334155',
              muted: '#64748B',
              light: '#F8FAFC',
              border: '#E2E8F0',
            },
            pkg: {
              basic: '#0284C7',
              std: '#16A34A',
              prem: '#EA580C',
              lux: '#7C3AED',
            }
          },
          fontFamily: {
            sans: ['Poppins', 'sans-serif'],
          }
        }
      }
    }
  </script>

  <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="bg-white text-slate-800 font-sans antialiased selection:bg-orange-500 selection:text-white">

  <!-- =========================================================================
       1. TOP ANNOUNCEMENT TICKER STRIP
       ========================================================================= -->
  <div class="bg-slate-900 text-slate-200 text-xs py-2 border-b border-slate-800 overflow-hidden relative z-40" role="region" aria-label="Announcements">
    <div class="ticker-track flex items-center space-x-8 whitespace-nowrap">
      <!-- Set 1 -->
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <strong class="text-white font-semibold">400+</strong> homes delivered in Chennai
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        <strong class="text-white font-semibold">75+</strong> projects currently under construction
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
        Packages from <strong class="text-white font-semibold">₹1,999 / sq.ft</strong>
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        ISI-certified steel & cement &middot; M20 RCC
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        CMDA / DTCP plan approval handled for you
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
        Turnkey &mdash; design to handover, one point of contact
      </span>

      <!-- Duplicate Set for Seamless Loop -->
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <strong class="text-white font-semibold">400+</strong> homes delivered in Chennai
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        <strong class="text-white font-semibold">75+</strong> projects currently under construction
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
        Packages from <strong class="text-white font-semibold">₹1,999 / sq.ft</strong>
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        ISI-certified steel & cement &middot; M20 RCC
      </span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        CMDA / DTCP plan approval handled for you
      </span>
    </div>
  </div>

  <!-- =========================================================================
       2. STICKY MAIN HEADER & NAVIGATION
       ========================================================================= -->
  <header id="main-header" class="sticky top-0 bg-white border-b border-slate-100 z-30 transition-all duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        
        <!-- Brand Logo -->
        <a href="index.php" class="flex items-center gap-3 group">
          <div class="w-44 sm:w-52 h-auto">
            <img src="assets/images/logo.svg" alt="Replica Architects & Builders Logo" class="w-full h-auto">
          </div>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="hidden lg:flex items-center space-x-7 text-sm font-medium text-slate-700">
          <a href="index.php" class="text-orange-600 font-semibold hover:text-orange-600 transition-colors">Home</a>
          <a href="about.php" class="hover:text-orange-600 transition-colors">About Us</a>
          
          <a href="calculator.php" class="inline-flex items-center gap-1.5 hover:text-orange-600 transition-colors font-semibold">
            Cost Calculator
            <span class="bg-orange-100 text-orange-600 text-[10px] font-black px-1.5 py-0.5 rounded-full uppercase tracking-wider">FREE</span>
          </a>

          <!-- Pricing Dropdown -->
          <div class="relative group py-4">
            <button type="button" class="inline-flex items-center gap-1 hover:text-orange-600 transition-colors group-hover:text-orange-600">
              Pricing
              <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-orange-600 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-100 py-2 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
              <a href="packages.php" class="block px-4 py-2.5 hover:bg-orange-50/70 transition-colors">
                <div class="font-semibold text-slate-900 text-sm">Residential Packages</div>
                <div class="text-xs text-slate-500">Packages from ₹1,999/sq.ft</div>
              </a>
              <a href="packages.php#commercial" class="block px-4 py-2.5 hover:bg-orange-50/70 transition-colors">
                <div class="font-semibold text-slate-900 text-sm">Commercial Construction</div>
                <div class="text-xs text-slate-500">Offices, retail & showrooms</div>
              </a>
            </div>
          </div>

          <!-- Services Dropdown -->
          <div class="relative group py-4">
            <button type="button" class="inline-flex items-center gap-1 hover:text-orange-600 transition-colors group-hover:text-orange-600">
              Services
              <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-orange-600 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 mt-1 w-72 bg-white rounded-xl shadow-xl border border-slate-100 py-2 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
              <a href="services.php" class="block px-4 py-2.5 hover:bg-orange-50/70 transition-colors">
                <div class="font-semibold text-slate-900 text-sm">Turnkey House Construction</div>
                <div class="text-xs text-slate-500">End-to-end design to handover</div>
              </a>
              <a href="services.php#commercial" class="block px-4 py-2.5 hover:bg-orange-50/70 transition-colors">
                <div class="font-semibold text-slate-900 text-sm">Commercial Construction</div>
                <div class="text-xs text-slate-500">Modern commercial execution</div>
              </a>
              <div class="my-1 border-t border-slate-100"></div>
              <a href="services.php#architecture" class="block px-4 py-2.5 hover:bg-orange-50/70 transition-colors">
                <div class="font-semibold text-slate-900 text-sm">Architectural Designing</div>
                <div class="text-xs text-slate-500">Floor plans & 3D elevations</div>
              </a>
              <a href="services.php#structural" class="block px-4 py-2.5 hover:bg-orange-50/70 transition-colors">
                <div class="font-semibold text-slate-900 text-sm">Structural Designing</div>
                <div class="text-xs text-slate-500">RCC & foundation engineering</div>
              </a>
              <a href="services.php#approvals" class="block px-4 py-2.5 hover:bg-orange-50/70 transition-colors">
                <div class="font-semibold text-slate-900 text-sm">Building Plan Approval</div>
                <div class="text-xs text-slate-500">CMDA & DTCP sanction support</div>
              </a>
            </div>
          </div>

          <a href="projects.php" class="hover:text-orange-600 transition-colors">Projects</a>
          <a href="contact.php" class="hover:text-orange-600 transition-colors">Contact</a>
        </nav>

        <!-- Right Header CTAs -->
        <div class="hidden sm:flex items-center space-x-3">
          <a href="tel:+919994399933" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700 bg-slate-50 hover:bg-slate-100 px-4 py-2.5 rounded-xl border border-slate-200 transition-all">
            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <span>Call Now</span>
          </a>
          <a href="calculator.php" class="inline-flex items-center gap-2 text-sm font-bold text-white bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 px-5 py-2.5 rounded-xl shadow-md shadow-orange-500/25 transition-all transform hover:-translate-y-0.5">
            Get a Free Quote
          </a>
        </div>

        <!-- Mobile Menu Hamburger Button -->
        <button id="mobile-menu-btn" type="button" class="lg:hidden p-2.5 rounded-xl text-slate-700 hover:bg-slate-100 focus:outline-none" aria-label="Open Navigation Menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>

      </div>
    </div>
  </header>

  <!-- =========================================================================
       MOBILE NAVIGATION DRAWER & BACKDROP
       ========================================================================= -->
  <div id="mobile-backdrop" class="fixed inset-0 bg-slate-900/60 z-50 opacity-0 pointer-events-none transition-opacity duration-300 backdrop-blur-sm"></div>
  <aside id="mobile-drawer" class="fixed top-0 right-0 bottom-0 w-80 max-w-[85vw] bg-white z-50 shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between overflow-y-auto">
    <div class="p-6">
      <div class="flex items-center justify-between pb-5 border-b border-slate-100">
        <img src="assets/images/logo.svg" alt="Replica Architects & Builders" class="h-8 w-auto">
        <button id="mobile-close-btn" class="p-2 text-slate-400 hover:text-slate-700 rounded-lg" aria-label="Close menu">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

      <nav class="mt-6 flex flex-col space-y-3 font-medium text-slate-800 text-sm">
        <a href="index.php" class="px-3 py-2 rounded-lg bg-orange-50 text-orange-600 font-bold">Home</a>
        <a href="about.php" class="px-3 py-2 rounded-lg hover:bg-slate-50">About Us</a>
        <a href="calculator.php" class="px-3 py-2 rounded-lg hover:bg-slate-50 flex items-center justify-between">
          <span>Cost Calculator</span>
          <span class="bg-orange-100 text-orange-600 text-[10px] font-bold px-2 py-0.5 rounded-full">FREE</span>
        </a>

        <!-- Mobile Pricing Submenu -->
        <div>
          <button type="button" class="mobile-dropdown-btn w-full px-3 py-2 rounded-lg hover:bg-slate-50 flex items-center justify-between text-left">
            <span>Pricing & Packages</span>
            <svg class="dropdown-icon w-4 h-4 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="hidden pl-6 mt-1 space-y-1.5 text-xs text-slate-600">
            <a href="packages.php" class="block py-1.5 hover:text-orange-600">Residential Construction</a>
            <a href="packages.php#commercial" class="block py-1.5 hover:text-orange-600">Commercial Construction</a>
          </div>
        </div>

        <!-- Mobile Services Submenu -->
        <div>
          <button type="button" class="mobile-dropdown-btn w-full px-3 py-2 rounded-lg hover:bg-slate-50 flex items-center justify-between text-left">
            <span>Services</span>
            <svg class="dropdown-icon w-4 h-4 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="hidden pl-6 mt-1 space-y-1.5 text-xs text-slate-600">
            <a href="services.php" class="block py-1.5 hover:text-orange-600">Turnkey House Construction</a>
            <a href="services.php#commercial" class="block py-1.5 hover:text-orange-600">Commercial Construction</a>
            <a href="services.php#architecture" class="block py-1.5 hover:text-orange-600">Architectural Designing</a>
            <a href="services.php#structural" class="block py-1.5 hover:text-orange-600">Structural Designing</a>
            <a href="services.php#approvals" class="block py-1.5 hover:text-orange-600">Building Plan Approval</a>
          </div>
        </div>

        <a href="projects.php" class="px-3 py-2 rounded-lg hover:bg-slate-50">Projects</a>
        <a href="contact.php" class="px-3 py-2 rounded-lg hover:bg-slate-50">Contact Us</a>
      </nav>
    </div>

    <!-- Mobile Drawer Bottom Actions -->
    <div class="p-6 border-t border-slate-100 bg-slate-50/50 space-y-2.5">
      <a href="calculator.php" class="w-full inline-flex items-center justify-center font-bold text-sm text-white bg-orange-600 py-3 rounded-xl shadow-md shadow-orange-600/20">
        Get a Free Quote
      </a>
      <a href="tel:+919994399933" class="w-full inline-flex items-center justify-center gap-2 font-semibold text-sm text-slate-700 bg-white border border-slate-200 py-3 rounded-xl">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        Call +91 99943 99933
      </a>
    </div>
  </aside>

  <!-- =========================================================================
       3. HERO SECTION WITH LEAD CAPTURE FORM
       ========================================================================= -->
  <section class="relative bg-[#121824] text-white py-14 lg:py-20 overflow-hidden" id="hero">
    <!-- Background Architectural Texture -->
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ff5e14_1px,transparent_1px)] [background-size:24px_24px] pointer-events-none"></div>
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-orange-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
        
        <!-- Left Hero Copy -->
        <div class="lg:col-span-7 space-y-6">
          
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 text-xs font-bold tracking-wide uppercase">
            <span class="w-2 h-2 rounded-full bg-orange-500 animate-ping"></span>
            Pattukkottai &amp; Tamil Nadu's Trusted Builders
          </div>

          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
            Architecture &amp; House Construction &ndash; Build Your Dream Home with <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-orange-600">Replica Architects &amp; Builders</span>
          </h1>

          <div class="text-xl sm:text-2xl font-bold text-slate-200">
            Packages from <span class="text-orange-400 underline decoration-orange-500 decoration-wavy decoration-2">₹1,999/sq.ft</span>
          </div>

          <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl font-light">
            Replica Architects &amp; Builders (RAB) is rated among the premier architecture and construction firms in Pattukkottai and throughout Tamil Nadu for transparent pricing, on-time delivery and written 15-year structural warranty. 
            <strong class="text-white font-semibold">150+ families</strong> moved into custom homes. We would love to build yours too.
          </p>

          <!-- Direct Phone Contact Strip -->
          <a href="tel:+919994399933" class="inline-flex items-center gap-3.5 bg-slate-800/80 hover:bg-slate-800 px-5 py-3 rounded-2xl border border-slate-700/80 transition-all group">
            <div class="w-10 h-10 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </div>
            <div>
              <div class="text-[11px] font-medium text-slate-400 uppercase tracking-wider">Call us anytime</div>
              <div class="text-sm font-bold text-white tracking-wide">+91 99943 99933</div>
            </div>
          </a>

          <!-- Quick Action Cards -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
            <a href="packages.php" class="flex items-center justify-between p-4 rounded-xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700 hover:border-orange-500/50 transition-all group">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3" stroke-width="2"/><path d="M9 9h6M9 12h6M9 15h4" stroke-width="2"/></svg>
                </div>
                <div>
                  <span class="block text-[11px] text-slate-400 font-medium">View House Construction</span>
                  <span class="block text-sm font-bold text-white group-hover:text-orange-400 transition-colors">Packages &amp; Rates</span>
                </div>
              </div>
              <svg class="w-4 h-4 text-slate-400 group-hover:translate-x-1 group-hover:text-orange-400 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </a>

            <a href="projects.php" class="flex items-center justify-between p-4 rounded-xl bg-slate-800/60 hover:bg-slate-800 border border-slate-700 hover:border-orange-500/50 transition-all group">
              <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1" stroke-width="2"/><rect x="14" y="3" width="7" height="7" rx="1" stroke-width="2"/><rect x="3" y="14" width="7" height="7" rx="1" stroke-width="2"/><rect x="14" y="14" width="7" height="7" rx="1" stroke-width="2"/></svg>
                </div>
                <div>
                  <span class="block text-[11px] text-slate-400 font-medium">Completed Architecture &amp;</span>
                  <span class="block text-sm font-bold text-white group-hover:text-orange-400 transition-colors">Residential Projects</span>
                </div>
              </div>
              <svg class="w-4 h-4 text-slate-400 group-hover:translate-x-1 group-hover:text-orange-400 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </a>
          </div>

        </div>

        <!-- Right Hero Lead Capture Form -->
        <div class="lg:col-span-5">
          <div class="bg-white text-slate-900 rounded-3xl p-6 sm:p-8 shadow-2xl border border-slate-100 relative">
            <div class="text-center mb-6">
              <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Get a Free Estimate</h2>
              <p class="text-xs sm:text-sm text-slate-500 mt-1">No commitment &middot; Response within 24 hours</p>
            </div>

            <!-- Lead Form -->
            <form class="lead-capture-form space-y-4" id="hero-lead-form">
              <div class="form-error-msg hidden p-3 rounded-lg bg-red-50 text-red-600 text-xs font-semibold border border-red-200"></div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                  <label class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Full Name *</label>
                  <input type="text" name="fullName" placeholder="e.g. Ravi Kumar" required class="form-input-focus w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm font-medium">
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Phone *</label>
                  <input type="tel" name="phone" placeholder="9876543210" maxlength="10" inputmode="numeric" required class="form-input-focus w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm font-medium">
                </div>
              </div>

              <div>
                <label class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Email Address (Optional)</label>
                <input type="email" name="email" placeholder="yourname@gmail.com" class="form-input-focus w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm font-medium">
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                <div>
                  <label class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Plot Location</label>
                  <input type="text" name="location" placeholder="e.g. Big Street, Pattukkottai" class="form-input-focus w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm font-medium">
                </div>
                <div>
                  <label class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Plot Area (sq.ft)</label>
                  <input type="number" name="area" placeholder="1200" inputmode="numeric" class="form-input-focus w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-sm font-medium">
                </div>
              </div>

              <div>
                <label class="block text-[11px] font-bold text-slate-600 uppercase tracking-wider mb-1">Requirement Notes</label>
                <textarea name="notes" rows="2" placeholder="e.g. G+1 house, 3BHK, luxury tiles..." class="form-input-focus w-full px-3.5 py-2 rounded-xl border border-slate-200 bg-slate-50 text-sm font-medium resize-none"></textarea>
              </div>

              <button type="submit" class="w-full py-3.5 px-6 rounded-xl font-bold text-sm text-white bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 shadow-lg shadow-orange-500/30 transition-all transform hover:-translate-y-0.5">
                Request Free Estimate &rarr;
              </button>
            </form>

            <!-- Success State -->
            <div class="form-success-state hidden text-center py-8 space-y-3">
              <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
              </div>
              <h3 class="text-xl font-extrabold text-slate-900">Request Received!</h3>
              <p class="text-sm text-slate-600 max-w-xs mx-auto">Our senior site engineer will review your plot requirements and call you within 24 hours.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       4. STATS BAND
       ========================================================================= -->
  <section class="bg-white border-b border-slate-100 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">
        
        <!-- Stat 1 -->
        <div class="flex items-center gap-4 p-4 rounded-2xl bg-orange-50/50 border border-orange-100">
          <div class="w-12 h-12 rounded-xl bg-orange-500/10 text-orange-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
          </div>
          <div>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">400<span class="text-orange-500">+</span></div>
            <div class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wider">Homes Built</div>
          </div>
        </div>

        <!-- Stat 2 -->
        <div class="flex items-center gap-4 p-4 rounded-2xl bg-orange-50/50 border border-orange-100">
          <div class="w-12 h-12 rounded-xl bg-orange-500/10 text-orange-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
          </div>
          <div>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">350<span class="text-orange-500">+</span></div>
            <div class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wider">Quality Checks</div>
          </div>
        </div>

        <!-- Stat 3 -->
        <div class="flex items-center gap-4 p-4 rounded-2xl bg-orange-50/50 border border-orange-100">
          <div class="w-12 h-12 rounded-xl bg-orange-500/10 text-orange-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
          </div>
          <div>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">2,50,000</div>
            <div class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wider">Sq.ft Completed</div>
          </div>
        </div>

        <!-- Stat 4 -->
        <div class="flex items-center gap-4 p-4 rounded-2xl bg-orange-50/50 border border-orange-100">
          <div class="w-12 h-12 rounded-xl bg-orange-500/10 text-orange-600 flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
          </div>
          <div>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 leading-none">15<span class="text-orange-500">+</span> <span class="text-sm font-semibold text-slate-500">Yrs</span></div>
            <div class="text-xs font-semibold text-slate-500 mt-1 uppercase tracking-wider">Warranty</div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       5. REAL HOMEOWNER STORIES & VIDEO TESTIMONIALS
       ========================================================================= -->
  <section class="py-16 sm:py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
        <div>
          <div class="text-xs font-bold text-orange-600 uppercase tracking-widest mb-2 flex items-center gap-2">
            <span class="w-4 h-0.5 bg-orange-600"></span> Verified Experiences
          </div>
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900">
            400+ Homeowners. <span class="text-orange-600">Real Experiences.</span>
          </h2>
          <p class="text-slate-600 text-sm sm:text-base mt-2 max-w-xl">
            Watch real homeowners share their honest experience from soil testing to keys handover.
          </p>
        </div>
        <a href="https://www.youtube.com" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-sm font-bold text-orange-600 hover:text-orange-700">
          View more video reviews &rarr;
        </a>
      </div>

      <!-- Testimonials Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Story 1 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-1 text-amber-400">
                ★★★★★
              </div>
              <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700">Villivakkam, Chennai</span>
            </div>
            <p class="text-slate-700 text-sm leading-relaxed italic">
              "Every stage was supervised by their site engineer. The milestone billing meant we only paid when columns and slabs were completed. No surprise bills!"
            </p>
          </div>
          <div class="pt-6 border-t border-slate-100 flex items-center justify-between mt-6">
            <div>
              <div class="font-bold text-slate-900 text-sm">Mr. Yuvaraj & Family</div>
              <div class="text-xs text-slate-500">2,400 sq.ft Duplex Home</div>
            </div>
            <button type="button" class="video-trigger-btn w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center hover:bg-orange-500 hover:text-white transition-all shadow-sm" data-video-id="L_LUpnjgPso" title="Watch Video Review">
              <svg class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
            </button>
          </div>
        </div>

        <!-- Story 2 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-1 text-amber-400">
                ★★★★★
              </div>
              <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700">Thiruverkadu, Chennai</span>
            </div>
            <p class="text-slate-700 text-sm leading-relaxed italic">
              "We had terrible experiences with local contractors in the past. Replica Architects & Builders delivered exactly on their promised 11-month timeline. The written 15-year warranty gives complete peace of mind."
            </p>
          </div>
          <div class="pt-6 border-t border-slate-100 flex items-center justify-between mt-6">
            <div>
              <div class="font-bold text-slate-900 text-sm">Dr. Boopesh</div>
              <div class="text-xs text-slate-500">3,100 sq.ft G+2 Villa</div>
            </div>
            <button type="button" class="video-trigger-btn w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center hover:bg-orange-500 hover:text-white transition-all shadow-sm" data-video-id="L_LUpnjgPso" title="Watch Video Review">
              <svg class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
            </button>
          </div>
        </div>

        <!-- Story 3 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-1 text-amber-400">
                ★★★★★
              </div>
              <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700">Anna Nagar, Chennai</span>
            </div>
            <p class="text-slate-700 text-sm leading-relaxed italic">
              "From CMDA plan approval to final interior paint coats, we did not have to visit government offices even once. Daily WhatsApp photos from the engineer kept us informed."
            </p>
          </div>
          <div class="pt-6 border-t border-slate-100 flex items-center justify-between mt-6">
            <div>
              <div class="font-bold text-slate-900 text-sm">Mr. Rahul & Swetha</div>
              <div class="text-xs text-slate-500">2,750 sq.ft Independent Villa</div>
            </div>
            <button type="button" class="video-trigger-btn w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center hover:bg-orange-500 hover:text-white transition-all shadow-sm" data-video-id="L_LUpnjgPso" title="Watch Video Review">
              <svg class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
            </button>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- =========================================================================
       6. ABOUT US & FOUNDER'S COMMITMENT TO PROMISES
       ========================================================================= -->
  <section class="py-16 sm:py-24 bg-white" id="about-preview">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <div class="lg:col-span-7 space-y-6">
          <div class="text-xs font-bold text-orange-600 uppercase tracking-widest flex items-center gap-2">
            <span class="w-4 h-0.5 bg-orange-600"></span> About Us
          </div>
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
            The <span class="text-orange-600">construction company</span> built to keep promises
          </h2>
          <div class="space-y-4 text-slate-600 text-base leading-relaxed">
            <p>
              When we started Replica Architects & Builders, we kept hearing the same painful story from families across Chennai: they hired a contractor, work started well, then delays crept in, surprise bills started arriving, and calls stopped getting answered.
            </p>
            <p>
              We built Replica Architects & Builders to fix that broken model. Every project gets a <strong class="text-slate-900 font-semibold">dedicated site engineer on your plot every day</strong>. Every payment is strictly tied to a <strong class="text-slate-900 font-semibold">completed milestone</strong> &mdash; not a verbal promise. And every home carries an authentic written <strong class="text-slate-900 font-semibold">15-year structural warranty</strong>.
            </p>
            <p>
              <strong class="text-slate-900 font-semibold">400+ homes</strong> delivered across Chennai &mdash; from Tambaram, Porur and Ambattur to Anna Nagar, Velachery and OMR. Built right, the first time.
            </p>
          </div>

          <!-- 3 Stats Pillars -->
          <div class="grid grid-cols-3 gap-4 pt-4 border-t border-slate-100">
            <div>
              <div class="text-2xl sm:text-3xl font-black text-slate-900">400+</div>
              <div class="text-xs text-slate-500 font-medium">Homes Built in Chennai</div>
            </div>
            <div>
              <div class="text-2xl sm:text-3xl font-black text-orange-600">Daily</div>
              <div class="text-xs text-slate-500 font-medium">Engineer On Site</div>
            </div>
            <div>
              <div class="text-2xl sm:text-3xl font-black text-slate-900">15-Yr</div>
              <div class="text-xs text-slate-500 font-medium">Structural Warranty</div>
            </div>
          </div>
        </div>

        <!-- Right Side Handover Highlight Card -->
        <div class="lg:col-span-5">
          <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-3xl p-8 shadow-2xl space-y-6 relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-44 h-44 bg-orange-500/10 rounded-full blur-2xl"></div>

            <div class="space-y-2">
              <span class="text-xs font-bold text-orange-400 tracking-wider uppercase">Our Philosophy</span>
              <h3 class="text-xl font-extrabold text-white">We don't just build houses &mdash; we celebrate your new beginning.</h3>
              <p class="text-sm text-slate-300 font-light leading-relaxed">
                Our founders personally attend every handover ceremony, presenting a commemorative gift to each family. Our relationship does not end at key delivery.
              </p>
            </div>

            <!-- 3 Core Tenets -->
            <div class="space-y-4">
              <div class="flex items-start gap-3.5 bg-slate-800/60 p-3.5 rounded-2xl border border-slate-700/60">
                <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                </div>
                <div>
                  <div class="text-sm font-bold text-white">Personal Key Handover</div>
                  <div class="text-xs text-slate-400">Founder-led ceremony on your plot &mdash; a real milestone celebration.</div>
                </div>
              </div>

              <div class="flex items-start gap-3.5 bg-slate-800/60 p-3.5 rounded-2xl border border-slate-700/60">
                <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                </div>
                <div>
                  <div class="text-sm font-bold text-white">Complimentary Gift</div>
                  <div class="text-xs text-slate-400">A curated signature token of joy for every new homeowner.</div>
                </div>
              </div>

              <div class="flex items-start gap-3.5 bg-slate-800/60 p-3.5 rounded-2xl border border-slate-700/60">
                <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <div>
                  <div class="text-sm font-bold text-white">Lifetime Relationship</div>
                  <div class="text-xs text-slate-400">We stay accessible for any post-handover guidance, adjustments, or queries.</div>
                </div>
              </div>
            </div>

            <a href="about.php" class="block text-center py-3 bg-orange-500 hover:bg-orange-600 rounded-xl font-bold text-sm text-white transition-colors">
              Read Our Full Story &rarr;
            </a>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- =========================================================================
       7. FEATURED CONSTRUCTION PROJECTS
       ========================================================================= -->
  <section class="py-16 sm:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-14">
        <div class="text-xs font-bold text-orange-600 uppercase tracking-widest mb-2 flex items-center justify-center gap-2">
          <span class="w-4 h-0.5 bg-orange-600"></span> Recent Portfolio
        </div>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900">
          Our Construction <span class="text-orange-600">Projects</span>
        </h2>
        <p class="text-slate-600 text-sm sm:text-base mt-2">
          Built with precision, quality, and trust &mdash; 400+ homes delivered across Chennai.
        </p>
      </div>

      <!-- Project Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Project 1 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="h-56 bg-slate-800 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent z-10"></div>
            <div class="w-full h-full bg-cover bg-center flex items-center justify-center text-slate-500" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80');">
            </div>
            <div class="absolute top-4 left-4 z-20">
              <span class="bg-orange-600 text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Completed</span>
            </div>
            <div class="absolute bottom-4 left-4 z-20 text-white">
              <div class="text-lg font-bold">Yuvaraj Residence</div>
              <div class="text-xs text-slate-300">Villivakkam, Chennai</div>
            </div>
          </div>
          <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
            <div class="grid grid-cols-2 gap-3 text-xs">
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Built-up Area</span>
                <strong class="text-slate-900 font-bold text-sm">2,400 sq.ft</strong>
              </div>
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Plot Size</span>
                <strong class="text-slate-900 font-bold text-sm">1,800 sq.ft</strong>
              </div>
            </div>
            <a href="projects.php" class="inline-flex items-center text-xs font-bold text-orange-600 hover:text-orange-700">
              View Project Specs &rarr;
            </a>
          </div>
        </div>

        <!-- Project 2 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="h-56 bg-slate-800 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent z-10"></div>
            <div class="w-full h-full bg-cover bg-center flex items-center justify-center text-slate-500" style="background-image: url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=80');">
            </div>
            <div class="absolute top-4 left-4 z-20">
              <span class="bg-orange-600 text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Completed</span>
            </div>
            <div class="absolute bottom-4 left-4 z-20 text-white">
              <div class="text-lg font-bold">Boopesh Villa</div>
              <div class="text-xs text-slate-300">Thiruverkadu, Chennai</div>
            </div>
          </div>
          <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
            <div class="grid grid-cols-2 gap-3 text-xs">
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Built-up Area</span>
                <strong class="text-slate-900 font-bold text-sm">3,100 sq.ft</strong>
              </div>
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Plot Size</span>
                <strong class="text-slate-900 font-bold text-sm">2,200 sq.ft</strong>
              </div>
            </div>
            <a href="projects.php" class="inline-flex items-center text-xs font-bold text-orange-600 hover:text-orange-700">
              View Project Specs &rarr;
            </a>
          </div>
        </div>

        <!-- Project 3 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="h-56 bg-slate-800 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent z-10"></div>
            <div class="w-full h-full bg-cover bg-center flex items-center justify-center text-slate-500" style="background-image: url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80');">
            </div>
            <div class="absolute top-4 left-4 z-20">
              <span class="bg-orange-600 text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Completed</span>
            </div>
            <div class="absolute bottom-4 left-4 z-20 text-white">
              <div class="text-lg font-bold">Rahul Custom Home</div>
              <div class="text-xs text-slate-300">Ambattur, Chennai</div>
            </div>
          </div>
          <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
            <div class="grid grid-cols-2 gap-3 text-xs">
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Built-up Area</span>
                <strong class="text-slate-900 font-bold text-sm">2,750 sq.ft</strong>
              </div>
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Plot Size</span>
                <strong class="text-slate-900 font-bold text-sm">2,000 sq.ft</strong>
              </div>
            </div>
            <a href="projects.php" class="inline-flex items-center text-xs font-bold text-orange-600 hover:text-orange-700">
              View Project Specs &rarr;
            </a>
          </div>
        </div>

        <!-- Project 4 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="h-56 bg-slate-800 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent z-10"></div>
            <div class="w-full h-full bg-cover bg-center flex items-center justify-center text-slate-500" style="background-image: url('https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=80');">
            </div>
            <div class="absolute top-4 left-4 z-20">
              <span class="bg-orange-600 text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Completed</span>
            </div>
            <div class="absolute bottom-4 left-4 z-20 text-white">
              <div class="text-lg font-bold">Rajadurai Home</div>
              <div class="text-xs text-slate-300">Urapakkam, Chennai</div>
            </div>
          </div>
          <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
            <div class="grid grid-cols-2 gap-3 text-xs">
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Built-up Area</span>
                <strong class="text-slate-900 font-bold text-sm">2,750 sq.ft</strong>
              </div>
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Plot Size</span>
                <strong class="text-slate-900 font-bold text-sm">2,000 sq.ft</strong>
              </div>
            </div>
            <a href="projects.php" class="inline-flex items-center text-xs font-bold text-orange-600 hover:text-orange-700">
              View Project Specs &rarr;
            </a>
          </div>
        </div>

        <!-- Project 5 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="h-56 bg-slate-800 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent z-10"></div>
            <div class="w-full h-full bg-cover bg-center flex items-center justify-center text-slate-500" style="background-image: url('https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=800&q=80');">
            </div>
            <div class="absolute top-4 left-4 z-20">
              <span class="bg-orange-600 text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Completed</span>
            </div>
            <div class="absolute bottom-4 left-4 z-20 text-white">
              <div class="text-lg font-bold">Vignesh Residence</div>
              <div class="text-xs text-slate-300">Thalambur, OMR</div>
            </div>
          </div>
          <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
            <div class="grid grid-cols-2 gap-3 text-xs">
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Built-up Area</span>
                <strong class="text-slate-900 font-bold text-sm">2,750 sq.ft</strong>
              </div>
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Plot Size</span>
                <strong class="text-slate-900 font-bold text-sm">2,000 sq.ft</strong>
              </div>
            </div>
            <a href="projects.php" class="inline-flex items-center text-xs font-bold text-orange-600 hover:text-orange-700">
              View Project Specs &rarr;
            </a>
          </div>
        </div>

        <!-- Project 6 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 card-hover-lift flex flex-col justify-between">
          <div class="h-56 bg-slate-800 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent z-10"></div>
            <div class="w-full h-full bg-cover bg-center flex items-center justify-center text-slate-500" style="background-image: url('https://images.unsplash.com/photo-1600573472550-8090b5e0745e?auto=format&fit=crop&w=800&q=80');">
            </div>
            <div class="absolute top-4 left-4 z-20">
              <span class="bg-orange-600 text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Completed</span>
            </div>
            <div class="absolute bottom-4 left-4 z-20 text-white">
              <div class="text-lg font-bold">KVT Luxury Build</div>
              <div class="text-xs text-slate-300">Vadaperumbakkam, Chennai</div>
            </div>
          </div>
          <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
            <div class="grid grid-cols-2 gap-3 text-xs">
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Built-up Area</span>
                <strong class="text-slate-900 font-bold text-sm">2,750 sq.ft</strong>
              </div>
              <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-100">
                <span class="text-slate-500 block">Plot Size</span>
                <strong class="text-slate-900 font-bold text-sm">2,000 sq.ft</strong>
              </div>
            </div>
            <a href="projects.php" class="inline-flex items-center text-xs font-bold text-orange-600 hover:text-orange-700">
              View Project Specs &rarr;
            </a>
          </div>
        </div>

      </div>

      <div class="text-center mt-12">
        <p class="text-xs text-slate-500 mb-4 font-semibold uppercase tracking-wider">Showing 6 of 400+ projects completed across Chennai</p>
        <a href="projects.php" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm px-7 py-3.5 rounded-xl shadow-lg transition-all">
          Explore All Projects &rarr;
        </a>
      </div>

    </div>
  </section>

  <!-- =========================================================================
       8. SOCIAL COMMUNITY PROOF
       ========================================================================= -->
  <section class="py-14 bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Instagram -->
        <div class="p-6 rounded-2xl bg-gradient-to-br from-pink-500/5 to-purple-500/5 border border-pink-100 flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-amber-500 via-pink-500 to-purple-600 text-white flex items-center justify-center">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </div>
            <div>
              <div class="text-xl font-black text-slate-900 leading-none">142K</div>
              <div class="text-xs text-slate-500 font-semibold mt-1">Instagram Followers</div>
            </div>
          </div>
          <a href="https://instagram.com" target="_blank" rel="noopener" class="text-xs font-bold text-pink-600 bg-pink-50 hover:bg-pink-100 px-3.5 py-2 rounded-xl transition-colors">
            Follow Us
          </a>
        </div>

        <!-- Facebook -->
        <div class="p-6 rounded-2xl bg-gradient-to-br from-blue-500/5 to-indigo-500/5 border border-blue-100 flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.6 5H18V0h-3.808C10.595 0 9 1.583 9 4.615V8z"/></svg>
            </div>
            <div>
              <div class="text-xl font-black text-slate-900 leading-none">130K</div>
              <div class="text-xs text-slate-500 font-semibold mt-1">Facebook Followers</div>
            </div>
          </div>
          <a href="https://facebook.com" target="_blank" rel="noopener" class="text-xs font-bold text-blue-600 bg-blue-50 hover:bg-blue-100 px-3.5 py-2 rounded-xl transition-colors">
            Like Page
          </a>
        </div>

        <!-- YouTube -->
        <div class="p-6 rounded-2xl bg-gradient-to-br from-red-500/5 to-rose-500/5 border border-red-100 flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-red-600 text-white flex items-center justify-center">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </div>
            <div>
              <div class="text-xl font-black text-slate-900 leading-none">207K</div>
              <div class="text-xs text-slate-500 font-semibold mt-1">YouTube Subscribers</div>
            </div>
          </div>
          <a href="https://youtube.com" target="_blank" rel="noopener" class="text-xs font-bold text-red-600 bg-red-50 hover:bg-red-100 px-3.5 py-2 rounded-xl transition-colors">
            Subscribe
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       9. COST CALCULATOR CALLOUT BANNER
       ========================================================================= -->
  <section class="py-14 bg-gradient-to-r from-orange-600 to-orange-500 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
      <div class="space-y-2 text-center md:text-left">
        <span class="inline-block px-3 py-1 rounded-full bg-white/20 text-white font-bold text-xs uppercase tracking-wider">Free Online Tool</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">House Construction Cost in Chennai &ndash; Per Sq Ft Price & Instant Calculator</h2>
        <p class="text-orange-100 text-sm max-w-2xl font-light">
          Instantly estimate your home construction cost in Chennai using Replica Architects & Builders's accurate 2026 cost engine with phase-by-phase breakdown.
        </p>
      </div>
      <a href="calculator.php" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-black text-white font-bold px-7 py-3.5 rounded-xl shadow-xl transition-all whitespace-nowrap">
        Calculate House Construction Cost &rarr;
      </a>
    </div>
  </section>

  <!-- =========================================================================
       10. TALK TO OUR EXPERT
       ========================================================================= -->
  <section class="py-16 sm:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <!-- Left Image -->
        <div class="lg:col-span-6">
          <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1541888946425-d0fbb18615f3?auto=format&fit=crop&w=1000&q=80" alt="Replica Architects & Builders site engineer discussing plans with homeowners" class="w-full h-[400px] object-cover">
          </div>
        </div>

        <!-- Right Content -->
        <div class="lg:col-span-6 space-y-6">
          <div class="text-xs font-bold text-orange-600 uppercase tracking-widest flex items-center gap-2">
            <span class="w-4 h-0.5 bg-orange-600"></span> Talk to our expert
          </div>
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 leading-tight">
            Trusted construction company in <span class="text-orange-600">Chennai</span> &mdash; start with confidence
          </h2>
          <p class="text-slate-600 text-base leading-relaxed">
            Structured residential construction with transparent pricing, daily site supervision, and engineered quality checks. From planning to handover, every stage is accountable. Share your plot details and get a clear project estimate.
          </p>

          <!-- Feature Pills -->
          <div class="flex flex-wrap gap-2.5">
            <span class="px-3.5 py-1.5 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">No surprise bills</span>
            <span class="px-3.5 py-1.5 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">Dedicated site engineer</span>
            <span class="px-3.5 py-1.5 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">15-year warranty</span>
          </div>

          <!-- CTAs -->
          <div class="flex flex-wrap gap-4 pt-2">
            <a href="https://wa.me/919994399933" target="_blank" rel="noopener" class="inline-flex items-center gap-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm px-6 py-3.5 rounded-xl shadow-md transition-all">
              <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.523 5.855L.057 23.617a.75.75 0 00.921.921l5.79-1.479A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.893 0-3.67-.513-5.193-1.408l-.371-.22-3.841.981.999-3.808-.242-.387A9.961 9.961 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
              Start Free Consultation
            </a>
            <a href="tel:+919994399933" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-sm px-6 py-3.5 rounded-xl transition-all">
              Call 99943 99933
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       11. WHY HOMEOWNERS CHOOSE US (6 PILLARS)
       ========================================================================= -->
  <section class="py-16 sm:py-24 bg-slate-900 text-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="text-xs font-bold text-orange-400 uppercase tracking-widest mb-2 flex items-center justify-center gap-2">
          <span class="w-4 h-0.5 bg-orange-400"></span> Guaranteed Execution
        </div>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white">
          Why Choose <span class="text-orange-500">Replica Architects & Builders</span> in Chennai?
        </h2>
        <p class="text-slate-400 text-sm sm:text-base mt-2">
          Six foundational pillars that make every home construction project a guaranteed success.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Pillar 1 -->
        <div class="bg-slate-800/80 rounded-2xl p-6 border border-slate-700/80 hover:border-orange-500/50 transition-all card-hover-lift">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-orange-400 tracking-wider">01 &middot; EXPERT SUPERVISION</span>
            <div class="w-8 h-8 rounded-lg bg-orange-500/10 text-orange-400 flex items-center justify-center">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Dedicated Site Engineer</h3>
          <p class="text-sm text-slate-300 font-light leading-relaxed">
            A full-time qualified civil engineer stationed physically on your plot every day. Material checks, slump tests, and column alignment are never delegated.
          </p>
        </div>

        <!-- Pillar 2 -->
        <div class="bg-slate-800/80 rounded-2xl p-6 border border-slate-700/80 hover:border-orange-500/50 transition-all card-hover-lift">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-orange-400 tracking-wider">02 &middot; ON-TIME DELIVERY</span>
            <div class="w-8 h-8 rounded-lg bg-orange-500/10 text-orange-400 flex items-center justify-center">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Structured Milestones</h3>
          <p class="text-sm text-slate-300 font-light leading-relaxed">
            Committed 10-phase schedule with clear delivery dates. Financial penalties for delay clauses built into our contract guarantee accountability.
          </p>
        </div>

        <!-- Pillar 3 -->
        <div class="bg-slate-800/80 rounded-2xl p-6 border border-slate-700/80 hover:border-orange-500/50 transition-all card-hover-lift">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-orange-400 tracking-wider">03 &middot; ZERO HIDDEN COSTS</span>
            <div class="w-8 h-8 rounded-lg bg-orange-500/10 text-orange-400 flex items-center justify-center">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Transparent Stage Payments</h3>
          <p class="text-sm text-slate-300 font-light leading-relaxed">
            Detailed Bill of Quantities (BOQ) agreed beforehand. You pay stage by stage only when that stage is certified. Zero surprise price escalations.
          </p>
        </div>

        <!-- Pillar 4 -->
        <div class="bg-slate-800/80 rounded-2xl p-6 border border-slate-700/80 hover:border-orange-500/50 transition-all card-hover-lift">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-orange-400 tracking-wider">04 &middot; FULL LIFECYCLE</span>
            <div class="w-8 h-8 rounded-lg bg-orange-500/10 text-orange-400 flex items-center justify-center">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">End-to-End Turnkey</h3>
          <p class="text-sm text-slate-300 font-light leading-relaxed">
            Architectural blueprints, soil testing, CMDA approvals, RCC structure, plumbing, electrical, and aesthetic finishes handled under one unified contract.
          </p>
        </div>

        <!-- Pillar 5 -->
        <div class="bg-slate-800/80 rounded-2xl p-6 border border-slate-700/80 hover:border-orange-500/50 transition-all card-hover-lift">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-orange-400 tracking-wider">05 &middot; PREMIUM MATERIALS</span>
            <div class="w-8 h-8 rounded-lg bg-orange-500/10 text-orange-400 flex items-center justify-center">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Quality Assurance</h3>
          <p class="text-sm text-slate-300 font-light leading-relaxed">
            Only branded ISI materials &mdash; Tata Tiscon/iSteel, UltraTech/Ramco cement, Legrand switches, Parryware/Jaquar CP fittings. Full batch test reports.
          </p>
        </div>

        <!-- Pillar 6 -->
        <div class="bg-slate-800/80 rounded-2xl p-6 border border-slate-700/80 hover:border-orange-500/50 transition-all card-hover-lift">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs font-bold text-orange-400 tracking-wider">06 &middot; LIVE TRACKING</span>
            <div class="w-8 h-8 rounded-lg bg-orange-500/10 text-orange-400 flex items-center justify-center">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </div>
          </div>
          <h3 class="text-lg font-bold text-white mb-2">Real-Time Project Updates</h3>
          <p class="text-sm text-slate-300 font-light leading-relaxed">
            Daily site photos, inspection checklists, and weekly video progress updates sent directly to your phone. Monitor build progress from anywhere in the world.
          </p>
        </div>

      </div>

    </div>
  </section>

  <!-- =========================================================================
       12. PARTNER BRANDS & BANKING TIE-UPS MARQUEE
       ========================================================================= -->
  <section class="py-14 bg-white border-b border-slate-100 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 text-center">
      <div class="text-xs font-bold text-orange-600 uppercase tracking-widest mb-1">Quality Partnerships</div>
      <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900">Trusted Material Brands & Banking Partners</h3>
    </div>

    <!-- Vendor Logos Marquee Track -->
    <div class="relative w-full overflow-hidden mb-6">
      <div class="animate-marquee-left flex items-center space-x-12 whitespace-nowrap">
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">TATA TISCON</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">ULTRATECH CEMENT</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">KAJARIA CERAMICS</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">RAMCO SUPER GRADE</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">PARRYWARE</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">NIPPON PAINT</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">JAQUAR LUXURY</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">DR. FIXIT WATERPROOFING</span>
        <!-- Duplicate set -->
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">TATA TISCON</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">ULTRATECH CEMENT</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">KAJARIA CERAMICS</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">RAMCO SUPER GRADE</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">PARRYWARE</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">NIPPON PAINT</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">JAQUAR LUXURY</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold text-sm">DR. FIXIT WATERPROOFING</span>
      </div>
    </div>

    <!-- Banking Partners Marquee Track (Reverse) -->
    <div class="relative w-full overflow-hidden">
      <div class="animate-marquee-right flex items-center space-x-12 whitespace-nowrap">
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-blue-800 font-bold text-sm">SBI HOME LOANS</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-red-800 font-bold text-sm">HDFC BANK</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-orange-800 font-bold text-sm">ICICI BANK</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-purple-800 font-bold text-sm">AXIS BANK</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-amber-800 font-bold text-sm">IDFC FIRST BANK</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-blue-900 font-bold text-sm">INDIAN BANK</span>
        <!-- Duplicate set -->
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-blue-800 font-bold text-sm">SBI HOME LOANS</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-red-800 font-bold text-sm">HDFC BANK</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-orange-800 font-bold text-sm">ICICI BANK</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-purple-800 font-bold text-sm">AXIS BANK</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-amber-800 font-bold text-sm">IDFC FIRST BANK</span>
        <span class="px-5 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-blue-900 font-bold text-sm">INDIAN BANK</span>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       13. FREQUENTLY ASKED QUESTIONS (FAQS)
       ========================================================================= -->
  <section class="py-16 sm:py-24 bg-slate-50" id="faqs">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="text-center mb-12">
        <div class="text-xs font-bold text-orange-600 uppercase tracking-widest mb-2 flex items-center justify-center gap-2">
          <span class="w-4 h-0.5 bg-orange-600"></span> Got Questions?
        </div>
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900">
          Frequently Asked Questions (FAQs)
        </h2>
        <p class="text-slate-600 text-sm mt-2">Clear answers to everything you should know before signing a house construction agreement.</p>
      </div>

      <!-- FAQ Group -->
      <div class="faq-group space-y-4">
        
        <!-- FAQ 1 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>1. What is the construction cost per sq ft in Chennai?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            Replica Architects & Builders offers house construction packages in Chennai starting at <strong class="text-slate-900 font-semibold">₹1,999/sq.ft</strong> (Basic) up to <strong class="text-slate-900 font-semibold">₹2,999/sq.ft</strong> (Luxury). The final cost depends on plot size, number of floors, and finish level. You can use our free online cost calculator for an immediate breakdown.
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>2. How long does it take to build an independent house in Chennai?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            A typical single-floor or G+1 residential home takes <strong class="text-slate-900 font-semibold">9 to 12 months</strong>, while G+2 and G+3 homes take 12 to 16 months. We provide a guaranteed written project timeline with stage completion commitments before work begins.
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>3. Do you handle the complete construction from start to finish?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            Yes. We offer complete turnkey house construction covering soil testing, architectural 2D/3D design, CMDA/DTCP building plan approvals, structural RCC execution, electrical, plumbing, tiling, painting, and final handover &mdash; all under one roof with a single contract.
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>4. What areas in Chennai and outskirts do you cover?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            We serve all major localities across Chennai including Anna Nagar, Mogappair, Porur, Poonamallee, Tambaram, Velachery, OMR, Perungalathur, Guduvancheri, Ambattur, Avadi, Kanchipuram, and Thiruvallur districts.
          </div>
        </div>

        <!-- FAQ 5 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>5. Do you assign a dedicated engineer to my project?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            Yes. Every single Replica Architects & Builders project is assigned a qualified, full-time site engineer who is physically present on your plot every day. They monitor material arrival, cube testing, bar-bending compliance, and send daily WhatsApp photo updates.
          </div>
        </div>

        <!-- FAQ 6 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>6. What warranty do you offer on residential construction?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            Replica Architects & Builders provides a legally documented 15-year structural warranty on all residential builds, along with warranty certificates for waterproofing, termite treatment, plumbing fixtures, and electrical switchgear.
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- =========================================================================
       14. OUTSKIRTS & AREAS WE SERVE BANNER
       ========================================================================= -->
  <section class="py-12 bg-slate-900 text-white border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
      <h3 class="text-xl sm:text-2xl font-bold">House Construction Across Chennai & Outskirts</h3>
      <p class="text-sm text-slate-400 max-w-2xl mx-auto">
        Replica Architects & Builders delivers homes across Chennai city and major peripheral corridors including Porur, Poonamallee, Guduvancheri, Tambaram, OMR, and 15+ surrounding localities.
      </p>
      <a href="contact.php" class="inline-flex items-center gap-1.5 text-orange-400 hover:text-orange-300 font-bold text-sm">
        View All Localities We Serve &rarr;
      </a>
    </div>
  </section>

  <!-- =========================================================================
       15. PRE-FOOTER CTA BAND
       ========================================================================= -->
  <div class="bg-gradient-to-r from-orange-600 via-orange-500 to-amber-600 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
      <div>
        <h3 class="text-2xl font-extrabold tracking-tight">Planning to build your home in Chennai?</h3>
        <p class="text-orange-100 text-sm mt-1">Get a transparent sq.ft estimate before you commit to anything.</p>
      </div>
      <div class="flex flex-wrap items-center justify-center gap-3">
        <a href="calculator.php" class="bg-white text-slate-900 hover:bg-slate-100 font-bold text-sm px-6 py-3 rounded-xl shadow-md transition-all">
          Calculate your cost
        </a>
        <a href="tel:+919994399933" class="bg-slate-900 hover:bg-black text-white font-bold text-sm px-6 py-3 rounded-xl shadow-md transition-all">
          Talk to us
        </a>
      </div>
    </div>
  </div>

  <!-- =========================================================================
       16. FOOTER
       ========================================================================= -->
  <footer class="bg-slate-950 text-slate-400 text-sm py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
        
        <!-- Brand Info -->
        <div class="lg:col-span-2 space-y-4">
          <img src="assets/images/logo.svg" alt="Replica Architects & Builders Logo" class="h-10 w-auto brightness-0 invert">
          <p class="text-xs leading-relaxed text-slate-400 max-w-sm">
            Turnkey house construction, architectural and structural design, and plan approvals across Chennai, Kanchipuram, Chengalpattu, and Thiruvallur.
          </p>
          <div class="flex items-center gap-6 pt-2">
            <div>
              <div class="text-xl font-black text-white">400+</div>
              <div class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Homes delivered</div>
            </div>
            <div class="h-8 w-px bg-slate-800"></div>
            <div>
              <div class="text-xl font-black text-orange-500">75+</div>
              <div class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Ongoing projects</div>
            </div>
          </div>
        </div>

        <!-- Services -->
        <div class="space-y-3">
          <h4 class="text-white font-bold text-sm tracking-wider uppercase">Services</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="services.php" class="hover:text-orange-400 transition-colors">Turnkey Construction</a></li>
            <li><a href="services.php#commercial" class="hover:text-orange-400 transition-colors">Commercial Construction</a></li>
            <li><a href="services.php#architecture" class="hover:text-orange-400 transition-colors">Architectural Designing</a></li>
            <li><a href="services.php#structural" class="hover:text-orange-400 transition-colors">Structural Designing</a></li>
            <li><a href="services.php#approvals" class="hover:text-orange-400 transition-colors">Building Plan Approval</a></li>
          </ul>
        </div>

        <!-- Company -->
        <div class="space-y-3">
          <h4 class="text-white font-bold text-sm tracking-wider uppercase">Company</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="about.php" class="hover:text-orange-400 transition-colors">About Us</a></li>
            <li><a href="projects.php" class="hover:text-orange-400 transition-colors">Our Projects</a></li>
            <li><a href="packages.php" class="hover:text-orange-400 transition-colors">Construction Packages</a></li>
            <li><a href="calculator.php" class="hover:text-orange-400 transition-colors">Cost Calculator</a></li>
            <li><a href="contact.php" class="hover:text-orange-400 transition-colors">Contact Us</a></li>
          </ul>
        </div>

        <!-- Contact & Hours -->
        <div class="space-y-3">
          <h4 class="text-white font-bold text-sm tracking-wider uppercase">Get In Touch</h4>
          <ul class="space-y-2 text-xs">
            <li class="flex items-start gap-2">
              <svg class="w-4 h-4 text-orange-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              <span>116/A, Big Street, Pattukkottai, Tamil Nadu – 614601</span>
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              <a href="tel:+919994399933" class="hover:text-white font-semibold">+91 99943 99933</a>
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              <a href="mailto:planbyreplica@gmail.com" class="hover:text-white">planbyreplica@gmail.com</a>
            </li>
            <li class="flex items-center gap-2 text-slate-400">
              <svg class="w-4 h-4 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              <span>Mon &ndash; Sat, 10:00 AM &ndash; 7:00 PM</span>
            </li>
          </ul>
        </div>

      </div>

      <!-- Legal Bottom Bar -->
      <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
        <div>
          &copy; <span class="dynamic-year">2026</span> Replica Architects & Builders. All rights reserved.
        </div>
        <div class="flex items-center space-x-6">
          <a href="#" class="hover:text-slate-400">Privacy Policy</a>
          <a href="#" class="hover:text-slate-400">Terms & Conditions</a>
          <a href="#" class="hover:text-slate-400">Sitemap</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- =========================================================================
       17. VIDEO MODAL POPUP
       ========================================================================= -->
  <div id="video-modal" class="fixed inset-0 bg-slate-950/85 z-50 hidden flex items-center justify-center p-4 backdrop-blur-md">
    <div class="bg-black rounded-2xl overflow-hidden shadow-2xl max-w-3xl w-full relative aspect-video">
      <button id="modal-close-btn" class="absolute top-4 right-4 z-20 text-white hover:text-orange-500 bg-black/60 p-2 rounded-full" aria-label="Close Modal">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
      <iframe id="modal-video-frame" class="w-full h-full" allow="autoplay; encrypted-media" allowfullscreen title="Client Story Video"></iframe>
    </div>
  </div>

  <!-- =========================================================================
       18. FLOATING WHATSAPP ACTION BUTTON
       ========================================================================= -->
  <a href="https://wa.me/919994399933" target="_blank" rel="noopener" id="whatsapp-bubble" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center transition-all transform hover:scale-110" aria-label="Chat with Replica Architects & Builders on WhatsApp">
    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.523 5.855L.057 23.617a.75.75 0 00.921.921l5.79-1.479A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.893 0-3.67-.513-5.193-1.408l-.371-.22-3.841.981.999-3.808-.242-.387A9.961 9.961 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
  </a>

  <!-- Script references -->
  <script src="assets/js/main.js"></script>
</body>
</html>
