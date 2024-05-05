<?php
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    if ($status == 'ahli') {
        echo '
        <li class="menu-item"><a href="index.php">Halaman Utama</a></li>
        <li class="menu-item"><a href="senarai_aktiviti.php">Senarai Aktiviti</a></li>
        <li class="menu-item"><a href="kehadiran.php">Kehadiran</a></li>
        <li class="menu-item"><a href="rekod_kehadiran.php">Rekod Kehadiran</a></li>
        <li class="menu-item"><a href="profil.php">Profil</a></li>
        <li class="menu-item"><a href="inc/log_keluar-inc.php">Log Keluar</a></li>
        ';
    } elseif ($status == 'guru') {
        echo '
        <li class="menu-item"><a href="index.php">Halaman Utama</a></li>
        <li class="menu-item"><a href="senarai_aktiviti_admin.php">Senarai Aktiviti</a></li>
        <li class="menu-item"><a href="senarai_ahli.php">Senarai Ahli</a></li>
        <li class="menu-item"><a href="rekod_kehadiran_admin.php">Kehadiran Aktiviti</a></li>
        <li class="menu-item"><a href="rekod_kehadiran_semua.php">Kehadiran Seluruh</a></li>
        <li class="menu-item"><a href="inc/log_keluar-inc.php">Log Keluar</a></li>
        ';
    }
} else {
    echo '
    <li class="menu-item"><a href="index.php">Halaman Utama</a></li>
    <li class="menu-item"><a href="senarai_aktiviti.php">Senarai Aktiviti</a></li>
    <li class="menu-item"><a href="log_masuk.php">Log Masuk</a></li>
    ';
}
?>