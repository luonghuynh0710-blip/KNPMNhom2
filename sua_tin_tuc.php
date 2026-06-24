
<?php

include("ket_noi.php");

$id = $_GET['id'];

$sql = "SELECT * FROM tin_tuc
        WHERE ma_tin_tuc='$id'";

$query = mysqli_query($ket_noi,$sql);

$row = mysqli_fetch_assoc($query);

if(isset($_POST['capnhat'])){

    $tieu_de = $_POST['tieu_de'];

    $noi_dung = $_POST['noi_dung'];

    $hinh_anh = $_POST['hinh_anh'];

    mysqli_query($ket_noi,"
    UPDATE tin_tuc
    SET
    tieu_de='$tieu_de',
    noi_dung='$noi_dung',
    hinh_anh='$hinh_anh'
    WHERE ma_tin_tuc='$id'
    ");

    header("Location: quan_ly_tin_tuc.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Sửa tin tức</title>

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
    box-shadow:0 0 15px rgba(0,0,0,.15);
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
    background:#0077cc;
    color:white;
    border:none;
    border-radius:5px;
    font-size:18px;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#005fa3;
}

</style>

</head>

<body>

<div class="container">

<a href="quan_ly_tin_tuc.php" class="back">
← Quay lại
</a>

<h2>SỬA TIN TỨC</h2>

<form method="POST">

<input
type="text"
name="tieu_de"
value="<?php echo $row['tieu_de']; ?>"
required>

<input
type="text"
name="hinh_anh"
value="<?php echo $row['hinh_anh']; ?>"
required>

<textarea
name="noi_dung"
required><?php echo $row['noi_dung']; ?></textarea>

<button
type="submit"
name="capnhat">

Cập nhật tin tức

</button>

</form>

</div>

</body>

</html>

