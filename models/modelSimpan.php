<?php
require_once 'connect.php';

class modelSimpan extends connect{
     public $dataSimpan;

     function select()
     {
     	$sqltext='SELECT * FROM SIMPAN_06946';
     	$statement=oci_parse($this->koneksi,$sqltext);
     	oci_execute($statement);

     	
     	while($row=oci_fetch_array($statement,OCI_BOTH)){

     		$temp[]=$row;
		
     	}
     	$this->dataSimpan=$temp;
     	oci_free_statement($statement);
     	
     }

     function insert($no_simpan,$no_ktp,$id_bendahara,$simpan,$tanggal) {
     	$sqltext="INSERT INTO  SIMPAN_06946 VALUES('$no_simpan','$no_ktp','$id_bendahara','$simpan',to_date('$tanggal','dd/mm/yyyy'))";
     	$statement=oci_parse($this->koneksi,$sqltext);
     	oci_execute($statement);

	    oci_free_statement($statement);
     	
     }

      function delete($no_simpan){
          $sqltext="DELETE FROM SIMPAN_06946 WHERE NO_SIMPAN ='$no_simpan'";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);


     }

     function update($no_simpan,$no_ktp,$simpan,$tanggal){
     $sqltext="UPDATE SIMPAN_06946 SET NO_KTP='$no_ktp',SIMPAN='$simpan',TANGGAL=to_date('$tanggal','dd/mm/yyyy') WHERE NO_SIMPAN ='$no_simpan'";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);

     } function cek($no_simpan,$no_ktp,$id_bendahara,$simpan,$tanggal){
     $sqltext="SELECT NO_SIMPAN ='$no_simpan',NO_KTP ='$no_ktp',ID_BENDAHARA='$id_bendahara',SIMPAN='$simpan',TANGGAL=to_date('$tanggal','mm/dd/yyyy') FROM SIMPAN_06946  ";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);

     }



     function getData(){

     	return $this->dataSimpan;
     }
     function viewData()
     {

     	foreach ($this->dataSimpan as $key)
     	{
     		echo $key['NO_SIMPAN'];
     		echo " -> ";
     		echo $key['NO_KTP'];
     		echo " -> ";
     		echo $key['ID_BENDAHARA'];
     		echo " -> ";
     		echo $key['SIMPAN'];
     		echo " -> ";
     		echo $key['TANGGAL'];
     	}
     }

}
$objmodelSimpan=new modelSimpan();
//$objmodelWarga->update('97382','oscar');
//$objmodelSimpan->insert('1','232','2','230000',to_date('20/10/2020','dd/mm/yyyy')); 
$objmodelSimpan->select();
//$objmodelSimpan->viewData();
?>
