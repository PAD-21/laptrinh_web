<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 10px;
        }

        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <?php
            // Tạo hàng đầu tiên với các số từ 1 đến 8
            for ($i = 1; $i <= 8; $i++) {
                echo "<td>$i</td>";
            }
            ?>
        </tr>
        <tr>
            <?php
            // Tạo hàng thứ hai với các số từ 9 đến 2
            for ($i = 9; $i >= 2; $i--) {
                echo "<td>$i</td>";
            }
            ?>
        </tr>

        <tr>
            <?php
            // Tạo hàng đầu tiên với các số từ 1 đến 8
            for ($i = 1; $i <= 8; $i++) {
                echo "<td>$i</td>";
            }
            ?>
        </tr>

        <tr>
            <?php
            // Tạo hàng thứ hai với các số từ 9 đến 2
            for ($i = 9; $i >= 2; $i--) {
                echo "<td>$i</td>";
            }
            ?>
        </tr>
    </table>
</body>
</html>
