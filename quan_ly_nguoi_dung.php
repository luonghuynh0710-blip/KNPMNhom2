
<?php

include("kiem_tra_admin.php");
include("ket_noi.php");

$sql="SELECT * FROM tai_khoan ORDER BY ma_tai_khoan DESC";

$query=mysqli_query($ket_noi,$sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Quản lý người dùng</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f6f9;
}

.container{
width:95%;
margin:30px auto;
}

h2{
text-align:center;
margin-bottom:20px;
color:#0077cc;
}

.back{
display:inline-block;
padding:10px 20px;
background:#0077cc;
color:white;
text-decoration:none;
border-radius:5px;
margin-bottom:20px;
}

.back:hover{
background:#005fa3;
}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 2px 10px rgba(0,0,0,.1);
}

table th{
background:#0077cc;
color:white;
padding:12px;
}

table td{
border:1px solid #ddd;
padding:10px;
text-align:center;
}

table tr:hover{
background:#eef7ff;
}

.khoa{
background:red;
color:white;
padding:6px 12px;
text-decoration:none;
border-radius:5px;
}

.mo{
background:green;
color:white;
padding:6px 12px;
text-decoration:none;
border-radius:5px;
}

.xoa{
background:#ff6600;
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

<h2>QUẢN LÝ NGƯỜI DÙNG</h2>

<table>

<tr>

<th>Mã</th>

<th>Tên đăng nhập</th>

<th>Vai trò</th>

<th>Trạng thái</th>

<th>Thao tác</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($query)){
?>

<tr>

<td>
<?php echo $row['ma_tai_khoan']; ?>
</td>

<td>
<?php echo $row['ten_dang_nhap']; ?>
</td>

<!-- Vai trò -->
<td>

<?php
if($row['vai_tro']=="QuanTri"){
    echo "<span style='color:blue;font-weight:bold'>Quản trị</span>";
}else{
    echo "<span style='color:black'>Người dùng</span>";
}
?>

</td>

<!-- Trạng thái -->
<td>

<?php
if($row['trang_thai']=="HoatDong"){
    echo "<span style='color:green;font-weight:bold'>Hoạt động</span>";
}else{
    echo "<span style='color:red;font-weight:bold'>Khóa</span>";
}
?>

</td>

<!-- Thao tác -->
<td>

<?php
if($row['vai_tro']!="QuanTri"){

    if($row['trang_thai']=="HoatDong"){
?>

<a class="khoa"
href="khoa_tai_khoan.php?id=<?php echo $row['ma_tai_khoan']; ?>">
Khóa
</a>

<?php
    }else{
?>

<a class="mo"
href="mo_khoa_tai_khoan.php?id=<?php echo $row['ma_tai_khoan']; ?>">
Mở khóa
</a>

<?php
    }

}
?>

<a
class="xoa"
onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')"
href="xoa_tai_khoan.php?id=<?php echo $row['ma_tai_khoan']; ?>">
Xóa
</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</body>

</html>
