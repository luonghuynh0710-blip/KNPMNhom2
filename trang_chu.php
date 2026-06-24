<?php
session_start();
include("ket_noi.php");

$sql_chuyen_khoa = "SELECT * FROM chuyen_khoa LIMIT 5";
$query_chuyen_khoa = mysqli_query($ket_noi, $sql_chuyen_khoa);

// THÊM ĐOẠN NÀY ĐỂ BẪY LỖI:
if (!$query_chuyen_khoa) {
    die("Lỗi SQL rồi bạn ơi: " . mysqli_error($ket_noi));
}

// Lấy danh sách bác sĩ gộp với tên chuyên khoa tương ứng
$sql_bac_si = "SELECT bac_si.*, chuyen_khoa.ten_chuyen_khoa 
               FROM bac_si 
               INNER JOIN chuyen_khoa ON bac_si.ma_chuyen_khoa = chuyen_khoa.ma_chuyen_khoa 
               LIMIT 3"; // Hoặc LIMIT 6 tùy bạn muốn hiện bao nhiêu bsi

$query_bac_si = mysqli_query($ket_noi, $sql_bac_si);

if (!$query_bac_si) {
    die("Lỗi SQL bác sĩ: " . mysqli_error($ket_noi));
} 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch khám bệnh trực tuyến</title>
    <link rel="stylesheet" href="trangchu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

    <header>
        <div class="logo">
            <i class="fa-solid fa-heart-pulse"></i>
            <h2>Bệnh Viện Đa Khoa Tiên Thể Học</h2>
        </div>
        <nav>
            <a href="trang_chu.php">Trang chủ</a>
            <div class="dropdown">
    <a href="#">Chuyên khoa</a>

    <div class="dropdown-content">

        <?php
        $sql_menu = "SELECT * FROM chuyen_khoa";
        $query_menu = mysqli_query($ket_noi,$sql_menu);

        while($row = mysqli_fetch_assoc($query_menu)){
        ?>

        <a href="chitiet_chuyen_khoa.php?id=<?php echo $row['ma_chuyen_khoa']; ?>">
            <?php echo strtoupper($row['ten_chuyen_khoa']); ?>
        </a>

        <?php } ?>

    </div>
</div>
           <div class="dropdown">
           <a href="danh_sach_bac_si.php">Bác sĩ</a>
</div>
<a href="tin_tuc.php">Tin tức</a>
<a href="lien_he.php">Liên hệ</a>
<a href="gioi_thieu.html">Giới thiệu</a>
<a href="lich_cua_toi.php">Lịch khám của tôi</a>
        </nav>
        <div class="auth-buttons">

<?php
if(isset($_SESSION['ma_tai_khoan'])){
?>

    <span style="margin-right:10px;">
        Xin chào,
        <b><?php echo $_SESSION['ten_dang_nhap']; ?></b>
    </span>

    <a href="dang_xuat.php" class="btn-register">
        Đăng xuất
    </a>

<?php
}else{
?>

    <a href="dang_nhap.php">Đăng nhập</a>

    <a href="dang_ky.php" class="btn-register">
        Đăng ký
    </a>

<?php
}
?>

</div>
    </header>

    <section class="banner">
        <div class="banner-left">
            <h1>ĐẶT LỊCH KHÁM BỆNH<br>TRỰC TUYẾN</h1>
            <p>Đặt lịch nhanh chóng với đội ngũ bác sĩ giàu kinh nghiệm.</p>
            <div class="search">
                <input type="text" placeholder="Tìm bác sĩ hoặc chuyên khoa">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="banner-right">
            <img src="hb.png" alt="Banner Bệnh Viện">
        </div>
    </section>

    <section class="service">
    <h2>CHUYÊN KHOA NỔI BẬT</h2>
    <div class="service-box">
        <?php
        while($row = mysqli_fetch_assoc($query_chuyen_khoa)){
        ?>
        <div class="card">
            <a href="chitiet_chuyen_khoa.php?id=<?php echo $row['ma_chuyen_khoa']; ?>">
                <h3>
                    <?php echo $row['ten_chuyen_khoa']; ?>
                </h3>
            </a>
        </div>
        <?php
        }
        ?>
    </div>
</section>

<section class="doctor">
    <h2>BÁC SĨ TIÊU BIỂU</h2>
    <div class="doctor-box">
    <?php
    while($row = mysqli_fetch_assoc($query_bac_si)){
    ?>
    <div class="doctor-card">
    <img src="<?php echo $row['hinh_anh']; ?>" alt="Bác sĩ">
        
        <h3><?php echo $row['ho_ten']; ?></h3>
        
        <p class="hoc-vi"><?php echo $row['hoc_vi']; ?></p>
        
        <p class="chuyen-khoa" style="color: #666; font-size: 14px; margin-top: 5px;">
            <?php echo $row['ten_chuyen_khoa']; ?>
        </p>
        
        <a href="dat_lich.php?id=<?php echo $row['ma_bac_si']; ?>">
            <button>Đặt lịch</button>
        </a>
    </div>
    <?php
    }
    ?>
</div>
</section>
</body>
<footer class="footer">

    <div class="footer-container">

        <!-- Cột 1 -->
        <div class="footer-col">
            <h3>Bệnh viện Đa khoa TTH</h3>

            <p>
                Hệ thống đặt lịch khám bệnh trực tuyến giúp bệnh nhân
                dễ dàng tìm kiếm bác sĩ, lựa chọn chuyên khoa và đặt lịch nhanh chóng.
            </p>

            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>

        <!-- Cột 2 -->
        <div class="footer-col">
            <h3>Liên kết nhanh</h3>

            <ul>
                <li><a href="trang_chu.php">Trang chủ</a></li>
                <li><a href="danh_sach_bac_si.php">Bác sĩ</a></li>
                <li><a href="tin_tuc.php">Tin tức</a></li>
                <li><a href="lien_he.php">Liên hệ</a></li>
            </ul>
        </div>

        <!-- Cột 3 -->
        <div class="footer-col">
            <h3>Thông tin liên hệ</h3>

            <p>
                <i class="fa-solid fa-location-dot"></i>
                Số 120 Yên Lãng, Đống Đa, Hà Nội
            </p>

            <p>
                <i class="fa-solid fa-phone"></i>
                0857 867 222
            </p>

            <p>
                <i class="fa-solid fa-envelope"></i>
                info@benhvien.vn
            </p>
        </div>

        <!-- Cột 4 -->
        <div class="footer-col map-col">
            <h3>Bản đồ</h3>

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.554562856415!2d105.81226417503093!3d21.010485380634282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9d65911ef1%3A0x6a4df45cca423e18!2zMTIwIFAuIFnDqm4gTOG6o25nLCDEkOG7k25nIMSQYSwgSMOgIE7hu5lpIDEwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1780931607307!5m2!1svi!2s"
                class="map"
                allowfullscreen=""
                loading="lazy">
            </iframe>

        </div>

    </div>

    <div class="footer-bottom">
        © 2026 Bệnh viện Đa khoa TTH | Đặt lịch khám bệnh trực tuyến
    </div>

</footer>
</html>