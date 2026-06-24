<?php
include("ket_noi.php");

if(isset($_POST['gui']))
{
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $tieu_de = $_POST['tieu_de'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $noi_dung = $_POST['noi_dung'];

    $sql = "INSERT INTO lien_he(ho_ten,email,so_dien_thoai,noi_dung)
            VALUES('$ho_ten','$email','$so_dien_thoai','$noi_dung')";

    mysqli_query($ket_noi,$sql);

    echo "<script>
            alert('Gửi liên hệ thành công!');
            window.location='trang_chu.php';
          </script>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Liên hệ</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:url('images/bg-contact.jpg') no-repeat center center;
    background-size:cover;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.contact-container{
    width:90%;
    max-width:1400px;
    background:rgba(240,240,240,0.92);
    padding:40px 55px;
    border-radius:10px;
}

.title{
    text-align:center;
    font-size:52px;
    color:#0066b3;
    font-weight:bold;
    margin-bottom:30px;
}

.contact-content{
    display:flex;
    gap:50px;
}

.left{
    flex:1;
}

.right{
    flex:1;
}

.input-box{
    width:100%;
    padding:14px 16px;
    margin-bottom:18px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:18px;
}

textarea{
    height:170px;
    resize:none;
}

.btn{
    width:100%;
    padding:15px;
    background:#ef7f73;
    color:#fff;
    border:none;
    border-radius:6px;
    font-size:28px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#e96a5c;
}

.right h3{
    text-align:center;
    font-size:26px;
    color:#444;
    margin-bottom:20px;
}

.info{
    font-size:18px;
    color:#555;
    line-height:1.8;
}

.info p{
    margin-bottom:10px;
}

.icon{
    margin-right:10px;
}

@media(max-width:900px)
{
    .contact-content{
        flex-direction:column;
    }

    .title{
        font-size:35px;
    }
}

</style>
</head>

<body>

<div class="contact-container">

    <h1 class="title">LIÊN HỆ VỚI CHÚNG TÔI</h1>

    <div class="contact-content">

        <!-- BÊN TRÁI -->
        <div class="left">

            <form method="POST">

                <input type="text"
                       name="ho_ten"
                       class="input-box"
                       placeholder="Họ và Tên"
                       required>

                <input type="email"
                       name="email"
                       class="input-box"
                       placeholder="Địa chỉ email"
                       required>

                <input type="text"
                       name="tieu_de"
                       class="input-box"
                       placeholder="Tiêu đề">

                <input type="text"
                       name="so_dien_thoai"
                       class="input-box"
                       placeholder="Số điện thoại"
                       required>

                <textarea
                    name="noi_dung"
                    class="input-box"
                    placeholder="Nội dung"
                    required></textarea>

                <button type="submit" name="gui" class="btn">
                    Liên hệ
                </button>

            </form>

        </div>

        <!-- BÊN PHẢI -->
        <div class="right">

            <h3>
                Bệnh viện đa khoa Tiên Thể Học
            </h3>

            <div class="info">

                <p>
                    📍 Số 120 Yên Lãng , Đống Đa, Hà Nội
                </p>

                <p>
                    ☎ 0857 867 222
                </p>

                <p>
                    ✉ benhvientthhanoi.vn
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>