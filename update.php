<?php
	session_start();

	if (isset($_GET["id_KA"])) {

	include 'connect.php';

	$id_KA = $_GET["id_KA"];

	$getData = $connection->query("SELECT * FROM kereta WHERE id_KA = ".$id_KA);

	if ($getData->num_rows==0) {
		header("location:index.php");
		exit();
	}
	$getDataKA = $getData->fetch_assoc();
	}

	elseif (isset($_GET["id_pembeli"])) {

	include 'connect.php';

	$id_pembeli = $_GET["id_pembeli"];

	echo "id pembeli ".$id_pembeli;

	$getData = $connection->query("SELECT * FROM pembeli WHERE id_pembeli = ".$id_pembeli);

	if ($getData->num_rows==0) {
		header("location:index.php");
		exit();
	}
	$getDataPembeli = $getData->fetch_assoc();
	}

	elseif (isset($_GET["id_tiket"])) {

	include 'connect.php';

	$id_tiket = $_GET["id_tiket"];

	echo "id tiket ".$id_tiket;

	$getData = $connection->query("SELECT * FROM tiket WHERE id_tiket = ".$id_tiket);

	if ($getData->num_rows==0) {
		header("location:index.php");
		exit();
	}

	$getDataTiket = $getData->fetch_assoc();

	}

	else{		
	}

			if (!isset($_GET["id_KA"])) {

			include 'connect.php';

			$id_KA = 1;
			$getData = $connection->query("SELECT * FROM kereta WHERE id_KA = ".$id_KA);

			if ($getData->num_rows==0) {
				header("location:index.php");
				exit();
			}
			$getDataKA = $getData->fetch_assoc();
			}

			if (!isset($_GET["id_pembeli"])) {

			include 'connect.php';

			$id_pembeli = 1;
			$getData = $connection->query("SELECT * FROM pembeli WHERE id_pembeli = ".$id_pembeli);

			if ($getData->num_rows==0) {
				header("location:index.php");
				exit();
			}
			$getDataPembeli = $getData->fetch_assoc();
			}

			if (!isset($_GET["id_tiket"])) {

			include 'connect.php';

			$id_tiket = 1;
			$getData = $connection->query("SELECT * FROM tiket WHERE id_tiket = ".$id_tiket);

			if ($getData->num_rows==0) {
				header("location:index.php");
				exit();
			}

			$getDataTiket = $getData->fetch_assoc();

			}
?>

<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
	
	<h1 style="margin-left: 20px; color: green;"><u>Update Data</u></h1>
	<hr style="border-color: green; border-width: 4px"><br><br>

	<section style="border: 2px solid black; padding-left: 10px; padding-bottom: 10px">
	<h3>Update Data Kerete Api</h3>
		<form action="updateData.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_KA" value="<?=$_GET["id_KA"]?>">
			<table>
				<tr>
					<td>ID Kereta</td>
					<td>:</td>
					<td><input type="text" name="id_KA_new" value="<?=$getDataKA["id_KA"]?>"></td>
				</tr>
				<tr>
					<td>Nama Kereta Api</td>
					<td>:</td>
					<td><input type="text" name="nama_KA" value="<?=$getDataKA["nama_KA"]?>"></td>
				</tr>
				<tr>
					<td>Stasiun Keberangkatan</td>
					<td>:</td>
					<td><input type="text" name="stasiun_keberangkatan" value="<?=$getDataKA["stasiun_keberangkatan"]?>"></td>
				</tr>
				<tr>
					<td>Waktu Keberangkatan</td>
					<td>:</td>
					<td><input type="datetime" name="waktu_keberangkatan" value="<?=$getDataKA["waktu_keberangkatan"]?>"></td>
				</tr>
				<tr>
					<td>Stasiun Tujuan</td>
					<td>:</td>
					<td><input type="text" name="stasiun_kedatangan" value="<?=$getDataKA["stasiun_kedatangan"]?>"></td>
				</tr>
				<tr>
					<td>Waktu Kedatangan</td>
					<td>:</td>
					<td><input type="datetime" name="waktu_kedatangan" value="<?=$getDataKA["waktu_kedatangan"]?>"></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>:</td>
					<td><input type="number" name="harga" value="<?=$getDataKA["harga"]?>"></td>
				</tr>
				<tr>
					<td>Kapasitas Kursi</td>
					<td>:</td>
					<td><input type="number" name="kapasitas_kursi" value="<?=$getDataKA["kapasitas_kursi"]?>"></td>
				</tr>
				<tr>
					<td>Gambar Kereta</td>
					<td>:</td>
					<td><input type="file" name="gambarKereta"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="SUBMIT"></td>
				</tr>
			</table>
		</form>
	</section>

	
	<section style="border: 2px solid black; padding-left: 10px; padding-bottom: 10px">
	<h3>Update Data Pembeli</h3>
	<br>
		<form action="updateData.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_pembeli" value="<?=$_GET["id_pembeli"]?>">
			<table>
				<tr>
					<td>ID Pembeli</td>
					<td>:</td>
					<td><input type="number" name="id_pembeli_new" value="<?=$getDataPembeli["id_pembeli"]?>"></td>
				</tr>
				<tr>
					<td>Nama Pembeli</td>
					<td>:</td>
					<td><input type="text" name="nama_pembeli" value="<?=$getDataPembeli["nama_pembeli"]?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea name="alamat" rows="5" style="width: 170px"><?=$getDataPembeli["alamat"]?></textarea></td>
				</tr>
				<tr>
					<?php $jkvalue = $getDataPembeli["jk"];?>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><input type="radio" name="jk" value="P"<?php echo ($jkvalue=='P'?' checked=checked':''); ?>>Perempuan<br><input type="radio" name="jk" value="L"<?php echo ($jkvalue=='L'?' checked=checked':''); ?>>Laki-Laki</td>
				</tr>
				<tr>
					<td>Nomor Handphone</td>
					<td>:</td>
					<td><input type="number" name="noTelp" value="<?=$getDataPembeli["noTelp"]?>"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="SUBMIT"></td>
				</tr>
			</table>
		</form>
	</section>

	
	<section style="border: 2px solid black; padding-left: 10px; padding-bottom: 10px">
	<h3>Update Data Tiket</h3>
	<br>
		<form action="updateData.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_tiket" value="<?=$_GET["id_tiket"]?>">
			<table>
				<tr>
					<td>ID Tiket</td>
					<td>:</td>
					<td><input type="number" name="id_tiket_new" value="<?=$getDataTiket["id_tiket"]?>"></td>
				</tr>
				<tr>
					<td>ID Pembeli</td>
					<td>:</td>
					<td><input type="number" name="id_pembeli" value="<?=$getDataTiket["id_pembeli"]?>"></td>
				</tr>
				<tr>
					<td>ID KA</td>
					<td>:</td>
					<td><input type="number" name="id_KA" value="<?=$getDataTiket["id_KA"]?>"></td>
				</tr>
				<tr>
					<td>Nomor Kursi</td>
					<td>:</td>
					<td><input type="number" name="nomor_kursi" value="<?=$getDataTiket["nomor_kursi"]?>"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="SUBMIT"></td>
				</tr>
			</table>
		</form>
	</section>

		<?php

			if (isset($_SESSION["message"])) {
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}

		?>

		<footer style="background-color: black; bottom: 0px; left: 0px; right: 0px; top: auto; padding-top: 10px;padding-bottom: 20px; margin-top: 10px">
		<center>
			<p style="color: white; text-decoration: none;">© Copyright MyGroup. All Rights Reserved</p>
			<a style="color: white; text-decoration: none;" href="admin.php">IT Admin</a>
		</center>
	</footer>
	
</body>
</html>