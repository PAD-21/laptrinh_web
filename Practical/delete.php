<!DOCTYPE html>
<html>
<head>
    <title>Xóa Điểm</title>
</head>
<body>
    <?php
    session_start();

    // Kiểm tra xác thực người dùng
    if (!isset($_SESSION['logged-in'])) {
        // Chuyển hướng người dùng đến trang đăng nhập hoặc thực hiện xác thực tại đây
        header('Location: login.php');
        exit();
    }

    // Kết nối đến cơ sở dữ liệu
    $db = mysqli_connect('localhost', 'username', 'password', 'QUANLY_NV');

    if ($db->connect_error) {
        die('Kết nối tới cơ sở dữ liệu thất bại: ' . $db->connect_error);
    }

    // Xử lý khi người dùng chọn MASV và bấm Chọn
    if (isset($_POST['chon'])) {
        $ID = $_POST['ID'];

        // Kiểm tra xem SINHVIEN có tồn tại
        $query = "SELECT * FROM Sinhvien WHERE ID = '$ID'";
        $result = mysqli_query($db,$query);
        

        if (mysqli_num_rows($result) == 1) {
            // Hiển thị các ô nhập điểm
            $row = mysqli_fetch_assoc($result);
            echo "<form method='post'>";
            echo "MASV: <input type='text' name='MASV'>";
            echo "MASV: " . $row['ID'] . "<br>";
            echo "<input type='submit' name='chon' value='chon'><br>";
            echo "DIEMTP1: <input type='text' name='diemtp1'><br>";
            echo "DIEMTP1: " .$row['DIEMTP1'] . "<br>";
            echo "DIEMTP2: <input type='text' name='diemtp2'><br>";
            echo "DIEMTP1: " .$row['DIEMTP2'] . "<br>";
            echo "DIEMTHI: <input type='text' name='diemthi'><br>";
            echo "DIEMTP1: " .$row['DIEMTHI'] . "<br>";
            echo "<input type='submit' name='xoa' value='Xóa'>";
            echo "</form>";
        } else {
            echo "Không tìm thấy SINHVIEN với MASV là $ID";
        }
    }

    // Xử lý khi người dùng bấm Xóa
    if (isset($_POST['xoa'])) {
        $ID = $_POST['ID'];
        $diemtp1 = $_POST['diemtp1'];
        $diemtp2 = $_POST['diemtp2'];
        $diemthi = $_POST['diemthi'];

        // Tính DTB
        $dtb = (($diemtp1 * 0.7 + $diemtp2 * 0.3) * 0.3 + $diemthi * 0.7);

        // Xóa SINHVIEN từ cơ sở dữ liệu
        $query = "DELETE FROM Sinhvien WHERE ID = '$ID'";
        if (mysqli_query($db,$query)) {
            echo "Xóa SINHVIEN thành công!";
        } else {
            echo "Lỗi khi xóa SINHVIEN: " . $db->error;
        }
    }

    // Đóng kết nối
    mysqli_close($db);
    ?>

</body>
</html>
