<?php
include("kiem_tra_admin.php");
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Trang quản trị</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#eef2f7;
}

/* Sidebar */

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:260px;
    height:100vh;
    background:#0d3b66;
    overflow:auto;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:18px 25px;
    font-size:17px;
    transition:.3s;
}

.sidebar a i{
    width:35px;
}

.sidebar a:hover{
    background:#0077cc;
    padding-left:35px;
}

/* Main */

.main{
    margin-left:260px;
    padding:35px;
}

/* Header */

.header{
    background:white;
    border-radius:12px;
    padding:20px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
    margin-bottom:35px;
}

.header h2{
    color:#0077cc;
    font-size:38px;
}

/* Card */

.card-container{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:25px;

}

.card{

    background:white;

    border-radius:15px;

    padding:35px 20px;

    text-align:center;

    text-decoration:none;

    color:black;

    box-shadow:0 3px 12px rgba(0,0,0,.12);

    transition:.3s;

}

.card:hover{

    transform:translateY(-8px);

    box-shadow:0 10px 20px rgba(0,0,0,.2);

}

.card i{

    font-size:55px;

    color:#0077cc;

    margin-bottom:20px;

    display:block;

}

.card h3{

    color:#0d3b66;

    margin-bottom:10px;

    font-size:28px;

}

.card p{

    color:#666;

    font-size:18px;

}

/* Responsive */

@media(max-width:1200px){

.card-container{

grid-template-columns:repeat(2,1fr);

}

}

@media(max-width:768px){

.sidebar{

width:220px;

}

.main{

margin-left:220px;

padding:20px;

}

.card-container{

grid-template-columns:1fr;

}

.header{

flex-direction:column;

gap:15px;

}

}
    </style>

</head>

<body>

    <div class="sidebar">

        <a href="trang_chu_admin.php">
            <i class="fa-solid fa-house"></i>
            Trang Chủ
        </a>

        <a href="quan_li_chuyen_khoa.php">
            <i class="fa-solid fa-stethoscope"></i>
            Quản lý chuyên khoa
        </a>

        <a href="danh_sach_bsi.php">
            <i class="fa-solid fa-user-doctor"></i>
            Quản lý bác sĩ
        </a>

        <a href="quan_ly_tin_tuc.php">
            <i class="fa-solid fa-newspaper"></i>
            Quản lý tin tức
        </a>

        <a href="quan_ly_lien_he.php">
            <i class="fa-solid fa-envelope"></i>
            Quản lý liên hệ
        </a>
        <a href="quan_li_lich_kham.php">
            <i class="fa-solid fa-calendar-check"></i>
            Quản lý lịch khám
        </a>

        <a href="dang_nhap.php">
            <i class="fa-solid fa-right-from-bracket"></i>
            Đăng xuất
        </a>

    </div>

    </div>

    <div class="main">

        <div class="header">

            <h2>TRANG QUẢN TRỊ HỆ THỐNG</h2>

            <div>
                Xin chào:
                <b>
                    <?php echo $_SESSION['ten_dang_nhap']; ?>
                </b>
            </div>

        </div>

        <div class="card-container">

<a href="quan_li_chuyen_khoa.php" class="card">
    <i class="fa-solid fa-stethoscope"></i>
    <h3>Chuyên khoa</h3>
    <p>Quản lý danh mục chuyên khoa</p>
</a>

<a href="danh_sach_bsi.php" class="card">
    <i class="fa-solid fa-user-doctor"></i>
    <h3>Bác sĩ</h3>
    <p>Quản lý thông tin bác sĩ</p>
</a>

<a href="quan_li_lich_kham.php" class="card">
    <i class="fa-solid fa-calendar-check"></i>
    <h3>Lịch khám</h3>
    <p>Quản lý lịch đặt khám</p>
</a>

<a href="quan_ly_nguoi_dung.php" class="card">
    <i class="fa-solid fa-users"></i>
    <h3>Người dùng</h3>
    <p>Quản lý tài khoản</p>
</a>

</div>

        </div>

    </div>

    </div>

</body>

</html>