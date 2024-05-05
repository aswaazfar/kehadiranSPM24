<?php
if (isset($_POST['kemaskini'])) {
    include 'database-inc.php';

    $noKP = $_POST['noKP'];
    $kataLaluan = $_POST['kataLaluan'];
    $nama = $_POST['nama'];
    $noTel = $_POST['noTel'];
    $email = $_POST['email'];
    $idKelas = $_POST['idKelas'];

    $sql = "UPDATE ahli
            SET
                kataLaluan = '$kataLaluan',
                nama = '$nama',
                noTel = '$noTel',
                email = '$email',
                idKelas = '$idKelas'
            WHERE
                noKP = '$noKP'";
    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        echo "
        <script>
            alert('Kemaskini profil berjaya.');
            window.location.href = '../profil.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Kemaskini profil gagal. Sila cuba lagi.');
            window.location.href = '../profil.php';
        </script>
        ";
    }
} else {
    header("Location: ../profil.php?ralat=aksestidakdibenarkan");
}
?>