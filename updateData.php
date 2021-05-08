<?php
	session_start();
	if (isset($_POST["nama_KA"])) {
		include 'connect.php';

		$id_KA = $_POST["id_KA"];
		$id_KA_new = $_POST["id_KA_new"];
		$nama_KA = $_POST["nama_KA"];
		$stasiun_keberangkatan = $_POST["stasiun_keberangkatan"];
		$waktu_keberangkatan = $_POST["waktu_keberangkatan"];
		$stasiun_kedatangan = $_POST["stasiun_kedatangan"];
		$waktu_kedatangan = $_POST["waktu_kedatangan"];
		$harga = $_POST["harga"];
		$kapasitas_kursi = $_POST["kapasitas_kursi"];
		$gambarKereta = $_FILES["gambarKereta"];

		$message = "";

		if ($id_KA_new == "") {
			$message = "id kereta harus diisi!";
		}elseif ($nama_KA == "") {
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
		else{

			if (isset($gambarKereta["tmp_name"]) && $gambarKereta["tmp_name"] != "") {
			$filePath = "image/".basename($gambarKereta["name"]);
			move_uploaded_file($gambarKereta["tmp_name"], $filePath);

			$connection->query("UPDATE kereta SET gambarKereta='".$filePath."', id_KA = '".$id_KA_new."' WHERE id_KA = ".$id_KA);

			}

			$connection->query("UPDATE kereta SET id_KA = '".$id_KA_new."',nama_KA = '".$nama_KA."',stasiun_keberangkatan = '".$stasiun_keberangkatan."', waktu_keberangkatan = '".$waktu_keberangkatan."',stasiun_kedatangan = '".$stasiun_kedatangan."',waktu_kedatangan = '".$waktu_kedatangan."',harga = '".$harga."',kapasitas_kursi = '".$kapasitas_kursi."' WHERE id_KA = ".$id_KA);

			$message = "Sukses mengedit kereta!";
		}

		$_SESSION["message"] = $message;

		header("location:admin.php");
		exit();

	}
	if (isset($_POST["nama_pembeli"])) {
		include 'connect.php';

		$id_pembeli = $_POST["id_pembeli"];
		$id_pembeli_new = $_POST["id_pembeli_new"];
		$nama_pembeli = $_POST["nama_pembeli"];
		$alamat = $_POST["alamat"];
		$jk = $_POST["jk"];
		$noTelp = $_POST["noTelp"];

		$message = "";

		if ($id_pembeli_new == "") {
			$message = "id pembeli harus diisi!";
		}elseif ($nama_pembeli == "") {
			$message = "nama pembeli harus diisi!";
		}
		elseif ($alamat == "") {
			$message = "alamat harus diisi!";
		}
		elseif ($jk == "") {
			$message = "jenis kelamin harus diisi!";
		}
		elseif ($noTelp == "") {
			$message = "nomor telephone harus diisi!";
		}
		else{

			$connection->query("UPDATE pembeli SET id_pembeli = '".$id_pembeli_new."',nama_pembeli = '".$nama_pembeli."',alamat = '".$alamat."', jk = '".$jk."',noTelp = '".$noTelp."' WHERE id_pembeli = ".$id_pembeli);

			$message = "Sukses mengedit pembeli!";
		}

		$_SESSION["message"] = $message;

		header("location:admin.php");
		exit();

	}
	if (isset($_POST["id_tiket_new"])) {
		include 'connect.php';

		$id_tiket = $_POST["id_tiket"];
		$id_tiket_new = $_POST["id_tiket_new"];
		$id_pembeli = $_POST["id_pembeli"];
		$id_KA = $_POST["id_KA"];
		$nomor_kursi = $_POST["nomor_kursi"];

		$message = "";

		if ($id_tiket_new == "") {
			$message = "id tiket harus diisi!";
		}elseif ($id_pembeli == "") {
			$message = "id pembeli harus diisi!";
		}
		elseif ($id_KA == "") {
			$message = "id kereta harus diisi!";
		}
		elseif ($nomor_kursi == "") {
			$message = "nomor kursi harus diisi!";
		}
		else{

			$connection->query("UPDATE tiket SET id_tiket = '".$id_tiket_new."',id_pembeli = '".$id_pembeli."',id_KA = '".$id_KA."', nomor_kursi = '".$nomor_kursi."' WHERE id_tiket = ".$id_tiket);

			$message = "Sukses mengedit tiket!";
		}

		$_SESSION["message"] = $message;

		header("location:admin.php");
		exit();

	}

	header("location:insert.php");
		exit();

?>