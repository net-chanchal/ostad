<?php
// Task 3: Grade Calculator
// Develop a PHP script named grade_calculator.php that computes the average of three test scores
// and determines the corresponding letter grade. Create a form where the user can input three test
// scores. Calculate the average and display it along with the corresponding grade (A, B, C, D, F).

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
    // Get test score form the form
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];
    $score3 = $_POST['score3'];

    // Calculate the average
    $average = ($score1 + $score2 + $score3) / 3;

    // Determine the letter grade
    $letterGrade = '';

    if ($average >= 90) {
        $letterGrade = 'A';
    }
    elseif ($average >= 80) {
        $letterGrade = 'B';
    }
    elseif ($average >= 70) {
        $letterGrade = 'C';
    }
    elseif ($average >= 60) {
        $letterGrade = 'D';
    }
    else {
        $letterGrade = 'F';
    }

    session('score1', $score1);
    session('score2', $score2);
    session('score3', $score3);
    session('letterGrade', $letterGrade);

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
        <title>Grade Calculator</title>
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
    <h1 class="title">Grade Calculator</h1>

    <div class="main">
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="score1">Test Score 1<span>*</span></label>
                <input
                    type="number"
                    value="<?= session('score1'); ?>"
                    step="0.01"
                    max="100"
                    name="score1"
                    id="score1"
                    placeholder="Enter Score"
                    required autofocus />
            </div>

            <div class="form-group">
                <label for="score2">Test Score 2<span>*</span></label>
                <input
                        type="number"
                        value="<?= session('score2'); ?>"
                        step="0.01"
                        max="100"
                        name="score2"
                        id="score2"
                        placeholder="Enter Score"
                        required />
            </div>

            <div class="form-group">
                <label for="score3">Test Score 3<span>*</span></label>
                <input
                        type="number"
                        value="<?= session('score3'); ?>"
                        step="0.01"
                        max="100"
                        name="score3"
                        id="score3"
                        placeholder="Enter Score"
                        required />
            </div>

            <div class="form-group">
                <button type="submit">Calculate</button>
            </div>
        </form>

        <h3 class="output"><strong>Letter Grade:</strong> <?= session('letterGrade'); ?></h3>
    </div>
    </body>
    </html>
<?php
sessionDestroy('score1');
sessionDestroy('score2');
sessionDestroy('score3');
sessionDestroy('letterGrade');
