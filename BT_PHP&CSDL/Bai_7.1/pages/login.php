<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

    <title>Login Page</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            margin-top: 20px;
        }

        form {
            margin: 20px auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="reset"],
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="reset"] {
            background-color: #ccc;
            color: #333;
        }

        input[type="reset"]:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div id="wrapper">
        <div class="container">  
            <!-- định nghĩa một khối bao quanh thanh website -->
             <div class="row justify-content-around">
                <form action="reg.php" method="POST" id="form_reg">
                    <h1>Login Form</h1>


                    <div class="form-group">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <input type="reset" value="Reset" class="btn-primary btn btn-block" name="btn-reg" >
                    <input type="submit" value="Đăng ký" class="btn-primary btn btn-block" name="btn-reg" >

            </div>
        </div>
    </div>
</body>
</html>