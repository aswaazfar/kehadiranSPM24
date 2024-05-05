<?php
session_start();
include 'inc/database-inc.php';

$sql = "SELECT * FROM aktiviti
        WHERE DATE(tarikh) >= CURDATE()
        LIMIT 1";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $namaAktiviti = $row['namaAktiviti'];
  $tarikh = date('d M Y', strtotime($row['tarikh']));
  $tempat = $row['tempat'];
  $masaMula = date('h:i A', strtotime($row['masaMula']));
  $masaAkhir = date('h:i A', strtotime($row['masaAkhir']));
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Kehadiran Cavell</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="btnUbahSaiz">
      <button onclick="ubahSaizFont(5)">+</button>
      <button onclick="ubahSaizFont(-5)">-</button>
    </div>
    <div id="header">
      <h1>Sistem Pengurusan Kehadiran</h1>
      <h2>Kelab Bahasa Cina</h2>
      <h2>Sekolah Menengah Kebangsaan (P) St. George </h2>
    </div>
   

<div class="container">
    <ul id="menu">
      <?php include 'inc/menu.php' ?>
    </ul>

    <div class="main">
        <div class="infokotak">
        <h3>Aktiviti Anjuran Kelab Bahasa Cina, SMK (P) St. George 2024</h3>
        <div id="makluman">
        <h2 id="tajuk" class="teks">Aktiviti Terkini</h2>
        <p class="teks"><span class="details">Nama Aktiviti:</span> <?php echo $namaAktiviti?></p>
        <p class="teks"><span class="details">Tarikh:</span> <?php echo $tarikh?></p>
        <p class="teks"><span class="details">Masa:</span> <?php echo $masaMula?> - <?php echo $masaAkhir?></p>
        <p class="teks"><span class="details">Tempat:</span> <?php echo $tempat?></p>
    </div>
        </div>
    </div>
</div>


    <script src="scripts.js"></script>
  </body>
</html>
;

