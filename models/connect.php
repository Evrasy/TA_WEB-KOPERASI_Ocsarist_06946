<?php
class connect
{
	private $uname='Ocsaristds_06946';
	private $pass='123';
	private $host='localhost/XE';
	protected $koneksi;

	function __construct()
	{
		$konek=oci_connect($this->uname, $this->pass,$this->host);
		if($konek){
		$this->koneksi=$konek;

		}else{

			echo"gagal";

		}

	}

}
$objek =new connect();

?>