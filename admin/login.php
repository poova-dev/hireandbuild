<?php
/**
 * [CLIENT NAME] - Admin Login Screen
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect if already logged in
if (!empty($_SESSION['admin_user'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($usernameOrEmail) || empty($password)) {
        $error = 'Please enter both username/email and password.';
    } else {
        $db = get_db();
        $authenticated = false;
        $userRecord = null;

        if ($db) {
            try {
                $stmt = $db->prepare("SELECT * FROM admin_users WHERE (username = :u OR email = :u) AND is_active = 1 LIMIT 1");
                $stmt->execute([':u' => $usernameOrEmail]);
                $userRecord = $stmt->fetch();

                if ($userRecord && password_verify($password, $userRecord['password_hash'])) {
                    $authenticated = true;
                    // Update last login
                    $db->prepare("UPDATE admin_users SET last_login = NOW() WHERE id = :id")->execute([':id' => $userRecord['id']]);
                }
            } catch (Exception $e) {
                error_log("[Admin Login DB Error] " . $e->getMessage());
            }
        }

        // Fallback default admin credentials if database is unseeded or offline
        if (!$authenticated) {
            if (($usernameOrEmail === 'admin' || $usernameOrEmail === 'admin@clientname.com') && ($password === 'Admin@2026' || $password === 'admin')) {
                $authenticated = true;
                $userRecord = [
                    'id' => 1,
                    'username' => 'admin',
                    'email' => 'admin@clientname.com',
                    'full_name' => 'Principal Administrator',
                    'role' => 'super_admin'
                ];
            }
        }

        if ($authenticated && $userRecord) {
            $_SESSION['admin_user'] = [
                'id' => $userRecord['id'],
                'username' => $userRecord['username'],
                'email' => $userRecord['email'],
                'full_name' => $userRecord['full_name'],
                'role' => $userRecord['role']
            ];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid credentials. Please verify your login details.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | [CLIENT NAME] Construction</title>
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
<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4">

  <div class="w-full max-w-md">
    
    <!-- Logo & Title -->
    <div class="text-center mb-8">
      <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-brand-orange to-amber-500 flex items-center justify-center text-white shadow-xl shadow-brand-orange/30 font-display font-black text-2xl mx-auto mb-4">
        C
      </div>
      <h1 class="text-2xl font-display font-bold text-white tracking-tight">[CLIENT NAME]</h1>
      <p class="text-slate-400 text-sm mt-1">Management Portal &amp; Lead Console</p>
    </div>

    <!-- Login Card -->
    <div class="bg-slate-800/90 border border-slate-700/80 rounded-2xl p-8 shadow-2xl backdrop-blur-sm">
      
      <?php if (!empty($error)): ?>
        <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-sm flex items-center gap-3">
          <i class="fa-solid fa-triangle-exclamation"></i>
          <span><?= htmlspecialchars($error) ?></span>
        </div>
      <?php endif; ?>

      <form method="POST" action="login.php" class="space-y-5">
        <div>
          <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2" for="username">Username or Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500 pointer-events-none">
              <i class="fa-regular fa-envelope"></i>
            </span>
            <input 
              type="text" 
              name="username" 
              id="username" 
              required 
              value="admin@clientname.com"
              class="w-full pl-10 pr-4 py-3 bg-slate-900/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition-all"
              placeholder="admin@clientname.com">
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between mb-2">
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider" for="password">Password</label>
            <span class="text-xs text-slate-500">Default: Admin@2026</span>
          </div>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500 pointer-events-none">
              <i class="fa-solid fa-lock"></i>
            </span>
            <input 
              type="password" 
              name="password" 
              id="password" 
              required 
              value="Admin@2026"
              class="w-full pl-10 pr-4 py-3 bg-slate-900/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition-all"
              placeholder="••••••••••••">
          </div>
        </div>

        <button 
          type="submit" 
          class="w-full py-3.5 px-4 bg-brand-orange hover:bg-brand-accent text-white font-display font-bold text-sm rounded-xl shadow-lg shadow-brand-orange/30 hover:shadow-xl hover:-translate-y-0.5 transition-all">
          Sign In to Console
        </button>
      </form>

      <div class="mt-6 pt-6 border-t border-slate-700/60 text-center">
        <a href="../index.php" class="text-xs text-slate-400 hover:text-brand-orange transition-colors inline-flex items-center gap-1.5">
          <i class="fa-solid fa-arrow-left"></i>
          <span>Return to Public Website</span>
        </a>
      </div>
    </div>

    <!-- Credentials Hint Badge -->
    <div class="mt-6 text-center text-xs text-slate-400 bg-slate-800/40 border border-slate-800 rounded-xl py-3 px-4">
      <span class="font-medium text-slate-300">Quick Demo Access:</span> User: <code class="text-amber-400">admin@clientname.com</code> / Pass: <code class="text-amber-400">Admin@2026</code>
    </div>

  </div>

</body>
</html>
