<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("ket_noi.php");
include("kiem_tra_admin.php");

$sql = "SELECT bac_si.*, chuyen_khoa.ten_chuyen_khoa
        FROM bac_si
        INNER JOIN chuyen_khoa
        ON bac_si.ma_chuyen_khoa = chuyen_khoa.ma_chuyen_khoa";

$query = mysqli_query($ket_noi,$sql);

if(!$query){
    die("Lỗi SQL: ".mysqli_error($ket_noi));
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý bác sĩ</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f4f6f9;
    padding:30px;
}

h2{
    color:#0077cc;
    margin-bottom:20px;
}

.them-btn{
    display:inline-block;
    background:#28a745;
    color:white;
    text-decoration:none;
    padding:12px 20px;
    border-radius:6px;
    margin-bottom:20px;
}

.them-btn:hover{
    background:#218838;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

table th{
    background:#0077cc;
    color:white;
    padding:12px;
}

table td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

table tr:hover{
    background:#f8f9fa;
}

img{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:8px;
}

.sua{
    background:#ffc107;
    color:black;
    text-decoration:none;
    padding:8px 12px;
    border-radius:5px;
}

.sua:hover{
    background:#e0a800;
}

.xoa{
    background:#dc3545;
    color:white;
    text-decoration:none;
    padding:8px 12px;
    border-radius:5px;
}

.xoa:hover{
    background:#c82333;
}

.back{
    display:inline-block;
    margin-bottom:15px;
    text-decoration:none;
    color:#0077cc;
    font-weight:bold;
}

</style>

</head>

<body>

<a href="trang_chu_admin.php" class="back">
← Quay lại trang quản trị
</a>

<h2>QUẢN LÝ BÁC SĨ</h2>

<a href="them.php" class="them-btn">
+ Thêm bác sĩ
</a>

<table>

<tr>
    <th>Ảnh</th>
    <th>Họ tên</th>
    <th>Học vị</th>
    <th>Chuyên khoa</th>
    <th>Sửa</th>
    <th>Xóa</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)){ ?>

<tr>

<td>
    <img src="<?php echo $row['hinh_anh']; ?>">
</td>

<td>
    <?php echo $row['ho_ten']; ?>
</td>

<td>
    <?php echo $row['hoc_vi']; ?>
</td>

<td>
    <?php echo $row['ten_chuyen_khoa']; ?>
</td>

<td>
    <a class="sua"
       href="suabsi.php?id=<?php echo $row['ma_bac_si']; ?>">
       Sửa
    </a>
</td>

<td>
    <a class="xoa"
       href="xoabsi.php?id=<?php echo $row['ma_bac_si']; ?>"
       onclick="return confirm('Bạn có chắc muốn xóa bác sĩ này?')">
       Xóa
    </a>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>