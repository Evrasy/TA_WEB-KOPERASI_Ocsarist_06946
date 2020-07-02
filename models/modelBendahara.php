<?php
require_once 'connect.php';

class modelBendahara extends connect{
     private $dataBendahara;

     function select()
     {
     	$sqltext='SELECT * FROM BENDAHARA_06946';
     	$statement=oci_parse($this->koneksi,$sqltext);
     	oci_execute($statement);

     	//mengisi variable data ragis dari database
     	while($row=oci_fetch_array($statement,OCI_BOTH)){

     		$temp[]=$row;
		
     	}
     	$this->dataBendahara=$temp;

     	oci_free_statement($statement);
     	
     }

          function login()
     {
          $sqltext='SELECT * FROM BENDAHARA_06946';
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);

          //mengisi variable data ragis dari database
          while($row=oci_fetch_array($statement,OCI_BOTH)){

               $temp[]=$row;
          
          }
          $this->dataLogin=$temp;

          oci_free_statement($statement);
          
     }


   function insert($Id_bendahara,$nama,$no_hp){
     	$sqltext="INSERT INTO BENDAHARA_06946 VALUES('$Id_bendahara','$nama','$no_hp')";
     	$statement=oci_parse($this->koneksi,$sqltext);
     	oci_execute($statement);

	    oci_free_statement($statement);
     	
     }

     function delete($Id_bendahara){
          $sqltext="DELETE FROM BENDAHARA_06946 WHERE ID_BENDAHARA ='$Id_bendahara'";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);


     }

     function update($Id_bendahara,$nama,$no_hp){
     $sqltext="UPDATE BENDAHARA_06946 SET NAMA_BENDAHARA='$nama',NO_HP='$no_hp' WHERE ID_BENDAHARA ='$Id_bendahara'";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);

     }

      function cek($Id_bendahara,$nama,$no_hp){
     $sqltext="SELECT ID_BENDAHARA ='$Id_bendahara',NAMA_BENDAHARA='$nama',NO_HP='$no_hp' FROM BENDAHARA_06946";
          $statement=oci_parse($this->koneksi,$sqltext);
          oci_execute($statement);
         oci_free_statement($statement);

     }


     function getData(){

     	return $this->dataBendahara;
     }
     function viewData()
     {

     	foreach ($this->dataBendahara as $key)
     	{
               echo"Id bendahara:";
     		echo $key['ID_BENDAHARA'];
     		echo " -> ";
               echo"Nama:";
     		echo $key['NAMA_BENDAHARA'];
     		echo " -> ";
               echo"No_hp:";
     		echo $key['NO_HP'];
               echo"<br>";
     	}
     }

}
$objmodelBendahara=new modelBendahara();
//$objmodelBendahara->insert('1','yusuf','077637');
//$objmodelBendahara->delete('1');
//$objmodelBendahara->update('77','Mujib');
$objmodelBendahara->select();
$objmodelBendahara->login();
//$objmodelBendahara->viewData();
?>