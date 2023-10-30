<?php
function generate_csrf_token() {
    //Nếu mã CSRF chưa được tạo , tạo mới mã CSRF
    if(!isset($_SESSION['csrf_token']))
    {
        //Sử dụng hàm random_bytes() để taojmax CSRF ngẫu nhiên
        $csrf_token = bin2hex(random_bytes(32));

        //Lưu CSRF vào biến session
        $_SESSION['$csrf_token'] = $csrf_token;
    }

    //Trả về mã $csrf_token
    return $_SESSION['$csrf_token'];
}
?>