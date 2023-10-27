<?php

use JetBrains\PhpStorm\Pure;

defined("APPLICATION_NAME") or die("Direct script access is not allowed.");

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

    if (empty($data["email"])) {
        $isValid = false;
        $message[] = "Email address is required.";
    } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $message[] = "Invalid email format.";
    }

    if (empty($data["password"])) {
        $isValid = false;
        $message[] = "Password is required.";
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
        "email" => inputPost("email"),
        "password" => inputPost("password"),
    ];

    [$isValid, $message] = validateFormData($formData);

    if ($isValid) {
        // Check email and password
        $db = new Database(DATA_DIRECTORY);
        $logged = $db->table("users")
            ->where("email", $formData["email"])
            ->where("password", passwordHash($formData["password"]))
            ->first();

        if (!empty($logged)) {
            // Save Login Session
            Session::set("logged", $logged);

            // Clear the form data from the session
            Session::remove("form");

            // Index page make a decision for redirect 'admin', 'manager', 'user' or guest(Guest means empty role user)
            redirect(baseUrl("index"));
        } else {
            Session::flash("message", error("Email or Password incorrect."));

            // Form has errors, save form data in session
            Session::set("form", $formData);
        }
    } else {
        Session::flash("message", error("&#8226; " . implode("<br>&#8226; ", $message)));
        Session::set("form", $formData); // Form has errors, save form data in session
    }

    redirect(baseUrl("login"));
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
    <title><?= APPLICATION_NAME; ?> : : Login</title>
    <link rel="shortcut icon" href="<?= baseUrl("assets/img/undraw_rocket.svg"); ?>" type="image/x-icon">
    <link href="<?= baseUrl("assets/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="<?= baseUrl("assets/css/sb-admin-2.min.css"); ?>" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-register-image"
                             style="background-image: url(<?= baseUrl("assets/img/cover1.jpg"); ?>)"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    <?= Session::getFlash("message"); ?>
                                </div>
                                <form method="post" class="user">
                                    <div class="form-group">
                                        <label for="email" class="d-block">
                                            <input type="email" name="email" value="<?= getInputValue("email"); ?>"
                                                   class="form-control form-control-user" id="email"
                                                   placeholder="Enter Email Address..." autocomplete="off" autofocus>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="d-block">
                                            <input type="password" name="password"
                                                   class="form-control form-control-user" id="password"
                                                   placeholder="Password" autocomplete="off">
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= baseUrl("registration"); ?>">Go back to Registration</a>
                                </div>

                                <table class="table table-bordered mt-2">
                                    <tr id="adminLogin">
                                        <th>Admin</th>
                                        <td>
                                            <p class="m-0"><b>Email: </b>admin@gmail.com</p>
                                            <p class="m-0"><b>Password: </b>12345</p>
                                        </td>
                                    </tr>
                                    <tr id="managerLogin">
                                        <th>Manager</th>
                                        <td>
                                            <p class="m-0"><b>Email: </b>manager@gmail.com</p>
                                            <p class="m-0"><b>Password: </b>12345</p>
                                        </td>
                                    </tr>
                                    <tr id="userLogin">
                                        <th>User</th>
                                        <td>
                                            <p class="m-0"><b>Email: </b>user@gmail.com</p>
                                            <p class="m-0"><b>Password: </b>12345</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
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

<script>
// Fill up admin email and password
$("#adminLogin").on("click", function () {
    $("#email").val("admin@gmail.com");
    $("#password").val("12345");
});

// Fill up manager email and password
$("#managerLogin").on("click", function () {
    $("#email").val("manager@gmail.com");
    $("#password").val("12345");
});

// Fill up user email and password
$("#userLogin").on("click", function () {
    $("#email").val("user@gmail.com");
    $("#password").val("12345");
});
</script>
</body>
</html>


