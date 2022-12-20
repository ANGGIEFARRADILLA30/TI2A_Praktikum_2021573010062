<?php
include "connect.php";
$id = (isset($_POST['id_order'])) ? htmlentities($_POST['id_order']) : "";

if (!empty($_POST['input_order_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM tb_order WHERE id_order='$id'");
    if ($query) {
        $message = '<script>alert("Data Berhasil Di Hapus");
        window.location="../order"</script>';
    } else {
        $message = '<script>alert("Data Gagal Di Hapus";
        window.location="../order"</script>';
    }
}
echo $message;
?>

<!-- unlink = hapus file foto -->