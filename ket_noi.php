<?php
// "tên_database_cua_ban" là tên database bạn tạo trong phpMyAdmin
$ket_noi = mysqli_connect("localhost", "root", "", "qlykb");

// Kiểm tra kết nối nếu lỗi
if (!$ket_noi) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>