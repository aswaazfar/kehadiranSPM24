<?php
if (isset($_POST['tambah'])) {
    include 'database-inc.php';

    $tingkatan = $_POST['tingkatan'];
    $namaKelas = $_POST['namaKelas'];

    $sql = "INSERT INTO kelas(tingkatan, namaKelas)
            VALUES ('$tingkatan', '$namaKelas')";
    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        echo "
        <script>
            alert('Kelas berjaya ditambah');
            window.location.href = '../kelas.php';
        </script>
        ";
    }
} else {
    header("Location: ../kelas.php?ralat=aksestidakdibenarkan");
}
?>