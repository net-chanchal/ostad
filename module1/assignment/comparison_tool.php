<?php
// Task 6: Comparison Tool
// Develop a PHP tool named comparison_tool.php that compares two numbers and displays the
// larger one using the ternary operator. Create a form where the user can input two numbers.
// Use the ternary operator to determine the larger number and display the result.

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

    // Use ternary operators to determine large numbers
    $largerNumber = ($number1 > $number2) ? $number1: $number2;
    $largerNumber = "The larger number is $largerNumber";

    session('number1', $number1);
    session('number2', $number2);
    session('largerNumber', $largerNumber);

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
        <title>Comparison Tool</title>
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

            label {
                font-weight: 500;
                display: block;
                margin: 5px 0;
            }

            label span {
                color: #f62727;
            }

            input {
                width: 100%;
                padding: 8px 15px;
                font-size: 22px;
                border: solid 1px #cccccc;
                outline: none;
            }

            input:focus {
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
    <h1 class="title">Comparison Tool</h1>

    <div class="main">
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="number1">Number 1<span>*</span></label>
                <input
                    type="number"
                    value="<?= session('number1'); ?>"
                    step="any"
                    name="number1"
                    id="number1"
                    placeholder="Enter a Number"
                    required autofocus />
            </div>

            <div class="form-group">
                <label for="number2">Number 2<span>*</span></label>
                <input
                        type="number"
                        value="<?= session('number2'); ?>"
                        step="any"
                        name="number2"
                        id="number2"
                        placeholder="Enter a Number"
                        required />
            </div>

            <div class="form-group">
                <button type="submit">Compare</button>
            </div>
        </form>

        <h3 class="output"><strong>Result:</strong> <?= session('largerNumber'); ?></h3>
    </div>
    </body>
    </html>
<?php
sessionDestroy('number1');
sessionDestroy('number2');
sessionDestroy('largerNumber');
