<?php
include("ket_noi.php");

$id = $_GET['id'];

$sql = "SELECT * FROM chuyen_khoa
        WHERE ma_chuyen_khoa='$id'";

$query = mysqli_query($ket_noi,$sql);

$row = mysqli_fetch_assoc($query);

if(isset($_POST['capnhat'])){

    $ten = $_POST['ten_chuyen_khoa'];

    mysqli_query($ket_noi,"
    UPDATE chuyen_khoa
    SET ten_chuyen_khoa='$ten'
    WHERE ma_chuyen_khoa='$id'
    ");

    header("Location: quan_ly_chuyen_khoa.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Sửa chuyên khoa</title>

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
    width:450px;
    margin:80px auto;
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

input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:16px;
    margin-bottom:20px;
}

button{
    width:100%;
    padding:12px;
    background:#0077cc;
    color:white;
    border:none;
    border-radius:5px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#005fa3;
}

.back{
    display:inline-block;
    margin-bottom:20px;
    padding:10px 18px;
    background:#6c757d;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.back:hover{
    background:#5a6268;
}

</style>

</head>

<body>

<div class="container">

<a href="quan_li_chuyen_khoa.php" class="back">
← Quay lại
</a>

<h2>SỬA CHUYÊN KHOA</h2>

<form method="POST">

<input
type="text"
name="ten_chuyen_khoa"
value="<?php echo $row['ten_chuyen_khoa']; ?>"
required>

<button
type="submit"
name="capnhat">

Cập nhật

</button>

</form>

</div>

</body>

</html>