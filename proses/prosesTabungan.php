<?php
require '../models/modelTabungan.php';

class prosesTabungan
{
	private $action;

	function __construct($act)
	{
		$this->action=$act;

	}
	function proses()
	{
		$objmodel=new modelTabungan();
		

		if($this->action=="tambah"){
			
			$notab=$_POST['notabinput'];
			$nosim=$_POST['nosimpanput'];
			$tab=$_POST['tabunganput'];
			$objmodel->insert($notab,$nosim,$tab);
			header("location:../views/viewTabungan.php");
		}elseif($this->action=="hapus")
		{
			$notab=$_GET['notabpus'];
			$objmodel->delete($notab);
			header("location:../views/viewTabungan.php");

		}elseif ($this->action=="edit") {
			$notab=$_POST['notabBaru'];
			$nosim=$_POST['nosimbaru'];
			$tab=$_POST['tabunganbaru'];
			$objmodel->update($notab,$nosim,$tab);
			header("location:../views/viewTabungan.php");

		}elseif ($this->action=="cek") {
			$notab=$_POST['notab'];
			$nosim=$_POST['nosim'];
			$tab=$_POST['tab'];
			$objmodel->cek($notab,$nosim,$tab);
			header("location:../views/viewTabungan.php");

		}

	}


}
$objprosesTabungan=new prosesTabungan($_GET['aksi']);
$objprosesTabungan->proses();

?>