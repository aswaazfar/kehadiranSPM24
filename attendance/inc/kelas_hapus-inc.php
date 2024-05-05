<?php
if (isset($_GET['idKelas'])) {
    include 'database-inc.php';

    $idKelas = $_GET['idKelas'];

    $sql = "DELETE FROM kelas
            WHERE idKelas = '$idKelas'";
    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        echo "
        <script>
            alert('Kelas berjaya dihapuskan.');
            window.location.href = '../kelas.php';
        </script>
        ";
    }
} else {
    header("Location: ../kelas.php?ralat=aksestidakdibenarkan");
}
?>