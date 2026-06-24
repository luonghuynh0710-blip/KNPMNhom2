<?php
include("ket_noi.php");

$sql = "SELECT bac_si.*, chuyen_khoa.ten_chuyen_khoa
        FROM bac_si
        INNER JOIN chuyen_khoa
        ON bac_si.ma_chuyen_khoa = chuyen_khoa.ma_chuyen_khoa";

$query = mysqli_query($ket_noi, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách bác sĩ</title>
    <link rel="stylesheet" href="trangchu.css">
</head>
<body>
<header>
    <div class="logo">
        <h2>DANH SÁCH BÁC SĨ</h2>
    </div>
</header>
<a href="trang_chu.php" class="btn-back">
    ← Quay lại
</a>
<section class="doctor">
    <div class="doctor-box">

    <?php while($row = mysqli_fetch_assoc($query)){ ?>

        <div class="doctor-card">

            <img src="<?php echo $row['hinh_anh']; ?>" alt="Bác sĩ">

            <h3><?php echo $row['ho_ten']; ?></h3>

            <p class="hoc-vi">
                <?php echo $row['hoc_vi']; ?>
            </p>

            <p class="chuyen-khoa">
                <?php echo $row['ten_chuyen_khoa']; ?>
            </p>

            <a href="dat_lich.php?id=<?php echo $row['ma_bac_si']; ?>">
                <button>Đặt lịch</button>
            </a>

        </div>

    <?php } ?>

    </div>
</section>

</body>
</html>