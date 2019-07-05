<html lang="en" dir="ltr">
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <body>
    <br><br><br><br><br>
         <div align="center" class="card-header">
          <table class="table table-active table-bordered w-25 ">
            <th>Tekanan(Kg)</th>
            <th>Lengkungan(°)</th>
            <th>Jatuh(Cm)</th>
            <th>Square Distance</th>
            <th>Keterangan</th>
            <th>Ranking</th>
          </tr>
        </table>
      </div>
  </body>
</html>
<?php
include "koneksi.php";
error_reporting(0);
if (isset($_POST['kirim'])) {

  $sql="SELECT * FROM tb_datauji";
  $result = $conn->query($sql);

    $no = 1;
    while ($row=$result->fetch_assoc()) {

      $tekanan        =$_POST['tekanan'];
      $lengkungan     =$_POST['lengkungan'];
      $jatuh          =$_POST['jatuh'];
      $tetangga       =$_POST['tetangga'];

      $h_tekanan        =$tekanan-$row['tekanan'];
      $h_lengkungan     =$lengkungan-$row['lengkungan'];
      $h_jatuh          =$jatuh-$row['jatuh'];

    //pangkat

      $p_tekanan        =pow($h_tekanan,2);
      $p_lengkungan     =pow($h_lengkungan,2);
      $p_jatuh          =pow($h_jatuh,2);

    //pangkat dengan array
      $ap_no[]              = $no; //untuk perankingan
      $ap_tekanan[]        =pow($h_tekanan,2);
      $ap_lengkungan[]     =pow($h_lengkungan,2);
      $ap_jatuh[]          =pow($h_jatuh,2);

      $square_distance[] = sqrt($p_tekanan+$p_lengkungan+$p_jatuh);
      $keterangan[]      = $row['ket'];
      $no++;

    }

    $tData = count($ap_tekanan);

    for ($i=0; $i <$tData ; $i++) {
      for ($j=0; $j <$tData - $i ; $j++) {
        if ($square_distance[$i] < $square_distance[$j]) {
          $tmp = $square_distance[$i];
          $square_distance[$i] = $square_distance[$j];
          $square_distance[$j] = $tmp;

          $tmp = $ap_tekanan[$i];
          $ap_tekanan[$i] = $ap_tekanan[$j];
          $ap_tekanan[$j] = $tmp;

          $tmp = $ap_lengkungan[$i];
          $ap_lengkungan[$i] = $ap_lengkungan[$j];
          $ap_lengkungan[$j] = $tmp;

          $tmp = $ap_jatuh[$i];
          $ap_jatuh[$i] = $ap_jatuh[$j];
          $ap_jatuh[$j] = $tmp;

          $tmp = $ap_no[$i];
          $ap_no[$i] = $ap_no[$j];
          $ap_no[$j] = $tmp;
        }
      }
    }

    for ($i=0; $i < $tData ; $i++) {
      ?>
      <tr>
    	<td> <?php echo $ap_tekanan[$i] ?></td>
    	<td> <?php echo $ap_lengkungan[$i] ?></td>
    	<td> <?php echo $ap_jatuh[$i] ?></td>
      <td> <?php echo $square_distance[$i]; ?></td>
    	<td> <?php echo $keterangan[$i] ?></td>
      <td> <?php echo $ap_no[$i] ?></td>
    	</tr>

<?php
}

$bagus  = 0;
$jelek  = 0;
  for ($k=0; $k <$tetangga ; $k++) {
      if ($keterangan[$k] == "bagus" ) {
        $bagus++;
      }
      elseif($keterangan[$k] == "jelek") {
        $jelek++;
      }
  }
echo "</table><br><br><br>";
// echo "Score <br>";
echo "Bagus=".$bagus."<br>";
echo "Jelek=".$jelek."<br>";
  if ($bagus > $jelek) {
    echo "Bahan Bagus";
  }
  elseif ($jelek > $bagus) {
    echo "Bahan Jelek";
  }
  // else {
  //   echo "Score Sama";
  // }

}//punya isset

?>

</html>
