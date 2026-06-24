<?php
include("ket_noi.php");

$id = $_GET['id'];

$sql = "SELECT * FROM bac_si WHERE ma_bac_si='$id'";
$query = mysqli_query($ket_noi,$sql);
$row = mysqli_fetch_assoc($query);

$sql_ck = "SELECT * FROM chuyen_khoa";
$query_ck = mysqli_query($ket_noi,$sql_ck);

if(isset($_POST['sua']))
{
    $ho_ten = $_POST['ho_ten'];
    $hoc_vi = $_POST['hoc_vi'];
    $ma_chuyen_khoa = $_POST['ma_chuyen_khoa'];

    if($_FILES['hinh_anh']['name'] != "")
    {
        $ten_anh = $_FILES['hinh_anh']['name'];
        $tmp_anh = $_FILES['hinh_anh']['tmp_name'];

        move_uploaded_file($tmp_anh,"upload/".$ten_anh);

        $sql_update = "UPDATE bac_si SET
        ho_ten='$ho_ten',
        hoc_vi='$hoc_vi',
        hinh_anh='upload/$ten_anh',
        ma_chuyen_khoa='$ma_chuyen_khoa'
        WHERE ma_bac_si='$id'";
    }
    else
    {
        $sql_update = "UPDATE bac_si SET
        ho_ten='$ho_ten',
        hoc_vi='$hoc_vi',
        ma_chuyen_khoa='$ma_chuyen_khoa'
        WHERE ma_bac_si='$id'";
    }

    mysqli_query($ket_noi,$sql_update);

    header("Location:danh_sach_bsi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Sửa bác sĩ</title>

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
    width:650px;
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

.back{
    display:inline-block;
    margin-bottom:20px;
    text-decoration:none;
    color:#0077cc;
    font-weight:bold;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
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

.preview{
    width:150px;
    height:150px;
    object-fit:cover;
    border-radius:10px;
    border:1px solid #ddd;
    margin-bottom:20px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:6px;
    background:#0077cc;
    color:white;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#005fa3;
}

</style>

</head>

<body>

<div class="container">

<a href="danh_sach_bsi.php" class="back">
← Quay lại danh sách
</a>

<h2>SỬA BÁC SĨ</h2>

<form method="POST" enctype="multipart/form-data">

<label>Họ tên bác sĩ</label>
<input
type="text"
name="ho_ten"
value="<?php echo $row['ho_ten']; ?>"
required>

<label>Học vị</label>
<input
type="text"
name="hoc_vi"
value="<?php echo $row['hoc_vi']; ?>"
required>

<label>Chuyên khoa</label>

<select name="ma_chuyen_khoa">

<?php while($ck=mysqli_fetch_assoc($query_ck)){ ?>

<option
value="<?php echo $ck['ma_chuyen_khoa']; ?>"
<?php if($ck['ma_chuyen_khoa']==$row['ma_chuyen_khoa']) echo "selected"; ?>>

<?php echo $ck['ten_chuyen_khoa']; ?>

</option>

<?php } ?>

</select>

<label>Ảnh hiện tại</label>

<img
src="<?php echo $row['hinh_anh']; ?>"
class="preview">

<label>Chọn ảnh mới (nếu muốn thay)</label>

<input type="file" name="hinh_anh">

<button type="submit" name="sua">
💾 Cập nhật bác sĩ
</button>

</form>

</div>

</body>
</html>