<?php
/**
 * [CLIENT NAME] - Admin Business Profile & Image Settings
 */

require_once __DIR__ . '/auth.php';
$adminUser = check_admin_auth();

$db = get_db();
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $db) {
    try {
        $allowed = ['company_name', 'phone_primary', 'whatsapp_number', 'email_support', 'office_address', 'warranty_years', 'cloudinary_cloud_name', 'cloudinary_upload_preset'];
        $stmt = $db->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (:k, :v) ON DUPLICATE KEY UPDATE setting_value = :v, updated_at = NOW()");
        
        foreach ($allowed as $k) {
            if (isset($_POST[$k])) {
                $stmt->execute([':k' => $k, ':v' => trim($_POST[$k])]);
            }
        }
        $msg = 'Settings saved successfully.';
    } catch (Exception $e) {
        $msg = 'Error updating settings: ' . $e->getMessage();
    }
}

// Fetch current settings
$settings = [
    'company_name'           => SITE_NAME,
    'phone_primary'          => SITE_PHONE,
    'whatsapp_number'        => SITE_WHATSAPP,
    'email_support'          => SITE_EMAIL,
    'office_address'         => SITE_ADDRESS,
    'warranty_years'         => WARRANTY_YEARS,
    'cloudinary_cloud_name'  => CLOUDINARY_CLOUD_NAME,
    'cloudinary_upload_preset' => ''
];

if ($db) {
    try {
        $stmt = $db->query("SELECT setting_key, setting_value FROM settings");
        while ($row = $stmt->fetch()) {
            if (isset($settings[$row['setting_key']])) {
                $settings[$row['setting_key']] = $row['setting_value'];
            }
        }
    } catch (Exception $e) {
        // ignore
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Settings | [CLIENT NAME] Admin</title>
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
          <a href="leads.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-users text-xs"></i> All Leads</a>
          <a href="estimates.php" class="hover:text-white transition-colors flex items-center gap-1.5"><i class="fa-solid fa-calculator text-xs"></i> Estimates</a>
          <a href="settings.php" class="text-brand-orange font-semibold flex items-center gap-1.5"><i class="fa-solid fa-sliders text-xs"></i> Settings</a>
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
  <main class="flex-1 max-w-4xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
    
    <div>
      <h1 class="text-2xl font-display font-bold text-white tracking-tight">Business Configuration &amp; Media</h1>
      <p class="text-slate-400 text-xs sm:text-sm mt-0.5">Manage contact details, warranty guarantees, and image storage settings.</p>
    </div>

    <?php if (!empty($msg)): ?>
      <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm flex items-center gap-3">
        <i class="fa-solid fa-circle-check"></i>
        <span><?= htmlspecialchars($msg) ?></span>
      </div>
    <?php endif; ?>

    <form method="POST" action="settings.php" class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
      
      <div class="border-b border-slate-700/80 pb-5">
        <h2 class="text-base font-display font-bold text-white mb-1">Company Profile</h2>
        <p class="text-xs text-slate-400">Branding details displayed across the website and PDF estimates.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Company Name</label>
          <input type="text" name="company_name" value="<?= htmlspecialchars($settings['company_name']) ?>" class="w-full px-3.5 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-xs sm:text-sm text-white focus:outline-none focus:border-brand-orange">
        </div>

        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Primary Phone</label>
          <input type="text" name="phone_primary" value="<?= htmlspecialchars($settings['phone_primary']) ?>" class="w-full px-3.5 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-xs sm:text-sm text-white focus:outline-none focus:border-brand-orange">
        </div>

        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">WhatsApp Number (e.g. 917200472008)</label>
          <input type="text" name="whatsapp_number" value="<?= htmlspecialchars($settings['whatsapp_number']) ?>" class="w-full px-3.5 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-xs sm:text-sm text-white focus:outline-none focus:border-brand-orange">
        </div>

        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Support Email</label>
          <input type="email" name="email_support" value="<?= htmlspecialchars($settings['email_support']) ?>" class="w-full px-3.5 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-xs sm:text-sm text-white focus:outline-none focus:border-brand-orange">
        </div>
      </div>

      <div>
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Physical Office Address</label>
        <textarea name="office_address" rows="2" class="w-full px-3.5 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-xs sm:text-sm text-white focus:outline-none focus:border-brand-orange"><?= htmlspecialchars($settings['office_address']) ?></textarea>
      </div>

      <div class="border-t border-slate-700/80 pt-6">
        <h2 class="text-base font-display font-bold text-white mb-1">Image Storage (Cloudinary / Local)</h2>
        <p class="text-xs text-slate-400 mb-4">Leave empty to use high-resolution local storage in <code>assets/images/</code>.</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Cloudinary Cloud Name</label>
            <input type="text" name="cloudinary_cloud_name" value="<?= htmlspecialchars($settings['cloudinary_cloud_name']) ?>" placeholder="e.g. your-cloud-name" class="w-full px-3.5 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-xs sm:text-sm text-white focus:outline-none focus:border-brand-orange">
          </div>

          <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Cloudinary Upload Preset</label>
            <input type="text" name="cloudinary_upload_preset" value="<?= htmlspecialchars($settings['cloudinary_upload_preset']) ?>" placeholder="e.g. client_preset" class="w-full px-3.5 py-2.5 bg-slate-900 border border-slate-700 rounded-xl text-xs sm:text-sm text-white focus:outline-none focus:border-brand-orange">
          </div>
        </div>
      </div>

      <div class="pt-4 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-brand-orange hover:bg-brand-accent text-white font-display font-bold text-xs sm:text-sm rounded-xl shadow-lg shadow-brand-orange/20 transition-all">
          Save Configuration
        </button>
      </div>

    </form>

  </main>

</body>
</html>
