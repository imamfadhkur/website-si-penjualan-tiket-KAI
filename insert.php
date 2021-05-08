<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>insert</title>
</head>
<body>
	<div>
	<h1 class="text-light bg-danger text-center" style="padding: 20px; margin: 0px">Insert Data</h1>
	</div>
	<div class="bg-warning" style="margin: 0;"><br>
	</div>
	<div>
	<h3 class="text-light bg-danger text-center" style="padding: 20px; margin: 0px;">Masukkan Data Kereta Api</h3></div>	
	<div class="bg-warning" style="margin: 0;"><br>
	</div>
	<br>
		<form action="addData.php" method="post" enctype="multipart/form-data">
			<table class="bg-light">
				<tr>
					<td>Nama Kereta Api</td>
					<td>:</td>
					<td><input type="text" name="nama_KA" required="required"></td>
				</tr>
				<tr>
					<td>Stasiun Keberangkatan</td>
					<td>:</td>
					<td><input type="text" name="stasiun_keberangkatan" required="required"></td>
				</tr>
				<tr>
					<td>Waktu Keberangkatan</td>
					<td>:</td>
					<td><input type="datetime" name="waktu_keberangkatan" value="<?php echo date('d/m/y h:i:s');?>" required="required"></td>
				</tr>
				<tr>
					<td>Stasiun Tujuan</td>
					<td>:</td>
					<td><input type="text" name="stasiun_kedatangan" required="required"></td>
				</tr>
				<tr>
					<td>Waktu Kedatangan</td>
					<td>:</td>
					<td><input type="datetime" name="waktu_kedatangan" value="<?php echo date('d/m/y h:i:s');?>" required="required"></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>:</td>
					<td><input type="number" name="harga" required="required"></td>
				</tr>
				<tr>
					<td>Kapasitas Kursi</td>
					<td>:</td>
					<td><input type="number" name="kapasitas_kursi" required="required"></td>
				</tr>
				<tr>
					<td>Gambar Kereta</td>
					<td>:</td>
					<td><input type="file" name="gambarKereta" required="required"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="SUBMIT"><!-- <button>TAMBAH</button> --></td>
				</tr>
			</table>
		</form>

		<?php

			if (isset($_SESSION["message"])) {
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}

		?>
		<p style="position: fixed; bottom: 0; right: 0; width: 200px;"><a href="mailto:cs@KAI.com"> <img src="img/cs.png" alt="Costumer Service !!!" style =" width: 35%; height: 35%;"> </a></p>
		<footer style="bottom: 0px; left: 0px; right: 0px; top: auto; padding-top: 10px;padding-bottom: 20px; margin-top: 50px" class="bg-danger">
			<center>
				<p style="color: white; text-decoration: none;">© Copyright MyGroup. All Rights Reserved</p>
				<a style="color: white; text-decoration: none;" class="border border-light bg-danger text-light" href="admin.php">&ensp;Log In Admin&ensp;</a>
			</center>
		</footer>
	
</body>
</html>