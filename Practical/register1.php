<html>
    <head>
        <title>Trang dang ky</title>
        <?php 
            if(isset($_POST['btn-register1']))
            {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                $password_confirmation = $_POST['password_confirmation'];

                if(empty($username) || empty($email) || empty($phone) || empty($password) || empty($password_confirmation))
                {
                    echo "CAC TRUONG KHONG DUOC DE TRONG";
                }
                else
                {
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        echo "EMAIL KHONG DUNG DINH DANG";
                    }
                    else
                    {
                        if(strlen($password) < 8 || !preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/",$password))
                        {
                            echo "MAT KHAU KHONG DUNG DINH DANG";
                        }
                        else
                        {
                            if($password != $password_confirmation)
                            {
                                echo "MAT KHAU XAC NHAN KHONG GIONG";
                            }
                            else
                            {
                                $conn = mysqli_connect("localhost","root","","QUANLY_NV");
                                $email_check_query = "SELECT * FROM USER WHERE EMAIL = '$email' LIMIT 1";
                                $phone_check_query = "SELECT * FROM USER WHERE PHONE = '$phone' LIMIT 1";
                                $email_result = mysqli_query($conn, $email_check_query);
                                $phone_result = mysqli_query($conn, $phone_check_query);
                                $user = mysqli_fetch_assoc($email_result);

                                if($user)
                                {
                                    echo "SDT DA DUOC DK";
                                }
                                else
                                {
                                    $salt = bin2hex(random_bytes(32));
                                    $hassed_password = sha1($password . $salt);
                                    $insert_query = "INSERT INTO `USER` (`USERNAME`,`EMAIL`,`PHONE`,`PASS`,`SALT`)
                                      VALUES ('$username','$email','$phone','$hassed_password','$salt')";
                                    mysqli_query($conn, $insert_query);
                                    echo "Successful account registration";
                                    header ("location: login.php");
                                    exit();
                                }


                            }
                            mysqli_close($conn);
                        }
                        
                    }
                }
            }
        ?>
    </head>

    <body>
        
    </body>
</html>