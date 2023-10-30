<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="../style.css">
    <script src="../main.js" defer></script>
</head>
<body>
<header>
    <nav>
      <form id="form" action="" method="get">
        <input id="input" hidden type="text" name="page">
        <button data-page="calculate" type="button">Calculate</button>
        <button data-page="drawtable" type="button">DrawTable</button>
        <button data-page="register" type="button">Register</button>
        <button data-page="contact" type="button">Contact</button>
        

      </form>
    </nav>
</header>
    
    <main>
        <div class="left">
            Left
        </div>
        <div class="right">
            <div style="margin-bottom: 50px;"></div>
            <h3>Kết Quả Đăng Ký</h3>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $address = $_POST["address"];
                $job = $_POST["job"];
                $comment = $_POST["comment"];

                echo "<p><strong>Username:</strong> $username</p>";
                echo "<p><strong>Địa chỉ:</strong> $address</p>";
                echo "<p><strong>Công việc:</strong> $job</p>";
                 echo "<p><strong>Ghi chú:</strong> $comment</p>";
            }

            // if(isset($_POST['btn-reg']))
            // {
            // echo "Đã submit";
            //  echo "<pre>";
            //  print_r($_POST);
            // }
            ?> 
             <a href="../index.php">Quay lại trang trang chủ</a>;
           
        </div>
            
  </main>
</body>
</html>
