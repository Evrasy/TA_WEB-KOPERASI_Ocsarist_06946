<?php
require '../models/modelBendahara.php';

class prosesBendahara
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;

	}
	function proses()
	{
		$objmodel=new modelBendahara();
		

		if($this->action=="tambah"){
			
			$idbendahara=$_POST['inputIdbendahara'];
			$nama=$_POST['inputNama'];
			$noHp=$_POST['inputNohp'];
			$objmodel->insert($idbendahara,$nama,$noHp);
			header("location:../views/viewAdmin.php");
		}elseif($this->action=="hapus")
		{

			$idBen=$_GET['idbendahara'];
			$objmodel->delete($idBen);
			header("location:../views/viewAdmin.php");

		}elseif ($this->action=="edit") {
			$idbendahara=$_POST['idbaru'];
			$nama=$_POST['namabaru'];
			$noHp=$_POST['nohpbaru'];
			$objmodel->update($idbendahara,$nama,$noHp);
			header("location:../views/viewAdmin.php");

		}elseif ($this->action=="cek") {
			$idbendahara=$_POST['id'];
			$nama=$_POST['nama'];
			$noHp=$_POST['nohp'];
			$objmodel->cek($idbendahara,$nama,$noHp);
			header("location:../views/viewAdmin.php");

		}

	}


}
$objprosesBendahara=new prosesBendahara($_GET['aksi']);
$objprosesBendahara->proses();

?>