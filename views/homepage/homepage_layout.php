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

<?php ob_start(); ?>
<script>
    $('#add-button1').off('click').on('click', function() {
        console.log('add-button1 clicked');

        var formData = new FormData($('#createlokerform')[0]);
        $.ajax({
            url: '<?= urlpath('homepage/createpekerjaan') ?>',
            method: 'post',
            data: formData,
            dataType: 'json',
            async: true,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    resetForm();
                    alert('Loker baru berhasil ditambahkan!');
                } else {
                    alert('Terjadi kesalahan: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', error);
                alert('Pastikan semua kolom sudah terisi!');
            }
        });

    });

    function resetForm() {
        var form = $('#createlokerform');
        form[0].reset();
    }
</script>
<?php $ajaxpostscript2 = ob_get_clean(); ?>

<?php include 'views/master.php'; ?>