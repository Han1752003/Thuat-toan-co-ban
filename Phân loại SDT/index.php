<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân loại số điện thoại</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; text-align: center;}
        textarea { width: 30%; height: 20px; }
        .results { margin-top: 20px; }
        h1{color: red;}
        h3{color: red;}
        label{color:maroon;} 
        strong{color:maroon;}
    </style>
</head>
<body>

<h1>Phân loại số điện thoại theo nhà mạng</h1>
<form method="post">
    <label for="phoneNumbers">Nhập danh sách số điện thoại (ngăn cách bởi dấu phẩy):</label><br>
    <textarea id="phoneNumbers" name="phoneNumbers" required></textarea><br>
    <input type="submit" value="Phân loại">
</form>

<div class="results">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['phoneNumbers'];
        $phoneNumbers = explode(',', $input);

        $viettel = [];
        $mobifone = [];
        $vinaphone = [];
        foreach ($phoneNumbers as $phone) {
            $phone = trim($phone);
            if (preg_match('/^0(93|94|98|89|88|84)/', $phone)) {
                $viettel[] = $phone;
            } elseif (preg_match('/^0(90|93|92|89)/', $phone)) {
                $mobifone[] = $phone;
            } elseif (preg_match('/^0(91|94|93|92|89)/', $phone)) {
                $vinaphone[] = $phone;
            }
        }

        echo "<h3>Kết quả phân loại:</h3>";
        if (!empty($viettel)) {
            echo "<strong>Viettel:</strong> " . implode(', ', $viettel) . "<br>";
        } else {
            echo "<strong>Viettel:</strong> Không có số nào.<br>";
        }

        if (!empty($mobifone)) {
            echo "<strong>Mobifone:</strong> " . implode(', ', $mobifone) . "<br>";
        } else {
            echo "<strong>Mobifone:</strong> Không có số nào.<br>";
        }

        if (!empty($vinaphone)) {
            echo "<strong>Vinaphone:</strong> " . implode(', ', $vinaphone) . "<br>";
        } else {
            echo "<strong>Vinaphone:</strong> Không có số nào.<br>";
        }
    }
    ?>
</div>

</body>
</html>