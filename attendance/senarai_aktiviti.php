<?php
session_start();
include 'inc/database-inc.php';

$sql = "SELECT * FROM aktiviti";
$result = mysqli_query($conn, $sql);
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
    <h2 id="tajuk">Senarai Aktiviti</h2>
    <table id="senarai">
      <tr>
        <th>Bil</th>
        <th>Nama Aktiviti</th>
        <th>Tarikh</th>
        <th>Masa</th>
        <th>Tempat</th>
      </tr>
      <?php
      $bil = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $namaAktiviti = $row['namaAktiviti'];
        $tarikh = date('d M Y', strtotime($row['tarikh']));
        $masaMula = date('h:i A', strtotime($row['masaMula']));
        $masaAkhir = date('h:i A', strtotime($row['masaAkhir']));
        $tempat = $row['tempat'];
        $bil++; 
      ?>
      <tr>
        <td><?php echo $bil?>.</td>
        <td><?php echo $namaAktiviti?></td>
        <td><?php echo $tarikh?></td>
        <td><?php echo $masaMula?> - <?php echo $masaAkhir?></td>
        <td><?php echo $tempat?></td>
      </tr>
      <?php
      }
      ?>
    </table>
  </body>
</html>