<?php

include("ket_noi.php");

$id=$_GET['id'];

mysqli_query($ket_noi,"
DELETE FROM tin_tuc
WHERE ma_tin_tuc='$id'
");

header("Location: quan_ly_tin_tuc.php");

?>