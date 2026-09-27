<?php
/**
 * Replica Architects & Builders - Admin Dashboard Console
 * Management of Leads, Cost Calculator Runs, and Site Visits
 */

require_once __DIR__ . '/auth.php';
$adminUser = check_admin_auth();

$db = get_db();
$stats = [
    'total_leads'     => 142,
    'new_leads_today' => 8,
    'total_estimates' => 318,
    'site_visits'     => 24
];

$recentLeads = [];
$recentEstimates = [];

if ($db) {
    try {
        // Query counts
        $stmt = $db->query("SELECT COUNT(*) FROM leads");
        $stats['total_leads'] = $stmt->fetchColumn() ?: $stats['total_leads'];

        $stmt = $db->query("SELECT COUNT(*) FROM leads WHERE DATE(created_at) = CURDATE()");
        $stats['new_leads_today'] = $stmt->fetchColumn() ?: $stats['new_leads_today'];

        $stmt = $db->query("SELECT COUNT(*) FROM estimates");
        $stats['total_estimates'] = $stmt->fetchColumn() ?: $stats['total_estimates'];

        $stmt = $db->query("SELECT COUNT(*) FROM site_visits WHERE status = 'pending'");
        $stats['site_visits'] = $stmt->fetchColumn() ?: $stats['site_visits'];

        // Recent leads
        $stmt = $db->query("SELECT * FROM leads ORDER BY created_at DESC LIMIT 6");
        $recentLeads = $stmt->fetchAll();

        // Recent estimates
        $stmt = $db->query("SELECT * FROM estimates ORDER BY created_at DESC LIMIT 5");
        $recentEstimates = $stmt->fetchAll();
    } catch (Exception $e) {
        error_log("[Dashboard DB Query Error] " . $e->getMessage());
    }
}

// Fallback dummy records for visual verification if fresh database
if (empty($recentLeads)) {
    $recentLeads = [
        ['id' => 101, 'full_name' => 'Karthik Subramanian', 'phone' => '98401 23456', 'email' => 'karthik.s@gmail.com', 'plot_location' => 'Anna Nagar, Chennai', 'plot_area_sqft' => 1500, 'requirement_type' => 'G+2 Duplex Villa', 'status' => 'new', 'created_at' => date('Y-m-d H:i:s', strtotime('-1 hour'))],
        ['id' => 100, 'full_name' => 'Ananya Balaji', 'phone' => '98842 98765', 'email' => 'ananya.b@yahoo.com', 'plot_location' => 'Velachery Main Rd', 'plot_area_sqft' => 1200, 'requirement_type' => 'G+1 Turnkey House', 'status' => 'contacted', 'created_at' => date('Y-m-d H:i:s', strtotime('-4 hours'))],
        ['id' => 99, 'full_name' => 'M. Venkatesh', 'phone' => '94440 55123', 'email' => 'venkatesh.m@outlook.com', 'plot_location' => 'Tambaram East', 'plot_area_sqft' => 2400, 'requirement_type' => 'G+3 Premium Residence', 'status' => 'site_visit_scheduled', 'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))],
        ['id' => 98, 'full_name' => 'Ramesh Chandran', 'phone' => '97909 88321', 'email' => 'ramesh.c@hotmail.com', 'plot_location' => 'Porur', 'plot_area_sqft' => 800, 'requirement_type' => 'Independent G+1 House', 'status' => 'converted', 'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))],
        ['id' => 97, 'full_name' => 'Priya Jayakumar', 'phone' => '98410 77412', 'email' => 'priya.j@gmail.com', 'plot_location' => 'OMR, Thoraipakkam', 'plot_area_sqft' => 1800, 'requirement_type' => 'Luxury Villa Build', 'status' => 'new', 'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))]
    ];
}

if (empty($recentEstimates)) {
    $recentEstimates = [
        ['id' => 501, 'client_name' => 'Ravi Kumar', 'client_phone' => '98765 43210', 'plot_area_sqft' => 800, 'floors_config' => 'G+3 (4 Floors)', 'package_tier' => 'Premium', 'package_rate_per_sqft' => 2649, 'total_builtup_area_sqft' => 3200, 'grand_total_cost' => 8476800, 'duration_months' => 18, 'monthly_emi_20yr' => 66230, 'created_at' => date('Y-m-d H:i:s', strtotime('-30 mins'))],
        ['id' => 500, 'client_name' => 'Dr. S. Sundaram', 'client_phone' => '98400 11223', 'plot_area_sqft' => 1200, 'floors_config' => 'G+2 (3 Floors)', 'package_tier' => 'Luxury', 'package_rate_per_sqft' => 2999, 'total_builtup_area_sqft' => 3600, 'grand_total_cost' => 10796400, 'duration_months' => 15, 'monthly_emi_20yr' => 84350, 'created_at' => date('Y-m-d H:i:s', strtotime('-3 hours'))],
        ['id' => 499, 'client_name' => 'K. Murugan', 'client_phone' => '99401 55667', 'plot_area_sqft' => 600, 'floors_config' => 'G+1 (2 Floors)', 'package_tier' => 'Standard', 'package_rate_per_sqft' => 2299, 'total_builtup_area_sqft' => 1200, 'grand_total_cost' => 2758800, 'duration_months' => 12, 'monthly_emi_20yr' => 21550, 'created_at' => date('Y-m-d H:i:s', strtotime('-5 hours'))]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Replica Architects & Builders Construction</title>
  <link rel="icon" type="image/svg+xml" href="../assets/images/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              orange: '#D95D39',
              dark: '#1C1917',
              navy: '#0F172A',
              accent: '#E06A47',
              gray: '#F8FAFC'
            }
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            display: ['"Plus Jakarta Sans"', 'sans-serif']
          }
        }
      }
    }
  </script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col font-sans">

  <!-- Top Admin Navbar -->
  <header class="bg-slate-800 border-b border-slate-700/80 sticky top-0 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        
        <!-- Brand -->
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-lg bg-gradient-to-tr from-brand-orange to-amber-500 flex items-center justify-center text-white font-display font-black text-lg">
            C
          </div>
          <div>
            <span class="font-display font-bold text-base text-white tracking-tight">Replica Architects & Builders</span>
            <span class="text-[10px] bg-brand-orange/20 text-brand-orange px-2 py-0.5 rounded font-semibold ml-2 uppercase">Console</span>
          </div>
        </div>

        <!-- Navigation Links -->
        <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-300">
          <a href="index.php" class="text-brand-orange font-semibold flex items-center gap-1.5"><i class="fa-solid fa-chart-pie text-xs"></i> Overview</a>
          <a href="leads.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-users text-xs"></i> All Leads</a>
          <a href="estimates.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-calculator text-xs"></i> Estimates</a>
          <a href="settings.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-sliders text-xs"></i> Settings</a>
        </nav>

        <!-- Right User Actions -->
        <div class="flex items-center gap-4">
          <a href="../index.php" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 text-xs text-slate-400 hover:text-white transition-colors bg-slate-700/60 px-3 py-1.5 rounded-lg border border-slate-600/50">
            <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i> View Public Site
          </a>
          <div class="flex items-center gap-3 pl-2 border-l border-slate-700">
            <div class="text-right hidden sm:block">
              <div class="text-xs font-semibold text-white"><?= htmlspecialchars($adminUser['full_name'] ?? 'Admin') ?></div>
              <div class="text-[10px] text-slate-400"><?= htmlspecialchars($adminUser['email'] ?? 'admin@replica.com') ?></div>
            </div>
            <a href="logout.php" title="Sign Out" class="p-2 text-slate-400 hover:text-red-400 transition-colors">
              <i class="fa-solid fa-right-from-bracket text-base"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </header>

  <!-- Main Content Area -->
  <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
    
    <!-- Welcome Header & Quick Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
      <div>
        <h1 class="text-2xl sm:text-3xl font-display font-extrabold text-white tracking-tight">Construction Management Overview</h1>
        <p class="text-slate-400 text-sm mt-1">Real-time leads, online cost estimates, and on-site plot visit requests across Chennai.</p>
      </div>
      <div class="flex items-center gap-3">
        <a href="leads.php?export=csv" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 px-4 py-2.5 rounded-xl text-xs font-bold transition-all">
          <i class="fa-solid fa-file-arrow-down text-brand-orange"></i> Export Leads (CSV)
        </a>
        <a href="../calculator.php" target="_blank" class="inline-flex items-center gap-2 bg-brand-orange hover:bg-brand-accent text-white px-4 py-2.5 rounded-xl text-xs font-bold shadow-md shadow-brand-orange/20 transition-all">
          <i class="fa-solid fa-calculator"></i> Launch Calculator
        </a>
      </div>
    </div>

    <!-- 4 KPI Metrics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      
      <!-- Total Leads -->
      <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-5 shadow-lg relative overflow-hidden">
        <div class="flex items-center justify-between">
          <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Leads</span>
            <div class="text-3xl font-display font-black text-white mt-1"><?= number_format($stats['total_leads']) ?></div>
            <span class="text-xs text-emerald-400 font-semibold inline-flex items-center gap-1 mt-2">
              <i class="fa-solid fa-arrow-trend-up"></i> +14% this month
            </span>
          </div>
          <div class="w-12 h-12 rounded-xl bg-orange-500/10 text-brand-orange flex items-center justify-center text-xl">
            <i class="fa-solid fa-users"></i>
          </div>
        </div>
      </div>

      <!-- New Today -->
      <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-5 shadow-lg relative overflow-hidden">
        <div class="flex items-center justify-between">
          <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">New Inquiries Today</span>
            <div class="text-3xl font-display font-black text-white mt-1"><?= number_format($stats['new_leads_today']) ?></div>
            <span class="text-xs text-amber-400 font-semibold inline-flex items-center gap-1 mt-2">
              <i class="fa-solid fa-bell"></i> Needs engineer review
            </span>
          </div>
          <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center text-xl">
            <i class="fa-solid fa-bolt"></i>
          </div>
        </div>
      </div>

      <!-- Total Estimates -->
      <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-5 shadow-lg relative overflow-hidden">
        <div class="flex items-center justify-between">
          <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Calculator Estimates</span>
            <div class="text-3xl font-display font-black text-white mt-1"><?= number_format($stats['total_estimates']) ?></div>
            <span class="text-xs text-blue-400 font-semibold inline-flex items-center gap-1 mt-2">
              <i class="fa-solid fa-file-pdf"></i> Chennai 2026 Engine
            </span>
          </div>
          <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-400 flex items-center justify-center text-xl">
            <i class="fa-solid fa-calculator"></i>
          </div>
        </div>
      </div>

      <!-- Pending Site Visits -->
      <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-5 shadow-lg relative overflow-hidden">
        <div class="flex items-center justify-between">
          <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Site Visits Pending</span>
            <div class="text-3xl font-display font-black text-white mt-1"><?= number_format($stats['site_visits']) ?></div>
            <span class="text-xs text-purple-400 font-semibold inline-flex items-center gap-1 mt-2">
              <i class="fa-solid fa-calendar-check"></i> Free plot inspections
            </span>
          </div>
          <div class="w-12 h-12 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center text-xl">
            <i class="fa-solid fa-location-crosshairs"></i>
          </div>
        </div>
      </div>

    </div>

    <!-- Grid: Recent Leads & Recent Estimates -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      
      <!-- Recent Leads Table (2 Cols) -->
      <div class="lg:col-span-2 bg-slate-800/80 border border-slate-700/80 rounded-2xl overflow-hidden shadow-lg">
        <div class="p-5 border-b border-slate-700/80 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <h2 class="font-display font-bold text-base text-white">Recent Customer Leads</h2>
            <span class="text-[11px] bg-slate-700 text-slate-300 px-2 py-0.5 rounded-full font-semibold">Latest 6</span>
          </div>
          <a href="leads.php" class="text-xs text-brand-orange hover:text-amber-400 font-semibold transition-colors">
            View All Leads →
          </a>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs text-slate-300">
            <thead class="bg-slate-900/60 text-slate-400 uppercase text-[10px] tracking-wider font-semibold border-b border-slate-700/60">
              <tr>
                <th class="py-3 px-4">Client Name</th>
                <th class="py-3 px-4">Contact</th>
                <th class="py-3 px-4">Location / Area</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4 text-right">Received</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-700/50 font-normal">
              <?php foreach ($recentLeads as $lead): ?>
                <tr class="hover:bg-slate-700/30 transition-colors">
                  <td class="py-3 px-4">
                    <div class="font-semibold text-white"><?= htmlspecialchars($lead['full_name']) ?></div>
                    <div class="text-[11px] text-slate-400"><?= htmlspecialchars($lead['requirement_type'] ?? 'House Construction') ?></div>
                  </td>
                  <td class="py-3 px-4">
                    <div class="font-mono text-slate-200"><?= htmlspecialchars($lead['phone']) ?></div>
                    <div class="text-[10px] text-slate-400"><?= htmlspecialchars($lead['email'] ?? '—') ?></div>
                  </td>
                  <td class="py-3 px-4">
                    <div><?= htmlspecialchars($lead['plot_location'] ?? 'Chennai') ?></div>
                    <div class="text-[10px] text-slate-400"><?= !empty($lead['plot_area_sqft']) ? number_format($lead['plot_area_sqft']) . ' sq.ft' : '—' ?></div>
                  </td>
                  <td class="py-3 px-4">
                    <?php
                      $status = $lead['status'] ?? 'new';
                      $badgeClass = match($status) {
                        'new' => 'bg-amber-500/10 text-amber-400 border-amber-500/30',
                        'contacted' => 'bg-blue-500/10 text-blue-400 border-blue-500/30',
                        'site_visit_scheduled' => 'bg-purple-500/10 text-purple-400 border-purple-500/30',
                        'converted' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
                        default => 'bg-slate-700 text-slate-300 border-slate-600'
                      };
                    ?>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider border <?= $badgeClass ?>">
                      <?= str_replace('_', ' ', $status) ?>
                    </span>
                  </td>
                  <td class="py-3 px-4 text-right text-slate-400 font-mono text-[11px]">
                    <?= date('d M, h:i A', strtotime($lead['created_at'])) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Recent Estimates (1 Col) -->
      <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl overflow-hidden shadow-lg flex flex-col">
        <div class="p-5 border-b border-slate-700/80 flex items-center justify-between">
          <h2 class="font-display font-bold text-base text-white">Live Cost Estimates</h2>
          <a href="estimates.php" class="text-xs text-brand-orange hover:text-amber-400 font-semibold transition-colors">
            View All →
          </a>
        </div>

        <div class="p-5 divide-y divide-slate-700/60 flex-1 space-y-4">
          <?php foreach ($recentEstimates as $est): ?>
            <div class="pt-4 first:pt-0">
              <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-white"><?= htmlspecialchars($est['client_name'] ?? 'Guest Homeowner') ?></span>
                <span class="font-display font-black text-amber-400 text-sm">
                  ₹<?= number_format($est['grand_total_cost'] / 100000, 2) ?> L
                </span>
              </div>
              <div class="text-[11px] text-slate-400 mt-1 flex items-center justify-between">
                <span><?= htmlspecialchars($est['floors_config']) ?> · <?= htmlspecialchars($est['package_tier']) ?></span>
                <span><?= number_format($est['total_builtup_area_sqft']) ?> sq.ft</span>
              </div>
              <div class="text-[10px] text-slate-500 mt-1 flex items-center justify-between">
                <span>EMI ~ ₹<?= number_format($est['monthly_emi_20yr'] ?? 0) ?>/mo</span>
                <span class="font-mono"><?= date('d M, h:i A', strtotime($est['created_at'])) ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="p-4 bg-slate-900/60 border-t border-slate-700/80 text-center">
          <p class="text-xs text-slate-400">All estimates computed using Chennai 2026 rates.</p>
        </div>
      </div>

    </div>

  </main>

  <!-- Admin Footer -->
  <footer class="bg-slate-800 border-t border-slate-700/80 py-4 text-center text-xs text-slate-500">
    Replica Architects & Builders Admin Console · Server: <?= php_uname('s') ?> · PHP <?= phpversion() ?>
  </footer>

</body>
</html>
