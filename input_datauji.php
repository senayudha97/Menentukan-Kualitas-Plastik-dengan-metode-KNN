<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Data Uji</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div align="center" class="card-header">
    <form class="" action="" method="post">
          <table class="table table-active table-bordered w-25 ">

            <tr>
              <td><b>Tekanan</b></td>
              <td>
                  <input type="text" class="form-control" name="tekanan" value="" placeholder="Dalam Satuan Kg">
              </td>
            </tr>
            <tr>
              <td><b>Lengkungan</b></td>
              <td>
                  <input type="text" class="form-control" name="lengkungan" value="" placeholder="Dalam Bentuk Kemiringan">
              </td>
            </tr>

            <tr>
              <td><b>Jatuh</b></td>
              <td>
                  <input type="text" class="form-control" name="jatuh" value="" placeholder="Dalam Satuan cm">
              </td>
            </tr>
            <tr>
              <td><b>Keterangan</b></td>
              <td>
                  <!-- <input type="radio" name="ket" value="Baik">Baik
                  <input type="radio" name="ket" value="Jelek">Jelek -->
                  <input type="text" class="form-control" name="ket" value="">
              </td>
            </tr>

            <tr>
                <td colspan="2" align="center">  <input type="submit" class="btn btn-primary" name="input" value="Input"></td>
            </tr>
          </table>
        </div>

    </form>
  </body>
</html>

<?php
include "koneksi.php";

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
