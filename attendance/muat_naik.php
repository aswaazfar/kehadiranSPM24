<?php
session_start();
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
    <form id="borang" action="inc/muat_naik-inc.php" method="post" enctype="multipart/form-data">
      <h2 id="tajuk">Muat Naik Ahli</h2>
      <input type="file" name="senaraiAhli" id="senaraiAhli" />
      <button type="submit" name="muat_naik">Muat Naik</button>
    </form>
  </body>
</html>