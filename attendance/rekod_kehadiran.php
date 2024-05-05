<?php
session_start();
include 'inc/database-inc.php';

$noKP = $_SESSION['noKP'];

$hadir = '<i class="hadir fa-solid fa-circle-check"></i>';
$tidakHadir = '<i class="xhadir fa-solid fa-circle-xmark"></i>';
$sql = "SELECT * FROM kehadiran k
        INNER JOIN aktiviti a
          ON k.idAktiviti = a.idAktiviti
        WHERE noKP = '$noKP'";
$hasil = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelab Bahasa Cina</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/0611a60885.js"
      crossorigin="anonymous"
    ></script>
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
    <h2 id="tajuk">Rekod Kehadiran</h2>
    <table id="senarai">
      <tr>
        <th>Bil</th>
        <th>Nama Aktiviti</th>
        <th>Tarikh</th>
        <th>Kehadiran</th>
      </tr>
      <?php
      $bil = 0;
      while ($rekod = mysqli_fetch_assoc($hasil)) {
        $bil++;
        $namaAktiviti = $rekod['namaAktiviti'];
        $tarikh = date('d M Y', strtotime($rekod['tarikh']));
        $status = $rekod['status'];
        if ($status == "Y") {
          $simbol = $hadir;
        } else {
          $simbol = $tidakHadir;
        }
      ?>
      <tr>
        <td><?php echo $bil ?>.</td>
        <td><?php echo $namaAktiviti ?></td>
        <td><?php echo $tarikh ?></td>
        <td><?php echo $simbol ?></td>
      </tr>
      <?php
      }
      ?>
    </table>
    <button id="cetak" onclick="window.print(); return false;">Cetak</button>
  </body>
</html>