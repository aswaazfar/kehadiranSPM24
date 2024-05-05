<?php
session_start();
include 'inc/database-inc.php';

$sql = "SELECT * FROM kelas";
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
    <h2 id="tajuk">Kelas</h2>
    <form id="borang" action="inc/kelas_tambah-inc.php" method="post">
      <label for="tingkatan">Tingkatan</label>
      <select name="tingkatan" id="tingkatan" required>
        <option value="" selected></option>
        <option value="1">Satu</option>
        <option value="2">Dua</option>
        <option value="3">Tiga</option>
        <option value="4">Empat</option>
        <option value="5">Lima</option>
      </select>
      <label for="namaKelas">Nama Kelas</label>
      <input type="text" name="namaKelas" id="namaKelas" required />
      <button type="submit" name="tambah">Tambah</button>
    </form>
    <table id="senarai">
      <tr>
        <th>Bil</th>
        <th>Tingkatan</th>
        <th>Nama Kelas</th>
        <th>Hapus</th>
      </tr>
      <?php
      $bil = 0;
      while ($rekod = mysqli_fetch_assoc($hasil)) {
        $bil++;  
        $idKelas = $rekod['idKelas'];
        $tingkatan = $rekod['tingkatan'];
        $namaKelas = $rekod['namaKelas'];
      ?>
      <tr>
        <td><?php echo $bil ?>.</td>
        <td><?php echo $tingkatan ?></td>
        <td><?php echo $namaKelas ?></td>
        <td><a href="inc/kelas_hapus-inc.php?idKelas=<?php echo $idKelas ?>">Hapus</a></td>
      </tr>
      <?php
      }
      ?>
   </table>
  </body>
</html>