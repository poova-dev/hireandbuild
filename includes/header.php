<?php
/**
 * HireAndBuild - Header Template
 * Modular <head>, SEO meta, fonts, Tailwind CSS CDN & top announcement bar
 */

require_once __DIR__ . '/functions.php';

$pageTitle = $pageTitle ?? "Architecture & House Construction in Pattukkottai | Replica Architects & Builders";
$pageDescription = $pageDescription ?? "Replica Architects & Builders (RAB) — premier architecture, turnkey construction, and interior design firm in Pattukkottai, Tamil Nadu. Er. Vikash Quaid & Ar. Sanjana. 15-year warranty, zero cost escalation.";
$canonicalUrl = $canonicalUrl ?? site_url();
$currentPage = $currentPage ?? 'home';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
  <meta property="og:site_name" content="<?= SITE_NAME ?>">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription) ?>">

  <!-- Fonts: Poppins (headings) & Inter (body) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

  <!-- Tailwind CSS Play CDN -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            brand: {
              50: '#fff7ed',
              100: '#ffedd5',
              200: '#fed7aa',
              300: '#fdba74',
              400: '#fb923c',
              500: '#f97316',
              600: '#ea580c',
              DEFAULT: '#E85D04',
              700: '#c2410c',
              800: '#9a3412',
              900: '#7c2d12',
              dark: '#161311',
              charcoal: '#1E232A'
            },
            accent: {
              amber: '#F59E0B',
              slate: '#334155'
            }
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            heading: ['Poppins', 'sans-serif']
          }
        }
      }
    }
  </script>

  <style>
    /* Custom marquee ticker animation */
    @keyframes ticker {
      0% { transform: translate3d(0, 0, 0); }
      100% { transform: translate3d(-50%, 0, 0); }
    }
    .animate-marquee {
      display: inline-flex;
      white-space: nowrap;
      animation: ticker 35s linear infinite;
    }
    .animate-marquee:hover {
      animation-play-state: paused;
    }
    /* Smooth transitions */
    .dropdown-menu {
      transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
    }
    /* Custom input focus ring */
    .focus-brand:focus {
      outline: none;
      border-color: #E85D04;
      box-shadow: 0 0 0 3px rgba(232, 93, 4, 0.15);
    }
  </style>

  <!-- Structured Data / JSON-LD -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "HomeAndConstructionBusiness",
    "name": "Replica Architects & Builders",
    "image": "<?= site_url('assets/images/client-logo.jpg') ?>",
    "telephone": "<?= SITE_PHONE ?>",
    "email": "<?= SITE_EMAIL ?>",
    "priceRange": "₹1,999/sq.ft",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "116/A, Big Street",
      "addressLocality": "Pattukkottai",
      "addressRegion": "Tamil Nadu",
      "postalCode": "614601",
      "addressCountry": "IN"
    },
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      "opens": "10:00",
      "closes": "19:00"
    }
  }
  </script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased selection:bg-brand selection:text-white flex flex-col min-h-screen">

  <!-- Top Announcement Bar (Live Source Matches) -->
  <div class="bg-brand-dark text-slate-200 py-2 border-b border-white/10 text-xs overflow-hidden select-none">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">
      <!-- Announcement Ticker -->
      <div class="overflow-hidden relative flex-1 mr-4 hidden sm:block">
        <div class="animate-marquee flex items-center gap-6 text-slate-300 font-medium">
          <span class="inline-flex items-center gap-1.5"><strong class="text-white font-semibold">400+</strong> homes delivered in Chennai</span>
          <span class="text-brand">•</span>
          <span class="inline-flex items-center gap-1.5"><strong class="text-white font-semibold">75+</strong> projects currently under construction</span>
          <span class="text-brand">•</span>
          <span class="inline-flex items-center gap-1.5">Packages from <strong class="text-brand-400 font-semibold">₹1,999 / sq.ft</strong></span>
          <span class="text-brand">•</span>
          <span>ISI-certified steel & cement · M20 RCC</span>
          <span class="text-brand">•</span>
          <span>In-house architects & structural engineers</span>
          <span class="text-brand">•</span>
          <span>CMDA / DTCP plan approval handled for you</span>
          <span class="text-brand">•</span>
          <span>Turnkey — design to handover</span>
          <span class="text-brand">•</span>
          <!-- Duplicate for seamless loop -->
          <span class="inline-flex items-center gap-1.5"><strong class="text-white font-semibold">400+</strong> homes delivered in Chennai</span>
          <span class="text-brand">•</span>
          <span class="inline-flex items-center gap-1.5"><strong class="text-white font-semibold">75+</strong> projects currently under construction</span>
          <span class="text-brand">•</span>
          <span class="inline-flex items-center gap-1.5">Packages from <strong class="text-brand-400 font-semibold">₹1,999 / sq.ft</strong></span>
        </div>
      </div>

      <!-- Quick Contact Links -->
      <div class="flex items-center gap-5 shrink-0 ml-auto text-xs">
        <a href="tel:<?= SITE_PHONE_RAW ?>" class="inline-flex items-center gap-1.5 hover:text-brand-400 transition-colors">
          <svg class="w-3.5 h-3.5 text-brand" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          <span class="font-semibold text-white"><?= SITE_PHONE ?></span>
        </a>
        <a href="https://wa.me/<?= SITE_WHATSAPP ?>" target="_blank" rel="noopener" class="hidden md:inline-flex items-center gap-1 text-emerald-400 hover:text-emerald-300 transition-colors">
          <span>WhatsApp Chat</span>
        </a>
      </div>
    </div>
  </div>
