<?php
//Đặt tên cho cookie
$cookie_name = "user";

//Lấy giá trị của cookie
if (isset($_COOKIE[$cookie_name])) {
    //Giá trị của cookie được mã hóa , nên cần giải mã nó
    $cookie_value = base64_decode($_COOKIE[$cookie_name]);
    //Tách giá trị thành tên ngươi dùng và mk
    list($username, $password) = explode(":", $cookie_value);

    //Kiểm tra tên người dùng và mk hợp lệ không
    if (check_login($username, $password)) {
        //Nếu hợp lệ , hiển thị trang chao mừng cho ngươi dùng
        echo "Chào mừng, $username";

    } else {
        //Nếu không hợp lệ , xóa cookie và yêu cầu người dùng đăng nhập lai
        setcookie($cookie_name, "", time() - 3600);
        header("location:login.php");
    }
} else {
    //Nếu cookie không tồn tại , yeu cau người dùng đăng nhập
    header("location:login.php");
}

//Hàm kiểm tra tên người dùng và mk hợp lệ không
function check_login($username, $password)
{
    //Tạo một kết nối đến CSDL
    $conn = mysqli_connect("localhost", "username", "password", "database");

    if (!$conn) {
        die("Lỗi kết nối đến CSDL:" . mysqli_connect_error());
    }

    //Tạo truy vẫn SQL kiểm tra tên người dùng và mk
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    //Kiểm tra số hàng trả về
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
    //Đòng kết nối
    
}
mysqli_close($conn);


//Quản lý phiên đăng nhập mã hóa cookie
?>