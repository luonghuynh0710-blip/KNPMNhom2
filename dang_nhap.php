<?php
session_start();

include("ket_noi.php");

if(isset($_POST['dangnhap'])){

    $ten_dang_nhap = $_POST['ten_dang_nhap'];
    $mat_khau = $_POST['mat_khau'];

    $sql = "SELECT * FROM tai_khoan
    WHERE ten_dang_nhap='$ten_dang_nhap'
    AND mat_khau='$mat_khau'
    AND trang_thai='HoatDong'";

    $query = mysqli_query($ket_noi,$sql);

    if(mysqli_num_rows($query)>0){

        $row = mysqli_fetch_assoc($query);
        $_SESSION['ma_tai_khoan']=$row['ma_tai_khoan'];
        $_SESSION['ten_dang_nhap']=$row['ten_dang_nhap'];
        $_SESSION['vai_tro']=$row['vai_tro'];

        // Nếu là quản trị
        if($row['vai_tro']=="QuanTri"){

            header("Location: trang_chu_admin.php");
            exit();

        }
        // Nếu là bệnh nhân
        else{

            header("Location: trang_chu.php");
            exit();

        }

    }else{

        echo "<script>
        alert('Sai tên đăng nhập hoặc mật khẩu!');
        </script>";

    }

}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Đăng nhập</title>

<link rel="stylesheet" href="style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="container">

<div class="left">

<h1>Bệnh Viện Đa Khoa Tiên Thể Học</h1>

<p>Khám bệnh nhanh chóng - Tiết kiệm thời gian</p>

<div class="item">

<i class="fa-solid fa-calendar-check"></i>

<div>

<h3>Đặt lịch nhanh</h3>

<p>Chỉ với vài thao tác đơn giản</p>

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

<i class="fa-solid fa-hospital"></i>

<div>

<h3>Dịch vụ uy tín</h3>

<p>Chăm sóc sức khỏe toàn diện</p>

</div>

</div>

</div>

<div class="right">

<h2>ĐĂNG NHẬP</h2>

<form method="POST">

<input
type="text"
name="ten_dang_nhap"
placeholder="Tên đăng nhập"
required>

<input
type="password"
name="mat_khau"
placeholder="Mật khẩu"
required>

<button
type="submit"
name="dangnhap">

Đăng nhập

</button>

</form>

<div class="login">

Chưa có tài khoản?

<a href="dangki.php">

Đăng ký ngay

</a>

</div>

</div>

</div>

</body>

</html>