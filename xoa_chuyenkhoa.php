<?php

include("ket_noi.php");

$id=$_GET['id'];

mysqli_query($ket_noi,"
DELETE FROM chuyen_khoa
WHERE ma_chuyen_khoa='$id'
");

header("Location: quan_li_chuyen_khoa.php");

?>