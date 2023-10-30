//Xác thực và phan quyền người dùng
<?php 

    $email = $_POST['email'];  //Lấy email từ form đăng nhập
    $password = $_POST['password'];

    //Hàm kết nối db
    $connect = mysqli_connect('localhost','tk','mk','db');
    $sql = "SELECT * FROM USER Where EMAIL='$email' AND PASSWORD='$password'";  //lấy email và pass trong bảng ngươi dùng
    
    $result = mysqli_query($connect,$sql);  //Kết quả trả về
    $number_rows = mysqli_num_rows($result); //Kiểm tra sự tồn tại của người dùng

    //Nếu có tài khoản và mật khẩu
    if($number_rows==1)
    {
        $permission = $_SESSION['permission'];
        //Kiểm tra quyền của người đó có phải admin không
        if($permission =='0')
        {
            //Nếu không phải admin xuất tb
            echo "Bạn không đủ quyền truy cập trang web này<br";
            echo "<a href='http://localhost/website/index.php'>RETURN HOME</a>";
            exit();
        }
    }
    else
    {
        header("Location:login.php");
    }
?>

