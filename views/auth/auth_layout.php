<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>

<?php ob_start() ?>
<?php
if (isset($_GET['auth'])) {
    echo "<script>alert('Silahkan login terlebih dahulu');</script>";
}
if (isset($_GET['failed'])) {
    echo "<script>alert('" . ucfirst($url) . " gagal');</script>";
}
if (isset($url)) {
    include_once $url . '.php';
}
?>
<?php $body = ob_get_clean() ?>


<?php include 'views/master.php'; ?>