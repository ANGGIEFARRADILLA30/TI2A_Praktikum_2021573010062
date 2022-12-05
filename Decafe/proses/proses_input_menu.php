<?php
include "connect.php";
$nama_menu = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kategori_menu = (isset($_POST['kategori_menu'])) ? htmlentities($_POST['kategori_menu']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";

$kode_rand = rand(10000, 99999)."-";
$target_dir = "../assets/img/".$kode_rand;
$target_file = $target_dir.basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (!empty($_POST['input_menu_validate'])){
// Cek Apakah gambar atau bukan
$cek = getimagesize($_FILES['foto']['tmp_name']);
if($cek == false){
    $message = "ini bukan file gambar";
    $statusUpload = 0;
}else{
    $statusUpload = 1;
    if(file_exists($target_file)){
        $message = "Maaf, file yang dimasukkan telah ada";
        $statusUpload = 0;
    }else{
        if($_FILES['foto']['size'] > 500000){ //500kb
            $message = "File foto yang diupload terlalu besar";
            $statusUpload = 0;
        }else{
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif"){
                $message = "Maaf, hanya diperbolehkan gambar yang memiiki format JPG, JPEG, PNG dan GIF";
                $statusUpload = 0;
            }
        }
    }
}

if($statusUpload == 0){
    $message = '<script>alert("Gambar tidak dapat diupload");
                window.location="../menu"</script>';
}else{
    $select = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE nama_menu = '$nama_menu'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Nama Menu yang dimasukkan sudah ada");
        window.location="../menu"</script>';
    }else{
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $query = mysqli_query($conn, "INSERT INTO daftar_menu (foto,nama_menu,keterangan,kategori,harga,stok) values('" . $kode_rand . $_FILES['foto']['name'] . "','$nama_menu','$keterangan','$kategori_menu','$harga','$stok')");
        if($query){
            $message = '<script>alert("Data berhasil dimasukkan");
                        window.location="../menu"</script>';
        }else{
            $message = '<script>alert("Data gagal dimasukkan");
                        window.location="../menu"</script>';
        }
        }else{
            $message = '<script>alert("Maaf, Terjadi Kesalahan File Tidak Dapat Diupload");
                        window.location="../menu"</script>';
        }
        }
    }
}
echo $message;
?>