<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

if(empty($username)|| empty($password)==""){
    echo"<script>
    alert('username dan password tidak boleh kosong');
    window.location=history.go(-1);
    </script>";
}else {
    $conn = mysqli_connect("localhost","root","","db_2a_mahasiswa");
    $query = mysqli_query($conn,"SELECT * FROM tb_mahasiswa WHERE nim='$username' && 
    password='$password'");
    $data = mysqli_fatch($query);
    if($data) {
        //echo "<script>window.location='dashboard.php'</script>";
        $_SESSION['username_xyz']=$username;
        header("location=dashboard.php");
    }else{
    echo"<script>alert('anda gagal login');
    window.history.back();
    </script>";
}
}
?>