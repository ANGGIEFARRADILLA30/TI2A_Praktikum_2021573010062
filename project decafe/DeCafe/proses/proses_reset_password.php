<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "UPDATE  user SET
        password=md5('password') WHERE id = '$id'");
    if ($query) {
        $message = '<script>alert("Password Berhasil di Reset");
                        window.location="../user"</script>
                        </script>';
    } else {
        $message = '<script>alert("gagal")</script>';
    }
}
echo $message;
?>
