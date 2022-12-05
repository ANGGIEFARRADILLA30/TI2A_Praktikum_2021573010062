<?php
include "connect.php";
$jenismenu = (isset($_POST['jenismenu'])) ? htmlentities($_POST['jenismenu']) : "";
$kategorimenu = (isset($_POST['kategorimenu'])) ? htmlentities($_POST['kategorimenu']) : "";

if (!empty($_POST['input_katmenu_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_menu from kategori_menu where kategori_menu = '$kategorimenu'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori yang dimasukkan sudah ada");
        window.location="../kategorimenu"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT into kategori_menu (jenis_menu,kategori_menu) values ('$jenismenu','$kategorimenu')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan")
        window.location="../kategori_menu"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")
            window.location="../kategori_menu"</script>';
        }
    }
}
echo $message;
?>