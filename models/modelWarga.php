<?php
require_once 'connect.php';

class modelWarga extends connect{
     public $dataWarga;

     function select()
     {
     	$sqltext='SELECT * FROM WARGA_06946';
     	$statement=oci_parse($this->koneksi,$sqltext);
     	oci_execute($statement);

     	//mengisi variable data ragis dari database
     	while($row=oci_fetch_array($statement,OCI_BOTH)){

     		$temp[]=$row;
		
     	}
     	$this->dataWarga=$temp;
     	oci_free_statement($statement);
     	
     }
     function selectupt()
     {
          $sqltext='SELECT * FROM WARGA_06946';
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);

          //mengisi variable data ragis dari database
          while($row=oci_fetch_array($statement,OCI_BOTH)){

               $temp[]=$row;
          
          }
          $this->dataWargaupt=$temp;
          oci_free_statement($statement);
          
     }

     function insert($noKtp,$no_regis,$nama,$alamat,$no_hp) {
     	$sqltext="INSERT INTO  WARGA_06946 VALUES('$noKtp','$no_regis','$nama','$alamat','$no_hp')";
     	$statement=oci_parse($this->koneksi,$sqltext);
     	oci_execute($statement);

	    oci_free_statement($statement);
     	
     }

      function delete($no_ktp){
          $sqltext="DELETE FROM WARGA_06946 WHERE NO_KTP ='$no_ktp'";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);


     }

     function update($no_ktp,$nama,$alamat,$no_hp){
     $sqltext="UPDATE WARGA_06946 SET NAMA='$nama',ALAMAT='$alamat',NO_HP='$no_hp' WHERE NO_KTP ='$no_ktp'";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);

     }

     function cek($no_ktp,$no_regis,$nama,$alamat,$no_hp){
     $sqltext="SELECT  NO_KTP ='$no_ktp',NO_REGIS='$no_regis',NAMA='$nama',ALAMAT='$alamat',NO_HP='$no_hp' FROM WARGA_06946 ";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);

     }



     function getData(){

     	return $this->dataWarga;
     }
     function viewData()
     {

     	foreach ($this->dataWarga as $key)
     	{
     		echo $key['NO_KTP'];
     		echo " -> ";
     		echo $key['NO_REGIS'];
     		echo " -> ";
     		echo $key['NAMA'];
     		echo " -> ";
     		echo $key['ALAMAT'];
     		echo " -> ";
     		echo $key['NO_HP'];
     	}
     }

}
$objmodelWarga=new modelWarga();
//$objmodelWarga->update('97382','oscar');
//$objmodelWarga->insert('042738','2','yusuf','Mojokerto','077637'); 
$objmodelWarga->select();
//$objmodelWarga->viewData();
?>
