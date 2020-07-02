<?php
require '../models/modelWarga.php';

class prosesWarga
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;

	}
	function proses()
	{
		$objmodel=new modelWarga();
		

	if($this->action=="tambah"){
			
		 	$noKtp=$_POST['inputNoktp'];
		    $noRegis=$_POST['inputNoregis'];
			$nama=$_POST['inputNama'];
			$alamat=$_POST['inputAlamat'];
			$no_hp=$_POST['inputNohp'];
			$objmodel->insert($noKtp,$noRegis,$nama,$alamat,$no_hp);
			header("location:../views/viewRegistrasi.php");
		}
		elseif($this->action=="hapus")
		{

			$noKtp=$_GET['No_ktp'];
			$objmodel->delete($noKtp);
			header("location:../views/viewRegistrasi.php");

		}elseif ($this->action=="edit") {
			$noKtp=$_POST['noktpbaru'];
			$nama=$_POST['namabaru'];
			$alamat=$_POST['alamatbaru'];
			$no_hp=$_POST['nohpbaru'];
			$objmodel->update($noKtp,$nama,$alamat,$no_hp);
			header("location:../views/viewRegistrasi.php");

		}elseif ($this->action=="cek") {
			$noKtp=$_POST['noktp'];
			$noRegis=$_POST['noreg'];
			$nama=$_POST['nama'];
			$alamat=$_POST['alamat'];
			$no_hp=$_POST['nohp'];
			$objmodel->cek($noKtp,$noRegis,$nama,$alamat,$no_hp);
			header("location:../views/viewRegistrasi.php");

	}

}

}
$objprosesWarga=new prosesWarga($_GET['aksi']);
$objprosesWarga->proses();

?>