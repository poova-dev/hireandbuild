<?php
/**
 * [CLIENT NAME] - Admin Leads Management & CSV Export
 */

require_once __DIR__ . '/auth.php';
$adminUser = check_admin_auth();

$db = get_db();

// Handle Status Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_status') {
    $leadId = intval($_POST['lead_id'] ?? 0);
    $newStatus = trim($_POST['status'] ?? 'new');
    if ($db && $leadId > 0) {
        $stmt = $db->prepare("UPDATE leads SET status = :st, updated_at = NOW() WHERE id = :id");
        $stmt->execute([':st' => $newStatus, ':id' => $leadId]);
    }
    header("Location: leads.php?msg=updated");
    exit;
}

// Handle CSV Export
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="leads_' . date('Y-m-d_His') . '.csv"');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['ID', 'Full Name', 'Phone', 'Email', 'Location', 'Plot Area (sqft)', 'Requirement', 'Status', 'Date Received']);

    if ($db) {
        $stmt = $db->query("SELECT id, full_name, phone, email, plot_location, plot_area_sqft, requirement_type, status, created_at FROM leads ORDER BY id DESC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }
    } else {
        // Fallback demo rows
        fputcsv($output, [101, 'Karthik Subramanian', '9840123456', 'karthik.s@gmail.com', 'Anna Nagar, Chennai', 1500, 'G+2 Duplex Villa', 'new', date('Y-m-d H:i:s')]);
        fputcsv($output, [100, 'Ananya Balaji', '9884298765', 'ananya.b@yahoo.com', 'Velachery', 1200, 'G+1 Turnkey House', 'contacted', date('Y-m-d H:i:s')]);
    }
    fclose($output);
    exit;
}

// Fetch Leads with optional filtering
$filterStatus = trim($_GET['status'] ?? 'all');
$search = trim($_GET['search'] ?? '');
$leads = [];

if ($db) {
    try {
        $sql = "SELECT * FROM leads WHERE 1=1";
        $params = [];

        if ($filterStatus !== 'all' && !empty($filterStatus)) {
            $sql .= " AND status = :st";
            $params[':st'] = $filterStatus;
        }

        if (!empty($search)) {
            $sql .= " AND (full_name LIKE :srch OR phone LIKE :srch OR plot_location LIKE :srch OR email LIKE :srch)";
            $params[':srch'] = "%$search%";
        }

        $sql .= " ORDER BY created_at DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $leads = $stmt->fetchAll();
    } catch (Exception $e) {
        error_log("[Leads Query Error] " . $e->getMessage());
    }
}

// Dummy fallbacks if database table is empty
if (empty($leads)) {
    $leads = [
        ['id' => 101, 'full_name' => 'Karthik Subramanian', 'phone' => '98401 23456', 'email' => 'karthik.s@gmail.com', 'plot_location' => 'Anna Nagar, Chennai', 'plot_area_sqft' => 1500, 'requirement_type' => 'G+2 Duplex Villa', 'notes' => 'Looking for premium finishes, granite staircase, ready to start in 2 months.', 'status' => 'new', 'created_at' => date('Y-m-d H:i:s', strtotime('-1 hour'))],
        ['id' => 100, 'full_name' => 'Ananya Balaji', 'phone' => '98842 98765', 'email' => 'ananya.b@yahoo.com', 'plot_location' => 'Velachery Main Rd', 'plot_area_sqft' => 1200, 'requirement_type' => 'G+1 Turnkey House', 'notes' => 'Needs structural plan approval and soil test quotation.', 'status' => 'contacted', 'created_at' => date('Y-m-d H:i:s', strtotime('-4 hours'))],
        ['id' => 99, 'full_name' => 'M. Venkatesh', 'phone' => '94440 55123', 'email' => 'venkatesh.m@outlook.com', 'plot_location' => 'Tambaram East', 'plot_area_sqft' => 2400, 'requirement_type' => 'G+3 Premium Residence', 'notes' => 'Site inspection requested for upcoming Saturday.', 'status' => 'site_visit_scheduled', 'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))],
        ['id' => 98, 'full_name' => 'Ramesh Chandran', 'phone' => '97909 88321', 'email' => 'ramesh.c@hotmail.com', 'plot_location' => 'Porur', 'plot_area_sqft' => 800, 'requirement_type' => 'Independent G+1 House', 'notes' => 'Standard package finalized, agreement drafted.', 'status' => 'converted', 'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))],
        ['id' => 97, 'full_name' => 'Priya Jayakumar', 'phone' => '98410 77412', 'email' => 'priya.j@gmail.com', 'plot_location' => 'OMR, Thoraipakkam', 'plot_area_sqft' => 1800, 'requirement_type' => 'Luxury Villa Build', 'notes' => 'Requires home automation and rainwater harvesting sump.', 'status' => 'new', 'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Leads | [CLIENT NAME] Admin</title>
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
            <span class="font-display font-bold text-base text-white tracking-tight">[CLIENT NAME]</span>
            <span class="text-[10px] bg-brand-orange/20 text-brand-orange px-2 py-0.5 rounded font-semibold ml-2 uppercase">Console</span>
          </div>
        </div>

        <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-300">
          <a href="index.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-chart-pie text-xs"></i> Overview</a>
          <a href="leads.php" class="text-brand-orange font-semibold flex items-center gap-1.5"><i class="fa-solid fa-users text-xs"></i> All Leads</a>
          <a href="estimates.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-calculator text-xs"></i> Estimates</a>
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

  <!-- Leads Content -->
  <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
      <div>
        <h1 class="text-2xl font-display font-bold text-white tracking-tight">Customer Inquiries &amp; Leads</h1>
        <p class="text-slate-400 text-xs sm:text-sm mt-0.5">Manage customer inquiries received from all website forms and WhatsApp triggers.</p>
      </div>
      <a href="leads.php?export=csv" class="inline-flex items-center gap-2 bg-brand-orange hover:bg-brand-accent text-white px-4 py-2 rounded-xl text-xs font-bold shadow-md shadow-brand-orange/20 transition-all">
        <i class="fa-solid fa-file-arrow-down"></i> Export to CSV
      </a>
    </div>

    <!-- Filters & Search Bar -->
    <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-4 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="flex flex-wrap items-center gap-2 text-xs font-semibold">
        <a href="leads.php?status=all" class="px-3 py-1.5 rounded-lg <?= $filterStatus === 'all' ? 'bg-brand-orange text-white' : 'bg-slate-700 text-slate-300 hover:text-white' ?>">All (<?= count($leads) ?>)</a>
        <a href="leads.php?status=new" class="px-3 py-1.5 rounded-lg <?= $filterStatus === 'new' ? 'bg-amber-500 text-slate-900' : 'bg-slate-700 text-slate-300 hover:text-white' ?>">New</a>
        <a href="leads.php?status=contacted" class="px-3 py-1.5 rounded-lg <?= $filterStatus === 'contacted' ? 'bg-blue-500 text-white' : 'bg-slate-700 text-slate-300 hover:text-white' ?>">Contacted</a>
        <a href="leads.php?status=site_visit_scheduled" class="px-3 py-1.5 rounded-lg <?= $filterStatus === 'site_visit_scheduled' ? 'bg-purple-500 text-white' : 'bg-slate-700 text-slate-300 hover:text-white' ?>">Site Visit Scheduled</a>
        <a href="leads.php?status=converted" class="px-3 py-1.5 rounded-lg <?= $filterStatus === 'converted' ? 'bg-emerald-500 text-white' : 'bg-slate-700 text-slate-300 hover:text-white' ?>">Converted</a>
      </div>

      <form method="GET" action="leads.php" class="relative w-full sm:w-64">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400 pointer-events-none">
          <i class="fa-solid fa-magnifying-glass text-xs"></i>
        </span>
        <input 
          type="text" 
          name="search" 
          value="<?= htmlspecialchars($search) ?>"
          placeholder="Search name, phone, area..." 
          class="w-full pl-8 pr-4 py-1.5 bg-slate-900/90 border border-slate-700 rounded-xl text-xs text-white placeholder-slate-500 focus:outline-none focus:border-brand-orange">
      </form>
    </div>

    <!-- Leads Table -->
    <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl overflow-hidden shadow-xl">
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs text-slate-300">
          <thead class="bg-slate-900/80 text-slate-400 uppercase text-[10px] tracking-wider font-semibold border-b border-slate-700/80">
            <tr>
              <th class="py-3.5 px-4">Client</th>
              <th class="py-3.5 px-4">Contact</th>
              <th class="py-3.5 px-4">Plot &amp; Requirement</th>
              <th class="py-3.5 px-4">Notes</th>
              <th class="py-3.5 px-4">Status &amp; Action</th>
              <th class="py-3.5 px-4 text-right">Received</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-700/60">
            <?php foreach ($leads as $l): ?>
              <tr class="hover:bg-slate-700/30 transition-colors">
                <td class="py-3.5 px-4">
                  <div class="font-bold text-white"><?= htmlspecialchars($l['full_name']) ?></div>
                  <div class="text-[10px] text-slate-400 font-mono">ID: #<?= $l['id'] ?></div>
                </td>
                <td class="py-3.5 px-4">
                  <div class="font-mono text-slate-200 font-semibold"><?= htmlspecialchars($l['phone']) ?></div>
                  <div class="text-[10px] text-slate-400"><?= htmlspecialchars($l['email'] ?? '—') ?></div>
                </td>
                <td class="py-3.5 px-4">
                  <div class="font-medium text-white"><?= htmlspecialchars($l['requirement_type'] ?? 'House Construction') ?></div>
                  <div class="text-[11px] text-slate-400">
                    <?= htmlspecialchars($l['plot_location'] ?? 'Chennai') ?> 
                    <?= !empty($l['plot_area_sqft']) ? '· ' . number_format($l['plot_area_sqft']) . ' sq.ft' : '' ?>
                  </div>
                </td>
                <td class="py-3.5 px-4 max-w-xs">
                  <div class="text-[11px] text-slate-300 truncate" title="<?= htmlspecialchars($l['notes'] ?? '') ?>">
                    <?= htmlspecialchars($l['notes'] ?? 'None provided') ?>
                  </div>
                </td>
                <td class="py-3.5 px-4">
                  <form method="POST" action="leads.php" class="inline-flex items-center gap-2">
                    <input type="hidden" name="action" value="update_status">
                    <input type="hidden" name="lead_id" value="<?= $l['id'] ?>">
                    <select 
                      name="status" 
                      onchange="this.form.submit()" 
                      class="bg-slate-900 border border-slate-700 text-slate-200 text-xs rounded-lg px-2.5 py-1 focus:outline-none focus:border-brand-orange font-medium">
                      <option value="new" <?= ($l['status'] ?? '') === 'new' ? 'selected' : '' ?>>🟡 New</option>
                      <option value="contacted" <?= ($l['status'] ?? '') === 'contacted' ? 'selected' : '' ?>>🔵 Contacted</option>
                      <option value="site_visit_scheduled" <?= ($l['status'] ?? '') === 'site_visit_scheduled' ? 'selected' : '' ?>>🟣 Visit Scheduled</option>
                      <option value="quote_shared" <?= ($l['status'] ?? '') === 'quote_shared' ? 'selected' : '' ?>>🟠 Quote Shared</option>
                      <option value="converted" <?= ($l['status'] ?? '') === 'converted' ? 'selected' : '' ?>>🟢 Converted</option>
                      <option value="closed" <?= ($l['status'] ?? '') === 'closed' ? 'selected' : '' ?>>⚪ Closed</option>
                    </select>
                  </form>
                </td>
                <td class="py-3.5 px-4 text-right font-mono text-[11px] text-slate-400">
                  <?= date('d M, h:i A', strtotime($l['created_at'])) ?>
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
