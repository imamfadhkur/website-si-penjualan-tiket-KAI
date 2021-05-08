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
		.tabel tr{
			background-color: black;
			color: white;
		}
		.tabel img{
			width: 100%;
			height: auto;
		}
	</style>
</head>
<body>
	<header style="text-align: center;" class="bg-success text-light" >
		<!-- <h1>HEADER <br>-<br> PEMESANAN TIKET KERETA API</h1> -->
		<br>
		<h1>SISTEM INFORMASI</h1></td>
		<h2>PEMESANAN TIKET KERETA API</h2>
		<span>Melayani Sampai Tujuan </span>
		<br>
		<br>
	</header>
	<div><img src="img/gif-kereta.gif" width="100%" ></div>
	<div class="bg-warning"><br></div>
	<div class="text-center text-dark" style="background-color:#ffdc00;">
	<br>
	<h2><i>Jadwal Kereta Api Murah</i></h2>
	<br>
	</div>
	<section>
	<?php
		include 'connect.php';
		$getKereta = $connection->query("SELECT * FROM kereta WHERE harga < 200000");
		while ($fetchKereta = $getKereta->fetch_assoc()) {
			?>
				<table cellspacing="0" cellpadding="3" style="display:inline-table;width: 300px; width: 40%; border: 4px solid grey; margin: 10px; padding: 5px">
					<tr>
						<td colspan="3"><img style="width: 100%" src="<?=$fetchKereta['gambarKereta']?>"></td>
					</tr>
					<tr>
						<td colspan="3"><center><strong><?=$fetchKereta["nama_KA"]?></strong></center></td>
					</tr>
					<tr>
						<td>&nbsp;Stasiun keberangkatan</td>
						<td>:</td>
						<td><?=$fetchKereta["stasiun_keberangkatan"]?></td>
					</tr>
					<tr>
						<td>&nbsp;Stasiun tujuan</td>
						<td>:</td>
						<td><?=$fetchKereta["stasiun_kedatangan"]?></td>
					</tr>
					<tr>
						<td width="4">&nbsp;Waktu keberangkatan</td>
						<td>:</td>
						<td><?=$fetchKereta["waktu_keberangkatan"]?></td>
					</tr>
					<tr>
						<td width="4">&nbsp;Perkiraan waktu tiba</td>
						<td>:</td>
						<td><?=$fetchKereta["waktu_kedatangan"]?></td>
					</tr>
					<tr>
						<td>&nbsp;Harga</td>
						<td>:</td>
						<td>Rp. <?=number_format($fetchKereta["harga"])?></td>
					</tr>
					<tr>
						<td class="link" style="margin-left: 0px"><a href="pesan_tiket.php?id_kereta_pemesanan=<?=$fetchKereta['id_KA']?>">Pesan</a></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					</tr>
				</table>
			<?php
		}
	?>
	</section>
			<br><br>
	<section>
		<a style="text-decoration: none; padding: 10px; color: white; background-color: blue; font-style: bold; font-size: 24px; border-radius: 8px; border: 2px solid black" href="semuaJadwalKAI.php"><i>Semua jadwal kereta api</i></a><br><br><br>
		<a style="text-decoration: none; padding: 10px; color: white; background-color: blue; font-style: bold; font-size: 24px; border-radius: 8px; border: 2px solid black" href="index.php"><i>Halaman depan</i></a><br>
	</section>
	<p style="position: fixed; bottom: 0; right: 0; width: 200px;"><a href="mailto:cs@KAI.com"> <img src="img/cs.png" alt="Costumer Service !!!" style =" width: 35%; height: 35%;"> </a></p>

	<footer style="bottom: 0px; left: 0px; right: 0px; top: auto; padding-top: 10px;padding-bottom: 20px; margin-top: 50px" class="bg-success">
		<center>
			<p style="color: white; text-decoration: none;">© Copyright MyGroup. All Rights Reserved</p>
			<a style="color: white; text-decoration: none;" class="border border-light bg-success text-light" href="admin.php">&ensp;Log In Admin&ensp;</a>
		</center>
	</footer>

</body>
</html>