<?php
include("kiem_tra_admin.php");
include("ket_noi.php");

$sql = "SELECT * FROM chuyen_khoa ORDER BY ma_chuyen_khoa DESC";
$query = mysqli_query($ket_noi,$sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý chuyên khoa</title>

<style>

body{
    font-family:Arial;
    background:#f5f5f5;
}

.container{
    width:95%;
    margin:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

table th,table td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

table th{
    background:#0099cc;
    color:white;
}

.them{
    display:inline-block;
    margin:20px 0;
    padding:10px 20px;
    background:green;
    color:white;
    text-decoration:none;
}

.sua{
    background:orange;
    color:white;
    padding:5px 10px;
    text-decoration:none;
}

.xoa{
    background:red;
    color:white;
    padding:5px 10px;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="container">

<h2>QUẢN LÝ CHUYÊN KHOA</h2>

<a class="them" href="them_chuyen_khoa.php">
+ Thêm chuyên khoa
</a>

<table>

<tr>
<th>Mã</th>
<th>Tên chuyên khoa</th>
<th>Thao tác</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($query)){
?>

<tr>

<td><?php echo $row['ma_chuyen_khoa']; ?></td>

<td><?php echo $row['ten_chuyen_khoa']; ?></td>

<td>

<a class="sua"
href="sua_chuyen_khoa.php?id=<?php echo $row['ma_chuyen_khoa']; ?>">
Sửa
</a>

<a class="xoa"
onclick="return confirm('Bạn có chắc muốn xóa?')"
href="xoa_chuyenkhoa.php?id=<?php echo $row['ma_chuyen_khoa']; ?>">
Xóa
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>