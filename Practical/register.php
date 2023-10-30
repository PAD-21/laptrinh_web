<!-- Đề bài : Xây dựng trang đăng ký(register.php)
Giả sử có cơ sở dữ liệu QUANLY_NV có bảng lưu trữ dữ liệu của tài khoản người dùng: USER(ID, USERNAME, EMAIL, PHONE, PASS, SALT), trong đó:
+ ID: định danh duy nhất của người dùng
+ EMAIL: Email Họ và tên của người dùng
+ PHONE: Số điện thoại của người dùng
+ PASS: giá trị băm của Mật khẩu người dùng cùng với SALT(sử dụng thuật toán SHA1)
+ SALT: giá trị ngẫu nhiên cho mỗi người dùng
Nếu một trong số các trường nhập trống(báo lỗi). 
Mật khẩu và Mật khẩu nhập lại nếu không thỏa mãn Chính sác mật khẩu phải có >=8 ký tự, bao gồm >2 nhóm kí tự(chữ hoa, chữ thường, chữ số và kí tự đặc biệt) báo lỗi. 
Mật khẩu mới và mật khẩu nhập lại không trùng nhau (báo lỗi). Số điện thoại hoặc email không đúng định dạng(báo lỗi).
Mỗi một email hoặc số điện thoại chỉ gắn với 1 tài khoản người dùng.
khi người dùng đăng ký tài khoản thành công sẽ hiển thị thông báo "Successful account registration!" và điều hướng đến trang login.php.
Áp dụng các cơ chế an toàn cho trang Đăng ký. Áp dụng các cơ chế an toàn cho trang thay đổi mật khẩu. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng ký</title>

    <?php
    // Lấy thông tin từ form đăng ký
    if (isset($_POST['btn-reg'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        //Kiểm tra xem các trường đã được điền đầy đủ hay chưa
        if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($password_confirmation)) {
            echo "Please fill in all fields";
        } else {
            //Kiểm tra dịnh dạng email
            // Đoạn mã này kiểm tra định dạng của một địa chỉ email 
            // bằng cách sử dụng hàm filter_var với tùy chọn 
            // FILTER_VALIDATE_EMAIL. Nếu địa chỉ email không hợp lệ
            // theo định dạng email tiêu chuẩn, nó sẽ hiển thị 
            // thông báo "Invalid email format."
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format";
            } else {
                //Kiểm tra định dạng số điện thoại
                if (!preg_match("/^[0-9]{10}$/", $phone)) {
                    echo "Invalid phone number format.";
                } else {
                    //Kiểm tra độ dài và độ phức tạp của mật khẩu
                    if (strlen($password) < 8 || !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $password)) {
                        echo "Password must be at least 8 characters long and contain
                        at least 2 of the following: uppercase letters, lowercase letters numbers, 
                        special characters (!@#$%).";
                    } else {
                        //Kiểm tra xem mật khẩu nhập lại có khớp với mật khẩu không
                        if ($password != $password_confirmation) {
                            echo "Password confirmation does not match password.";
                        } else {
                            //Kiểm tra xem email hoặc SĐT đã sd chưa
                            $conn = mysqli_connect("localhost", "username", "password", "QUANLY_NV");

                            $email_check_query = "SELECT * FROM USER Where EMAIL='$email' LIMIT 1";
                            $phone_check_query = "SELECT * FROM USER where PHONE='$phone' LIMIT 1";

                            $email_result = mysqli_query($conn, $email_check_query);
                            $phone_result = mysqli_query($conn, $phone_check_query);
                            $user = mysqli_fetch_assoc($email_result);

                            if ($user) //Nếu email đã tồn tại trong CSDL
                            {
                                echo "This phone number is already registered. ";
                            } else {
                                //Thêm tài khoản mới vào CSDL
                                $salt = bin2hex(random_bytes(32));
                                $hashed_password = sha1($password . $salt);


                                $insert_query = "INSERT INTO `USER` (`USERNAME`, `EMAIL`, `PHONE`, `PASS`, `SALT`)
                                VALUES('$username', '$email', '$phone','$hashed_password', '$salt')";

                                mysqli_query($conn, $insert_query);
                                echo "SUCCESSFUL account registration!";
                                header("Location: login.php");
                                exit();
                            }
                            mysqli_close($conn);
                        }

                    }
                }
            }
        }
    }
    ?>


</head>

<body>
    <form action="register.php" method="post">
        username: <input type="text" name="username" /><br />
        email: <input type="text" name="email" /><br />
        phone: <input type="text" name="phone" /><br />
        password: <input type="password" name="password" /><br />
        password_confirmation: <input type="password" name="password_confirmation" /><br />
        <input type="submit" name="btn-reg" />

    </form>
</body>

</html>