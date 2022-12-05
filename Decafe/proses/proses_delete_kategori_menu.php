<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "" ;

if(!empty($_POST['hapus_kategori_validate'])){
    $select = mysqli_query($conn, "SELECT kategori FROM daftarmenu WHERE kategori= '$id'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori telah digunakan pada Daftar Menu. Kategori tidak dapat dihapus.");
                    window.location="../kategorimenu"</script>';
    }else{
    $query = mysqli_query($conn, "DELETE FROM kategori_menu WHERE id_kategori_menu='$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
                    window.location="../kategorimenu"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus");
                    window.location="../kategorimenu"</script>';
    }
}
}echo $message;
?>