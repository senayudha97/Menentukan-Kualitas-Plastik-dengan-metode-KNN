
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penguji Kualitas Plastik</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="card bg-dark text-white">
    <div align="center" class="card-body" ><h2>Program Penguji Kualitas Plastik Dengan Menggunakan
      <p>Metode K-Nearest Neighbor</h2></div>
    </div>


 <div class ="row">
    <div class ="col-sm-6"> 
      <div align ="center">
        <br>
        <a href="input_datauji.php" class="btn btn-primary"> Input Data Training</a>
        <br>
        <br>
      </div>

     <div align="center" class="card-header">
      <form  action="proses_knn.php" method="post">
      <br>

    
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
          <td><b>K</b></td>
          <td>
              <input type="text" name="tetangga" value="" placeholder="K <= Jumlah Data Traning">
          </td>
        </tr>

        <tr>
          <td colspan="2" align="center">  <input class="btn btn-primary" type="submit" name="kirim" value="Kirim"></td>
        </tr>
      </table>
    </div>
  </div>


    <div class ="row">
      <div class ="col-sm-6"> 
        <br>
            <h3>Table Data Training</h3> 
            <br><br>          
        <table class="table table-bordered w-25">
          <thead class="table-active">
            <tr>
              <th >Tekanan(Kg)</th>
              <th >Lengkungan(°)</th>
              <th >Jatuh(Cm)</th>
              <th >Keterangan</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>


          <tr>
            <?php
            include "koneksi.php";
            $sql="SELECT * FROM tb_datauji";
            $result = $conn->query($sql);
              while ($row=$result->fetch_assoc()) {
                $id         = $row['id'];
                $tekanan    = $row['tekanan'];
                $lengkungan = $row['lengkungan'];
                $jatuh      = $row['jatuh'];
                $keterangan = $row['ket'];
             ?>
             <td><?php echo $tekanan; ?></td>
             <td><?php echo $lengkungan; ?></td>
             <td><?php echo $jatuh; ?></td>
             <td><?php echo $keterangan; ?></td>
             <td><a href="update.php?id=<?php echo $id;?>" class="btn btn-warning">Edit</a></td>
             <td><a href="delete.php?id=<?php echo $id;?>"" class="btn btn-danger">Delete</a></td>
          </tr>  <?php } ?>
          <!-- <tr>
            <td colspan="4">
              <input type="submit" name="truncate" value="Truncate">
            </td>
          </tr> -->

        </table>
      </div>
    </div>
  </div>
</form>


  </body>
</html>
<?php
  if (isset($_POST['truncate'])) {
    ?>
      <script type="text/javascript">
        var cf = confirm("Mau Hapus Semua Data ?")
        if (cf) {
          <?php
            $truncate = $conn->query("TRUNCATE TABLE  tb_datauji;");
           ?>
        }
      </script>
    <?php
  }

 ?>
