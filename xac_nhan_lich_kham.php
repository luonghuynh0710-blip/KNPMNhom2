<?php
include("ket_noi.php");

$id=$_GET['id'];

mysqli_query($ket_noi,"
UPDATE lich_kham
SET trang_thai='DaXacNhan'
WHERE ma_lich_kham='$id'
");

header("Location: quan_li_lich_kham.php");
exit();
?>