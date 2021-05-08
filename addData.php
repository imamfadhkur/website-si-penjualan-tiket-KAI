<?php
	session_start();
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
	include 'connect.php';

	if (isset($_POST["nama_KA"])) {
		include 'connect.php';

		$nama_KA = $_POST["nama_KA"];
		$stasiun_keberangkatan = $_POST["stasiun_keberangkatan"];
		$waktu_keberangkatan = $_POST["waktu_keberangkatan"];
		$stasiun_kedatangan = $_POST["stasiun_kedatangan"];
		$waktu_kedatangan = $_POST["waktu_kedatangan"];
		$harga = $_POST["harga"];
		$kapasitas_kursi = $_POST["kapasitas_kursi"];
		$gambarKereta = $_FILES["gambarKereta"];

		$message = "";

		if ($nama_KA == "") {
			$message = "nama kereta harus diisi!";
		}
		elseif ($stasiun_keberangkatan == "") {
			$message = "stasiun keberangkatan harus diisi!";
		}
		elseif ($waktu_keberangkatan == "") {
			$message = "waktu berangkat harus diisi!";
		}
		elseif ($stasiun_kedatangan == "") {
			$message = "stasiun tujuan harus diisi!";
		}
		elseif ($waktu_kedatangan == "") {
			$message = "waktu datang harus diisi!";
		}
		elseif ($harga == "") {
			$message = "harga tiket harus diisi!";
		}
		elseif ($kapasitas_kursi == "") {
			$message = "kapasitas kursi harus diisi!";
		}
		elseif (!isset($gambarKereta["tmp_name"]) || $gambarKereta["tmp_name"] == "") {
			$message = "gambar harus dipilih!";
		}
		else{

			$filePath = "image/".basename($gambarKereta["name"]);
			move_uploaded_file($gambarKereta["tmp_name"], $filePath);

			$connection->query("INSERT INTO kereta VALUES (NULL, '".$nama_KA."', '".$stasiun_keberangkatan."', '".$waktu_keberangkatan."', '".$stasiun_kedatangan."', '".$waktu_kedatangan."', '".$harga."', '".$kapasitas_kursi."','".$filePath."')");
			$lastIDkereta = mysqli_insert_id($connection);

			$message = "Sukses menambahkan kereta baru dengan ID = ".$lastIDkereta;
		}

		$_SESSION["message"] = $message;

	}

	elseif (isset($_POST["nama_pembeli"])) {
		include 'connect.php';

		$nama_pembeli = $_POST["nama_pembeli"];
		$id_KA = $_POST["id_kereta_pemesanan"];
		$jk = $_POST["jk"];
		$alamat = $_POST["alamat"];
		$noTelp = $_POST["noTelp"];
		$nomor_kursi = $_POST["nomor_kursi"];

		$message = "";

		if ($nama_pembeli == "") {
			$message = "anda harus mengisi nama!";
		}
		elseif ($jk == "") {
			$message = "pilih jenis kelamin anda!";
		}
		elseif ($alamat == "") {
			$message = "isikan alamat lengkap anda!";
		}
		elseif ($noTelp == "") {
			$message = "isikan nomor handphone anda!";
		}
		elseif ($nomor_kursi == "") {
			$message = "pilih kursi yang akan anda tempati!";
		}
		else{
			$connection->query("INSERT INTO pembeli VALUES (NULL, '".$nama_pembeli."', '".$alamat."', '".$jk."', '".$noTelp."')");
			$lastIDpembeli = mysqli_insert_id($connection);
			$connection->query("INSERT INTO tiket VALUES (NULL, '".$lastIDpembeli."', '".$id_KA."', '".$nomor_kursi."')");
			$lastIDtiket = mysqli_insert_id($connection);

			// $message = "Sukses menambahkan tiket baru dengan id tiket ".$lastIDtiket;
			header("location:detilPembayaran.php?idTiket=$lastIDtiket&idPembeli=$lastIDpembeli&idKereta=$id_KA");
			exit();
		}

		$_SESSION["message"] = $message;
		header("location:insert.php");
		exit();

	}

	header("location:insert.php");
	exit();

?>