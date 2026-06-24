<?php
include("ket_noi.php");

$sql_ck = "SELECT * FROM chuyen_khoa";
$query_ck = mysqli_query($ket_noi,$sql_ck);

if(isset($_POST['them']))
{
    $ho_ten = $_POST['ho_ten'];
    $hoc_vi = $_POST['hoc_vi'];
    $ma_chuyen_khoa = $_POST['ma_chuyen_khoa'];

    $ten_anh = $_FILES['hinh_anh']['name'];
    $tmp_anh = $_FILES['hinh_anh']['tmp_name'];

    move_uploaded_file($tmp_anh,"upload/".$ten_anh);

    $sql = "INSERT INTO bac_si
    (ho_ten,hoc_vi,hinh_anh,ma_chuyen_khoa)
    VALUES
    ('$ho_ten','$hoc_vi','upload/$ten_anh','$ma_chuyen_khoa')";

    mysqli_query($ket_noi,$sql);

    header("Location:danh_sach_bsi.php");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Thêm bác sĩ</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f4f6f9;
    padding:40px;
}

.container{
    width:600px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 3px 15px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    color:#0077cc;
    margin-bottom:25px;
}

label{
    display:block;
    font-weight:bold;
    margin-bottom:8px;
}

input[type=text],
select{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:6px;
    margin-bottom:18px;
}

input[type=file]{
    margin-bottom:20px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    background:#0077cc;
    color:white;
    font-size:16px;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#005fa3;
}

.back{
    display:inline-block;
    margin-bottom:20px;
    text-decoration:none;
    color:#0077cc;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<a href="danh_sach_bsi.php" class="back">
← Quay lại danh sách
</a>

<h2>THÊM BÁC SĨ</h2>

<form method="POST" enctype="multipart/form-data">

<label>Họ tên bác sĩ</label>
<input type="text" name="ho_ten" required>

<label>Học vị</label>
<input type="text" name="hoc_vi" required>

<label>Chuyên khoa</label>

<select name="ma_chuyen_khoa">

<?php while($row=mysqli_fetch_assoc($query_ck)){ ?>

<option value="<?php echo $row['ma_chuyen_khoa']; ?>">
    <?php echo $row['ten_chuyen_khoa']; ?>
</option>

<?php } ?>

</select>

<label>Hình ảnh bác sĩ</label>
<input type="file" name="hinh_anh" required>

<button type="submit" name="them">
➕ Thêm bác sĩ
</button>

</form>

</div>

</body>
</html>