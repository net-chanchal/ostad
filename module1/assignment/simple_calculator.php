<?php
// Task 7: Simple Calculator
// Build a PHP calculator named simple_calculator.php that performs basic arithmetic operations.
// Provide input fields for two numbers and a dropdown to select the operation
// (addition, subtraction, multiplication, division). Display the result of the chosen operation.

// Complete these tasks by writing PHP code that fulfills the requirements of each task.
// Feel free to enhance the tasks or add extra features if you'd like. This assignment will
// help you practice your PHP skills and apply the concepts you've learned. Good luck!

session_start();

/**
 * Set a value of session or retrieve a value of session
 *
 * @param string $key
 * @param mixed $value (optional)
 * @return mixed
 */
function session(string $key, mixed $value = null): mixed
{
    if ($value === null) {
        return $_SESSION[$key] ?? null;
    }

    $_SESSION[$key] = $value;
    return null;
}

/**
 * Session value destroy
 *
 * @param $key
 */
function sessionDestroy($key): void
{
    unset($_SESSION[$key]);
}

/**
 * Redirect to the current page.
 */
function redirect(): void
{
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operator = $_POST['operator'];

    // Arithmetic operation
    $result = match ($operator) {
        '+' => $number1 + $number2,
        '-' => $number1 - $number2,
        '*' => $number1 * $number2,
        '/' => ($number2 == 0) ? 'Undefined' : $number1 / $number2,
        default => 'Error',
    };

    session('number1', $number1);
    session('number2', $number2);
    session('operator', $operator);
    session('result', $result);

    redirect();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Calculator</title>
    <link rel="shortcut icon" href="https://ostad.app/ostad-logo.png" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, input, select {
            font-family: system-ui, sans-serif;
            font-weight: 300;
            color: #3b3b3b;
        }

        h1, h3 {
            font-weight: 400;
        }

        .title {
            text-align: center;
            margin: 15px 0;
        }

        .main {
            width: 500px;
            margin: 30px auto;
            background: #f3f3f3;
            padding: 15px;
        }

        .output {
            margin: 15px 0;
            height: 20px;
        }

        .output strong {
            font-weight: 500;
        }

        .form-group {
            margin: 15px 0;
        }

        input, select {
            width: 100%;
            padding: 8px 15px;
            font-size: 22px;
            border: solid 1px #cccccc;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #009688;
        }

        button {
            width: 100%;
            padding: 8px 15px;
            font-size: 22px;
            border: none;
            outline: none;
            margin-top: 22px;
        }

        button {
            cursor: pointer;
            background: #009688;
            color: #ffffff;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <h1 class="title">Simple Calculator</h1>

    <div class="main">
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="number1">
                    <input
                            type="number"
                            value="<?= session('number1'); ?>"
                            step="any"
                            name="number1"
                            id="number1"
                            placeholder="Enter a Number"
                            required autofocus />
                </label>
            </div>

            <div class="form-group">
                <label for="operator">
                    <select name="operator" id="operator" required>
                        <option value="">Operator</option>
                        <option value="+" <?= session('operator') == '+'? 'selected': ''; ?>>&#43;</option>
                        <option value="-" <?= session('operator') == '-'? 'selected': ''; ?>>&#8722;</option>
                        <option value="*" <?= session('operator') == '*'? 'selected': ''; ?>>&#215;</option>
                        <option value="/" <?= session('operator') == '/'? 'selected': ''; ?>>&#247;</option>
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="number2">
                    <input
                            type="number"
                            value="<?= session('number2'); ?>"
                            step="any"
                            name="number2"
                            id="number2"
                            placeholder="Enter a Number"
                            required />
                </label>
            </div>

            <div class="form-group">
                <button type="submit">&#61;</button>
            </div>
        </form>

        <h3 class="output"><strong>Result:</strong> <?= session('result'); ?></h3>
    </div>
</body>
</html>
<?php
sessionDestroy('number1');
sessionDestroy('number2');
sessionDestroy('operator');
sessionDestroy('result');
