<?php
if (isset($_POST['daftar'])) {
    include 'database-inc.php';

    $namaAktiviti = $_POST['namaAktiviti'];
    $tarikh = $_POST['tarikh'];
    $masaMula = $_POST['masaMula'];
    $masaAkhir = $_POST['masaAkhir'];
    $tempat = $_POST['tempat'];

    $sql = "INSERT INTO aktiviti(namaAktiviti, tempat, tarikh, masaMula, masaAkhir)
            VALUES ('$namaAktiviti', '$tempat', '$tarikh', '$masaMula', '$masaAkhir')";
    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        $idAktiviti = mysqli_insert_id($conn);
        $sql = "SELECT * FROM ahli";
        $hasil = mysqli_query($conn, $sql);
        while ($rekod = mysqli_fetch_assoc($hasil)) {
            $noKP = $rekod['noKP'];
            $sql2 = "INSERT INTO kehadiran(idAktiviti, noKP)
                     VALUES ('$idAktiviti', '$noKP')";
            $hasil2 = mysqli_query($conn, $sql2);
        }
        echo "
        <script>
            alert('Daftar aktiviti berjaya.');
            window.location.href = '../senarai_aktiviti_admin.php';
        </script>
        ";
    }
} else {
    header("Location: ../senarai_aktiviti_admin.php?ralat=aksestidakdibenarkan");
}
?>