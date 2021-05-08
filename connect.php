<?php
	$connection = new mysqli("localhost","root","","reservasi_tiketkai");
	if (!$connection) {
		echo "CONNECTION ERROR !!!";
		exit();
	}