<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>insert - read</title>
	<style type="text/css">
		.link a{
			background-color: #dcdcdc;
			text-decoration: none;
			padding-left: 5px;
			padding-right: 5px;
			padding-top: 2px;
			padding-bottom: 2px;
			color: black;
			border: 2px solid grey;
			margin: 5px;
		}
		.tabel{
			width: 100%;
			height: 300px;
		}
		
		.tabel img{
			width: 100%;
			height: auto;
		}
	</style>
</head>
<body id="page-top">

	<header style="text-align: center;" class="bg-primary text-light" >
		<!-- <h1>HEADER <br>-<br> PEMESANAN TIKET KERETA API</h1> -->
		<br>
		<h1>SISTEM INFORMASI</h1></td>
		<h2>PEMESANAN TIKET KERETA API</h2>
		<span>Melayani Sampai Tujuan </span>
		<br>
		<br>
	</header>
	<div><img src="img/gif-kereta.gif" width="100%" ></div>
	<section class="bg-warning">
		<br>
		<h3 class="bg-warning text-center"><i>Jadwal Kereta Api dalam Satu Minggu Kedepan</i></h3>

			<!-- nama kereta, tujuan, waktu berangkat, stasiun tujuan, waktu tiba -->
		<table border="1" cellspacing="0" cellpadding="6" class="bg-light" >
			<tr>
				<td>Nama Kereta</td>
				<td>Stasiun Keberangkatan</td>
				<td>Waktu Berangkat</td>
				<td>Stasiun Tujuan</td>
				<td>Waktu Tiba</td>
				<td>Harga</td>
				<td></td>
			</tr>
		<?php
		include 'connect.php';
		$getKereta = $connection->query("SELECT * FROM kereta WHERE waktu_keberangkatan <= CURDATE()+7 AND waktu_keberangkatan >= CURDATE()");
		while ($fetchKereta = $getKereta->fetch_assoc()) {
			?>
				<tr>
					<td><strong><?=$fetchKereta["nama_KA"]?></strong></td>
					<td><?=$fetchKereta["stasiun_keberangkatan"]?></td>
					<td><?=$fetchKereta["waktu_keberangkatan"]?></td>
					<td><?=$fetchKereta["stasiun_kedatangan"]?></td>
					<td><?=$fetchKereta["waktu_kedatangan"]?></td>
					<td>Rp. <?=number_format($fetchKereta["harga"])?></td>
					<form>
					<td class="link"><a href="pesan_tiket.php?id_kereta_pemesanan=<?=$fetchKereta["id_KA"]?>">Pesan</a></td>
					</form>
				</tr>
			<?php
		}
	?>
		</table>
		<br>
	</section>
	<div class="bg-info"><br> <h3 class="bg-info text-light" style="text-align: center"><i>Jadwal Kereta Pilihan Untuk Anda</i></h3>
	<br>
	</div>
	<section class="bg-light">
	<?php
		include 'connect.php';
		$getKereta = $connection->query("SELECT * FROM kereta");
		while ($fetchKereta = $getKereta->fetch_assoc()) {
			?>
				<table cellspacing="0" cellpadding="3" style="display:inline-table;width: 300px" class="bg-light">
					<tr>
						<td colspan="3"><img style="width: 100%" src="<?=$fetchKereta["gambarKereta"]?>"></td>
					</tr>
					<tr>
						<td colspan="3"><center><strong><?=$fetchKereta["nama_KA"]?></strong></center></td>
					</tr>
					<tr>
						<td colspan="3"><?=$fetchKereta["stasiun_keberangkatan"]?> - <?=$fetchKereta["stasiun_kedatangan"]?></td>
					</tr>
					<tr>
						<td width="4">berangkat</td>
						<td>:</td>
						<td><?=$fetchKereta["waktu_keberangkatan"]?></td>
					</tr>
					<tr>
						<td width="4">tiba</td>
						<td>:</td>
						<td><?=$fetchKereta["waktu_kedatangan"]?></td>
					</tr>
					<tr>
						<td>Harga</td>
						<td>:</td>
						<td>Rp. <?=number_format($fetchKereta["harga"])?></td>
					</tr>
					<tr>
						<td class="link" style="margin-left: 0px"><a href="pesan_tiket.php?id_kereta_pemesanan=<?=$fetchKereta["id_KA"]?>">Pesan</a></td>
					</tr>
				</table>
			<?php
		}
	?>
	</section>

	<section class="bg-light">
		<h3><i>Tidak menemukan kereta yang anda inginkan ? coba cek</i></h3>
		<a class="btn btn-warning"  href="KAItermurah.php"><i>Jadwal kereta api termurah</i></a>
		<a class="btn btn-warning" href="semuaJadwalKAI.php"><i>Semua jadwal kereta api</i></a>
		<br><br>
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