<?php
include("ket_noi.php");

$sql = "SELECT * FROM chuyen_khoa";
$query = mysqli_query($ket_noi,$sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách chuyên khoa</title>
    <link rel="stylesheet" href="trangchu.css">
</head>
<body>

<h2 style="text-align:center">DANH SÁCH CHUYÊN KHOA</h2>

<div class="chuyen-khoa-container">

<?php while($row = mysqli_fetch_assoc($query)){ ?>
<div class="chuyen-khoa-card">

    <img src="<?php echo !empty($row['hinh_anh']) ? $row['hinh_anh'] : 'images/default.jpg'; ?>" alt="">

    <div class="content">

        <h3>
            <?php echo $row['ten_chuyen_khoa']; ?>
        </h3>

        <p>
            <?php
            echo !empty($row['mo_ta'])
            ? mb_substr($row['mo_ta'],0,120)." ..."
            : "Chuyên khoa khám và điều trị các bệnh lý chuyên sâu.";
            ?>
        </p>

        <a class="btn-detail"
           href="chitiet_chuyen_khoa.php?id=<?php echo $row['ma_chuyen_khoa']; ?>">
            Xem chi tiết
        </a>

    </div>

</div>

<?php } ?>

</div>

</body>
</html>