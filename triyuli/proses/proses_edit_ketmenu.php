<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$jenismenu = (isset($_POST['jenismenu'])) ? htmlentities($_POST['jenismenu']) : "";
$ketmenu = (isset($_POST['ketmenu'])) ? htmlentities($_POST['ketmenu']) : "";

if (!empty($_POST['input_ketmenu_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_menu FROM tb_kategori_menu WHERE kategori_menu = '$ketmenu'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert ("Kategori yang anda masukan sudah ada");
        window.location="../ketmenu"
        </script>';
    } else {
        $query = mysqli_query($conn, "UPDATE tb_kategori_menu SET jenis_menu='$jenismenu', kategori_menu='$ketmenu' WHERE id_ket_menu='$id'");
        if ($query) {
            $message = '<script>alert("Data Berhasil Di Update");
        window.location="../ketmenu"</script>';
        } else {
            $message = '<script>alert("Data Gagal Di Update");
            window.location="../ketmenu"</script>';
        }
    }
}
echo $message;
?>

// menit 7:00