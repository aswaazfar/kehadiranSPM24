<?php
session_start();
include 'inc/database-inc.php';

// Initialize arrays to store past and future activities
$pastActivities = [];
$futureActivities = [];

// Query to fetch all activities and categorize them based on the date
$sql = "SELECT * FROM aktiviti ORDER BY tarikh ASC";
$result = mysqli_query($conn, $sql);
$today = new DateTime(); // Today's date for comparison

while ($row = mysqli_fetch_assoc($result)) {
    $activityDetails = [
        'namaAktiviti' => $row['namaAktiviti'],
        'tarikh' => date('d M Y', strtotime($row['tarikh'])),
        'tempat' => $row['tempat'],
        'masaMula' => date('h:i A', strtotime($row['masaMula'])),
        'masaAkhir' => date('h:i A', strtotime($row['masaAkhir'])),
        'status' => (new DateTime($row['tarikh']) < $today) ? "Aktiviti telah tamat" : "Akan datang"
    ];
    
    if (new DateTime($row['tarikh']) < $today) {
        $pastActivities[] = $activityDetails;
    } else {
        $futureActivities[] = $activityDetails;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Hadir Kelab Bahasa Cina</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="btnUbahSaiz">
        <button onclick="ubahSaizFont(5)">+</button>
        <button onclick="ubahSaizFont(-5)">-</button>
    </div>
    <div id="header">
        <h1>Sistem Pengurusan Kehadiran</h1>
        <h2>Kelab Bahasa Cina</h2>
        <h2>Sekolah Menengah Kebangsaan (P) St. George</h2>
    </div>

    <div class="container">
        <ul id="menu">
            <?php include 'inc/menu.php' ?>
        </ul>
        <div class="main">
        <div class="infokotak">
                <h3 style="text-align: center;">Aktiviti Anjuran Kelab Bahasa Cina, SMK (P) St. George 2024</h3>

                <div id="makluman">
                  <h2 class="tekskepala" style="text-align: center;">Aktiviti Terkini</h2>
                  <div id="activity-slider">
                  <div id="activity-slides">
                      <?php foreach ($futureActivities as $activity): ?>
                        <div class="slide" id="slide-<?php echo $index; ?>" style="<?php echo $index == 0 ? 'display: block;' : 'display: none;'; ?>">
                              <p><span class="details">Nama Aktiviti:</span> <?php echo $activity['namaAktiviti']; ?></p>
                              <p><span class="details">Tarikh:</span> <?php echo $activity['tarikh']; ?></p>
                              <p><span class="details">Masa:</span> <?php echo $activity['masaMula'] . " - " . $activity['masaAkhir']; ?></p>
                              <p><span class="details">Tempat:</span> <?php echo $activity['tempat']; ?></p>
                              <p><span class="status"><?php echo $activity['status']; ?></span></p>
                          </div>
                      <?php endforeach; ?>
                </div>

                </div>
                      <button id="prev-btn" class="stylish-button" >Sebelum</button>
                      <button id="next-btn" class="stylish-button" >Seterusnya</button>
                  </div>

            </div>
        </div>
    </div>

    <footer>
    <div class="footer-bottom">
        <p>&copy; Disediakan oleh _________________.</p>
    </div>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>
