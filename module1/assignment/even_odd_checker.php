<?php
// Task 4: Even or Odd Checker
// Build a PHP program called even_odd_checker.php that checks whether a given number is
// even or odd. Provide an input field where the user can enter a number. Display a message
// indicating whether the number is even or odd.

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
    $number = $_POST['number'];

    // Finding even or odd numbers
    $result = ($number % 2 == 0) ? 'Event' : 'Odd';
    $result = "The number $number is $result.";

    session('number', $number);
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
    <title>Even or Odd Checker</title>
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
    <h1 class="title">Even or Odd Checker</h1>

    <div class="main">
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="number">
                    <input
                            type="number"
                            value="<?= session('number'); ?>"
                            name="number"
                            id="number"
                            placeholder="Enter a Number"
                            required autofocus />
                </label>
            </div>

            <div class="form-group">
                <button type="submit">Check</button>
            </div>
        </form>

        <h3 class="output"><strong>Result:</strong> <?= session('result'); ?></h3>
    </div>
</body>
</html>
<?php
sessionDestroy('number');
sessionDestroy('result');
