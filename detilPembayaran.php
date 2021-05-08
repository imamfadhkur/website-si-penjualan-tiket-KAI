<?php
	session_start();
	if (isset($_GET["idTiket"]) AND isset($_GET["idPembeli"]) AND isset($_GET["idKereta"])) {
		$idTiket=$_GET["idTiket"];
		$idPembeli=$_GET["idPembeli"];
		$idKereta=$_GET["idKereta"];
		
		include 'connect.php';
		
		$tabelKereta = $connection->query("SELECT * FROM kereta WHERE id_KA = ".$idKereta);
		$tabelPembeli = $connection->query("SELECT * FROM pembeli WHERE id_pembeli = ".$idPembeli);
		$tabelTiket = $connection->query("SELECT * FROM tiket WHERE id_tiket = ".$idTiket);

		if ($tabelKereta->num_rows==0) {
		echo "kolom tabel kereta kosong";
		}

		$tabelKereta = $tabelKereta->fetch_assoc();
		$tabelPembeli = $tabelPembeli->fetch_assoc();
		$tabelTiket = $tabelTiket->fetch_assoc();
	}else{
		echo "EROR!!! FORM BELUM TERKIRIM";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<title>Detail Pembayaran</title>
</head>
<body class="bg-warning">
	<header style="text-align: center;" class="bg-info text-light" >
		<!-- <h1>HEADER <br>-<br> PEMESANAN TIKET KERETA API</h1> -->
		<br><br>
		<h1>SISTEM INFORMASI</h1></td>
		<h2>PEMESANAN TIKET KERETA API</h2>
		<span>Melayani Sampai Tujuan </span>
		<br>
		<br>
	</header>
	<br>
	<div><img src="img/gif-kereta.gif" width="100%" ></div>
	<br>
	<div class="bg-light w-75" style="margin-left: auto; margin-right: auto; border: 1px solid black;">
	<br>
	<h2 class="text-dark text-center"><u>Detail Pembayaran</u></h2>
	<p class="text-center">Selamat menikmati perjalanan Anda</p><br>
		<img style="width: 520px; display: block; margin-left: auto; margin-right: auto; border: 2px solid black;" src="<?=$tabelKereta["gambarKereta"]?>">
	<table class="bg-light" style="margin-left: auto; margin-right: auto; ">
		<tr>
			<td>Nama Kereta</td>
			<td>:</td>
			<td><strong><?=$tabelKereta["nama_KA"]?></strong></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td>:</td>
			<td><?=$tabelKereta["stasiun_keberangkatan"]?> - <?=$tabelKereta["stasiun_kedatangan"]?></td>
		</tr>
		<tr>
			<td>Waktu</td>
			<td>:</td>
			<td><?=$tabelKereta["waktu_keberangkatan"]?> - <?=$tabelKereta["waktu_kedatangan"]?></td>
		</tr>
		<tr>
			<td>Nomor Kursi</td>
			<td>:</td>
			<td><?=$tabelTiket["nomor_kursi"]?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td><u><strong>Rp. <?=number_format($tabelKereta["harga"])?>,00</strong></u></td>
		</tr>
		<tr>
			<td>Nama Pembeli</td>
			<td>:</td>
			<td><?=$tabelPembeli["nama_pembeli"]?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?=$tabelPembeli["alamat"]?></td>
		</tr>
	</table><br>
	Transfer ke no. rek. : <strong><font size="4">03-8897-06-9</font><br>BNI. A/N : ANISA SEPTIARINI</strong>
	Atau ke 		     : <strong><font size="4">0049-01-063724-50-8</font><br>BRI. A/N : IMAM FADHKUR ROKHIM</strong>
	Atau ke 	   	     : <strong><font size="4">0940-24-50-8990</font><br>BCA. A/N : ASFANI RAHMATULLAH</strong>
	<br>
	<br>
	<i>*Silahkan anda proses terlebih dahulu pembayaran,<br> lalu validasi dengan mengupload foto bukti transfer ke kolom upload dibawah ini.</i>
	<br><br>
	<form method="post" action="detilTiket.php" enctype="multipart/form-data">
		<table style="background-color: rgb(200, 200, 200); margin-left: auto; margin-right: auto; border: 2px solid black; padding: 10px;">
			<tr>
				<td>&ensp;Upload Bukti Transfer</td>
				<td>:</td>
				<td><input type="file" name="fotoTransfer"> &ensp;</td>
			</tr>
			<tr>
				<td><button onclick="return confirm('Yakin ingin membatalkan ?')">BATAL</button></td>
				<td></td>
				<td><button type="submit">KIRIM</button>&ensp;</td>
			</tr>
			<tr>
				<td><input type="hidden" name="idKereta" value="<?=$tabelKereta["id_KA"]?>">&ensp;</td>
				<td><input type="hidden" name="idPembeli" value="<?=$tabelPembeli["id_pembeli"]?>"></td>
				<td><input type="hidden" name="idTiket" value="<?=$tabelTiket["id_tiket"]?>">&ensp;</td>
			</tr>
		</table>
	</form>
	<br>
	</div>
	<font style="font-style: bold; font-size: 20px; color: red;">
		<?php

			if (isset($_SESSION["message"])) {
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}

		?>
		</font>

	<p style="position: fixed; bottom: 0; right: 0; width: 200px;"><a href="mailto:cs@KAI.com"> <img src="img/cs.png" alt="Costumer Service !!!" style =" width: 35%; height: 35%;"> </a></p>
	<!-- <p style="position: fixed; bottom: 0; right: 0; width: 200px;"> <a href="mailto:cs@KAI.com"> <img border="0" alt="W3Schools" src="img/cs.png" width="100" height="100"> </a> </p> -->

	<footer style="bottom: 0px; left: 0px; right: 0px; top: auto; padding-top: 10px;padding-bottom: 20px; margin-top: 50px" class="bg-info">
		<center>
			<p style="color: white; text-decoration: none;">© Copyright MyGroup. All Rights Reserved</p>
			<a style="color: white; text-decoration: none;" class="border border-light bg-primary text-light" href="admin.php">&ensp;Log In Admin&ensp;</a>
		</center>
	</footer>

</body>
</html>