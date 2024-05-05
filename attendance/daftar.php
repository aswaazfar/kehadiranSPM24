<?php
session_start();
if (isset($_SESSION['status'])) {
  header("Location: index.php");
}
include 'inc/database-inc.php';

$sql = "SELECT * FROM kelas";
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
    <form id="borang" action="inc/daftar-inc.php" method="post">
      <h2 id="tajuk">Pendaftaran</h2>
      <label for="noKP">No Kad Pengenalan</label>
      <input
        type="text"
        name="noKP"
        id="noKP"
        required
        pattern="[0-9]{12}"
        oninvalid="this.setCustomValidity('Masukkan nombor sahaja tanpa -')"
        oninput="this.setCustomValidity('')"
      />
      <label for="kataLaluan">Kata Laluan</label>
      <input
        type="password"
        name="kataLaluan"
        id="kataLaluan"
        required
        pattern="[a-zA-Z0-9]{8,12}"
        oninvalid="this.setCustomValidity('Sila guna huruf dan nombor sahaja. 8-12 aksara.')"
        oninput="this.setCustomValidity('')"
      />
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama" />
      <label for="noTel">No Telefon</label>
      <input type="text" name="noTel" id="noTel" />
      <label for="email">Email</label>
      <input type="email" name="email" id="email" />
      <label for="idKelas">Kelas</label>
      <select name="idKelas" id="idKelas" required>
        <option value="" selected disabled></option>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          $idKelas = $row['idKelas'];
          $tingkatan = $row['tingkatan'];
          $namaKelas = $row['namaKelas'];

          echo "<option value='$idKelas'>$tingkatan $namaKelas</option>";
        }
        ?>
      </select>
      <button type="submit" name="daftar">Daftar</button>
    </form>
  </body>
</html>