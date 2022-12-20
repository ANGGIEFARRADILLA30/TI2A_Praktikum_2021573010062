<?php
include "connect.php";
// $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$name = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";

if (empty($_POST['input_order_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE nama_menu = '$name'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert ("Username yang anda masukan sudah ada");
        window.location="../order"
        </script>';
    } else {

        $query = mysqli_query($conn, "INSERT INTO tb_order (nama_menu,jumlah,harga)
    values ('$name','$jumlah','$harga')");

        if ($query) { //coba diperhatikan != nya
            $message = '<script>alert ("Order Berhasil dimasukkan")
        window.location="../order"
        </script>';
        } else {
            $message = '<script>alert ("Order gagal dimasukkan")
        window.location="../order"
        </script>';
        }
    }
}
echo $message;
