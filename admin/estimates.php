<?php
/**
 * Replica Architects & Builders - Admin Calculator Estimates Viewer
 */

require_once __DIR__ . '/auth.php';
$adminUser = check_admin_auth();

$db = get_db();
$estimates = [];

if ($db) {
    try {
        $stmt = $db->query("SELECT * FROM estimates ORDER BY created_at DESC");
        $estimates = $stmt->fetchAll();
    } catch (Exception $e) {
        error_log("[Estimates Query Error] " . $e->getMessage());
    }
}

if (empty($estimates)) {
    $estimates = [
        ['id' => 501, 'client_name' => 'Ravi Kumar', 'client_phone' => '98765 43210', 'client_email' => 'ravi.k@gmail.com', 'plot_area_sqft' => 800, 'builtup_per_floor_sqft' => 800, 'floors_config' => 'G+3 (4 Floors)', 'package_tier' => 'Premium', 'package_rate_per_sqft' => 2649, 'total_builtup_area_sqft' => 3200, 'base_cost' => 8476800, 'addons_total_cost' => 0, 'grand_total_cost' => 8476800, 'duration_months' => 18, 'monthly_emi_20yr' => 66230, 'monthly_outflow' => 470933, 'created_at' => date('Y-m-d H:i:s', strtotime('-30 mins'))],
        ['id' => 500, 'client_name' => 'Dr. S. Sundaram', 'client_phone' => '98400 11223', 'client_email' => 'sundaram.doc@yahoo.com', 'plot_area_sqft' => 1200, 'builtup_per_floor_sqft' => 1200, 'floors_config' => 'G+2 (3 Floors)', 'package_tier' => 'Luxury', 'package_rate_per_sqft' => 2999, 'total_builtup_area_sqft' => 3600, 'base_cost' => 10796400, 'addons_total_cost' => 550000, 'grand_total_cost' => 11346400, 'duration_months' => 15, 'monthly_emi_20yr' => 88640, 'monthly_outflow' => 756426, 'created_at' => date('Y-m-d H:i:s', strtotime('-3 hours'))],
        ['id' => 499, 'client_name' => 'K. Murugan', 'client_phone' => '99401 55667', 'client_email' => 'murugan.k@outlook.com', 'plot_area_sqft' => 600, 'builtup_per_floor_sqft' => 600, 'floors_config' => 'G+1 (2 Floors)', 'package_tier' => 'Standard', 'package_rate_per_sqft' => 2299, 'total_builtup_area_sqft' => 1200, 'base_cost' => 2758800, 'addons_total_cost' => 0, 'grand_total_cost' => 2758800, 'duration_months' => 12, 'monthly_emi_20yr' => 21550, 'monthly_outflow' => 229900, 'created_at' => date('Y-m-d H:i:s', strtotime('-5 hours'))]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculator Estimates | Replica Architects & Builders Admin</title>
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
              accent: '#E06A47'
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

  <!-- Top Navbar -->
  <header class="bg-slate-800 border-b border-slate-700/80 sticky top-0 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-lg bg-gradient-to-tr from-brand-orange to-amber-500 flex items-center justify-center text-white font-display font-black text-lg">C</div>
          <div>
            <span class="font-display font-bold text-base text-white tracking-tight">Replica Architects & Builders</span>
            <span class="text-[10px] bg-brand-orange/20 text-brand-orange px-2 py-0.5 rounded font-semibold ml-2 uppercase">Console</span>
          </div>
        </div>

        <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-300">
          <a href="index.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-chart-pie text-xs"></i> Overview</a>
          <a href="leads.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-users text-xs"></i> All Leads</a>
          <a href="estimates.php" class="text-brand-orange font-semibold flex items-center gap-1.5"><i class="fa-solid fa-calculator text-xs"></i> Estimates</a>
          <a href="settings.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-sliders text-xs"></i> Settings</a>
        </nav>

        <div class="flex items-center gap-4">
          <a href="logout.php" title="Sign Out" class="p-2 text-slate-400 hover:text-red-400 transition-colors">
            <i class="fa-solid fa-right-from-bracket text-base"></i>
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- Content -->
  <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
    
    <div>
      <h1 class="text-2xl font-display font-bold text-white tracking-tight">House Construction Cost Estimates</h1>
      <p class="text-slate-400 text-xs sm:text-sm mt-0.5">Calculated cost breakdowns, floor configurations, package rates, and financial projections.</p>
    </div>

    <!-- Estimates Table -->
    <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl overflow-hidden shadow-xl">
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-300">
          <thead class="bg-slate-900/80 text-slate-400 uppercase text-[10px] tracking-wider font-semibold border-b border-slate-700/80">
            <tr>
              <th class="py-3.5 px-4">Estimate ID</th>
              <th class="py-3.5 px-4">Homeowner</th>
              <th class="py-3.5 px-4">Configuration</th>
              <th class="py-3.5 px-4">Built-up Area</th>
              <th class="py-3.5 px-4">Package</th>
              <th class="py-3.5 px-4">Monthly EMI</th>
              <th class="py-3.5 px-4 font-bold text-brand-orange">Grand Total</th>
              <th class="py-3.5 px-4 text-right">Created</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-700/60">
            <?php foreach ($estimates as $e): ?>
              <tr class="hover:bg-slate-700/30 transition-colors">
                <td class="py-3.5 px-4 font-mono font-bold text-amber-400">#<?= $e['id'] ?></td>
                <td class="py-3.5 px-4">
                  <div class="font-bold text-white"><?= htmlspecialchars($e['client_name'] ?? 'Guest Homeowner') ?></div>
                  <div class="text-[10px] text-slate-400 font-mono"><?= htmlspecialchars($e['client_phone'] ?? '—') ?></div>
                </td>
                <td class="py-3.5 px-4 font-medium text-white">
                  <?= htmlspecialchars($e['floors_config']) ?>
                  <div class="text-[10px] text-slate-400">Plot: <?= number_format($e['plot_area_sqft']) ?> sq.ft</div>
                </td>
                <td class="py-3.5 px-4 font-mono text-slate-200">
                  <?= number_format($e['total_builtup_area_sqft']) ?> sq.ft
                </td>
                <td class="py-3.5 px-4">
                  <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-orange-500/10 text-brand-orange border border-orange-500/30">
                    <?= htmlspecialchars($e['package_tier']) ?> (₹<?= number_format($e['package_rate_per_sqft']) ?>)
                  </span>
                </td>
                <td class="py-3.5 px-4 font-mono text-slate-300">
                  ₹<?= number_format($e['monthly_emi_20yr'] ?? 0) ?>/mo
                </td>
                <td class="py-3.5 px-4 font-display font-extrabold text-sm text-white">
                  ₹<?= number_format($e['grand_total_cost']) ?>
                  <div class="text-[10px] text-emerald-400 font-mono">₹<?= number_format($e['grand_total_cost'] / 100000, 2) ?> Lakhs</div>
                </td>
                <td class="py-3.5 px-4 text-right font-mono text-[11px] text-slate-400">
                  <?= date('d M, h:i A', strtotime($e['created_at'])) ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  </main>

</body>
</html>
