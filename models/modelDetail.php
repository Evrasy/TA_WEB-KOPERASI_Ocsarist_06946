<?php
require_once 'connect.php';

class modelDetail extends connect{
     private $dataDetail;

     function select()
     {
          $sqltext="SELECT * FROM LIST_DETAIL";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);

          //mengisi variable data ragis dari database
          while($row=oci_fetch_array($statement,OCI_BOTH)){

               $temp[]=$row;
          
          }
          $this->dataDetail=$temp;

          oci_free_statement($statement);
          
     }  

     // function select()
     // {
     // 	$sqltext="SELECT A.NO_KTP,C.NAMA,B.NAMA_BENDAHARA,A.SIMPAN,A.TANGGAL
     //      from SIMPAN_06946 A JOIN BENDAHARA_06946 B
     //      on A.ID_BENDAHARA = B.ID_BENDAHARA
     //      JOIN WARGA_06946 c
     //      on A.NO_KTP =c.NO_KTP";
     // 	$statement=oci_parse($this->koneksi,$sqltext);
     // 	oci_execute($statement);

     // 	//mengisi variable data ragis dari database
     // 	while($row=oci_fetch_array($statement,OCI_BOTH)){

     // 		$temp[]=$row;
		
     // 	}
     // 	$this->dataDetail=$temp;

     // 	oci_free_statement($statement);
     	
     // }

     function getData(){

     	return $this->dataDetail;
     }

}
$objmodelDetail=new modelDetail();
$objmodelDetail->select();
?>