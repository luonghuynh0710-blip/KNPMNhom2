<?php

include("ket_noi.php");

$id=$_GET['id'];

mysqli_query($ket_noi,"
UPDATE lien_he
SET trang_thai='DaXuLy'
WHERE ma_lien_he='$id'
");

header("Location: quan_ly_lien_he.php");
exit();

?>