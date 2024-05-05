<?php
session_start();
unset($_SESSION['noKP']);
unset($_SESSION['status']);

echo '
<script>
    alert("Anda berjaya log keluar. Terima kasih");
    window.location.href = "../index.php";
</script>
'
?>