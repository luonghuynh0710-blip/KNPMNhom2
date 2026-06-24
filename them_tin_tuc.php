
<?php
include("ket_noi.php");

if(isset($_POST['them'])){

    $tieu_de = $_POST['tieu_de'];

    $noi_dung = $_POST['noi_dung'];

    $hinh_anh = $_POST['hinh_anh'];

    mysqli_query($ket_noi,"
    INSERT INTO tin_tuc
    (tieu_de,noi_dung,hinh_anh,ngay_dang)
    VALUES
    ('$tieu_de','$noi_dung','$hinh_anh',NOW())
    ");

    header("Location: quan_ly_tin_tuc.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Thêm tin tức</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f4f6f9;
}

.container{
    width:700px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,0.15);
}

h2{
    text-align:center;
    color:#0077cc;
    margin-bottom:25px;
}

.back{
    display:inline-block;
    background:#6c757d;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:5px;
    margin-bottom:20px;
}

.back:hover{
    background:#555;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
    margin-bottom:20px;
    font-size:16px;
}

textarea{
    width:100%;
    height:250px;
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
    resize:none;
    font-size:16px;
    margin-bottom:20px;
}

button{
    width:100%;
    padding:14px;
    background:#28a745;
    color:white;
    border:none;
    border-radius:5px;
    font-size:18px;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#218838;
}

</style>

</head>

<body>

<div class="container">

<a href="quan_ly_tin_tuc.php" class="back">
← Quay lại
</a>

<h2>THÊM TIN TỨC</h2>

<form method="POST">

<input
type="text"
name="tieu_de"
placeholder="Nhập tiêu đề tin tức"
required>

<input
type="text"
name="hinh_anh"
placeholder="Nhập đường dẫn hình ảnh"
required>

<textarea
name="noi_dung"
placeholder="Nhập nội dung tin tức"
required></textarea>

<button
type="submit"
name="them">

Thêm tin tức

</button>

</form>

</div>

</body>

</html>
