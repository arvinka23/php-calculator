<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<main>
    <h1>Calculator</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>" method="post">
        <input type="number" name="num1" placeholder="Number one" step="any">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num2" placeholder="Number two" step="any">

        <button type="submit">Calculate</button>

    </form>

    <?php
    function calculate(float $a, float $b, string $op): string|float
    {
        return match ($op) {
            'add' => $a + $b,
            'subtract' => $a - $b,
            'multiply' => $a * $b,
            'divide' => $b != 0 ? $a / $b : 'Error: Division by zero',
            default => 'Unknown operation',
        };
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n1 = (float) ($_POST['num1'] ?? 0);
        $n2 = (float) ($_POST['num2'] ?? 0);
        $operator = (string) ($_POST['operator'] ?? '');

        $result = calculate($n1, $n2, $operator);

        echo '<div class="result"><h2>Result: ' . htmlspecialchars((string) $result, ENT_QUOTES, 'UTF-8') . '</h2></div>';
    }
    ?>

</main>

</body>
</html>
