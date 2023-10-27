<?php

use JetBrains\PhpStorm\Pure;

defined("APPLICATION_NAME") or die("Direct script access is not allowed.");

/**
 * Function to get the next auto-increment ID
 *
 * @return int
 */
function getNextId(): int
{
    $db = new Database(DATA_DIRECTORY);
    $row = $db->table("users")->select("id")->last();

    // ID will start from 12001 if no record is found
    return !empty($row) ? $row["id"] + 1 : 12001;
}

/**
 * Function to validate form data
 *
 * @param $data
 * @return array
 */
function validateFormData($data): array
{
    $isValid = true;
    $message = [];

    if (empty($data["first_name"])) {
        $isValid = false;
        $message[] = "First name is required.";
    }

    if (empty($data["last_name"])) {
        $isValid = false;
        $message[] = "Last name is required.";
    }

    if (empty($data["email"])) {
        $isValid = false;
        $message[] = "Email address is required.";
    } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $message[] = "Invalid email format.";
    }

    if (empty($data["username"])) {
        $isValid = false;
        $message[] = "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9]{5,20}$/", $data["username"])) {
        $isValid = false;
        $message[] = "Use only alphanumeric characters and username is between 5 to 20 characters.";
    }

    if (empty($data["password"])) {
        $isValid = false;
        $message[] = "Password is required.";
    } elseif (strlen($data["password"]) <= 5) {
        $isValid = false;
        $message[] = "Password needs a minimum of 6 characters.";
    }

    return [$isValid, $message];
}

/**
 * Function to input value from session
 *
 * @param $name
 * @return string
 */
#[Pure] function getInputValue($name): string
{
    $form = Session::get("form");
    return $form[$name] ?? "";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get and validate form data
    $formData = [
        "first_name" => inputPost("first_name"),
        "last_name" => inputPost("last_name"),
        "email" => inputPost("email"),
        "username" => inputPost("username"),
        "password" => inputPost("password"),
    ];

    [$isValid, $message] = validateFormData($formData);

    if ($isValid) {
        // Check if the email exists
        $db = new Database(DATA_DIRECTORY);
        $count = $db->table("users")->where("email", $formData["email"])->count();

        if ($count > 0) {
            $isValid = false;
            $message[] = "Email address already exists.";
        }
    }

    if ($isValid) {
        // Registration data save to users table
        $db = new Database(DATA_DIRECTORY);
        $isInserted = $db->table("users")->insert([
            "id" => getNextId(),
            "first_name" => $formData["first_name"],
            "last_name" => $formData["last_name"],
            "email" => $formData["email"],
            "username" => $formData["username"],
            "password" => passwordHash($formData["password"]),
            // Three types of user's role 'user', 'manager' and 'admin' and by default role is empty
            // Go to the guest page when an empty role user try to login
            "role" => "",
            "created_at" => date("Y-m-d H:i:s"),
        ]);

        if ($isInserted) {
            Session::flash("message", success("Your registration was successful."));

            // Clear the form data from the session
            Session::remove("form");
        } else {
            Session::flash("message", error("Your registration has failed. Please try again."));

            // Form has errors, save form data in session
            Session::set("form", $formData);
        }
    } else {
        Session::flash("message", error("&#8226; " . implode("<br>&#8226; ", $message)));

        // Form has errors, save form data in session
        Session::set("form", $formData);
    }

    redirect(baseUrl("registration"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= APPLICATION_NAME; ?> : : Registration</title>
    <link rel="shortcut icon" href="<?= baseUrl("assets/img/undraw_rocket.svg"); ?>" type="image/x-icon">
    <link href="<?= baseUrl("assets/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="<?= baseUrl("assets/css/sb-admin-2.min.css"); ?>" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"
                     style="background-image: url(<?= baseUrl("assets/img/cover1.jpg"); ?>)"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Registration</h1>
                            <?= Session::getFlash("message"); ?>
                        </div>
                        <form method="post" class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="first_name" class="d-block">
                                        <input type="text" name="first_name" value="<?= getInputValue("first_name"); ?>"
                                               class="form-control form-control-user" id="first_name"
                                               placeholder="First Name" autocomplete="off" autofocus>
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <label for="last_name" class="d-block">
                                        <input type="text" name="last_name" value="<?= getInputValue("last_name"); ?>"
                                               class="form-control form-control-user" id="last_name"
                                               placeholder="Last Name" autocomplete="off">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="d-block">
                                    <input type="text" name="email" value="<?= getInputValue("email"); ?>"
                                           class="form-control form-control-user" id="email"
                                           placeholder="Email Address" autocomplete="off">
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="username" class="d-block">
                                    <input type="text" name="username" value="<?= getInputValue("username"); ?>"
                                           class="form-control form-control-user" id="username"
                                           placeholder="Username" autocomplete="off">
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="password" class="d-block">
                                    <input type="password" name="password" class="form-control form-control-user"
                                           id="password"
                                           placeholder="Password" autocomplete="off">
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= baseUrl("login"); ?>">Go back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= baseUrl("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/js/sb-admin-2.min.js"); ?>"></script>
</body>
</html>
