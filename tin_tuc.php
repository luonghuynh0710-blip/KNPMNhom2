<?php
include("ket_noi.php");

$sql = "SELECT * FROM tin_tuc ORDER BY ngay_dang DESC";
$query = mysqli_query($ket_noi,$sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Tin tức</title>

<style>
.news-container{
    width:1200px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:20px;
}

.news-card{
    background:white;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.news-card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.news-card h3{
    padding:15px;
    height:80px;
}

.news-card a{
    display:block;
    text-align:center;
    padding:10px;
    background:#0099cc;
    color:white;
    text-decoration:none;
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
<div class="container">

<a href="trang_chu.php" class="btn-back">
    ← Quay lại
</a>
</head>
<body>

<h1 align="center">TIN TỨC Y TẾ</h1>

<div class="news-container">

<?php while($row=mysqli_fetch_assoc($query)){ ?>

<div class="news-card">

<img src="<?php echo $row['hinh_anh']; ?>">

<h3>
<?php echo $row['tieu_de']; ?>
</h3>

<a href="chitiet_tin_tuc.php?id=<?php echo $row['ma_tin_tuc']; ?>">
Xem chi tiết
</a>

</div>

<?php } ?>

</div>

</body>
</html>