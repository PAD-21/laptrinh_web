<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="./style.css">
    <script src="./main.js" defer></script>
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
            <div style="margin-bottom: 50px;">Moi page duoc chay tren nen trang Index.php</div>
      
        <?php
        if(!empty($_GET['page'])) {
          switch($_GET['page']) {
            case "calculate":
              include_once("./pages/calculate.php");
              break;
            case "drawtable":
              include_once("./pages/drawtable.php");
              break;  
            case "register":
                include_once("./pages/register.php");
                break;  
          }
        } else {
          echo "No page";
        }
      ?>
    </div>
  </main>
  
</body>
</html>