<?php
//include "koneksi.php";
if (isset($_POST['input'])) {
  $tekanan    =$_POST['tekanan'];
  $lengkungan =$_POST['lengkungan'];
  $jatuh      =$_POST['jatuh'];
  $ket        =$_POST['ket'];

  $sql="INSERT INTO tb_datauji (tekanan, lengkungan, jatuh, ket) VALUES ('$tekanan','$lengkungan','$jatuh','$ket')";

  if ($conn->query($sql) == TRUE ) {  
    header('location:index.php');
  }
  else {
    printf("Errormessage: %s\n", $conn->error);
  }

}

?>
