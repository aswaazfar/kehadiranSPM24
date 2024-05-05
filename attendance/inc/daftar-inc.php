<?php
if (isset($_POST['daftar'])) {
    include 'database-inc.php';

    $noKP = $_POST['noKP'];
    $kataLaluan = $_POST['kataLaluan'];
    $nama = $_POST['nama'];
    $noTel = $_POST['noTel'];
    $email = $_POST['email'];
    $idKelas = $_POST['idKelas'];

    $sql = "SELECT * FROM ahli
            WHERE noKP = '$noKP'";
    $hasil = mysqli_query($conn, $sql);
    $bilRekod = mysqli_num_rows($hasil);
    if ($bilRekod > 0) {
        echo "
        <script>
            alert('No Kad Pengenalan telah wujud. Sila log masuk.');
            window.location.href = '../log_masuk.php';
        </script>
        ";
    } else {
        $sql = "INSERT INTO ahli
                VALUES ('$noKP', '$nama', '$kataLaluan', '$email', '$noTel', '$idKelas')";
        $hasil = mysqli_query($conn, $sql);

        if ($hasil) {
            $sql = "SELECT * FROM aktiviti";
            $hasil = mysqli_query($conn, $sql);
            while ($rekod = mysqli_fetch_assoc($hasil)) {
                $idAktiviti = $rekod['idAktiviti'];
                $sql2 = "INSERT INTO kehadiran(noKP, idAktiviti)
                         VALUES ('$noKP', '$idAktiviti'";
                $hasil2 = mysqli_query($conn, $sql2);
            }
            echo "
            <script>
                alert('Pendaftaran berjaya. Sila log masuk.');
                window.location.href = '../log_masuk.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Pendaftaran gagal. Sila cuba lagi.');
                window.location.href = '../daftar.php';
            </script>
            ";
        }
    }

} else {
    header("Location: ../daftar.php?ralat=aksestidakdibenarkan");
}
?>