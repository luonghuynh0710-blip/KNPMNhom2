<?php
include("kiem_tra_admin.php");
include("ket_noi.php");

$sql="SELECT * FROM tin_tuc ORDER BY ma_tin_tuc DESC";
$query=mysqli_query($ket_noi,$sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>

<meta charset="UTF-8">

<title>Quản lý tin tức</title>

<style>

body{
    font-family:Arial;
    background:#f4f6f9;
}

.container{
    width:95%;
    margin:30px auto;
}

h2{
    color:#0077cc;
    margin-bottom:20px;
}

.them{
    display:inline-block;
    padding:10px 20px;
    background:green;
    color:white;
    text-decoration:none;
    border-radius:5px;
    margin-bottom:20px;
}

table{
    width:100%;
    background:white;
    border-collapse:collapse;
}

table th,table td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

table th{
    background:#0077cc;
    color:white;
}

img{
    width:120px;
    height:80px;
    object-fit:cover;
}

.sua{
    background:orange;
    color:white;
    padding:6px 12px;
    text-decoration:none;
    border-radius:5px;
}

.xoa{
    background:red;
    color:white;
    padding:6px 12px;
    text-decoration:none;
    border-radius:5px;
}

</style>

</head>

<body>

<div class="container">
<a href="trang_chu_admin.php" class="back">
← Quay lại
</a>

<h2>QUẢN LÝ TIN TỨC</h2>

<a href="them_tin_tuc.php" class="them">
+ Thêm tin tức
</a>

<table>

<tr>

<th>Mã</th>

<th>Tiêu đề</th>

<th>Ảnh</th>

<th>Ngày đăng</th>

<th>Thao tác</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($query)){
?>

<tr>

<td><?php echo $row['ma_tin_tuc']; ?></td>

<td><?php echo $row['tieu_de']; ?></td>

<td>

<img src="<?php echo $row['hinh_anh']; ?>">

</td>

<td>

<?php echo date("d/m/Y",strtotime($row['ngay_dang'])); ?>

</td>

<td>

<a class="sua"
href="sua_tin_tuc.php?id=<?php echo $row['ma_tin_tuc']; ?>">
Sửa
</a>

<a class="xoa"
onclick="return confirm('Xóa tin này?')"
href="xoa_tin_tuc.php?id=<?php echo $row['ma_tin_tuc']; ?>">
Xóa
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>