<?php
session_start();
include 'inc/database-inc.php';

$sql = "SELECT * FROM aktiviti";
$hasil = mysqli_query($conn, $sql);

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
    <h2 id="tajuk">Rekod Kehadiran</h2>
    <form id="borang" action="" method="get">
      <label for="idAktiviti">Aktiviti</label>
      <select name="idAktiviti" id="idAktiviti">
        <option value="" selected></option>
        <?php
        while ($rekod = mysqli_fetch_assoc($hasil)) {
          $idAktiviti = $rekod['idAktiviti'];
          $namaAktiviti = $rekod['namaAktiviti'];

          echo "<option value='$idAktiviti'>$namaAktiviti</option>";
        }
        ?>
      </select>
      <button type="submit">Cari</button>
    </form>
    <?php
    if (!empty($_GET['idAktiviti'])) {
      $idAktivitiCari = $_GET['idAktiviti'];
      
      $sql3 = "SELECT * FROM aktiviti WHERE idAktiviti = '$idAktivitiCari'";
      $hasil3 = mysqli_query($conn, $sql3);
      $namaAktivitiCari = mysqli_fetch_assoc($hasil3)['namaAktiviti'];

      $sql2 = "SELECT * FROM kehadiran k
               INNER JOIN ahli a
                ON k.noKP = a.noKP
               INNER JOIN kelas kl
                ON a.idKelas = kl.idKelas
               WHERE idAktiviti = '$idAktivitiCari'
               ORDER BY tingkatan ASC, namaKelas ASC, nama ASC";
      $hasil2 = mysqli_query($conn, $sql2);
      
    ?>
    <h2 id="tajuk"><?php echo $namaAktivitiCari ?></h2>
    <table id="senarai">
      <tr>
        <th>Bil</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Kehadiran</th>
      </tr>
      <?php
      $bil = 0;
      while ($rekod2 = mysqli_fetch_assoc($hasil2)) {
        $bil++;
        $nama = $rekod2['nama'];
        $kelas = $rekod2['tingkatan'] . " " . $rekod2['namaKelas'];
        $status = "Tidak Hadir";
        if ($rekod2['status'] == 'Y') {
          $status = "Hadir";
        }
      ?>
      <tr>
        <td><?php echo $bil ?>.</td>
        <td><?php echo $nama ?></td>
        <td><?php echo $kelas ?></td>
        <td><?php echo $status ?></td>
      </tr>
      <?php
      }
      ?>
    </table>
    <button id="cetak" onclick="window.print(); return false;">Cetak</button>
    <?php
    }
    ?>
  </body>
</html>