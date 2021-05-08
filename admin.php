<?php
		session_start();
		$username = 'admin';
		$password = 'A';

		if (isset($_POST['submit'])) {
			if ($_POST['username'] == $username && $_POST['password'] == $password) {
				admin();
				exit();
			}else{
				display_login();
				echo "Username atau password tidak benar";
			}
		}else{
			display_login();
		}

		function display_login(){ ?>
			<h1 style="text-align: center; background-color: rgb(255, 165, 0); font-size: 60px; padding:20px; margin:0px; font-family: Calibri;" > Log In Admin</h1>
				<div><img src="img/gif-kereta.gif" width="100%" ></div>
				<div><img src="img/admin line.png" width="100%" height="5%";></div>
				<h1 style="text-align: center; font-size: 25px; font-family: Arial; text-color: #ffffff;"><u>Masukkan username dan kata sandi anda</u></h1>
				<div><img src="img/admin line.png" width="100%" height="5%" style="-webkit-transform: scaleX(-1); transform: scaleX(-1);"></div>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' style="background-color: #f2f2f2; font-family: Arial;"><br><br>
				<label style="padding: 10px; margin: 5px; font-size: 20px" for="username"><u>Username	:</u></label>
				<input style="padding: 10px; margin: 5px; height:10px" type="text" name="username" id="username"><br>
				<label style="padding: 10px; margin: 5px; font-size: 20px" for="password"><u>Password	:</u></label>
				<input style="padding: 10px; margin: 5px 10px 0px 10px; height:10px;" type="password" name="password" id="password"><br><br>
				<input style="padding: 5px 10px 5px 10px; margin: 0px 5px 5px 20px; background-color: green; color: white; text-decoration: none; border-radius: 10%;" type="submit" name="submit" value="submit">
				<div>Tidak dapat masuk ? <a href="mailto:cs@KAI.com">klik disini ...</a></div>
				<div><img src="img/admin line.png" width="100%" height="5%";></div>
				<footer style="background-color: black; bottom: 0px; left: 0px; right: 0px; top: auto; padding-top: 10px;padding-bottom: 20px; margin-top: 10px;">
					<center>
						<p style="color: white; text-decoration: none; margin: 0;">© Copyright MyGroup. All Rights Reserved</p>
						<a style="color: white; text-decoration: none; margin: 0;" href=#>IT Admin</a>
					</center>
				</footer>
			</form>
			

<?php }		
		function admin(){ ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Admin Page</title>
	<style type="text/css">
		.a {
			margin: 20px;
			text-decoration: none;
			color: white;
			padding: 5px 20px 5px 20px;
			background-color: deepskyblue;
			border-color: black;
			border-radius: 5%;
			border-width: 2px;
		}
		.a:hover {
			margin: 20px;
			text-decoration: none;
			color: blue;
			padding: 5px 20px 5px 20px;
			background-color: rgb(191, 187, 176);
			border-color: black;
			border-radius: 5%;
			border-width: 2px;
		}
		.link a{
			background-color: #dcdcdc;
			text-decoration: none;
			padding-left: 5px;
			padding-right: 5px;
			padding-top: 2px;
			padding-bottom: 2px;
			color: black;
			border: 2px solid grey;
		}
	</style>
</head>
<body>
	
	<section>
		<div class="text-center bg-secondary text-light">
		<br>
		<h1><i>WELCOME - IT Admin</i></h1>
				<?php

			if (isset($_SESSION["message"])) {
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}

		?>
		<span>Pusat Pengaturan Sistem Reservasi Kereta Api</span>
		<br>
		<br>
		</div>
		<div class="bg-light">
		<br>
		<table cellpadding="12">
			<tr>
				<td><strong><i><a class="a" href="index.php">HALAMAN DEPAN</a></i></strong></td>
				<td><strong><i><a class="a" href="insert.php">TAMBAHKAN DATA</a></i></strong></td>
			</tr>
		</table>
		<br>
		</div>
	</section>

	<section>
		<?php
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
		print_r($arrayDitempati);
		for ($i=1; $i <= $kapasitas; $i++) {
		$isi = 'y';
			for ($j=0; $j < count($arrayDitempati); $j++) { 
				//echo ' i :',$i, ' arr :', $arrayDitempati[$j],'<br>';
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
	//print_r(get_kursi_kosong(3));
		?>
	</section>

	<section>
		<h3><i>Tabel Kereta Api</i></h3>

		<!-- nama kereta, tujuan, waktu berangkat, stasiun tujuan, waktu tiba -->
		<table border="1" cellspacing="0" cellpadding="6">
			<tr>
				<td><center>gambarKereta</center></td>
				<td><center>id_KA</center></td>
				<td><center>nama_KA</center></td>
				<td><center>Stasiun_Keberangkatan</center></td>
				<td><center>waktu_keberangkatan</center></td>
				<td><center>stasiun_kedatangan</center></td>
				<td><center>waktu_kedatangan</center></td>
				<td><center>harga</center></td>
				<td><center>kapasitas_kursi</center></td>
				<td>option</td>
			</tr>

		<?php
		include 'connect.php';
		$getKereta = $connection->query("SELECT * FROM kereta");
		while ($fetchKereta = $getKereta->fetch_assoc()) {
			?>
				<tr>
					<td><img style="width: 100px" src="<?=$fetchKereta["gambarKereta"]?>"></td>
					<td><center><?=$fetchKereta["id_KA"]?></center></td>
					<td><center><strong><?=$fetchKereta["nama_KA"]?></strong></center></td>
					<td><?=$fetchKereta["stasiun_keberangkatan"]?></td>
					<td><?=$fetchKereta["waktu_keberangkatan"]?></td>
					<td><?=$fetchKereta["stasiun_kedatangan"]?></td>
					<td><?=$fetchKereta["waktu_kedatangan"]?></td>
					<td>Rp. <?=number_format($fetchKereta["harga"])?></td>
					<td><?=$fetchKereta["kapasitas_kursi"]?></td>
					<td class="link">
						<a href="update.php?id_KA=<?=$fetchKereta["id_KA"]?>">update</a><br><br>
						<a href="delete.php?id_kereta=<?=$fetchKereta["id_KA"]?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?\n coba difikir dulu ...')">delete</a>
					</td>
				</tr>
			<?php
		}
	?>
		</table>
	</section>

	<section>
		<h3><i>Tabel Pembeli</i></h3>

			<!-- nama kereta, tujuan, waktu berangkat, stasiun tujuan, waktu tiba -->
		<table border="1" cellspacing="0" cellpadding="6">
			<tr>
				<td><center>id_pembeli</center></td>
				<td><center>nama_pembeli</center></td>
				<td><center>alamat</center></td>
				<td><center>jk</center></td>
				<td><center>noTelp</center></td>
				<td>option</td>
			</tr>

		<?php
		include 'connect.php';
		$getPembeli = $connection->query("SELECT * FROM Pembeli");
		while ($fetchPembeli = $getPembeli->fetch_assoc()) {
			?>
				<tr>
					<td><center><?=$fetchPembeli["id_pembeli"]?></center></td>
					<td><center><strong><?=$fetchPembeli["nama_pembeli"]?></strong></center></td>
					<td><?=$fetchPembeli["alamat"]?></td>
					<td><?=$fetchPembeli["jk"]?></td>
					<td><?=$fetchPembeli["noTelp"]?></td>
					<td class="link">
						<a href="update.php?id_pembeli=<?=$fetchPembeli["id_pembeli"]?>">update</a><br><br>
						<a href="delete.php?id_pembeli=<?=$fetchPembeli["id_pembeli"]?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?\n coba difikir dulu ...')">delete</a>
					</td>
				</tr>
			<?php
		}
	?>
		</table>
	</section>

	<section>
		<h3><i>Tabel Tiket</i></h3>

			<!-- nama kereta, tujuan, waktu berangkat, stasiun tujuan, waktu tiba -->
		<table border="1" cellspacing="0" cellpadding="6">
			<tr>
				<td><center>id_tiket</center></td>
				<td><center>id_pembeli</center></td>
				<td><center>id_KA</center></td>
				<td><center>nomor_kursi</center></td>
				<td>option</td>
			</tr>

		<?php
		include 'connect.php';
		$getTiket = $connection->query("SELECT * FROM tiket");
		while ($fetchTiket = $getTiket->fetch_assoc()) {
			?>
				<tr>
					<td><center><?=$fetchTiket["id_tiket"]?></center></td>
					<td><center><strong><?=$fetchTiket["id_pembeli"]?></strong></center></td>
					<td><?=$fetchTiket["id_KA"]?></td>
					<td><?=$fetchTiket["nomor_kursi"]?></td>
					<td class="link">
						<a href="update.php?id_tiket=<?=$fetchTiket["id_tiket"]?>">update</a><br><br>
						<a href="delete.php?id_tiket=<?=$fetchTiket["id_tiket"]?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?\n coba difikir dulu ...')">delete</a>
					</td>
				</tr>
			<?php
		}
	?>
		</table>
		<p style="position: fixed; bottom: 0; right: 0; width: 200px;"><a href="mailto:cs@KAI.com"> <img src="img/cs.png" alt="Costumer Service !!!" style =" width: 35%; height: 35%;"> </a></p>
	</section>

	<footer style="bottom: 0px; left: 0px; right: 0px; top: auto; padding-top: 10px;padding-bottom: 20px; margin-top: 50px" class="bg-secondary">
		<center>
			<p style="color: white; text-decoration: none;">© Copyright MyGroup. All Rights Reserved</p>
			<a style="color: white; text-decoration: none;" class="border border-light bg-secondary text-light" href="admin.php">&ensp;Log In Admin&ensp;</a>
		</center>
	</footer>

	<script language="javascript" type="text/javascript">
		
		function hapus(id) {
			if (confirm("Apakah Anda Yakin Ingin Menghapus ?\n coba difikir dulu...")) {
				window.location.href = 'delete.php?id='+id;
			}
		}

	</script>

</body>
</html>

<?php }	?>