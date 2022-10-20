<?php
    $username     = $_POST['username'];
    $password     = md5($_POST['password']);
    $co_password  = md5(['confire_password']);
    $nama         = $_POST['nama'];
    $kelas        = $_POST['kelas'];
    $alamat       = $_POST['alamat'];
    $ipk          = $_POST['ipk'];

    if(empty($username) || empty($password) || empty($co_password)){
        echo "username dan password tidak boleh kosong";
    }else if($password != $co_password){
        echo "confire password harus sama";
    }else{
        $conn  = mysqli_connect("localhost","root","","db_2a_mahasiswa");
        $query = mysqli_query($conn,"INSERT INTO tb_mahasiswa(nim,password,nama,kelas,alamat,ipk) VALUES ('$username',
        '$username','$nama','$kelas','$alamat','$ipk')");
        if($query){
            echo "selamat anda berhasil mendaftar <a href='register.php'>Login</a>";
        }else{
            echo "anda gagal mendaftar";
        }
    }
?>