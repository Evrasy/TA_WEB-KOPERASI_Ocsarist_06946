<?php
require '../models/modelSimpan.php';

class prosesSimpan
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;

	}
	function proses()
	{
		$objmodel=new modelSimpan();
		

	if($this->action=="tambah"){
			
		 	$noSimpan=$_POST['Nosimpan'];
		    $noKtp=$_POST['Noktp'];
		    $idben=$_POST['Idbendahara'];
			$Simpan=$_POST['Simpan'];
			$Tanggal=$_POST['datepicker1'];
			$objmodel->insert($noSimpan,$noKtp,$idben,$Simpan,$Tanggal);
			header("location:../views/viewTransaksi.php");
		}
		elseif($this->action=="hapus")
		{

			$noSimpan=$_GET['No_simpan'];
			$objmodel->delete($noSimpan);
			header("location:../views/viewTransaksi.php");

		}elseif ($this->action=="edit") {
			$nosimpan=$_POST['Nosimpanbaru'];
			 $noKtp=$_POST['Noktpbaru'];
			$Simpan=$_POST['Simpanbaru'];
			$Tanggal=$_POST['datepicker2'];
			$objmodel->update($nosimpan,$noKtp,$Simpan,$Tanggal);
			//header("location:../views/viewTransaksi.php");

		}elseif($this->action=="cek"){
			
		 	$noSimpan=$_POST['Nosimpan'];
		    $noKtp=$_POST['Noktp'];
		    $idben=$_POST['Idbendahara'];
			$Simpan=$_POST['Simpan'];
			$Tanggal=$_POST['datepicker3'];
			$objmodel->insert($noSimpan,$noKtp,$idben,$Simpan,$Tanggal);
			header("location:../views/viewTransaksi.php");
		}

	}



}
$objprosesSimpan=new prosesSimpan($_GET['aksi']);
$objprosesSimpan->proses();

?>