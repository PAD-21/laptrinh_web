<?php
$email = $_POST['$email'];
$password = $_POST['password'];

//Hàm kiểm tra xem người dùng có ấn ghi nhớ đăng nhập hay không
if (isset($_POST['remember'])) {
    $remember = true;
} else {
    $remember = false;
}

//Hàm kết nối db
$connect = mysqli_connect('localhost', 'tk', 'mk', 'db');
$sql = "SELECT * FROM USER WHERE EMAIL = '$email' AND PASSWORD = '$password'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

//Nếu có tk và mk
if ($number_rows == 1) {
    session_start();
    //Từ kết quả lấy id người dùng
    //Phiên lưu lại ID và tên người dùng
    if ($remember == true) {
        //Tạo token & lưu token ghi nhớ đăng nhập
    }

    header('location:user.php'); //Chuyển hướng đến trang người dùng
    exit();
}

//Nếu không tồn tại tk chuyển hướng lại form login
header('location:login.php');

?>