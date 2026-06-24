
<?php
include("ket_noi.php");

if(isset($_POST['dangky'])){

    $ten_dang_nhap = $_POST['ten_dang_nhap'];
    $mat_khau = $_POST['mat_khau'];
    $nhap_lai = $_POST['nhap_lai'];
    $ho_ten = $_POST['ho_ten'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $email = $_POST['email'];
    $dia_chi = $_POST['dia_chi'];
    $ngay_sinh = $_POST['ngay_sinh'];

    if($mat_khau != $nhap_lai){

        echo "<script>alert('Mật khẩu không khớp');</script>";

    }else{

        $sql = "INSERT INTO tai_khoan
        (ten_dang_nhap,mat_khau,vai_tro)
        VALUES
        ('$ten_dang_nhap','$mat_khau','BenhNhan')";

        mysqli_query($ket_noi,$sql);

        $ma_tai_khoan = mysqli_insert_id($ket_noi);

        $sql2 = "INSERT INTO benh_nhan
        (ma_tai_khoan,ho_ten,ngay_sinh,dia_chi,so_dien_thoai,email)
        VALUES
        ('$ma_tai_khoan','$ho_ten','$ngay_sinh','$dia_chi','$so_dien_thoai','$email')";

        mysqli_query($ket_noi,$sql2);

        echo "<script>
        alert('Đăng ký thành công');
        window.location='dang_nhap.php';
        </script>";

    }

}
?>

<!DOCTYPE html>

<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Đăng ký tài khoản</title>

<link rel="stylesheet" href="style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="container">

<div class="left">

<h1>Bệnh Viện Đa Khoa Tiên Thể Học</h1>

<p>Chăm sóc sức khỏe mọi lúc mọi nơi</p>

<div class="item">

<i class="fa-solid fa-calendar-check"></i>

<div>

<h3>Đặt lịch nhanh</h3>

<p>Chỉ vài thao tác đơn giản</p>

</div>

</div>

<div class="item">

<i class="fa-solid fa-user-doctor"></i>

<div>

<h3>Bác sĩ chuyên khoa</h3>

<p>Đội ngũ giàu kinh nghiệm</p>

</div>

</div>

<div class="item">

<i class="fa-solid fa-shield-halved"></i>

<div>

<h3>Dịch vụ uy tín</h3>

<p>Chăm sóc sức khỏe toàn diện</p>

</div>

</div>

</div>

<div class="right">

<h2>ĐĂNG KÝ TÀI KHOẢN</h2>

<form method="POST">

<div class="row">

<input type="text"
name="ten_dang_nhap"
placeholder="Tên đăng nhập"
required>

<input type="password"
name="mat_khau"
placeholder="Mật khẩu"
required>

</div>

<input type="password"
name="nhap_lai"
placeholder="Nhập lại mật khẩu"
required>

<input type="text"
name="ho_ten"
placeholder="Họ và tên"
required>

<div class="row">

<input type="text"
name="so_dien_thoai"
placeholder="Số điện thoại"
required>

<input type="email"
name="email"
placeholder="Email"
required>

</div>

<select name="dia_chi" required>

<option value="">-- Chọn tỉnh/thành phố --</option>

<option>Hà Nội</option>

<option>Hồ Chí Minh</option>

<option>Đà Nẵng</option>

<option>Hải Phòng</option>

<option>Cần Thơ</option>

<option>Bắc Ninh</option>

<option>Quảng Ninh</option>

<option>Nghệ An</option>

<option>Thanh Hóa</option>

<option>Thái Bình</option>

</select>

<input
type="date"
name="ngay_sinh"
required>

<label>

<input
type="checkbox"
required>

Tôi đồng ý với điều khoản sử dụng

</label>

<button
type="submit"
name="dangky">

Đăng ký

</button>

</form>

<p class="login">

Đã có tài khoản?

<a href="dang_nhap.php">

Đăng nhập ngay

</a>

</p>

</div>

</div>

<script src="js/script.js"></script>

</body>

</html>
