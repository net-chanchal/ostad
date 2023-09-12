<?php
// Task 5: Weather Report
// Create a PHP script named weather_report.php that provides weather information based on
// temperature. Use a variable to store the temperature. Depending on the temperature range,
// display messages like "It's freezing!", "It's cool.", or "It's warm."

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
    $temperature = $_POST['temperature'];

    // Set weather messages based on temperature range
    if ($temperature < 0) {
        $message = "It's freezing!";
    }
    elseif ($temperature <= 15) {
        $message = "It's cool.";
    }
    else {
        $message = "It's warm.";
    }

    session('temperature', $temperature);
    session('message', $message);

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
    <title>Weather Report</title>
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
    <h1 class="title">Weather Report</h1>

    <div class="main">
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="temperature">
                    <input
                            type="number"
                            step="0.01"
                            value="<?= session('temperature'); ?>"
                            name="temperature"
                            id="temperature"
                            placeholder="Enter Temperature (°C)"
                            required autofocus />
                </label>
            </div>

            <div class="form-group">
                <button type="submit">Check</button>
            </div>
        </form>

        <h3 class="output"><strong>Message:</strong> <?= session('message'); ?></h3>
    </div>
</body>
</html>
<?php
sessionDestroy('temperature');
sessionDestroy('message');
