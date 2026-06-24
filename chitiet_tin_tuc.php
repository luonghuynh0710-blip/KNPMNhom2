<?php
include("ket_noi.php");

$id = $_GET['id'];

$sql = "SELECT * FROM tin_tuc WHERE ma_tin_tuc='$id'";
$query = mysqli_query($ket_noi,$sql);

$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title><?php echo $row['tieu_de']; ?></title>

<style>

.container{
    width:1000px;
    margin:auto;
}

.container img{
    width:100%;
    max-height:500px;
    object-fit:cover;
}

.noidung{
    margin-top:20px;
    line-height:1.8;
    font-size:18px;
}

.ngaydang{
    color:gray;
    margin-bottom:20px;
}
.btn-back{
    display:inline-block;
    margin:20px 0;
    padding:10px 15px;
    background:#0099cc;
    color:#fff;
    text-decoration:none;
    border-radius:5px;
}

.btn-back:hover{
    background:#0077aa;
}
</style>

</head>
<body>

<div class="container">

<a href="tin_tuc.php" class="btn-back">
    ← Quay lại tin tức
</a>

<h1>
<?php echo $row['tieu_de']; ?>
</h1>
<h1>
<?php echo $row['tieu_de']; ?>
</h1>

<p class="ngaydang">
Ngày đăng:
<?php echo date("d/m/Y",strtotime($row['ngay_dang'])); ?>
</p>

<img src="<?php echo $row['hinh_anh']; ?>">

<div class="noidung">
<?php echo nl2br($row['noi_dung']); ?>
</div>

</div>

</body>
</html>