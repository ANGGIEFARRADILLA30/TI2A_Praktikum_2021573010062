<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$jenismenu = (isset($_POST['jenismenu'])) ? htmlentities($_POST['jenismenu']) : "";
$kategorimenu = (isset($_POST['kategorimenu'])) ? htmlentities($_POST['kategorimenu']) : "";

if(!empty($_POST['edit_kategori_menu_validate'])){
    $select = mysqli_query($conn, "SELECT kategori_menu from kategori_menu where kategori_menu = '$kategorimenu'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori Menu yang dimasukkan sudah ada");
        window.location="../kategorimenu"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE kategori_menu SET jenis_menu='$jenismenu', kategori_menu='$kategorimenu' WHERE id_kategori_menu='$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate");
                        window.location="../kategorimenu"</script>';
        } else {
            $message = '<script>alert("Data gagal diupdate");
                        window.location="../kategorimenu"</script>';
        }
    }
}echo $message;
?>