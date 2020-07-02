<?php
require_once 'connect.php';

class modelTabungan extends connect{
     public $dataTab;

     function select()
     {
     	$sqltext='SELECT * FROM TABUNGAN_06946';
     	$statement=oci_parse($this->koneksi,$sqltext);
     	oci_execute($statement);

     	//mengisi variable data ragis dari database
     	while($row=oci_fetch_array($statement,OCI_BOTH)){

     		$temp[]=$row;
		
     	}
     	$this->dataTab=$temp;
     	oci_free_statement($statement);
     	
     }

     function insert($no_tab,$no_simpan,$tabungan) {
     	$sqltext="INSERT INTO  TABUNGAN_06946 VALUES('$no_tab','$no_simpan','$tabungan')";
     	$statement=oci_parse($this->koneksi,$sqltext);
     	oci_execute($statement);

	    oci_free_statement($statement);
     	
     }

      function delete($no_tab){
          $sqltext="DELETE FROM TABUNGAN_06946 WHERE NO_TABUNGAN ='$no_tab'";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);


     }

     function update($no_tab,$no_simpan,$tabungan){
     $sqltext="UPDATE TABUNGAN_06946 SET NO_SIMPAN='$no_simpan',TABUNGAN='$tabungan' WHERE NO_TABUNGAN ='$no_tab'";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);

     }

     function cek($no_tab,$no_simpan,$tabungan){
     $sqltext="SELECT  NO_TABUNGAN ='$no_tab',NO_SIMPAN='$no_simpan',TABUNGAN='$tabungan' FROM TABUNGAN_06946 ";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);

     }

     function getData(){

     	return $this->dataTab;
     }
     // function viewData()
     // {

     // 	foreach ($this->dataWarga as $key)
     // 	{
     // 		echo $key['NO_KTP'];
     // 		echo " -> ";
     // 		echo $key['NO_REGIS'];
     // 		echo " -> ";
     // 		echo $key['NAMA'];
     // 		echo " -> ";
     // 		echo $key['ALAMAT'];
     // 		echo " -> ";
     // 		echo $key['NO_HP'];
     // 	}
     // }

}
$objmodelTab=new modelTabungan();
$objmodelTab->select();
//$objmodelWarga->viewData();
?>
