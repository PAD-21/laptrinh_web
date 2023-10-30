<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php
        session_start();
        $coon = mysqli_connect('localhost','username','password','QUANLY_NV');

        if(isset($_POST['btn-login']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(empty($username) || empty($password))
            {
                echo "Tên đăng nhập và MK không được để trống.";
            }
            else
            {
                if(strlen($password)<8)
                {
                    echo "Mật khẩu phải có ít nhất 8 ký tự!";
                }
                else
                {
                    // if(!preg_match("#[0-9]+#",$password) || !preg_match("#[a-zA-z]+#",$password) || !preg_match("#\W+#",$password))
                    if(!preg_match("/^(?=.*\d')(?=.*[A-Za-z])[0-9A-Za-z!@#$%]$/",$password))
                    {
                        echo "Mật khẩu phải bao gồm ít nhất 2 nhóm ký tự (Chữ hoa, chữ thường, chữ số và ký tự đặc biệt";
                    }
                    else
                    {
                        $query = "SELECT * FROM USER WHERE USERNAME='$username'";
                        $result = mysqli_query($coon,$query);
                        $user = mysqli_fetch_assoc($result);

                        if(mysqli_num_rows($result)==1)
                        {
                            $hashed_password = sha1($password.$user['SALT']);
                            if($hashed_password == $user['PASS'])
                            {
                                $_SESSION['username'] = $username;
                                echo "HELLO ".$_SESSION['username']. "!";
                            }
                            else
                            {
                                echo "SAI MẬT KHẨU";
                            }
                        }

                        else
                        {
                            echo "TÀI KHOẢN KHÔNG TỒN TẠI";
                        }
                    }
                }
            }
        }
    ?>
</head>
<body>
    <form action="login.php" method="POST">
        <label>USERNAME</label>
        <input type="text" name="username"><br>

        <label>PASSWORD</label>
        <input type="password" name="password"><br>

        <input type="submit" name="btn-login">
    </form>
</body>
</html>