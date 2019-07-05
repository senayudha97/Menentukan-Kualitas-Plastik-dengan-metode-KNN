<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Proses KNN</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
      <div align ="center" >
          <br>
            <div align="center" ><h3>Tabel Hasil Proses KNN</h3></div>
              <br>
                <table cellpadding="10" cellspacing="0" border="1" class="table table-bordered w-25">
                  <thead class="table-active">
                    <tr>
                    <th>Tekanan(Kg)</th>
                    <th>Lengkungan(°)</th>
                    <th>Jatuh(Cm)</th>
                    <th>Square Distance</th>
                    <th>Keterangan</th>
                    <th>Ranking</th>
                  </tr>
                  </thead>
      </div>   
  


<?php  
include "koneksi.php";
error_reporting(0);
if (isset($_POST['kirim'])) {

  $sql="SELECT * FROM tb_datauji";
  $result = $conn->query($sql);
  $hasil = array();

  $sqlx="DELETE from tb_hasil";
  mysqli_query($conn,$sqlx);

    $no = 1;
    while ($row=$result->fetch_assoc()) {

      $tekanan              =$_POST['tekanan'];
      $lengkungan           =$_POST['lengkungan'];
      $jatuh                =$_POST['jatuh'];
      $tetangga             =$_POST['tetangga'];

      $h_tekanan            =$tekanan-$row['tekanan'];
      $h_lengkungan         =$lengkungan-$row['lengkungan'];
      $h_jatuh              =$jatuh-$row['jatuh'];

    //pangkat

      $p_tekanan            =pow($h_tekanan,2);
      $p_lengkungan         =pow($h_lengkungan,2);
      $p_jatuh              =pow($h_jatuh,2);

      $pangkat              = (pow($h_tekanan,2))+(pow($h_lengkungan,2))+(pow($h_jatuh,2));
      $square_distance      = sqrt($pangkat);
      
      array_push($hasil, array(
        "index" => $no,
        "Tekanan" => $row['tekanan'],
        "Lengkungan" => $row['lengkungan'],
        "Jatuh" => $row['jatuh'],
        "S_Distance" => $square_distance,
        "Keterangan" => $row['ket'],
        "ranking"    => 0
      ));

      
      $sqly="INSERT INTO tb_hasil VALUES ($no,$square_distance)";
      mysqli_query($conn,$sqly);
      
      $no++;

    }
  }

  $sql3="SELECT (@cnt := @cnt + 1) AS rowNumber, t.* FROM tb_hasil AS t CROSS JOIN (SELECT @cnt := 0) AS dummy ORDER BY t.distance";
    $hasil_ranking = $conn->query($sql3);
    
    $nox = 0;
    while ($rowx=$hasil_ranking->fetch_assoc()) {
      for ($i=0; $i < $no-1 ; $i++) {
        if ($rowx['index_key'] == $hasil[$i]['index']) {
          $hasil[$i]['ranking'] = $rowx['rowNumber'];
          $nox++;
        }
      }
    }

  for ($i=0; $i < $no-1 ; $i++) {?>

    <tr>
    <td><?php echo $hasil[$i]['Tekanan']; ?></td>
    <td><?php echo $hasil[$i]['Lengkungan']; ?></td>
    <td><?php echo $hasil[$i]['Jatuh']; ?></td>
    <td><?php echo $hasil[$i]['S_Distance']; ?></td>
    <td><?php echo $hasil[$i]['Keterangan']; ?></td>
    <td><?php echo $hasil[$i]['ranking']; ?></td>
    </tr>
   <?php 
  }

  $baik  = 0;
  $jelek  = 0;
  for ($k=0; $k < $no ; $k++) {
    if ($hasil[$k]["ranking"] <= $tetangga) {
      if ($hasil[$k]["Keterangan"] == "baik" ) {
        $baik++;
      }
      elseif($hasil[$k]["Keterangan"] == "jelek") {
        $jelek++;
      }

    }
  }

  echo "</table><br><br><br>";


echo "Baik=".$baik."<br>";
echo "Jelek=".$jelek."<br>";
  if ($baik > $jelek) {
    echo "Bahan Baik/Bagus";
  }
  elseif ($jelek > $bagus) {
    echo "Bahan Jelek";
  }
   else {
     echo "Score Sama";
  }

?>
</table>
</body>
</html>
