<?php
include "connect.php";
$jenismenu = (isset($_POST['jenismenu'])) ? htmlentities($_POST['jenismenu']) : "";
$ketmenu = (isset($_POST['ketmenu'])) ? htmlentities($_POST['ketmenu']) : "";

if (!empty($_POST['input_ketmenu_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_menu FROM tb_kategori_menu WHERE kategori_menu = '$ketmenu'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert ("Kategori yang anda masukan sudah ada");
        window.location="../user"
        </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_kategori_menu (jenis_menu,kategori_menu)
        values ('$jenismenu','$ketmenu')");
        if (!$query) { //coba diperhatikan != nya
            $message = '<script>alert ("Data gagal dimasukkan");
            window.location="../ketmenu"</script>';
            
        } else {
            $message = '<script>alert ("Data berhasil dimasukkan");
        window.location="../ketmenu"
        </script>';
        }
    }
}
echo $message;
?>
