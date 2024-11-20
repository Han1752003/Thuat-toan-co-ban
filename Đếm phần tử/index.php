<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đếm số lần xuất hiện của phần tử</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; margin: 30px; text-align: center   ; }
        textarea { width: 30%; height: 40px; }
        h2{color: darkmagenta;}
        h3{color:blue}
        .results { margin-top: 20px; color: maroon; }
        label{color: darkgreen;}
        input[type="submit"]{background-color: lightcoral;
        background-size: cover;
        color: maroon;}

    </style>
</head>
<body>

<h2>Đếm số lần xuất hiện của một giá trị trong mảng</h2>
<form method="post">
    <label for="numbers">Nhập mảng số nguyên (ngăn cách bởi dấu phẩy):</label><br>
    <textarea id="numbers" name="numbers" required></textarea><br>
    <label for="value">Nhập giá trị cần đếm:</label><br>
    <input type="number" id="value" name="value" required><br>
    <input type="submit" value="Đếm">
</form>

<div class="results">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputNumbers = $_POST['numbers'];
        $valueToCount = intval($_POST['value']);
        $numbers = array_map('intval', explode(',', $inputNumbers));
        function countOccurrences($numbers, $value) {
            $count = 0;
            foreach ($numbers as $number) {
                if ($number === $value) {
                    $count++;
                }
            }
            return $count;
        }

        $occurrences = countOccurrences($numbers, $valueToCount);
        echo "<h3>Kết quả:</h3>";
        echo "<div class='result-text'>Giá trị <strong>$valueToCount</strong> xuất hiện <strong>$occurrences</strong> lần trong mảng.</div>";
    }
    ?>
</div>

</body>
</html>