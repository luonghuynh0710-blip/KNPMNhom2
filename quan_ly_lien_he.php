
<?php
include("kiem_tra_admin.php");
include("ket_noi.php");

$sql = "SELECT * FROM lien_he ORDER BY ma_lien_he DESC";
$query = mysqli_query($ket_noi,$sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Quản lý liên hệ</title>

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
    color:#0077cc;
    margin-bottom:20px;
}

.back{
    display:inline-block;
    background:#0077cc;
    color:white;
    text-decoration:none;
    padding:10px 20px;
    border-radius:5px;
    margin-bottom:20px;
}

.back:hover{
    background:#005fa3;
}

table{
    width:100%;
    background:white;
    border-collapse:collapse;
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

.xuly{
    background:green;
    color:white;
    text-decoration:none;
    padding:6px 12px;
    border-radius:5px;
}

.xoa{
    background:red;
    color:white;
    text-decoration:none;
    padding:6px 12px;
    border-radius:5px;
}

.xuly:hover{
    background:#006600;
}

.xoa:hover{
    background:#b30000;
}

</style>

</head>

<body>

<div class="container">

<a href="trang_chu_admin.php" class="back">
← Quay lại 
</a>

<h2>QUẢN LÝ LIÊN HỆ</h2>

<table>

<tr>

<th>Mã</th>

<th>Họ tên</th>

<th>Email</th>

<th>SĐT</th>

<th>Nội dung</th>

<th>Ngày gửi</th>

<th>Trạng thái</th>

<th>Thao tác</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($query)){
?>

<tr>

<td><?php echo $row['ma_lien_he']; ?></td>

<td><?php echo $row['ho_ten']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['so_dien_thoai']; ?></td>

<td><?php echo $row['noi_dung']; ?></td>

<td><?php echo $row['ngay_gui']; ?></td>

<td>

<?php

if($row['trang_thai']=="ChuaXuLy"){

echo "<span style='color:red;font-weight:bold;'>Chưa xử lý</span>";

}else{

echo "<span style='color:green;font-weight:bold;'>Đã xử lý</span>";

}

?>

</td>

<td>

<?php
if($row['trang_thai']=="ChuaXuLy"){
?>

<a
class="xuly"
href="xu_ly_lien_he.php?id=<?php echo $row['ma_lien_he']; ?>">
Đã xử lý
</a>

<?php
}
?>

<a
class="xoa"
onclick="return confirm('Bạn có chắc muốn xóa liên hệ này?')"
href="xoa_lien_he.php?id=<?php echo $row['ma_lien_he']; ?>">
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

