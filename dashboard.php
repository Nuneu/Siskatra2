<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
</head>
<body>
<style>
.notif {
  position: fixed;
  top: 20px;
  right: 20px;
  padding: 15px 25px;
  border-radius: 10px;
  font-family: 'Lilita One', cursive;
  font-size: 16px;
  color: white;
  animation: fadeIn 0.5s ease-in-out;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

.notif.success { background: #3674B5; }    /* biru tua */
.notif.wrongpass { background: #578FCA; }  /* biru medium */
.notif.nouser { background: #A1E3F9; color: #000; } /* biru muda */

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
  <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
  <p>Role kamu: <?php echo $_SESSION['role']; ?></p>
  <a href="logout.php">Logout</a>

  <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
<div class="notif success">
  ✅ Login berhasil! Selamat datang, <?php echo $_SESSION['username']; ?>.
</div>
<script>
  setTimeout(() => {
    document.querySelector('.notif').style.display = 'none';
  }, 3000);
</script>
<?php endif; ?>

</body>
</html>
