<?php
	session_start();

	if (!isset($_GET["id_kereta_pemesanan"])) {
		header("location:index.php");
		exit();
	}

	include 'connect.php';

	$id_kereta_pemesanan = $_GET["id_kereta_pemesanan"];

		function get_kursi_kosong($id_KA){
		include 'connect.php';
		$kapasitas_kursi = $connection->query("SELECT kapasitas_kursi FROM kereta WHERE id_KA = ".$id_KA);
		$kapasitas_kursi = $kapasitas_kursi->fetch_array();
		$kapasitas = intval($kapasitas_kursi[0]);
		$kursi_ditempati = $connection->query("SELECT nomor_kursi FROM tiket WHERE id_KA = ".$id_KA);
		$arrayDitempati = array();
		while ($fetchDitempati = $kursi_ditempati->fetch_assoc()) {
			$arrayDitempati[]= $fetchDitempati["nomor_kursi"];
		}
		$kursi_kosong = array();
		$index = 0;
		for ($i=1; $i <= $kapasitas; $i++) {
		$isi = 'y';
			for ($j=0; $j < count($arrayDitempati); $j++) {
				if ($i == $arrayDitempati[$j]) {
					$isi = 't';
				}
			}
			if ($isi == 'y') {
				$kursi_kosong[$index]=$i;
				$index = $index+1;
			}
		}
		return($kursi_kosong);
	}
	//print_r(get_kursi_kosong($id_kereta_pemesanan))
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>pesan tiket</title>
	
</head>
<body>
	<div class="bg-warning text-center">
	<br><br>
	<h1 class="text-dark" >Pemesanan Tiket Kereta Api</h1>
	<span class="text-light"><i>Pesan tiket anda sekarang juga !!!</i></span>
	<br><br>
	</div>
	<div><img src="img/gif-kereta.gif" width="100%" ></div>
	<div class="bg-light">
	<br>
		<form action="addData.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_kereta_pemesanan" value="<?=$_GET["id_kereta_pemesanan"]?>">
			<table cellspacing="18" style="border-collapse: collapse; border: 2px solid blue; margin-left:auto; margin-right:auto;">
				<tr><td><br></td>
				<td><br></td>
				<td><br></td>
				<td><br></td>
				</tr>
				<tr>
				<td colspan="4"><h3>&ensp;Formulir Pemesanan Tiket Kereta Api&ensp;</h3></td>
				<tr>
				<td><br></td>
				<td><br></td>	
				<td><br></td>
				<td><br></td></tr>
				<tr>
					<td>&ensp;Nama Anda</td>
					<td>:</td>
					<td><input type="text" name="nama_pembeli" required="required"></td>
					<td><br></td>
				</tr>
				<tr>
					<td>&ensp;Jenis Kelamin</td>
					<td>:</td>
					<td><input type="radio" name="jk" value="P">Perempuan<br><input type="radio" name="jk" value="L">Laki-Laki</td>
					<td><br></td>
				</tr>
				<tr>
					<td>&ensp;Alamat</td>
					<td>:</td>
					<td><textarea name="alamat" rows="5" style="width: 170px"></textarea></td>
					<td><br></td>
				</tr>
				<tr>
					<td>&ensp;Nomor Handphone</td>
					<td>:</td>
					<td><input type="number" name="noTelp" required="required" placeholder="628xxx"></td>
					<td><br></td>
				</tr>
				<tr>
					<td>&ensp;Pilih Kursi</td>
					<td>:</td>
					<td><select name="nomor_kursi" style="width: 60px">
						<option disabled selected>Pilih</option>
						<?php
						$kursi = get_kursi_kosong($id_kereta_pemesanan);
						for ($i=0; $i < count($kursi); $i++) { 
							?>
							<option value="<?=$kursi[$i]?>"><?=$kursi[$i]?></option>
							<?php
						}
						?>
					</select><br><i>*kursi yang masih tersedia</i></td>
					<td><br></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="SUBMIT"></td>
					<td><br></td>
				</tr>
				<tr>
				<td><br></td>
				<td><br></td>
				<td><br></td>
				<td><br></td>
				</tr>
			</table>
		</form>

		<i>*NB: jika anda ingin memesan tiket lagi silahkan anda isi form diatas terlebih dahulu dan selesaikan pembayaran.<br>Lalu pesan lagi tiket yang anda inginkan seperti cara sebelumnya.</i>
		<br>
		<?php

			if (isset($_SESSION["message"])) {
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}

		?>
		<a href="index.php" class="btn btn-primary" role="button" aria-pressed="true">Home</a>
		</div>
		<footer style="bottom: 0px; left: 0px; right: 0px; top: auto; padding-top: 10px;padding-bottom: 20px; margin-top: 50px" class="bg-warning">
		<center>
			<p style="color: white; text-decoration: none;">© Copyright MyGroup. All Rights Reserved</p>
			<a style="color: white; text-decoration: none;" class="border border-secondary bg-warning text-dark" href="admin.php">&ensp;Log In Admin&ensp;</a>
		</center>
		</footer>
	
</body>
</html>