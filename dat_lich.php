<?php
include("ket_noi.php");

$ma_bac_si = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 1. Lấy thông tin chi tiết bác sĩ
$sql_bac_si = "SELECT * FROM bac_si WHERE ma_bac_si='$ma_bac_si'";
$query_bac_si = mysqli_query($ket_noi, $sql_bac_si);
$bac_si = mysqli_fetch_assoc($query_bac_si);

$error_msg = ""; // Biến lưu thông báo lỗi nếu có

if(isset($_POST['dat_lich']))
{
    $ma_benh_nhan = 1; // Sau này thay bằng $_SESSION['ma_benh_nhan']
    $ngay_kham = $_POST['ngay_kham'];
    $gio_kham = $_POST['gio_kham'];
    $trieu_chung = mysqli_real_escape_string($ket_noi, $_POST['trieu_chung']);

    // CHỨC NĂNG 1: Chặn chọn ngày trong quá khứ
    $ngay_hien_tai = date('Y-m-d');
    if ($ngay_kham < $ngay_hien_tai) {
        $error_msg = "Không thể đặt lịch khám cho các ngày trong quá khứ!";
    } 
    else {
        // CHỨC NĂNG 2: Kiểm tra xem bác sĩ đã FULL lịch ngày hôm đó chưa (Ví dụ: Giới hạn 15 ca/ngày)
        $gioi_han_ca_ngay = 15;
        $sql_check_full = "SELECT COUNT(*) as tong_ca FROM lich_kham 
                           WHERE ma_bac_si = '$ma_bac_si' AND ngay_kham = '$ngay_kham' AND trang_thai != 'Đã hủy'";
        $query_check_full = mysqli_query($ket_noi, $sql_check_full);
        $row_full = mysqli_fetch_assoc($query_check_full);

        if ($row_full['tong_ca'] >= $gioi_han_ca_ngay) {
            $error_msg = "Bác sĩ đã kín lịch vào ngày $ngay_kham. Vui lòng chọn ngày khác!";
        } 
        else {
            // CHỨC NĂNG 3: Kiểm tra trùng giờ khám cụ thể của bác sĩ đó
            // Định dạng khoảng thời gian trùng (ví dụ cách nhau trong vòng 30 phút)
            // Ở đây tính đơn giản: trùng chính xác giờ và phút
            // Đổi SELECT id thành SELECT * để tránh sai tên cột khóa chính
$sql_check_trung = "SELECT * FROM lich_kham 
WHERE ma_bac_si = '$ma_bac_si' 
AND ngay_kham = '$ngay_kham' 
AND gio_kham = '$gio_kham' 
AND trang_thai != 'Đã hủy'";
            $query_check_trung = mysqli_query($ket_noi, $sql_check_trung);

            if (mysqli_num_rows($query_check_trung) > 0) {
                $error_msg = "Khung giờ $gio_kham ngày $ngay_kham đã có bệnh nhân khác đặt lịch. Vui lòng chọn giờ khác!";
            }
        }
    }

    // Nếu không có lỗi gì xảy ra thì tiến hành INSERT
    if (empty($error_msg)) {
        $sql_insert = "INSERT INTO lich_kham (ma_benh_nhan, ma_bac_si, ngay_kham, gio_kham, trieu_chung, trang_thai)
                       VALUES ('$ma_benh_nhan', '$ma_bac_si', '$ngay_kham', '$gio_kham', '$trieu_chung', 'ChoXacNhan')";

        if(mysqli_query($ket_noi, $sql_insert)) {
            echo "<script>
                    alert('Đặt lịch thành công!');
                    window.location='trang_chu.php';
                  </script>";
            exit();
        } else {
            $error_msg = "Lỗi hệ thống: " . mysqli_error($ket_noi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch khám</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 550px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        h2 {
            text-align: center;
            color: #0d6efd;
            margin-bottom: 25px;
            text-transform: uppercase;
            font-weight: 700;
        }
        /* Style thông tin bác sĩ */
        .doctor-info {
            display: flex;
            align-items: center;
            background: #eaf4ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            gap: 15px;
        }
        .doctor-info img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
        }
        .doctor-info p {
            margin: 0;
            color: #333;
        }
        /* Thông báo lỗi */
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 5px solid #dc3545;
            font-size: 14px;
        }
        label {
            font-weight: 600;
            color: #444;
            display: block;
            margin-top: 15px;
        }
        input, textarea, select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 5px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.2);
        }
        button {
            width: 100%;
            padding: 14px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            margin-top: 20px;
            transition: 0.3s;
        }
        button:hover {
            background: #0b5ed7;
        }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>ĐẶT LỊCH KHÁM CHUYÊN KHOA</h2>

    <?php if($bac_si){ ?>
        
        <div class="doctor-info">
    <img src="<?php echo !empty($bac_si['hinh_anh']) ? $bac_si['hinh_anh'] : 'default.png'; ?>" alt="Bác sĩ">
    <div>
        <p style="font-size: 18px; font-weight: bold; color: #0d6efd;"><?php echo $bac_si['ho_ten']; ?></p>
        <p style="font-size: 14px; color: #555;"><?php echo $bac_si['hoc_vi']; ?> - <?php echo $bac_si['kinh_nghiem']; ?></p>
    </div>
</div>

        <?php if(!empty($error_msg)){ ?>
            <div class="alert-error">
                ⚠️ <?php echo $error_msg; ?>
            </div>
        <?php } ?>

        <form method="POST">
            <label for="ngay_kham">Ngày khám</label>
            <input type="date" 
                   id="ngay_kham" 
                   name="ngay_kham" 
                   min="<?php echo date('Y-m-d'); ?>" 
                   value="<?php echo isset($_POST['ngay_kham']) ? $_POST['ngay_kham'] : ''; ?>" 
                   required>

            <label for="gio_kham">Giờ khám ước tính</label>
            <select id="gio_kham" name="gio_kham" required>
                <option value="">-- Chọn khung giờ --</option>
                <option value="08:00" <?php echo (isset($_POST['gio_kham']) && $_POST['gio_kham']=='08:00') ? 'selected' : ''; ?>>08:00 - Sáng</option>
                <option value="09:00" <?php echo (isset($_POST['gio_kham']) && $_POST['gio_kham']=='09:00') ? 'selected' : ''; ?>>09:00 - Sáng</option>
                <option value="10:00" <?php echo (isset($_POST['gio_kham']) && $_POST['gio_kham']=='10:00') ? 'selected' : ''; ?>>10:00 - Sáng</option>
                <option value="14:00" <?php echo (isset($_POST['gio_kham']) && $_POST['gio_kham']=='14:00') ? 'selected' : ''; ?>>14:00 - Chiều</option>
                <option value="15:00" <?php echo (isset($_POST['gio_kham']) && $_POST['gio_kham']=='15:00') ? 'selected' : ''; ?>>15:00 - Chiều</option>
                <option value="16:00" <?php echo (isset($_POST['gio_kham']) && $_POST['gio_kham']=='16:00') ? 'selected' : ''; ?>>16:00 - Chiều</option>
            </select>

            <label for="trieu_chung">Mô tả triệu chứng / Nhu cầu khám</label>
            <textarea id="trieu_chung" 
                      name="trieu_chung" 
                      rows="4" 
                      placeholder="Vui lòng ghi rõ tình trạng sức khỏe hiện tại của bạn..." 
                      required><?php echo isset($_POST['trieu_chung']) ? $_POST['trieu_chung'] : ''; ?></textarea>

            <button type="submit" name="dat_lich">
                Xác nhận gửi yêu cầu đặt lịch
            </button>
        </form>

    <?php } else { ?>
        <div style="text-align: center; padding: 20px;">
            <h3 style="color: #dc3545;">Không tìm thấy thông tin bác sĩ yêu cầu!</h3>
            <p>Vui lòng quay lại danh sách chuyên khoa để chọn lại.</p>
        </div>
    <?php } ?>
    
    <a href="trang_chu.php" class="btn-back">⬅ Quay lại Trang chủ</a>
</div>

</body>
</html>