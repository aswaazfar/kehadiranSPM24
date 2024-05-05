<?php

if (isset($_POST['muat_naik'])) {
    include 'database-inc.php';
    $senaraiAhli = fopen($_FILES['senaraiAhli']['tmp_name'], 'rb');
    
    while (($ahli = fgets($senaraiAhli)) !== false) {
        $maklumat = explode(",", $ahli);
        $noKP = $maklumat[0];
        $nama = $maklumat[1];
        $kataLaluan = $maklumat[2];
        $email = $maklumat[3];
        $noTel = $maklumat[4];
        $tingkatan = explode(" ", $maklumat[5])[0];
        $namaKelas = trim( explode(" ", $maklumat[5])[1]);

        $sql = "SELECT * FROM kelas
                WHERE tingkatan = '$tingkatan'
                    AND namaKelas = '$namaKelas'";
        $hasil = mysqli_query($conn, $sql);
        $idKelas = mysqli_fetch_assoc($hasil)['idKelas'];

        $sql = "INSERT INTO ahli
                VALUES ('$noKP', '$nama', '$kataLaluan', '$email', '$noTel', '$idKelas')";
        $hasil = mysqli_query($conn, $sql);
        
        if ($hasil) {
            echo "
            <script>
                alert('Muat naik ahli berjaya.');
                window.location.href = '../senarai_ahli.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Muat naik ahli gagal.');
                window.location.href = '../senarai_ahli.php';
            </script>
            ";
        }
    }
} else {
    header("Location: ../index.php?ralat=aksestidakdibenarkan");
}
?>