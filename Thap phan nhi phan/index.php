<?php
class Stack {
    private $items = [];

    public function push($item) {
        array_push($this->items, $item);
    }

    public function pop() {
        if (!$this->isEmpty()) {
            return array_pop($this->items);
        }
        return null;
    }

    public function isEmpty() {
        return empty($this->items);
    }
}

function decimalToBinary($decimal) {
    $stack = new Stack();
    
    while ($decimal > 0) {
        $remainder = $decimal % 2;
        $stack->push($remainder); 
        $decimal = intval($decimal / 2);
    }

    $binaryString = '';
    while (!$stack->isEmpty()) {
        $binaryString .= $stack->pop();
    }

    return $binaryString;
}

$binaryNumber = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $decimalNumber = intval($_POST['decimal_number']);
    $binaryNumber = decimalToBinary($decimalNumber);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển Đổi Thập Phân Sang Nhị Phân</title>
</head>
<body>
    <h1>Chuyển Đổi Số Thập Phân Sang Nhị Phân</h1>
    <form method="post">
        <label for="decimal_number">Nhập số thập phân:</label><br>
        <input type="number" id="decimal_number" name="decimal_number" placeholder="Nhập số" required>
        <input type="submit" value="Chuyển đổi">
    </form>
<style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: whitesmoke;
            text-align:center;}
        h1{color: red;}
        h2{color: red;}
</style>
    <?php if ($binaryNumber !== ''): ?>
        <h2>Kết quả:</h2>
        <p>Số nhị phân của <?php echo htmlspecialchars($decimalNumber); ?> là: <?php echo $binaryNumber; ?></p>
    <?php endif; ?>
</body>
</html>