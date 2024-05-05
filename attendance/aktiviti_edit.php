<?php
session_start();
include 'inc/database-inc.php';

$idAktiviti = $_GET['idAktiviti'];
$sql = "SELECT * FROM aktiviti WHERE idAktiviti = '$idAktiviti'";
$hasil = mysqli_query($conn, $sql);
$rekod = mysqli_fetch_assoc($hasil);
$namaAktiviti = $rekod['namaAktiviti'];
$tarikh = $rekod['tarikh'];
$masaMula = $rekod['masaMula'];
$masaAkhir = $rekod['masaAkhir'];
$tempat = $rekod['tempat'];
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
      <?php include "inc/menu.php" ?>
    </ul>
    <form id="borang" action="inc/aktiviti_edit-inc.php" method="post">
      <h2 id="tajuk">Edit Aktiviti</h2>
      <input type="hidden" name="idAktiviti" value="<?php echo $idAktiviti ?>">
      <label for="namaAktiviti">Nama Aktiviti</label>
      <input type="text" name="namaAktiviti" id="namaAktiviti" required value="<?php echo $namaAktiviti ?>"/>
      <label for="tarikh">Tarikh</label>
      <input type="date" name="tarikh" id="tarikh" required value="<?php echo $tarikh ?>"/>
      <label for="masaMula">Masa Mula</label>
      <input type="time" name="masaMula" id="masaMula" value="<?php echo $masaMula ?>"/>
      <label for="masaAkhir">Masa Akhir</label>
      <input type="time" name="masaAkhir" id="masaAkhir" value="<?php echo $masaAkhir ?>"/>
      <label for="tempat">Tempat</label>
      <input type="text" name="tempat" id="tempat" value="<?php echo $tempat ?>"/>
      <button type="submit" name="edit">Edit</button>
    </form>
  </body>
</html>