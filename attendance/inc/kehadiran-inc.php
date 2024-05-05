<?php
if (isset($_POST['kemaskini'])) {
    include 'database-inc.php';

    $idAktiviti = $_POST['idAktiviti'];
    $noKP = $_POST['noKP'];

    session_start();
    $noKPSebenar = $_SESSION['noKP'];

    if ($noKP == $noKPSebenar) {
        $sql = "UPDATE kehadiran
                SET status = 'Y'
                WHERE
                    noKP = '$noKP'
                    AND idAktiviti = '$idAktiviti'";
        $hasil = mysqli_query($conn, $sql);
        if ($hasil) {
            echo "
            <script>
                alert('Kehadiran berjaya dimasukkan.');
                window.location.href = '../kehadiran.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('No Kad Pengenalan yang dimasukkan adalah salah. Sila cuba lagi.');
            window.location.href = '../kehadiran.php';
        </script>
        ";
    }
} else {
    header("Location: ../kehadiran.php?ralat=aksestidakdibenarkan");
}
?>