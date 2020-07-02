<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require '../models/modelBendahara.php';
$objmodelBendahara=new modelBendahara();
$objmodelBendahara->select();
$dataLogin=$objmodelBendahara->getData();
$id = $_POST['ID'];


foreach ($dataLogin as $key){

	
	// cek jika user login sebagai admin
	if($key['ID_BENDAHARA']=="$id"){
		
		// buat session login dan username
			$_SESSION['ID'] = $id;
			$_SESSION['nama']=$key['NAMA_BENDAHARA'];
		// alihkan ke halaman dashboard admin
			header("location:../views/viewAdmin.php");

	// cek jika user login sebagai pegawai	
}
elseif($_SESSION['ID'] = ""){

		// buat session login dan username
		header("location:redirectLogin.php");
}

}

?>