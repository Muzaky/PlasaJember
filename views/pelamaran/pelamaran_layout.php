<?php
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>

<?php $title = 'Plasa Jember - Pelamaran'; ?> 

<?php
ob_start();
include_once $url . '.php';
$body = ob_get_clean();
?>


<?php ob_start(); ?>
<script>
    $('#add-button2').off('click').on('click', function() {
        console.log('add-button2 clicked');

        var formData = new FormData($('#createlamarform')[0]);
        $.ajax({
            url: '<?= urlpath('pelamaran/createpelamaran') ?>',
            method: 'post',
            data: formData,
            dataType: 'json',
            async: true,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    resetForm();
                    alert('Anda berhasil melamar pekerjaan!');
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
        var form = $('#createlamarform');
        form[0].reset();
    }
</script>
<?php $ajaxpostscript3 = ob_get_clean(); ?>


<?php include 'views/master.php'; ?>