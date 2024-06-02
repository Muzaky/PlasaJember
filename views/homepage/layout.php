<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>

<?php $title = 'Plasa Jember'; ?> 

<?php
ob_start();
include_once $url . '.php';
$body = ob_get_clean();
?>


<?php include 'views/master.php'; ?>