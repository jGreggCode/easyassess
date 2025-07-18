<?php
require_once "includes/session/config.session.inc.php";

if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit();
}

$user_type = $_SESSION['user']['user_type'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Easy Assess - Settings</title>
  <link rel="stylesheet" href="public/css/main.css" />
  <link rel="stylesheet" href="public/css/component.css" />
  <link rel="stylesheet" href="public/css/settings.css" />
  <link rel="icon" href="assets/saclilogo.png" type="image/png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- TOASTIFY -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body>

<?php include_once "includes/components/header.html"; ?>

<div class="container">
  <h2 class="section-title">Settings</h2>

  <div class="settings-grid">
    <div class="settings-card" id="openPasswordModal">
      <i class="fas fa-key icon"></i>
      <h3>Change Password</h3>
      <p>Secure your account by updating your password regularly.</p>
    </div>

    <div class="settings-card">
      <i class="fas fa-envelope icon"></i>
      <h3>Notification Preferences</h3>
      <p>Customize how you receive system alerts and updates.</p>
    </div>

    <?php if ($user_type === 'admin'): ?>
      <div class="settings-card">
        <i class="fas fa-cogs icon"></i>
        <h3>System Configuration</h3>
        <p>Manage clearance deadlines, academic terms, and backups.</p>
      </div>
    <?php endif; ?>

    <div id="buttonSignOut" class="settings-card">
      <i class="fa-solid fa-right-from-bracket icon"></i>
      <h3>Logout</h3>
      <p>Logout your account.</p>
    </div>
  </div>
</div>

<!-- Password Modal -->
<div class="modal" id="passwordModal">
  <div class="modal-content">
    <span class="close-btn" id="closePasswordModal">&times;</span>
    <h2>Change Password</h2>
    <form id="settingsPasswordForm">
      <input type="hidden" id="userId" value="<?php echo $_SESSION['user']['id']; ?>" />
      <input type="password" placeholder="Current Password" id="currentPassword" required />
      <input type="password" placeholder="New Password" id="newPassword" required />
      <input type="password" placeholder="Confirm Password" id="confirmPassword" required />
      <button id="buttonUpdatePassword" type="submit">Update Password</button>
    </form>
  </div>
</div>

<?php include_once "includes/components/navigation.html"; ?>

<!-- AUTHENTICATION -->
<script type="module" src="public/js/auth/auth.js"></script>
<script type="module" src="public/js/utils/setting.js"></script>

</body>
</html>
