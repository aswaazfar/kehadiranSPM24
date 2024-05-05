<?php
if (isset($_POST['log_masuk'])) {
    include 'database-inc.php';

    $noKP = $_POST['noKP'];
    $kataLaluan = $_POST['kataLaluan'];
    $status = $_POST['status'];

    $sql = "SELECT * FROM $status WHERE noKP = '$noKP'";
    $hasil = mysqli_query($conn, $sql);
    $bilRekod = mysqli_num_rows($hasil);
    if ($bilRekod > 0) {
        $rekod = mysqli_fetch_assoc($hasil);
        $kataLaluanSebenar = $rekod['kataLaluan'];

        if ($kataLaluan == $kataLaluanSebenar) {
            session_start();
            $_SESSION['noKP'] = $noKP;
            $_SESSION['status'] = $status;
            echo "
            <script>
                alert('Log masuk berjaya. Selamat datang.');
                window.location.href = '../index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Kata laluan anda salah. Sila cuba lagi');
                window.location.href = '../log_masuk.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('No Kad Pengenalan tidak wujud. Sila daftar dahulu.');
            window.location.href = '../daftar.php';
        </script>
        ";
    }
    
} else {
    header("Location: ../log_masuk.php?ralat=aksestidakdibenarkan");
}
?>