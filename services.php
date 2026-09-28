<?php
/**
 * Replica Architects & Builders - Services Page (Server-Side Rendered)
 * Environment: Apache / XAMPP / Hostinger
 */
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/schema.php';

$currentPage = 'services';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turnkey House Construction Services in Chennai | Replica Architects & Builders</title>
  <meta name="description" content="End-to-end turnkey residential and commercial construction services in Chennai. 12-stage construction process, architectural design, structural drawings, CMDA/DTCP approvals, and 15-year warranty.">
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
          <a href="index.php" class="hover:text-orange-600 transition-colors">Home</a>
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
            <button type="button" class="inline-flex items-center gap-1 text-orange-600 font-semibold hover:text-orange-600 transition-colors group-hover:text-orange-600">
              Services
              <svg class="w-3.5 h-3.5 text-orange-600 group-hover:text-orange-600 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 mt-1 w-72 bg-white rounded-xl shadow-xl border border-slate-100 py-2 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
              <a href="services.php" class="block px-4 py-2.5 bg-orange-50/70 hover:bg-orange-50/70 transition-colors">
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
        <a href="index.php" class="px-3 py-2 rounded-lg hover:bg-slate-50">Home</a>
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
          <button type="button" class="mobile-dropdown-btn w-full px-3 py-2 rounded-lg bg-orange-50 text-orange-600 font-bold flex items-center justify-between text-left">
            <span>Services</span>
            <svg class="dropdown-icon w-4 h-4 text-orange-600 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="pl-6 mt-1 space-y-1.5 text-xs text-slate-600">
            <a href="services.php" class="block py-1.5 font-bold text-orange-600">Turnkey House Construction</a>
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
       HERO SECTION
       ========================================================================= -->
  <section class="relative bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-white py-16 sm:py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ff5e14_1px,transparent_1px)] [background-size:24px_24px]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <!-- Left Hero Content -->
        <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 text-xs font-bold tracking-wide uppercase">
            <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
            End-To-End Construction Specialists
          </div>

          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight text-white">
            Turnkey House Construction Services in <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-orange-500 to-amber-400">Chennai</span>
          </h1>

          <p class="text-base sm:text-lg text-slate-300 leading-relaxed font-light max-w-2xl mx-auto lg:mx-0">
            From soil testing, 3D architectural design, and CMDA/DTCP approval liaison to RCC casting, interior woodwork, and key handover. We build your dream home with a 15-year structural warranty and zero cost escalation.
          </p>

          <!-- Core Stat Pills -->
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2 text-left">
            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
              <div class="text-2xl font-black text-orange-400">400+</div>
              <div class="text-[11px] text-slate-400 font-medium">Homes Delivered</div>
            </div>
            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
              <div class="text-2xl font-black text-orange-400">15 Yrs</div>
              <div class="text-[11px] text-slate-400 font-medium">Structural Warranty</div>
            </div>
            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
              <div class="text-2xl font-black text-orange-400">350+</div>
              <div class="text-[11px] text-slate-400 font-medium">Quality Audits</div>
            </div>
            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
              <div class="text-2xl font-black text-orange-400">100%</div>
              <div class="text-[11px] text-slate-400 font-medium">Milestone Billing</div>
            </div>
          </div>

          <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-4">
            <a href="calculator.php" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-bold text-sm px-7 py-3.5 rounded-xl shadow-xl transition-all">
              <span>Calculate Construction Cost</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            <a href="#services-list" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/15 text-white font-semibold text-sm px-6 py-3.5 rounded-xl border border-white/20 transition-all">
              <span>Explore All Services</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </a>
          </div>
        </div>

        <!-- Right Hero Consultation Form Card -->
        <div class="lg:col-span-5">
          <div class="bg-white rounded-3xl p-6 sm:p-8 text-slate-800 shadow-2xl border border-slate-100 relative">
            <div class="absolute -top-3.5 right-6 bg-gradient-to-r from-orange-600 to-amber-500 text-white text-[11px] font-black uppercase tracking-wider px-3 py-1 rounded-full shadow-md">
              Free Site Evaluation
            </div>
            <h3 class="text-xl font-bold text-slate-900">Request Service Consultation</h3>
            <p class="text-xs text-slate-500 mt-1 mb-6">Discuss your plot dimensions & budget with our Senior Structural Engineer.</p>
            
            <form class="lead-capture-form space-y-4" data-source="services-hero">
              <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Your Full Name *</label>
                <input type="text" name="name" required placeholder="e.g. Anand Kumar" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1">Phone Number *</label>
                  <input type="tel" name="phone" required placeholder="10-digit mobile" inputmode="numeric" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <div>
                  <label class="block text-xs font-bold text-slate-700 mb-1">Plot Location in Chennai</label>
                  <input type="text" name="location" placeholder="e.g. Porur / Tambaram" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
              </div>
              <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Service Needed</label>
                <select name="service" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                  <option value="Turnkey House Construction">Complete Turnkey House Construction</option>
                  <option value="Commercial Construction">Commercial / Rental Building Construction</option>
                  <option value="Architectural & 3D Design">Architectural & 3D Elevation Design</option>
                  <option value="Structural Engineering">Structural RCC Engineering</option>
                  <option value="Building Plan Approval">CMDA / DTCP Building Plan Approval</option>
                </select>
              </div>
              <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Approx. Built-up Area</label>
                <select name="area" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 bg-white">
                  <option value="1200 - 1800 sq.ft">1,200 &ndash; 1,800 sq.ft (Duplex / G+1)</option>
                  <option value="1800 - 2500 sq.ft">1,800 &ndash; 2,500 sq.ft (Villa / G+2)</option>
                  <option value="2500 - 4000 sq.ft">2,500 &ndash; 4,000 sq.ft (Large Residence)</option>
                  <option value="4000+ sq.ft">Above 4,000 sq.ft (Multi-family / Commercial)</option>
                </select>
              </div>
              <button type="submit" class="w-full bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-bold text-sm py-3.5 rounded-xl shadow-lg transition-all mt-2">
                Book Site Inspection &rarr;
              </button>
              <div class="text-[11px] text-center text-slate-400 flex items-center justify-center gap-1.5 pt-1">
                <svg class="w-3.5 h-3.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <span>Zero spam guarantee &middot; Engineer contacts you within 2 hrs</span>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       WHAT IS TURNKEY & WHY CHOOSE Replica Architects & Builders
       ========================================================================= -->
  <section class="py-16 sm:py-20 bg-slate-50 border-b border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto space-y-3 mb-14">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider">Complete Peace Of Mind</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
          Traditional Contracting vs. Replica Architects & Builders Turnkey Model
        </h2>
        <p class="text-sm text-slate-600 leading-relaxed">
          Building a house shouldn't mean running between architects, structural consultants, government sanctioning offices, material vendors, and unverified masons.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
        
        <!-- Old Painful Way -->
        <div class="bg-white rounded-3xl p-8 border border-rose-200 shadow-sm relative overflow-hidden">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-600 text-xs font-bold mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            The Traditional Contractor Trap
          </div>
          <ul class="space-y-4 text-sm text-slate-600">
            <li class="flex items-start gap-3">
              <span class="text-rose-500 font-bold mt-0.5 text-base">&times;</span>
              <span><strong>Endless Cost Escalation:</strong> Initial quote was low, but surprise charges appear for curing, sand, scaffolding, and steel fluctuations.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-rose-500 font-bold mt-0.5 text-base">&times;</span>
              <span><strong>Uncoordinated Vendors:</strong> Architect blames structural engineer, structural engineer blames mason, electrician cuts through structural beams.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-rose-500 font-bold mt-0.5 text-base">&times;</span>
              <span><strong>Unsupervised Labour:</strong> No dedicated degree site engineer on-site. Work quality relies purely on unmonitored daily labourers.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-rose-500 font-bold mt-0.5 text-base">&times;</span>
              <span><strong>No Structural Warranty:</strong> Contractor disappears right after final payment. Hairline cracks or seepage after monsoon are your problem.</span>
            </li>
          </ul>
        </div>

        <!-- The Replica Architects & Builders Turnkey Way -->
        <div class="bg-gradient-to-br from-white to-orange-50/40 rounded-3xl p-8 border-2 border-orange-500/40 shadow-lg relative overflow-hidden">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-100 border border-orange-200 text-orange-700 text-xs font-bold mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            The Replica Architects & Builders Turnkey Advantage
          </div>
          <ul class="space-y-4 text-sm text-slate-700">
            <li class="flex items-start gap-3">
              <span class="text-emerald-500 font-bold mt-0.5 text-base">&#10003;</span>
              <span><strong>Guaranteed Fixed BOQ:</strong> Itemized specification sheet locked down before soil excavation. Zero unexpected cost escalation.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-emerald-500 font-bold mt-0.5 text-base">&#10003;</span>
              <span><strong>Single Point of Contact:</strong> In-house architects, structural engineers, approval liaisons, and MEP teams under one single roof.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-emerald-500 font-bold mt-0.5 text-base">&#10003;</span>
              <span><strong>Full-time Degree Site Engineer:</strong> Daily inspection, slump cone testing, cube compression tests, and evening WhatsApp progress reports.</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-emerald-500 font-bold mt-0.5 text-base">&#10003;</span>
              <span><strong>15-Year Documented Warranty:</strong> Signed warranty certificates for structural RCC, Dr. Fixit waterproofing, and Asian Paints anti-fungal finishes.</span>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       12-STAGE TURNKEY CONSTRUCTION LIFECYCLE
       ========================================================================= -->
  <section id="process" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider">Transparency In Action</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
          Our 12-Stage Turnkey Construction Journey
        </h2>
        <p class="text-sm text-slate-600 leading-relaxed">
          From vacant ground to your Grihapravesam auspicious key handover. Every single phase is tied to a milestone payment with verifiable quality sign-offs.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Stage 1 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">01</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Day 1 &ndash; 7</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">Soil Investigation & Site Survey</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Geotechnical bore tests to determine Safe Bearing Capacity (SBC) and water table level across your Chennai plot, ensuring optimal foundation design.
          </p>
        </div>

        <!-- Stage 2 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">02</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Day 8 &ndash; 20</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">2D Floor Plans & 3D Elevations</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Architectural layouts balanced with 100% Vastu Shastra principles, natural cross-ventilation, furniture layouts, and photorealistic 3D external perspectives.
          </p>
        </div>

        <!-- Stage 3 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">03</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Week 3 &ndash; 6</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">CMDA / DTCP Building Approvals</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Drafting sanction drawings adhering to Tamil Nadu Combined Development and Building Rules (TNCDBR), online submission, scrutiny fee handling, and permit clearance.
          </p>
        </div>

        <!-- Stage 4 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">04</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Week 4 &ndash; 5</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">Structural RCC Detailing</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Seismic Zone III compliant structural design. Bar Bending Schedules (BBS) for column footings, plinth beams, lintels, and slabs using ETABS / STAAD.Pro.
          </p>
        </div>

        <!-- Stage 5 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">05</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Month 2</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">Excavation & Substructure</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            PCC bed, anti-termite chemical spray, isolated/raft footing casting with M20 concrete, backfilling with clean quarry dust, and plinth beam tie-up.
          </p>
        </div>

        <!-- Stage 6 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">06</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Month 2 &ndash; 4</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">RCC Superstructure Casting</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Erection of RCC columns, shuttering with steel plates/film-faced plywood, and monolithic casting of roof slabs using Fe550D TMT steel and UltraTech cement.
          </p>
        </div>

        <!-- Stage 7 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">07</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Month 3 &ndash; 5</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">Brickwork & Masonry Walls</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Outer 9-inch load protection walls and inner 4.5-inch partition walls using premium kiln-burnt red bricks or high-grade lightweight AAC blocks with cement mortar 1:5.
          </p>
        </div>

        <!-- Stage 8 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">08</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Month 4 &ndash; 5</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">Concealed MEP Piping</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Chasing walls for Finolex/Havells fire-retardant electrical conduits and Ashirvad/Supreme CPVC plumbing lines with pressure testing before plaster sealing.
          </p>
        </div>

        <!-- Stage 9 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">09</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Month 5 &ndash; 6</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">Internal & External Plastering</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Double-coat sponge finish plastering with chicken mesh at masonry-concrete joints to prevent shrinkage cracks, followed by minimum 14 days of rigorous water curing.
          </p>
        </div>

        <!-- Stage 10 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">10</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Month 6</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">Waterproofing & Terrace Course</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Dr. Fixit 2-coat elastomeric waterproofing for all sunken toilet slabs and terrace, followed by brick bat coba and white heat-reflective cooling roof tiles.
          </p>
        </div>

        <!-- Stage 11 -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/80 hover:border-orange-500/40 hover:bg-orange-50/20 transition-all space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-orange-600 text-white font-black text-sm flex items-center justify-center">11</span>
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Month 6 &ndash; 8</span>
          </div>
          <h3 class="text-base font-bold text-slate-900">Flooring, Carpentry & Painting</h3>
          <p class="text-xs text-slate-600 leading-relaxed">
            Laying Somany/Kajaria vitrified tiles, fixing 1st quality Teak main entrance door, Asian Paints Royale luxury emulsion, and installing Jaquar/Parryware sanitary fixtures.
          </p>
        </div>

        <!-- Stage 12 -->
        <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl p-6 border-2 border-orange-400/60 shadow-sm space-y-3">
          <div class="flex items-center justify-between">
            <span class="w-8 h-8 rounded-xl bg-gradient-to-r from-orange-600 to-amber-500 text-white font-black text-sm flex items-center justify-center">12</span>
            <span class="text-[11px] font-black text-orange-700 uppercase tracking-wider">Grihapravesam</span>
          </div>
          <h3 class="text-base font-extrabold text-slate-900">350+ Audit & Key Handover</h3>
          <p class="text-xs text-slate-700 leading-relaxed">
            Final deep cleaning, 350-checkpoint snag audit by Quality Head, presentation of keys, as-built drawings dossier, and 15-year structural warranty certificate.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       CORE INDIVIDUAL SERVICE SECTIONS
       ========================================================================= -->
  <section id="services-list" class="py-20 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">
      
      <!-- 1. Turnkey Residential Construction -->
      <div id="turnkey" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center scroll-mt-28">
        <div class="lg:col-span-6 space-y-5">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-100 text-orange-600 text-xs font-bold uppercase tracking-wider">
            Flagship Specialty
          </div>
          <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            Turnkey Residential House Construction
          </h2>
          <p class="text-sm text-slate-600 leading-relaxed">
            Whether you are planning an independent bungalow, an ultra-modern duplex villa, or a multi-generational G+2 home for rental yields, Replica Architects & Builders handles 100% of material procurement, craftsmanship, and site supervision.
          </p>
          <div class="grid grid-cols-2 gap-4 text-xs font-semibold text-slate-700">
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-orange-500"></span>
              Independent Duplex Villas
            </div>
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-orange-500"></span>
              G+1, G+2 & G+3 Family Homes
            </div>
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-orange-500"></span>
              Demolition & Re-construction
            </div>
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-orange-500"></span>
              Rental Apartment Layouts
            </div>
          </div>
          <div class="pt-2 flex items-center gap-4">
            <a href="packages.php" class="inline-flex items-center gap-2 text-xs font-bold text-white bg-orange-600 hover:bg-orange-700 px-5 py-3 rounded-xl shadow-md transition-all">
              View Packages (from ₹1,999/sq.ft) &rarr;
            </a>
            <a href="calculator.php" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-700 hover:text-orange-600">
              Calculate Sq.Ft Cost
            </a>
          </div>
        </div>
        <div class="lg:col-span-6">
          <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=80" alt="Turnkey residential villa in Chennai" class="w-full h-80 sm:h-96 object-cover">
          </div>
        </div>
      </div>

      <!-- 2. Commercial Construction -->
      <div id="commercial" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center scroll-mt-28">
        <div class="lg:col-span-6 lg:order-2 space-y-5">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider">
            Commercial & Retail
          </div>
          <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            Commercial & Mixed-Use Construction
          </h2>
          <p class="text-sm text-slate-600 leading-relaxed">
            Maximize your land monetization with high-efficiency commercial buildings, retail shopping complexes, medical clinics, and corporate branch offices across Chennai's bustling commercial corridors.
          </p>
          <ul class="space-y-2 text-xs text-slate-600">
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span>Heavy live load structural engineering (3.0 &ndash; 5.0 kN/m&sup2;)</span>
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span>Stilt parking with designated driveways and automated shutter provisions</span>
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span>Fire NOC compliance, commercial electrical sub-stations, and lift shafts</span>
            </li>
          </ul>
          <div class="pt-2">
            <a href="contact.php" class="inline-flex items-center gap-2 text-xs font-bold text-white bg-slate-900 hover:bg-black px-5 py-3 rounded-xl shadow-md transition-all">
              Consult on Commercial Project &rarr;
            </a>
          </div>
        </div>
        <div class="lg:col-span-6 lg:order-1">
          <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=80" alt="Commercial construction project in Chennai" class="w-full h-80 sm:h-96 object-cover">
          </div>
        </div>
      </div>

      <!-- 3. Architectural Design -->
      <div id="architecture" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center scroll-mt-28">
        <div class="lg:col-span-6 space-y-5">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider">
            In-House Creative Studio
          </div>
          <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            Architectural Designing & 3D Elevations
          </h2>
          <p class="text-sm text-slate-600 leading-relaxed">
            Every great home begins with intelligent space planning. Our architects blend contemporary aesthetics with Chennai's coastal climate considerations and time-tested Vastu principles.
          </p>
          <div class="grid grid-cols-2 gap-3 text-xs">
            <div class="p-3 rounded-xl bg-white border border-slate-200">
              <strong class="text-slate-900 block font-bold mb-1">3D Facade Rendering</strong>
              <span class="text-slate-500">Photorealistic day & night exterior lighting visualizations.</span>
            </div>
            <div class="p-3 rounded-xl bg-white border border-slate-200">
              <strong class="text-slate-900 block font-bold mb-1">100% Vastu Compliance</strong>
              <span class="text-slate-500">Kubera moola master bedrooms, Agni kitchen placements.</span>
            </div>
            <div class="p-3 rounded-xl bg-white border border-slate-200">
              <strong class="text-slate-900 block font-bold mb-1">Natural Ventilation</strong>
              <span class="text-slate-500">Cross-breeze window alignments to minimize HVAC cooling load.</span>
            </div>
            <div class="p-3 rounded-xl bg-white border border-slate-200">
              <strong class="text-slate-900 block font-bold mb-1">Interactive Walkthrough</strong>
              <span class="text-slate-500">Experience your interior room flow before construction begins.</span>
            </div>
          </div>
        </div>
        <div class="lg:col-span-6">
          <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=900&q=80" alt="Architectural 3D elevation design in Chennai" class="w-full h-80 sm:h-96 object-cover">
          </div>
        </div>
      </div>

      <!-- 4. Structural Engineering -->
      <div id="structural" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center scroll-mt-28">
        <div class="lg:col-span-6 lg:order-2 space-y-5">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold uppercase tracking-wider">
            Engineered For Decades
          </div>
          <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            Structural RCC Engineering & Soil Calculations
          </h2>
          <p class="text-sm text-slate-600 leading-relaxed">
            The safety and longevity of your building depend on structural rigor. We don't guess steel quantities &mdash; licensed structural engineers calculate load paths, wind loads, and seismic shear using ETABS.
          </p>
          <div class="space-y-2.5 text-xs text-slate-600">
            <div class="p-3 rounded-xl bg-white border border-slate-200 flex items-center justify-between">
              <span class="font-semibold text-slate-800">Seismic Zone III Compliant Framing</span>
              <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded">IS 1893:2016</span>
            </div>
            <div class="p-3 rounded-xl bg-white border border-slate-200 flex items-center justify-between">
              <span class="font-semibold text-slate-800">Reinforced Concrete Code Standards</span>
              <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded">IS 456:2000</span>
            </div>
            <div class="p-3 rounded-xl bg-white border border-slate-200 flex items-center justify-between">
              <span class="font-semibold text-slate-800">Bar Bending Schedule (BBS) Precision</span>
              <span class="text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded">Zero Steel Waste</span>
            </div>
          </div>
        </div>
        <div class="lg:col-span-6 lg:order-1">
          <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1541888946425-d0fbb18615f3?auto=format&fit=crop&w=900&q=80" alt="Structural RCC engineering and site inspection" class="w-full h-80 sm:h-96 object-cover">
          </div>
        </div>
      </div>

      <!-- 5. CMDA & DTCP Plan Approvals -->
      <div id="approvals" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center scroll-mt-28">
        <div class="lg:col-span-6 space-y-5">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-100 text-purple-800 text-xs font-bold uppercase tracking-wider">
            100% Hassle-Free Sanctions
          </div>
          <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            CMDA / DTCP Building Plan Approvals
          </h2>
          <p class="text-sm text-slate-600 leading-relaxed">
            Navigating Chennai's local body approvals can take months without expert liaison. Replica Architects & Builders handles the entire permitting lifecycle across Greater Chennai Corporation (GCC), CMDA, and DTCP jurisdictions.
          </p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
            <div class="p-3 rounded-xl bg-white border border-slate-200">
              <strong class="text-slate-900 block font-bold mb-1">TNCDBR Compliance</strong>
              <span class="text-slate-500">Checking FSI, OSR, plot coverage, and front/rear setbacks.</span>
            </div>
            <div class="p-3 rounded-xl bg-white border border-slate-200">
              <strong class="text-slate-900 block font-bold mb-1">Online Portal Filing</strong>
              <span class="text-slate-500">Single window portal uploads and scrutiny drawing drafting.</span>
            </div>
            <div class="p-3 rounded-xl bg-white border border-slate-200">
              <strong class="text-slate-900 block font-bold mb-1">Revenue Documentation</strong>
              <span class="text-slate-500">Patta, Chitta, EC, and Encumbrance verification assistance.</span>
            </div>
            <div class="p-3 rounded-xl bg-white border border-slate-200">
              <strong class="text-slate-900 block font-bold mb-1">EB & Water Connection</strong>
              <span class="text-slate-500">Liaison for TANGEDCO temporary EB and CMWSSB metro water line.</span>
            </div>
          </div>
          <div class="pt-2">
            <a href="contact.php" class="inline-flex items-center gap-2 text-xs font-bold text-white bg-purple-700 hover:bg-purple-800 px-5 py-3 rounded-xl shadow-md transition-all">
              Apply For Plan Approval &rarr;
            </a>
          </div>
        </div>
        <div class="lg:col-span-6">
          <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=900&q=80" alt="Architectural blueprints and CMDA building plan approvals" class="w-full h-80 sm:h-96 object-cover">
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- =========================================================================
       TRUSTED MATERIAL BRANDS WE USE
       ========================================================================= -->
  <section class="py-16 bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
      <div class="space-y-2">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider">Uncompromising Quality</span>
        <h3 class="text-2xl font-extrabold text-slate-900">Only Tier-1 Certified Brand Partners</h3>
        <p class="text-xs text-slate-500 max-w-xl mx-auto">
          Every bag of cement, rod of steel, and plumbing pipe delivered to your plot comes with authentic manufacturer test certificates.
        </p>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4 items-center">
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-bold text-xs text-slate-700">UltraTech</div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-bold text-xs text-slate-700">Tata Tiscon</div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-bold text-xs text-slate-700">Somany</div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-bold text-xs text-slate-700">Kajaria</div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-bold text-xs text-slate-700">Asian Paints</div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-bold text-xs text-slate-700">Jaquar</div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-bold text-xs text-slate-700">Finolex</div>
        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-bold text-xs text-slate-700">Legrand</div>
      </div>
    </div>
  </section>

  <!-- =========================================================================
       FREQUENTLY ASKED QUESTIONS ABOUT TURNKEY
       ========================================================================= -->
  <section class="py-20 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
      <div class="text-center space-y-3">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider">Got Questions?</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
          Frequently Asked Questions on Turnkey Services
        </h2>
        <p class="text-sm text-slate-600">
          Everything you need to know about our turnkey house construction agreements in Chennai.
        </p>
      </div>

      <div class="space-y-4">
        
        <!-- FAQ 1 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>What exactly is included in Replica Architects & Builders's Turnkey package?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            Our turnkey package is truly comprehensive. It encompasses architectural 2D/3D design, structural RCC calculations, building plan approval liaison, soil testing, foundation, brick masonry, plastering, waterproofing, concealed wiring with modular switches, plumbing lines with branded sanitaryware, premium vitrified tile flooring, teakwood main doors, internal doors, UPVC/aluminum windows, complete 3-coat painting, and final deep cleaning with key handover.
          </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>How does the milestone payment system work?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            You do NOT pay large lump sums upfront. Payments are divided across 10 progressive construction milestones (e.g. 10% booking, 15% plinth beam, 15% ground floor roof slab, etc.). A payment is only due after our Quality Head and your Site Engineer inspect and sign off on that specific milestone's completion.
          </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>Can I customize the floor plan and materials within the package?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            Yes! Every family has unique lifestyles and requirements. While our packages have set benchmark prices, you can upgrade specific components (e.g. Italian marble instead of vitrified tiles, wooden flooring in master bedroom, home theater acoustic wiring, or solar rooftop setup). We adjust the BOQ with transparent rate differences before signing.
          </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
          <button type="button" class="faq-trigger w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-slate-900 text-sm sm:text-base hover:text-orange-600 transition-colors" aria-expanded="false">
            <span>How do you handle soil conditions with high clay or water table in Chennai?</span>
            <svg class="faq-icon w-5 h-5 text-slate-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="faq-answer hidden px-6 pb-5 text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
            In areas like Velachery, Madipakkam, or coastal ECR with black cotton soil or high groundwater, our structural engineer designs specialized under-reamed pile foundations or raft foundations with waterproof concrete admixtures to guarantee zero differential settlement and eliminate dampness.
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================================================
       PRE-FOOTER CTA BAND
       ========================================================================= -->
  <div class="bg-gradient-to-r from-orange-600 via-orange-500 to-amber-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
      <div>
        <h3 class="text-2xl sm:text-3xl font-black tracking-tight">Ready to build your home in Chennai?</h3>
        <p class="text-orange-100 text-sm mt-1">Book a free site inspection with our senior site engineer today.</p>
      </div>
      <div class="flex flex-wrap items-center justify-center gap-3">
        <a href="calculator.php" class="bg-white text-slate-900 hover:bg-slate-100 font-bold text-sm px-6 py-3.5 rounded-xl shadow-md transition-all">
          Calculate Your Cost
        </a>
        <a href="contact.php" class="bg-slate-900 hover:bg-black text-white font-bold text-sm px-6 py-3.5 rounded-xl shadow-md transition-all">
          Schedule Site Visit &rarr;
        </a>
      </div>
    </div>
  </div>

  <!-- =========================================================================
       FOOTER
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

  <!-- Floating WhatsApp Action Button -->
  <a href="https://wa.me/919994399933" target="_blank" rel="noopener" id="whatsapp-bubble" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center transition-all transform hover:scale-110" aria-label="Chat with Replica Architects & Builders on WhatsApp">
    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.523 5.855L.057 23.617a.75.75 0 00.921.921l5.79-1.479A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.893 0-3.67-.513-5.193-1.408l-.371-.22-3.841.981.999-3.808-.242-.387A9.961 9.961 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
  </a>

  <script src="assets/js/main.js"></script>
</body>
</html>
