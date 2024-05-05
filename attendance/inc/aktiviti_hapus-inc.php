<?php
if (isset($_GET['idAktiviti'])) {
    include 'database-inc.php';
    $idAktiviti = $_GET['idAktiviti'];

    $sql = "DELETE FROM aktiviti WHERE idAktiviti = '$idAktiviti'";
    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        echo "
        <script>
            alert('Hapus aktiviti berjaya.');
            window.location.href = '../senarai_aktiviti_admin.php';
        </script>
        ";
    }
} else {
    header("Location: ../senarai_aktiviti_admin.php?ralat=aksestidakdibenarkan");
}
?>