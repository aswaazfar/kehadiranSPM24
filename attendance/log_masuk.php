<?php
session_start();
if (isset($_SESSION['status'])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelab Bahasa Cina</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div id="header">
        <h1>Sistem Pengurusan Kehadiran</h1>
        <h2>Kelab Bahasa Cina</h2>
        <h2>Sekolah Menengah Kebangsaan (P) St. George</h2>
    </div>
    <ul id="menu">
      <?php include 'inc/menu.php' ?>
    </ul>
    <form id="borang" action="inc/log_masuk-inc.php" method="post">
      <h2 id="tajuk">Log Masuk</h2>
      <label for="noKP">No Kad Pengenalan</label>
      <input type="text" name="noKP" id="noKP" required />
      <label for="kataLaluan">Kata Laluan</label>
      <input type="password" name="kataLaluan" id="kataLaluan" required />
      <div id="status">
        <input
          type="radio"
          name="status"
          id="ahli"
          value="ahli"
          required
        />
        <label for="ahli">Ahli</label>
        <input type="radio" name="status" id="guru" value="guru" />
        <label for="guru">Guru</label>
      </div>
      <button type="submit" name="log_masuk">Log Masuk</button>
      <p>Belum mendaftar? Klik <a href="daftar.php">di sini</a></p>
    </form>
  </body>
</html>