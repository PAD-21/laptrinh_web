<html>

<head>
    <title>Trang dang nhap</title>
    <?php
    session_start();
    $con = mysqli_connect("localhost", "username", "password", "db");
    if (isset($_POST['btn-login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            echo "Cac truong khong duoc de trong";
        } else {
            if (strlen($password) < 8 || !preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/", $password)) {
                echo "MK KHONG DUNG DINH DANG";
            } else {
                $query = "SELECT * FROM USER WHERE USERNAME = '$username'";
                $result = mysqli_query($con, $query);
                $user = mysqli_fetch_assoc($result);

                if (mysqli_num_rows($result) == 1) {
                    $hassed_password = sha1($password . $user['SALT']);
                    if ($hassed_password == $user['PASS']) {
                        $_SESSION['username'] = $username;
                        echo "HELLO" . $_SESSION['username'] . "!";
                        exit();
                    } else {
                        echo "MK sai";
                    }
                }
                else
                {
                    echo "MK khong ton tai";
                }

            }
            
        }
    }
    ?>
</head>

</html>