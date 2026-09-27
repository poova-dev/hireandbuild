<?php
/**
 * Replica Architects & Builders - Calculator Page (Server-Side Rendered)
 * Environment: Apache / XAMPP / Hostinger
 */
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/schema.php';

$currentPage = 'calculator';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>House Construction Cost Calculator Chennai 2026 - Instant Online Estimate | Replica Architects & Builders</title>
  <meta name="description" content="Calculate your house construction cost per sq ft in Chennai in 30 seconds. Accurate 2026 rates, floor-wise breakdown, material quantities, 10-phase milestone schedule, and EMI calculation.">
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

  <!-- Top Announcement Ticker Strip -->
  <div class="bg-slate-900 text-slate-200 text-xs py-2 border-b border-slate-800 overflow-hidden relative z-40 no-print">
    <div class="ticker-track flex items-center space-x-8 whitespace-nowrap">
      <span class="inline-flex items-center gap-2"><strong class="text-white font-semibold">400+</strong> homes delivered in Chennai</span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2"><strong class="text-white font-semibold">75+</strong> projects currently under construction</span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">Packages from <strong class="text-white font-semibold">₹1,999 / sq.ft</strong></span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">ISI-certified steel & cement &middot; M20/M25 RCC</span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2">CMDA / DTCP plan approval handled for you</span>
      <span class="w-1.5 h-1.5 rounded-full bg-slate-700"></span>
      <span class="inline-flex items-center gap-2"><strong class="text-white font-semibold">400+</strong> homes delivered in Chennai</span>
    </div>
  </div>

  <!-- Header -->
  <header id="main-header" class="sticky top-0 bg-white border-b border-slate-100 z-30 transition-all duration-200 no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <a href="index.php" class="flex items-center gap-3">
          <div class="w-44 sm:w-52 h-auto">
            <img src="assets/images/logo.svg" alt="Replica Architects & Builders Logo" class="w-full h-auto">
          </div>
        </a>

        <nav class="hidden lg:flex items-center space-x-7 text-sm font-medium text-slate-700">
          <a href="index.php" class="hover:text-orange-600 transition-colors">Home</a>
          <a href="about.php" class="hover:text-orange-600 transition-colors">About Us</a>
          <a href="calculator.php" class="inline-flex items-center gap-1.5 text-orange-600 font-bold hover:text-orange-600 transition-colors">
            Cost Calculator
            <span class="bg-orange-100 text-orange-600 text-[10px] font-black px-1.5 py-0.5 rounded-full">FREE</span>
          </a>
          <a href="packages.php" class="hover:text-orange-600 transition-colors">Pricing & Packages</a>
          <a href="services.php" class="hover:text-orange-600 transition-colors">Services</a>
          <a href="projects.php" class="hover:text-orange-600 transition-colors">Projects</a>
          <a href="contact.php" class="hover:text-orange-600 transition-colors">Contact</a>
        </nav>

        <div class="hidden sm:flex items-center space-x-3">
          <a href="tel:+919994399933" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700 bg-slate-50 hover:bg-slate-100 px-4 py-2.5 rounded-xl border border-slate-200 transition-all">
            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <span>Call Now</span>
          </a>
          <a href="contact.php" class="inline-flex items-center gap-2 text-sm font-bold text-white bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 px-5 py-2.5 rounded-xl shadow-md transition-all">
            Book Site Visit
          </a>
        </div>

        <button id="mobile-menu-btn" class="lg:hidden p-2.5 rounded-xl text-slate-700 hover:bg-slate-100" aria-label="Open Menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Mobile Drawer -->
  <div id="mobile-backdrop" class="fixed inset-0 bg-slate-900/60 z-50 opacity-0 pointer-events-none transition-opacity duration-300 backdrop-blur-sm no-print"></div>
  <aside id="mobile-drawer" class="fixed top-0 right-0 bottom-0 w-80 max-w-[85vw] bg-white z-50 shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between overflow-y-auto no-print">
    <div class="p-6">
      <div class="flex items-center justify-between pb-6 border-b border-slate-100">
        <img src="assets/images/logo.svg" alt="Replica Architects & Builders" class="h-8 w-auto">
        <button id="mobile-close-btn" class="p-2 text-slate-400 hover:text-slate-700" aria-label="Close Menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
      <nav class="mt-6 flex flex-col space-y-4 text-base font-semibold text-slate-800">
        <a href="index.php" class="hover:text-orange-600 py-1 transition-colors">Home</a>
        <a href="about.php" class="hover:text-orange-600 py-1 transition-colors">About Us</a>
        <a href="calculator.php" class="hover:text-orange-600 py-1 transition-colors text-orange-600 flex items-center justify-between">
          <span>Cost Calculator</span>
          <span class="bg-orange-100 text-orange-600 text-xs px-2 py-0.5 rounded-full font-bold">Free</span>
        </a>
        <a href="packages.php" class="hover:text-orange-600 py-1 transition-colors">Pricing & Packages</a>
        <a href="services.php" class="hover:text-orange-600 py-1 transition-colors">Services</a>
        <a href="projects.php" class="hover:text-orange-600 py-1 transition-colors">Projects</a>
        <a href="contact.php" class="hover:text-orange-600 py-1 transition-colors">Contact</a>
      </nav>
    </div>
    <div class="p-6 bg-slate-50 border-t border-slate-100 space-y-3">
      <a href="tel:+919994399933" class="flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-white border border-slate-200 text-sm font-bold text-slate-800 shadow-sm">
        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        <span>+91 99943 99933</span>
      </a>
      <a href="contact.php" class="flex items-center justify-center w-full py-3 rounded-xl bg-orange-600 text-white text-sm font-bold shadow-md hover:bg-orange-700 transition-colors">
        Book Free Site Inspection
      </a>
    </div>
  </aside>

  <!-- =========================================================================
       CALCULATOR HEADER & HERO
       ========================================================================= -->
  <section id="calc-container-top" class="bg-gradient-to-b from-slate-900 via-slate-900 to-slate-950 text-white py-12 sm:py-16 no-print relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ff5e14_1px,transparent_1px)] [background-size:24px_24px]"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative z-10">
      <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight">
        House Construction Cost Calculator &ndash; <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-amber-400">Calculate in 30 Seconds</span>
      </h1>
      <p class="text-slate-300 text-xs sm:text-sm max-w-xl mx-auto font-light leading-relaxed">
        Free house construction cost calculator for Pattukkottai and Tamil Nadu with 2026 rates. Phase-wise breakdown, material estimates and timeline &mdash; tailored to your plot, floors and finish level.
      </p>

      <!-- 4 Top Badges from Reference Screenshot -->
      <div class="flex flex-wrap items-center justify-center gap-6 pt-4 text-xs font-semibold">
        <div class="text-center">
          <div class="text-base sm:text-lg font-black text-white">₹1,999+</div>
          <div class="text-[10px] text-slate-400 uppercase tracking-wider">Per Sq.Ft Base</div>
        </div>
        <div class="h-6 w-px bg-slate-800 hidden sm:block"></div>
        <div class="text-center">
          <div class="text-base sm:text-lg font-black text-orange-400">10 Phases</div>
          <div class="text-[10px] text-slate-400 uppercase tracking-wider">Milestone Billing</div>
        </div>
        <div class="h-6 w-px bg-slate-800 hidden sm:block"></div>
        <div class="text-center">
          <div class="text-base sm:text-lg font-black text-white">4 Tiers</div>
          <div class="text-[10px] text-slate-400 uppercase tracking-wider">Basic to Luxury</div>
        </div>
        <div class="h-6 w-px bg-slate-800 hidden sm:block"></div>
        <div class="text-center">
          <div class="text-base sm:text-lg font-black text-emerald-400">Free Tool</div>
          <div class="text-[10px] text-slate-400 uppercase tracking-wider">Instant Detailed PDF</div>
        </div>
      </div>

      <!-- Step Progress Timeline Bar -->
      <div class="pt-8 max-w-xl mx-auto">
        <div class="flex items-center justify-between relative">
          <!-- Connector line -->
          <div class="absolute left-6 right-6 top-4.5 h-0.5 bg-slate-800 -z-0"></div>

          <!-- Step 1 -->
          <div class="wizard-node cursor-pointer flex flex-col items-center relative z-10" data-node="1">
            <div class="node-circle w-9 h-9 rounded-full bg-orange-600 text-white font-black text-sm flex items-center justify-center ring-4 ring-orange-100 shadow-md">1</div>
            <span class="node-label text-xs font-bold text-orange-600 mt-1.5 uppercase tracking-wider">Area</span>
          </div>

          <!-- Step 2 -->
          <div class="wizard-node cursor-pointer flex flex-col items-center relative z-10" data-node="2">
            <div class="node-circle w-9 h-9 rounded-full bg-slate-100 text-slate-400 font-semibold text-sm border-2 border-slate-200 flex items-center justify-center">2</div>
            <span class="node-label text-xs font-medium text-slate-400 mt-1.5 uppercase tracking-wider">Floors</span>
          </div>

          <!-- Step 3 -->
          <div class="wizard-node cursor-pointer flex flex-col items-center relative z-10" data-node="3">
            <div class="node-circle w-9 h-9 rounded-full bg-slate-100 text-slate-400 font-semibold text-sm border-2 border-slate-200 flex items-center justify-center">3</div>
            <span class="node-label text-xs font-medium text-slate-400 mt-1.5 uppercase tracking-wider">Package</span>
          </div>

          <!-- Step 4 -->
          <div class="wizard-node cursor-pointer flex flex-col items-center relative z-10" data-node="4">
            <div class="node-circle w-9 h-9 rounded-full bg-slate-100 text-slate-400 font-semibold text-sm border-2 border-slate-200 flex items-center justify-center">4</div>
            <span class="node-label text-xs font-medium text-slate-400 mt-1.5 uppercase tracking-wider">Extras</span>
          </div>

          <!-- Step 5 -->
          <div class="wizard-node cursor-pointer flex flex-col items-center relative z-10" data-node="5">
            <div class="node-circle w-9 h-9 rounded-full bg-slate-100 text-slate-400 font-semibold text-sm border-2 border-slate-200 flex items-center justify-center">5</div>
            <span class="node-label text-xs font-medium text-slate-400 mt-1.5 uppercase tracking-wider">Report</span>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- =========================================================================
       CALCULATOR INTERACTIVE WIZARD
       ========================================================================= -->
  <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

    <!-- ==================== STEP 1: PLOT & BUILT-UP AREA ==================== -->
    <div class="calc-wizard-step bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-200/80 space-y-8" data-step="1">
      <div class="border-b border-slate-100 pb-4">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider">Step 1 of 4</span>
        <h2 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">Enter your plot &amp; built-up area</h2>
        <p class="text-xs text-slate-500 mt-0.5">Accurate to within 5% of actual cost &bull; 2026 construction rates per floor</p>
      </div>

      <!-- Plot Area Input Group -->
      <div class="space-y-3">
        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
          Plot Area (sq ft)
        </label>
        <div class="relative">
          <input type="number" id="input-plot-area" value="800" min="200" max="10000" class="w-full text-2xl sm:text-3xl font-black text-slate-900 px-4 py-3.5 rounded-2xl border-2 border-slate-200 bg-slate-50 focus:bg-white focus:border-orange-500 focus:outline-none transition-all">
          <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm font-bold text-slate-400">sq.ft</span>
        </div>

        <!-- Presets -->
        <div class="flex flex-wrap gap-2">
          <button type="button" class="plot-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="600">600 sqft</button>
          <button type="button" class="plot-preset-btn px-3 py-1.5 rounded-lg border border-orange-500 bg-orange-50 text-xs font-bold text-orange-600" data-val="800">800 sqft</button>
          <button type="button" class="plot-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="1200">1200 sqft</button>
          <button type="button" class="plot-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="1500">1500 sqft</button>
          <button type="button" class="plot-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="2400">2400 sqft (1 Ground)</button>
        </div>

        <!-- Unit Conversions -->
        <div class="grid grid-cols-3 gap-3 pt-2 text-xs">
          <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Square Feet</span>
            <strong class="disp-plot-sqft text-slate-900 font-bold">800 sqft</strong>
          </div>
          <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Square Yards</span>
            <strong class="disp-plot-gaj text-slate-900 font-bold">88.9 gaj</strong>
          </div>
          <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Tamil Nadu Cents</span>
            <strong class="disp-plot-cents text-slate-900 font-bold">1.837 cents</strong>
          </div>
        </div>
      </div>

      <!-- Built-up Area per floor Input Group -->
      <div class="pt-6 border-t border-slate-100 space-y-3">
        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
          Built-up area per floor [sq. ft]
        </label>
        <div class="relative">
          <input type="number" id="input-builtup-floor" value="800" min="200" max="6000" class="w-full text-2xl sm:text-3xl font-black text-slate-900 px-4 py-3.5 rounded-2xl border-2 border-slate-200 bg-slate-50 focus:bg-white focus:border-orange-500 focus:outline-none transition-all">
          <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm font-bold text-slate-400">sq.ft / floor</span>
        </div>

        <!-- Presets -->
        <div class="flex flex-wrap gap-2">
          <button type="button" class="builtup-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="600">600 sqft</button>
          <button type="button" class="builtup-preset-btn px-3 py-1.5 rounded-lg border border-orange-500 bg-orange-50 text-xs font-bold text-orange-600" data-val="800">800 sqft</button>
          <button type="button" class="builtup-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="1000">1000 sqft</button>
          <button type="button" class="builtup-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="1500">1500 sqft</button>
          <button type="button" class="builtup-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="2000">2000 sqft</button>
          <button type="button" class="builtup-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="2400">2400 sqft</button>
        </div>

        <!-- Conversions & FAR -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2 text-xs">
          <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Floor Area</span>
            <strong class="disp-builtup-sqft text-slate-900 font-bold">800 sqft</strong>
          </div>
          <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Gaj Equivalent</span>
            <strong class="disp-builtup-gaj text-slate-900 font-bold">88.9 gaj</strong>
          </div>
          <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">FAR Ratio</span>
            <strong class="disp-far text-orange-600 font-bold">1.00</strong>
          </div>
          <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Plot Coverage</span>
            <strong class="disp-coverage text-slate-900 font-bold">100%</strong>
          </div>
        </div>
      </div>

      <!-- Car Parking Area Input Group -->
      <div class="pt-6 border-t border-slate-100 space-y-3">
        <div class="flex items-center justify-between">
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">
            Car Parking Area (sq ft)
          </label>
          <span class="disp-parking-rate text-xs font-bold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-full border border-orange-200">
            CAR PARKING RATE: ₹2,350/sqft (Premium)
          </span>
        </div>

        <div class="relative">
          <input type="number" id="input-parking-area" value="200" min="0" max="1000" class="w-full text-2xl sm:text-3xl font-black text-slate-900 px-4 py-3.5 rounded-2xl border-2 border-slate-200 bg-slate-50 focus:bg-white focus:border-orange-500 focus:outline-none transition-all">
          <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm font-bold text-slate-400">sq.ft</span>
        </div>

        <!-- Presets -->
        <div class="flex flex-wrap gap-2">
          <button type="button" class="parking-preset-btn px-3 py-1.5 rounded-lg border border-orange-500 bg-orange-50 text-xs font-bold text-orange-600" data-val="200">1 car (200 sqft)</button>
          <button type="button" class="parking-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="400">2 cars (400 sqft)</button>
          <button type="button" class="parking-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="600">3 cars (600 sqft)</button>
          <button type="button" class="parking-preset-btn px-3 py-1.5 rounded-lg border border-slate-200 bg-slate-50 text-xs font-bold text-slate-700 hover:border-orange-500 hover:text-orange-600" data-val="800">4 cars (800 sqft)</button>
        </div>

        <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs text-slate-600 font-medium">
          <span class="disp-parking-calc font-bold text-slate-900">200 sqft = ~1 car = ₹4.70 L</span> &middot; Stilt or ground covered parking bay
        </div>
      </div>

      <!-- Action Button -->
      <div class="pt-6 border-t border-slate-100 flex justify-end">
        <button type="button" class="btn-goto-step inline-flex items-center gap-2 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-bold text-sm px-8 py-4 rounded-xl shadow-lg transition-all" data-target-step="2">
          <span>Next &mdash; Choose Floors</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
      </div>
    </div>

    <!-- ==================== STEP 2: NUMBER OF FLOORS ==================== -->
    <div class="calc-wizard-step bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-200/80 space-y-8 hidden" data-step="2">
      <div class="border-b border-slate-100 pb-4">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider">Step 2 of 4</span>
        <h2 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">How many floors will you build?</h2>
        <p class="text-xs text-slate-500 mt-0.5">Each additional floor adds 4 months to the construction timeline.</p>
      </div>

      <!-- 4 Floors Cards Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Ground Only -->
        <div class="floor-card-opt cursor-pointer p-6 rounded-2xl border-2 border-slate-200 bg-white text-center flex flex-col items-center justify-between gap-4 transition-all" data-floor="1">
          <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center font-black text-2xl shadow-sm">
            G
          </div>
          <div>
            <div class="text-lg font-black text-slate-900">Ground Only</div>
            <div class="text-xs text-slate-500 mt-0.5">1 Floor Total</div>
            <div class="mt-3 inline-block bg-slate-100 text-slate-700 text-[11px] font-bold px-2.5 py-1 rounded-full">
              ~8 months est.
            </div>
          </div>
        </div>

        <!-- G+1 -->
        <div class="floor-card-opt cursor-pointer p-6 rounded-2xl border-2 border-slate-200 bg-white text-center flex flex-col items-center justify-between gap-4 transition-all" data-floor="2">
          <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center font-black text-2xl shadow-sm">
            G+1
          </div>
          <div>
            <div class="text-lg font-black text-slate-900">G + 1 Floor</div>
            <div class="text-xs text-slate-500 mt-0.5">2 Floors Total</div>
            <div class="mt-3 inline-block bg-slate-100 text-slate-700 text-[11px] font-bold px-2.5 py-1 rounded-full">
              ~12 months est.
            </div>
          </div>
        </div>

        <!-- G+2 -->
        <div class="floor-card-opt cursor-pointer p-6 rounded-2xl border-2 border-slate-200 bg-white text-center flex flex-col items-center justify-between gap-4 transition-all" data-floor="3">
          <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center font-black text-2xl shadow-sm">
            G+2
          </div>
          <div>
            <div class="text-lg font-black text-slate-900">G + 2 Floors</div>
            <div class="text-xs text-slate-500 mt-0.5">3 Floors Total</div>
            <div class="mt-3 inline-block bg-slate-100 text-slate-700 text-[11px] font-bold px-2.5 py-1 rounded-full">
              ~15 months est.
            </div>
          </div>
        </div>

        <!-- G+3 (Default Selected) -->
        <div class="floor-card-opt cursor-pointer p-6 rounded-2xl border-2 border-orange-500 bg-orange-50/60 ring-2 ring-orange-500/20 text-center flex flex-col items-center justify-between gap-4 transition-all" data-floor="4">
          <div class="w-16 h-16 rounded-2xl bg-orange-600 text-white flex items-center justify-center font-black text-2xl shadow-md">
            G+3
          </div>
          <div>
            <div class="text-lg font-black text-slate-900">G + 3 Floors</div>
            <div class="text-xs text-slate-500 mt-0.5">4 Floors Total</div>
            <div class="mt-3 inline-block bg-orange-100 text-orange-700 text-[11px] font-bold px-2.5 py-1 rounded-full">
              ~18 months est.
            </div>
          </div>
        </div>

      </div>

      <!-- Action Buttons -->
      <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
        <button type="button" class="btn-goto-step text-slate-600 hover:text-slate-900 font-bold text-sm px-5 py-3 rounded-xl border border-slate-200 transition-colors" data-target-step="1">
          &larr; Back
        </button>
        <button type="button" class="btn-goto-step inline-flex items-center gap-2 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-bold text-sm px-8 py-4 rounded-xl shadow-lg transition-all" data-target-step="3">
          <span>Next &mdash; Select Package</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
      </div>
    </div>

    <!-- ==================== STEP 3: SELECT PACKAGE ==================== -->
    <div class="calc-wizard-step bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-200/80 space-y-8 hidden" data-step="3">
      <div class="border-b border-slate-100 pb-4">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider">Step 3 of 4</span>
        <h2 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">Select your construction package</h2>
        <p class="text-xs text-slate-500 mt-0.5">Chennai 2026 rates. Includes all materials, labour &amp; site supervision.</p>
      </div>

      <!-- 4 Package Cards -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        
        <!-- Basic -->
        <div class="pkg-tier-opt cursor-pointer p-5 rounded-2xl border-2 border-slate-200 bg-white text-center flex flex-col justify-between transition-all" data-pkg="basic">
          <div class="space-y-1">
            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Budget-Friendly</span>
            <div class="text-lg font-black text-slate-900">Basic</div>
            <div class="text-sm font-extrabold text-sky-600">₹1,999 <span class="text-[10px] font-normal text-slate-500">/ sqft</span></div>
          </div>
        </div>

        <!-- Standard -->
        <div class="pkg-tier-opt cursor-pointer p-5 rounded-2xl border-2 border-slate-200 bg-white text-center flex flex-col justify-between transition-all" data-pkg="standard">
          <div class="space-y-1">
            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Standard</span>
            <div class="text-lg font-black text-slate-900">Standard</div>
            <div class="text-sm font-extrabold text-emerald-600">₹2,299 <span class="text-[10px] font-normal text-slate-500">/ sqft</span></div>
          </div>
        </div>

        <!-- Premium (Default) -->
        <div class="pkg-tier-opt cursor-pointer p-5 rounded-2xl border-2 border-orange-500 bg-orange-50/50 ring-2 ring-orange-500/20 text-center flex flex-col justify-between transition-all relative" data-pkg="premium">
          <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-orange-600 text-white text-[10px] font-black uppercase px-2.5 py-0.5 rounded-full shadow">BEST VALUE</div>
          <div class="space-y-1">
            <span class="text-[10px] uppercase font-bold text-orange-600 tracking-wider">Recommended</span>
            <div class="text-lg font-black text-slate-900">Premium</div>
            <div class="text-sm font-extrabold text-orange-600">₹2,649 <span class="text-[10px] font-normal text-slate-500">/ sqft</span></div>
          </div>
        </div>

        <!-- Luxury -->
        <div class="pkg-tier-opt cursor-pointer p-5 rounded-2xl border-2 border-slate-200 bg-white text-center flex flex-col justify-between transition-all" data-pkg="luxury">
          <div class="space-y-1">
            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Top Tier</span>
            <div class="text-lg font-black text-slate-900">Luxury</div>
            <div class="text-sm font-extrabold text-purple-600">₹2,999 <span class="text-[10px] font-normal text-slate-500">/ sqft</span></div>
          </div>
        </div>

      </div>

      <!-- Interactive Package Detail Card with Tabs (from Reference Screenshot) -->
      <div class="rounded-3xl border border-slate-200 overflow-hidden shadow-sm flex flex-col md:flex-row">
        
        <!-- Left Orange Brand Box -->
        <div class="bg-gradient-to-br from-orange-600 to-amber-600 text-white p-8 md:w-64 flex-shrink-0 flex flex-col justify-between space-y-4">
          <div>
            <span class="inline-block bg-white/20 text-white text-[10px] font-black uppercase px-2.5 py-0.5 rounded-full mb-2">Package Details</span>
            <h3 id="active-pkg-title" class="text-2xl font-black">Premium</h3>
            <div id="active-pkg-price" class="text-3xl font-black mt-2">₹2,649</div>
            <div class="text-xs text-orange-100 font-light mt-0.5">per sq.ft built-up area</div>
          </div>
          <div class="text-[11px] text-orange-200 pt-4 border-t border-white/20">
            &bull; M20/M25 Concrete<br>
            &bull; Structural Drawings<br>
            &bull; Dedicated Site Engineer
          </div>
        </div>

        <!-- Right Specs Content with Sub-tabs -->
        <div class="p-6 md:p-8 flex-1 space-y-5 bg-white">
          <div class="flex items-center gap-2 border-b border-slate-100 pb-3">
            <button type="button" class="pkg-spec-tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-orange-600 text-white transition-colors" data-tab="structure">
              Structure
            </button>
            <button type="button" class="pkg-spec-tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors" data-tab="finishes">
              Finishes
            </button>
            <button type="button" class="pkg-spec-tab-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors" data-tab="fittings">
              Fittings
            </button>
          </div>

          <div id="pkg-specs-content">
            <!-- Rendered reactively via calculator.js -->
          </div>
        </div>

      </div>

      <!-- Action Buttons -->
      <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
        <button type="button" class="btn-goto-step text-slate-600 hover:text-slate-900 font-bold text-sm px-5 py-3 rounded-xl border border-slate-200 transition-colors" data-target-step="2">
          &larr; Back
        </button>
        <button type="button" class="btn-goto-step inline-flex items-center gap-2 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-bold text-sm px-8 py-4 rounded-xl shadow-lg transition-all" data-target-step="4">
          <span>Next &mdash; Add Extras</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
      </div>
    </div>

    <!-- ==================== STEP 4: ANY EXTRA REQUIREMENTS? ==================== -->
    <div class="calc-wizard-step bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-200/80 space-y-8 hidden" data-step="4">
      <div class="border-b border-slate-100 pb-4">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-wider">Step 4 of 4</span>
        <h2 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">Any extra requirements?</h2>
        <p class="text-xs text-slate-500 mt-0.5">Please add any optional add-ons to your baseline construction.</p>
      </div>

      <!-- Checkbox Grid (11 options from Reference Screenshot) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        
        <!-- Headroom -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="headroom" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Headroom (150 sq ft)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹3,50,000</div>
          </div>
        </label>

        <!-- Waste Water Recycling -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="wastewater" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Waste Water Recycling Tank</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹85,000</div>
          </div>
        </label>

        <!-- Overhead Tank -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="oht" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Overhead Concrete Tank (2,000 L)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹36,000</div>
          </div>
        </label>

        <!-- Compound Wall -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="compound" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Compound Wall (120 rft)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹2,16,000</div>
          </div>
        </label>

        <!-- Underground Sump -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="sump" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Underground Sump (6,000 L)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹1,32,000</div>
          </div>
        </label>

        <!-- Solar Panels -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="solar" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Solar Panels (1 kW system)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹75,000</div>
          </div>
        </label>

        <!-- Main Gate -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="gate" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Main Gate (MS / Sliding)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹65,000</div>
          </div>
        </label>

        <!-- CCTV -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="cctv" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">CCTV &amp; Security System (4 Cams)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹45,000</div>
          </div>
        </label>

        <!-- Smart Automation -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="automation" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Smart Home Automation Package</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹1,20,000</div>
          </div>
        </label>

        <!-- Septic Tank -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all">
          <input type="checkbox" value="septic" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Conventional Septic Tank (4,000 L)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹64,000</div>
          </div>
        </label>

        <!-- Lift -->
        <label class="p-4.5 rounded-2xl border border-slate-200 bg-white hover:border-orange-500 flex items-start gap-3 cursor-pointer transition-all sm:col-span-2">
          <input type="checkbox" value="lift" class="extra-cb-opt mt-1 w-4 h-4 rounded text-orange-600 focus:ring-orange-500">
          <div>
            <div class="text-sm font-bold text-slate-900">Passenger Lift (4 Passengers)</div>
            <div class="text-xs text-orange-600 font-bold">+ ₹4,50,000 &middot; Includes structural shaft frame &amp; automatic landing doors</div>
          </div>
        </label>

      </div>

      <!-- Action Buttons -->
      <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
        <button type="button" class="btn-goto-step text-slate-600 hover:text-slate-900 font-bold text-sm px-5 py-3 rounded-xl border border-slate-200 transition-colors" data-target-step="3">
          &larr; Back
        </button>
        <button type="button" class="btn-goto-step inline-flex items-center gap-2 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-bold text-sm px-9 py-4 rounded-xl shadow-xl transition-all" data-target-step="5">
          <span>&starf; Generate Full Report</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
      </div>
    </div>

    <!-- ==================== STEP 5: THE COMPLETE RESULT ESTIMATE REPORT ==================== -->
    <!-- Matches the exact 3-page PDF screenshot! -->
    <div class="calc-wizard-step bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-slate-200 space-y-10 hidden print:p-0 print:border-none print:shadow-none" data-step="5" id="printable-estimate-report">
      
      <!-- Report Header -->
      <div class="border-b-2 border-orange-500 pb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div class="flex items-center gap-4">
          <img src="assets/images/logo.svg" alt="Replica Architects & Builders Logo" class="h-12 w-auto">
          <div>
            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest">Replica Architects &amp; Builders</h2>
            <p class="text-xs font-semibold text-slate-600">Pattukkottai, Tamil Nadu – 614601</p>
          </div>
        </div>
        <div class="text-left sm:text-right">
          <div class="text-xs font-black uppercase text-orange-600 tracking-wider">CONSTRUCTION COST ESTIMATE</div>
          <div class="text-xs text-slate-500 font-medium mt-0.5"><span class="dynamic-year">2026</span> Estimate Edition</div>
        </div>
      </div>

      <!-- Top Cost Display Card -->
      <div class="bg-gradient-to-br from-slate-900 to-slate-950 text-white rounded-3xl p-8 shadow-xl relative overflow-hidden">
        <div class="absolute right-0 top-0 w-80 h-80 bg-orange-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="space-y-2 relative z-10">
          <span class="inline-block bg-orange-600 text-white text-[10px] font-black uppercase tracking-wider px-3 py-1 rounded-full">
            TOTAL ESTIMATED CONSTRUCTION COST &ndash; 2026 EDITION
          </span>
          <div id="report-grand-total" class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white py-2">
            ₹84,76,800
          </div>
        </div>

        <!-- 4 KPI Pills -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-6 border-t border-slate-800 relative z-10 text-xs">
          <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Base Unit Rate</span>
            <strong id="report-base-rate" class="text-base font-black text-orange-400">₹2,649/sqft</strong>
          </div>
          <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Total Built-up Area</span>
            <strong id="report-builtup-area" class="text-base font-black text-white">3,200 sqft</strong>
          </div>
          <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Plot Area</span>
            <strong id="report-plot-area" class="text-base font-black text-white">800 sqft</strong>
          </div>
          <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10">
            <span class="text-slate-400 block text-[10px] uppercase font-bold">Configuration</span>
            <strong id="report-config-name" class="text-base font-black text-emerald-400">G+3 (4 Floors)</strong>
          </div>
        </div>
      </div>

      <!-- Construction Duration Bar -->
      <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-3">
        <div class="flex items-center justify-between">
          <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Estimated Construction Duration</span>
          <strong id="report-duration-text" class="text-base font-black text-slate-900">18 months</strong>
        </div>
        <!-- Timeline Bar -->
        <div class="relative pt-2">
          <div class="h-3 w-full rounded-full bg-gradient-to-r from-teal-400 via-amber-400 to-orange-500 shadow-inner"></div>
          <div class="flex justify-between text-[10px] font-bold text-slate-400 mt-1.5">
            <span>0m</span>
            <span>4m</span>
            <span>8m</span>
            <span>12m</span>
            <span>16m</span>
            <span>20m</span>
            <span>24m</span>
          </div>
        </div>
      </div>

      <!-- Breakdown Information Blocks -->
      <div class="space-y-6 text-xs text-slate-600 leading-relaxed">
        
        <div>
          <span class="font-bold text-slate-900 uppercase tracking-wider block mb-1">PLOT LOCATION &amp; REGION</span>
          <p>Location: Pattukkottai / Thanjavur / Tamil Nadu (DTCP &amp; Municipal Jurisdiction)</p>
        </div>

        <div class="pt-4 border-t border-slate-100">
          <span class="font-bold text-slate-900 uppercase tracking-wider block mb-1">FLOOR-WISE COST</span>
          <p id="report-floorwise-text">
            Ground floor: <strong>₹33.91 L</strong> &mdash; Includes the foundation and plinth share (20% of the package) | First floor: <strong>₹16.95 L</strong> | Second floor: <strong>₹16.95 L</strong> | Third floor: <strong>₹16.95 L</strong>
          </p>
        </div>

        <div class="pt-4 border-t border-slate-100">
          <span class="font-bold text-slate-900 uppercase tracking-wider block mb-1">ESTIMATED MATERIAL QUANTITIES</span>
          <p id="report-material-text">
            For 3,200 sq ft: Cement 1,280-1,440 bags; Steel 11,200-12,800 kg; M-sand 5,760-6,400 cft; Aggregate 3,840-4,480 cft; Bricks (or AAC equivalent) 57,600-64,000 nos
          </p>
        </div>

        <div class="pt-4 border-t border-slate-100">
          <span class="font-bold text-slate-900 uppercase tracking-wider block mb-1">PACKAGE SPECS</span>
          <p id="report-pkg-specs">
            Premium (₹2,649/sq ft): ISI-certified steel &amp; cement, M20 RCC, Dr. Fixit waterproofing, UPVC windows, Rainwater harvesting, 10 ft ceilings, Granite staircase, Soil testing included
          </p>
        </div>

        <div class="pt-4 border-t border-slate-100">
          <span class="font-bold text-slate-900 uppercase tracking-wider block mb-1">OPTIONAL EXTRAS</span>
          <p id="report-extras-summary">None</p>
        </div>

      </div>

      <!-- 4 Financial Summary Cards -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        
        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200">
          <span class="text-slate-400 block text-[10px] uppercase font-bold">Base Cost</span>
          <div id="rep-base-cost" class="text-xl font-black text-slate-900 mt-1">₹84.77 L</div>
          <div class="text-[10px] text-slate-500 mt-0.5">Core structure &amp; finishes</div>
        </div>

        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200">
          <span class="text-slate-400 block text-[10px] uppercase font-bold">Add-ons</span>
          <div id="rep-addons-cost" class="text-xl font-black text-slate-900 mt-1">₹0</div>
          <div class="text-[10px] text-slate-500 mt-0.5">Custom chosen extras</div>
        </div>

        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200">
          <span class="text-slate-400 block text-[10px] uppercase font-bold">EMI @ 7.1%, 20YR</span>
          <div id="rep-emi-cost" class="text-xl font-black text-slate-900 mt-1">₹66,230/mo</div>
          <div class="text-[10px] text-slate-500 mt-0.5">Bank home loan estimate</div>
        </div>

        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200">
          <span class="text-slate-400 block text-[10px] uppercase font-bold">Monthly Outflow</span>
          <div id="rep-outflow-cost" class="text-xl font-black text-slate-900 mt-1">₹4.71 L/mo</div>
          <div id="rep-outflow-sub" class="text-[10px] text-slate-500 mt-0.5">over 18 months</div>
        </div>

      </div>

      <!-- Cost Distribution By Phase (From PDF Page 1 & 2) -->
      <div class="space-y-4">
        <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider">COST DISTRIBUTION BY PHASE</h3>
        
        <!-- Multi-color distribution bar -->
        <div id="report-phases-bar" class="w-full flex rounded-full overflow-hidden shadow-inner h-4">
          <!-- Rendered dynamically via calculator.js -->
        </div>

        <!-- Complete 10 Phases Table -->
        <div class="overflow-x-auto rounded-2xl border border-slate-200">
          <table class="w-full text-left border-collapse text-xs sm:text-sm">
            <thead>
              <tr class="bg-slate-50 text-slate-600 uppercase tracking-wider text-[11px] font-bold border-b border-slate-200">
                <th class="py-3 px-4">CONSTRUCTION ITEM</th>
                <th class="py-3 px-4 text-center">% SHARE</th>
                <th class="py-3 px-4 text-right">ESTIMATED AMOUNT</th>
              </tr>
            </thead>
            <tbody id="report-phases-table" class="divide-y divide-slate-100">
              <!-- Rendered reactively via calculator.js -->
            </tbody>
          </table>
        </div>
      </div>

      <!-- All Packages Side-by-Side Comparison (From PDF Page 2) -->
      <div class="space-y-6 pt-4 border-t border-slate-200">
        <h3 class="text-base font-extrabold text-slate-900 uppercase tracking-wider">ALL PACKAGES &mdash; SIDE BY SIDE</h3>
        
        <div id="report-packages-compare" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <!-- Rendered reactively via calculator.js -->
        </div>
      </div>

      <!-- Disclaimer Box (From PDF Page 3) -->
      <div class="p-5 rounded-2xl bg-amber-50/70 border border-amber-200 text-xs text-amber-900 space-y-1">
        <strong class="font-bold flex items-center gap-1.5 text-amber-800">
          <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
          DISCLAIMER
        </strong>
        <p class="leading-relaxed font-light">
          All figures are approximate estimates for Chennai metro (2026). Actual costs depend on site conditions, soil type, material price fluctuations and contractor negotiations. Government approval charges, architect fees, EB/water connection charges and interior furnishing are excluded. (*) Sump and overhead tank rates vary by selected package.
        </p>
      </div>

      <!-- Report Footer Note -->
      <div class="text-center text-[11px] text-slate-400 pt-2 border-t border-slate-100">
        Replica Architects & Builders &middot; clientname.com &middot; Estimate only &mdash; actual costs vary &middot; 15-Year Structural Warranty
      </div>

      <!-- Report Action Buttons -->
      <div class="flex flex-wrap items-center justify-between gap-4 pt-4 no-print border-t border-slate-100">
        <button type="button" class="btn-goto-step text-slate-600 hover:text-slate-900 font-bold text-sm px-6 py-3.5 rounded-xl border border-slate-200 transition-colors" data-target-step="1">
          &larr; Modify Inputs
        </button>

        <div class="flex flex-wrap items-center gap-3">
          <button type="button" id="btn-print-report" class="inline-flex items-center gap-2 bg-slate-900 hover:bg-black text-white font-bold text-sm px-6 py-3.5 rounded-xl shadow-md transition-all">
            <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            <span>Print / Save PDF</span>
          </button>
          <a href="contact.php" class="inline-flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white font-bold text-sm px-7 py-3.5 rounded-xl shadow-lg transition-all">
            <span>Book Site Inspection &rarr;</span>
          </a>
        </div>
      </div>

    </div>

  </main>

  <!-- =========================================================================
       FOOTER
       ========================================================================= -->
  <footer class="bg-slate-950 text-slate-400 text-sm py-16 mt-16 no-print">
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
  <a href="https://wa.me/919994399933" target="_blank" rel="noopener" id="whatsapp-bubble" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center transition-all transform hover:scale-110 no-print" aria-label="Chat with Replica Architects & Builders on WhatsApp">
    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.523 5.855L.057 23.617a.75.75 0 00.921.921l5.79-1.479A11.943 11.943 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.893 0-3.67-.513-5.193-1.408l-.371-.22-3.841.981.999-3.808-.242-.387A9.961 9.961 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
  </a>

  <script src="assets/js/main.js"></script>
  <script src="assets/js/calculator.js"></script>
</body>
</html>
