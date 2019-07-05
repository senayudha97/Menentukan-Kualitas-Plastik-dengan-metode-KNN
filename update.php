<?php 
include "koneksi.php";

$id = $_GET['id'];
$sql= "SELECT * FROM tb_datauji WHERE id ='$id'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
 			 $tekanan    =$row['tekanan'];
  			 $lengkungan =$row['lengkungan'];
  			 $jatuh      =$row['jatuh'];
  			 $ket        =$row['ket'];
 			}
 ?>

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
    	<br><br><center>
    	<h3>Update Data Uji</h3></center>
    	<br><br><br>
          <table class="table table-active table-bordered w-25 ">

            <tr>
              <td><b>Tekanan</b></td>
              <td>
                  <input type="text" class="form-control" name="tekanan" value="<?php echo $tekanan; ?>">
              </td>
            </tr>
            <tr>
              <td><b>Lengkungan</b></td>
              <td>
                  <input type="text" class="form-control" name="lengkungan" value="<?php echo $lengkungan; ?>" >
              </td>
            </tr>

            <tr>
              <td><b>Jatuh</b></td>
              <td>
                  <input type="text" class="form-control" name="jatuh" value="<?php echo $jatuh; ?>" >
              </td>
            </tr>
            <tr>
              <td><b>Keterangan</b></td>
              <td>
                  <!-- <input type="radio" name="ket" value="Baik">Baik
                  <input type="radio" name="ket" value="Jelek">Jelek -->
                  <input type="text" class="form-control" name="ket" value="<?php echo $ket; ?>"
              </td>
            </tr>

            <tr>
                <td colspan="2" align="center">  <input type="submit" class="btn btn-success" name="update" value="update"></td>
            </tr>
          </table>
        </div>

    </form>
  </body>
</html>

<?php 
	if (isset($_POST['update'])) {
		$tekanan1    =$_POST['tekanan'];
  		$lengkungan1 =$_POST['lengkungan'];
  		$jatuh1      =$_POST['jatuh'];
  		$ket1        =$_POST['ket'];

  		$sql="UPDATE tb_datauji SET `tekanan`='$tekanan1',`lengkungan`='$lengkungan1',`jatuh`='$jatuh1',`ket`='$ket1' WHERE id='$id'";
  		if ($conn->query($sql) == TRUE) {
  			header('location:index.php');
  		}
  		else
  		{
  			 echo "Error deleting record: " . mysqli_error($conn);
  		}
	}


 ?>