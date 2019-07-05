<?php 
include ('koneksi.php');

$id = $_GET['id'];

$sql = "DELETE FROM tb_datauji WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
		header("location:index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}



 ?>