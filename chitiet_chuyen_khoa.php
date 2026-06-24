<?php
include("ket_noi.php");

$id = $_GET['id'];

$sql_ck = "
SELECT *
FROM chuyen_khoa
WHERE ma_chuyen_khoa = '$id'
";

$query_ck = mysqli_query($ket_noi,$sql_ck);

$ck = mysqli_fetch_assoc($query_ck);

$sql_bs = "
SELECT *
FROM bac_si
WHERE ma_chuyen_khoa = '$id'
";

$query_bs = mysqli_query($ket_noi,$sql_bs);
?>
<!DOCTYPE html>
<html lang="vi">
<div class="container">

<a href="trang_chu.php" class="btn-back">
    ← Quay lại
</a>
<head>
<meta charset="UTF-8">
<title><?php echo $ck['ten_chuyen_khoa']; ?></title>

<link rel="stylesheet" href="trangchu.css">
<div class="chuyen-khoa-detail">

<h1>
    <?php echo $ck['ten_chuyen_khoa']; ?>
</h1>

<img src="<?php echo $ck['hinh_anh']; ?>" alt="<?php echo $ck['ten_chuyen_khoa']; ?>">

<div class="mo-ta">
    <?php echo $ck['mo_ta']; ?>
</div>

</div>
<section class="doctor">

<h2>Bác sĩ thuộc chuyên khoa</h2>

<div class="doctor-box">

<?php while($row = mysqli_fetch_assoc($query_bs)){ ?>

<div class="doctor-card">

<img src="<?php echo $row['hinh_anh']; ?>">

<h3>
    <?php echo $row['ho_ten']; ?>
</h3>

<p>
    <?php echo $row['hoc_vi']; ?>
</p>

<a href="dat_lich.php?id=<?php echo $row['ma_bac_si']; ?>">
    <button>Đặt lịch</button>
</a>

</div>

<?php } ?>

</div>

</section>