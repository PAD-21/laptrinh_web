<?php 
    //Kiểm tra xem đã đăng nhập chưa
    if(!isset($_SESSION['username']))
    {
        header('location: login.php');
    }

    //Thông tin để kết nối tới database
    $host = "localhost";
    $username = "pad";
    $password = "1405";
    $db_name = "db_test";

    //Tạo PDO để chống tấn công SQL Injection
    $dsn = "mysql:host=$host;dbname=$db_name";
    $con - new PDO($dsn,$username,$password);

    if(isset($_POST['change_password']))
    {
        $currentPass = $_POST['currentPass'];
        $newPass = $_POST['newPass'];
        $passwordConfirm = $_POST['passwordConfirm'];
        $username = $_SESSION['username'];

        //Kiểm tra hai dòng mật khẩu mới người dùng nhập có khớp hay không
        if($newPass != $passwordConfirm)
        {
            header("location:changePass.php?status=not_match");
        }

        //Kiểm tra độ mạnh của mk mới để chống tấn công dò quét mk
        if(preg_match('@[A-Z]@',$newPass) || preg_match('@[a-z]@',$newPass) 
        || preg_match('@[0-9]@',$newPass) || preg_match('@^\W@',$newPass) 
        || strlen($password <8))
        {
            header('location:changePass.php?status=weak_pass');
        }

        //Mã hóa mật khẩu trước khi lưu vào DB để nếu dữ liệu bị lộ thì
        // mật khẩu của người dùng vẫn được bảo vệ

        $options = array("cost" => 4);
        $newPass = password_hash($newPass,PASSWORD_BCRYPT,$options);
        $currentPass = password_hash($currentPass, PASSWORD_BCRYPT,$options);

        $stm = $con -> prepare("SELECT password FROM user WHERE username=?");
        $stm -> execute(['username']);
        $row = $stm -> fetch(PDO::FETCH_ASSOC);

        // Kiểm tra độ chính xác của mật cũ rồi đổi mk
        if($currentPass === $row['password'])
        {
            $stm = $con-> prepare("UPDATE user SET password=? WHERE username=?;");
            $stm -> execute([$newPass,$username]);
            header('location: changePass.php?status=success');
            
        }
        else
        {
            header('location: changePass.php?status=fail');
        }
    }
?>