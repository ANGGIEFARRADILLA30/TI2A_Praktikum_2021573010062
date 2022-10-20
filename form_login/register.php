<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Membuat Register</h1>

	<form action="register_proses.php" method="post">		
		<table>
			<tr>
				<td>NIM</td>
				<td><input type="text" name="nim"></td>
			</tr>
            <tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
            <tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
            <tr>
				<td>IPK</td>
				<td><input type="text" name="ipk"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td><input type="submit" name="login" value="Log In" style="color: green;"></td>
                <td><input type="reset" nama="reset" value="Reset" style="color: red;"></td>
			</tr>
		</table>
	</form>

</body>
</html>