<?php
	session_start();
	include 'connect.php';

	if (isset($_POST["idKereta"])) {
		include 'connect.php';

		$fotoTransfer = $_FILES["fotoTransfer"];
		$idKereta = $_POST["idKereta"];
		$idPembeli = $_POST["idPembeli"];
		$idTiket = $_POST["idTiket"];

		$message = "message kosong";

		if (!isset($fotoTransfer["tmp_name"]) || $fotoTransfer["tmp_name"] == "") {
			$message = "*Anda Belum Melakukan Pembayaran";

			echo $message;
		
			$_SESSION["message"] = $message;
			header("location:detilPembayaran.php?idTiket=$idTiket&idPembeli=$idPembeli&idKereta=$idKereta");
			exit();

		}
		else{
			include 'connect.php';
		
			$tabelKereta = $connection->query("SELECT * FROM kereta WHERE id_KA = ".$idKereta);
			$tabelPembeli = $connection->query("SELECT * FROM pembeli WHERE id_pembeli = ".$idPembeli);
			$tabelTiket = $connection->query("SELECT * FROM tiket WHERE id_tiket = ".$idTiket);

			$tabelKereta = $tabelKereta->fetch_assoc();
			$tabelPembeli = $tabelPembeli->fetch_assoc();
			$tabelTiket = $tabelTiket->fetch_assoc();

		}
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
	<title>Tiket Anda</title>
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

	<section class="bg-light" 
		style="border: 2px solid black; width: 500px; height: auto; padding: 20px; margin-left: auto; margin-right: auto; margin-top: 5%; margin-bottom: 5%;">
	<u><h1 class="text-center">Detail Tiket:</h1></u>
	<br>
	<table >
		<tr>
			<td>Nama Pembeli</td>
			<td>:</td>
			<td><strong><?=$tabelPembeli["nama_pembeli"]?></strong></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>:</td>
			<td><?=$tabelPembeli["jk"]?></td>
		</tr>
		<tr>
			<td>Nama Kereta</td>
			<td>:</td>
			<td><?=$tabelKereta["nama_KA"]?></td>
		</tr>
		<tr>
			<td>Berangkat Dari</td>
			<td>:</td>
			<td><?=$tabelKereta["stasiun_keberangkatan"]?></td>
		</tr>
		<tr>
			<td>Waktu Berangkat</td>
			<td>:</td>
			<td><?=$tabelKereta["waktu_keberangkatan"]?></td>
		</tr>
		<tr>
			<td>Tiba Di</td>
			<td>:</td>
			<td><?=$tabelKereta["stasiun_kedatangan"]?></td>
		</tr>
		<tr>
			<td>perkiraan Waktu Tiba</td>
			<td>:</td>
			<td><?=$tabelKereta["waktu_kedatangan"]?></td>
		</tr>
	</table>
	<strong><p>KODE TIKET : <?=$tabelPembeli["id_pembeli"]?>.<?=$tabelKereta["id_KA"]?>.<?=$tabelTiket["id_tiket"]?></p></strong>
	<i style="color: blue">*Mohon untuk dijaga tiket ini, <br>dan ditunjukkan dengan bukti identitas diri lainnya (KTP/SIM/Paspor/dll.) ketika pemeriksaan.</i>
	</section>
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