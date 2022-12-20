<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$name = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";


if (!empty($_POST['input_order_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order = '$id'");
    if (mysqli_num_rows($select) < 0) {
        $message = '<script>alert ("GAGAL EDIT");
        window.location="../order"
        </script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_order SET nama_menu='$name',jumlah='$jumlah',
    harga='$harga' WHERE id_order='$id'");
        if ($query) {
            $message = '<script>alert("Order Berhasil Di Update");
            window.location="../order"</script>';
        } else {
            $message = '<script>alert("Order Gagal Di Update");
            window.location="../order"</script>';
        }
    }
}
echo $message;
?>