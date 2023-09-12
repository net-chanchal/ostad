<?php
// Task 2: Temperature Converter
// Design a PHP program called temperature_converter.php that converts temperatures between
// Celsius and Fahrenheit. Provide a form where the user can input a temperature value and
// select the conversion direction (Celsius to Fahrenheit or vice versa). Display the converted temperature.

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
    $conversion = $_POST['conversion'];

    if ($conversion === 'celsiusToFahrenheit') {
        // Celsius to Fahrenheit conversion
        // °F = (°C × 9/5) + 32
        $fahrenheit = ($temperature * 9 / 5) + 32;
        $result = sprintf("%.2f &deg;C is equal to %.2f &deg;F", $temperature, $fahrenheit);
    } else {
        // Fahrenheit to Celsius conversion
        // °C = (°F − 32) x 5/9
        $celsius = ($temperature - 32) * 5 / 9;
        $result = sprintf("%.2f &deg;F is equal to %.2f &deg;C", $temperature, $celsius);
    }

    session('temperature', $temperature);
    session('conversion', $conversion);
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
    <title>Temperature Converter</title>
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
    <h1 class="title">Temperature Converter</h1>

    <div class="main">
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="temperature">
                    <input
                            type="number"
                            value="<?= session('temperature'); ?>"
                            step="0.01"
                            name="temperature"
                            id="temperature"
                            placeholder="Enter Temperature"
                            required autofocus />
                </label>
            </div>

            <div class="form-group">
                <label for="conversion">
                    <select name="conversion" id="conversion" required>
                        <option value="celsiusToFahrenheit" <?= session('conversion') == 'celsiusToFahrenheit'? 'selected': ''; ?>>Celsius to Fahrenheit</option>
                        <option value="fahrenheitToCelsius" <?= session('conversion') == 'fahrenheitToCelsius'? 'selected': ''; ?>>Fahrenheit to Celsius</option>
                    </select>
                </label>
            </div>

            <div class="form-group">
                <button type="submit">Convert</button>
            </div>
        </form>

        <h3 class="output"><strong>Result:</strong> <?= session('result'); ?></h3>
    </div>
</body>
</html>
<?php
sessionDestroy('temperature');
sessionDestroy('conversion');
sessionDestroy('result');
