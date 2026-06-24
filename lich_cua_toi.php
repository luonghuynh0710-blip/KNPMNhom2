
<?php
session_start();
include("ket_noi.php");

if(!isset($_SESSION['ma_tai_khoan'])){
    header("Location:dang_nhap.php");
    exit();
}

$ma_tai_khoan = $_SESSION['ma_tai_khoan'];

$sql_bn = "SELECT ma_benh_nhan
FROM benh_nhan
WHERE ma_tai_khoan='$ma_tai_khoan'";

$query_bn = mysqli_query($ket_noi,$sql_bn);
$row_bn = mysqli_fetch_assoc($query_bn);

$ma_bn = $row_bn['ma_benh_nhan'];

$sql = "
SELECT lk.*, bs.ho_ten
FROM lich_kham lk
LEFT JOIN bac_si bs
ON lk.ma_bac_si=bs.ma_bac_si
WHERE lk.ma_benh_nhan='$ma_bn'
ORDER BY lk.ngay_dat DESC
";

$query = mysqli_query($ket_noi,$sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Lịch khám của tôi</title>

<style>

body{
    margin:0;
    background:#f4f6f9;
    font-family:Arial,sans-serif;
}

.container{
    width:95%;
    margin:30px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.15);
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
    padding:10px 18px;
    border-radius:5px;
    margin-bottom:20px;
}

.back:hover{
    background:#005fa3;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#0077cc;
    color:white;
    padding:12px;
}

td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

tr:nth-child(even){
    background:#f9f9f9;
}

tr:hover{
    background:#eef6ff;
}

.da-xac-nhan{
    color:green;
    font-weight:bold;
}

.cho-duyet{
    color:orange;
    font-weight:bold;
}

.da-huy{
    color:red;
    font-weight:bold;
}

.da-kham{
    color:blue;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<a href="trang_chu.php" class="back">
← Quay lại trang chủ
</a>

<h2>LỊCH KHÁM CỦA TÔI</h2>

<table>

<tr>
<th>Mã lịch</th>
<th>Bác sĩ</th>
<th>Ngày khám</th>
<th>Giờ khám</th>
<th>Triệu chứng</th>
<th>Trạng thái</th>
<th>Ngày đặt</th>
</tr>

<?php

if(mysqli_num_rows($query)>0){

while($row=mysqli_fetch_assoc($query)){

?>

<tr>

<td><?php echo $row['ma_lich_kham']; ?></td>

<td><?php echo $row['ho_ten']; ?></td>

<td><?php echo date("d/m/Y",strtotime($row['ngay_kham'])); ?></td>

<td><?php echo $row['gio_kham']; ?></td>

<td><?php echo $row['trieu_chung']; ?></td>

<td>

<?php

if($row['trang_thai']=="ChoXacNhan"){
    echo "<span class='cho-duyet'>Chờ xác nhận</span>";
}
elseif($row['trang_thai']=="DaXacNhan"){
    echo "<span class='da-xac-nhan'>Đã xác nhận</span>";
}
elseif($row['trang_thai']=="DaKham"){
    echo "<span class='da-kham'>Đã khám</span>";
}
elseif($row['trang_thai']=="DaHuy"){
    echo "<span class='da-huy'>Đã hủy</span>";
}

?>

</td>

<td>
<?php echo date("d/m/Y H:i",strtotime($row['ngay_dat'])); ?>
</td>

</tr>

<?php
}

}else{

echo "
<tr>
<td colspan='7'>
<b>Bạn chưa đặt lịch khám nào!</b>
</td>
</tr>
";

}

?>

</table>

</div>

</body>

</html>
