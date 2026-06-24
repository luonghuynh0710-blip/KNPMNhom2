<?php
include("ket_noi.php");

$ma_bac_si = $_GET['id'];

$sql = "SELECT bac_si.*, chuyen_khoa.ten_chuyen_khoa
        FROM bac_si
        INNER JOIN chuyen_khoa
        ON bac_si.ma_chuyen_khoa = chuyen_khoa.ma_chuyen_khoa
        WHERE ma_bac_si = '$ma_bac_si'";

$query = mysqli_query($ket_noi,$sql);
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chi tiết bác sĩ</title>
    <link rel="stylesheet" href="trangchu.css">
</head>
<body>

<div class="container">

    <h1><?php echo $row['ho_ten']; ?></h1>

    <img src="<?php echo $row['hinh_anh']; ?>" width="250">

    <h3>Học vị:</h3>
    <p><?php echo $row['hoc_vi']; ?></p>

    <h3>Chuyên khoa:</h3>
    <p><?php echo $row['ten_chuyen_khoa']; ?></p>

    <h3>Ngày sinh:</h3>
    <p><?php echo $row['ngay_sinh']; ?></p>

    <?php
    if(isset($row['mo_ta'])){
    ?>
    <h3>Giới thiệu:</h3>
    <p><?php echo $row['mo_ta']; ?></p>
    <?php } ?>

    <a href="dat_lich.php?id=<?php echo $row['ma_bac_si']; ?>">
        <button>Đặt lịch khám</button>
    </a>

</div>

</body>
</html> 