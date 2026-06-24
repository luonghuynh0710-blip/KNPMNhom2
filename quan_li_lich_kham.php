
<?php
include("kiem_tra_admin.php");
include("ket_noi.php");

$sql = "SELECT lich_kham.*,
        benh_nhan.ho_ten AS ten_benh_nhan,
        bac_si.ho_ten AS ten_bac_si
        FROM lich_kham
        INNER JOIN benh_nhan
        ON lich_kham.ma_benh_nhan = benh_nhan.ma_benh_nhan
        INNER JOIN bac_si
        ON lich_kham.ma_bac_si = bac_si.ma_bac_si
        ORDER BY ngay_kham DESC, gio_kham DESC";

$query = mysqli_query($ket_noi,$sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Quản lý lịch khám</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

body{
    font-family:Arial;
    background:#f5f5f5;
}

h2{
    text-align:center;
    margin:20px;
}

table{
    width:98%;
    margin:auto;
    border-collapse:collapse;
    background:white;
}

table th,
table td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

table th{
    background:#0099cc;
    color:white;
}

a{
    text-decoration:none;
    color:white;
}

.xacnhan{
    background:green;
    padding:6px 10px;
    border-radius:4px;
}

.dakham{
    background:blue;
    padding:6px 10px;
    border-radius:4px;
}

.huy{
    background:red;
    padding:6px 10px;
    border-radius:4px;
}

.back{
    margin:20px;
}

.back a{
    background:#0099cc;
    padding:10px 20px;
    border-radius:5px;
}

</style>

</head>

<body>

<div class="back">
<a href="trang_chu_admin.php">← Quay Lại</a>
</div>

<h2>QUẢN LÝ LỊCH KHÁM</h2>

<table>

<tr>

<th>Mã</th>

<th>Bệnh nhân</th>

<th>Bác sĩ</th>

<th>Ngày khám</th>

<th>Giờ khám</th>

<th>Triệu chứng</th>

<th>Trạng thái</th>

<th>Ngày đặt</th>

<th>Thao tác</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($query)){
?>

<tr>

<td>
<?php echo $row['ma_lich_kham']; ?>
</td>

<td>
<?php echo $row['ten_benh_nhan']; ?>
</td>

<td>
<?php echo $row['ten_bac_si']; ?>
</td>

<td>
<?php echo $row['ngay_kham']; ?>
</td>

<td>
<?php echo $row['gio_kham']; ?>
</td>

<td>
<?php echo $row['trieu_chung']; ?>
</td>

<td>

<?php

if($row['trang_thai']=="ChoXacNhan" || $row['trang_thai']=="Chờ xác nhận"){
    echo "<span style='color:orange;font-weight:bold'>Chờ xác nhận</span>";
}
elseif($row['trang_thai']=="DaXacNhan" || $row['trang_thai']=="Đã xác nhận"){
    echo "<span style='color:green;font-weight:bold'>Đã xác nhận</span>";
}
elseif($row['trang_thai']=="DaKham" || $row['trang_thai']=="Đã khám"){
    echo "<span style='color:blue;font-weight:bold'>Đã khám</span>";
}
elseif($row['trang_thai']=="DaHuy" || $row['trang_thai']=="Đã hủy"){
    echo "<span style='color:red;font-weight:bold'>Đã hủy</span>";
}

?>

</td>

<td>
<?php echo $row['ngay_dat']; ?>
</td>

<td>

<a class="xacnhan"
href="xac_nhan_lich_kham.php?id=<?php echo $row['ma_lich_kham']; ?>">
Xác nhận
</a>

<a class="dakham"
href="da_kham.php?id=<?php echo $row['ma_lich_kham']; ?>">
Đã khám
</a>

<a class="huy"
href="da_huy.php?id=<?php echo $row['ma_lich_kham']; ?>">
Hủy
</a>

</td>

</tr>

<?php
}
?>

</table>

</body>

</html>

