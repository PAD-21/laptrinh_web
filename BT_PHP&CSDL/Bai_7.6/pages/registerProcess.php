<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../main.js" defer></script>
</head>

<body>
    <header>
        <nav>
            <form id="form" action="" method="get">
                <input id="input" hidden type="text" name="page">
                <button data-page="home" type="button">Home</button>
                <button data-page="register" type="button">Register</button>
                <button data-page="contact1Page" type="button">Contact1Page</button>

            </form>
        </nav>
    </header>
    <main>
        <div class="left">Left</div>
        <div class="right">
            <!-- <div style="margin-bottom: 50px;">Moi page duoc chay tren nen trang Index.php</div> -->
            <h3>Kết Quả Đăng Ký</h3>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $gender = $_POST["gender"];

                echo "<p>Username: $username</p>";
                echo "<p>Password: $password</p>";
                echo "<p>Gender: $gender</p>";

                echo "<p> Address: ";
                if (!empty($_POST['address'])) {
                    foreach ($_POST["address"] as $value) {
                        echo $value . ", ";
                    }
                }
                echo "</p>";

                echo "<p> Enble Programming Language: ";
                if (!empty($_POST["epl"])) {
                    foreach ($_POST["epl"] as $value) {
                        echo $value . ", ";
                    }
                }
                echo "</p>";

                echo "<p> Skill: ".$_POST["skill"]."</p>";
                echo "<p> Note: ".$_POST["note"]."</p>";

                echo "<p> Marriage status: ". ((empty($_POST["ms"]) == 1) ? 'Chua ket hon' : 'Da ket hon')."</p>";
            }
            ?>
            <!-- <a href="../pages/register.php">Quay lại trang đăng ký</a>; -->

        </div>
    </main>

</body>

</html>