<?php defined("APPLICATION_NAME") OR die("Direct script access is not allowed."); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= APPLICATION_NAME; ?> : : 404</title>
    <link rel="shortcut icon" href="<?= baseUrl("assets/img/undraw_rocket.svg"); ?>" type="image/x-icon">
    <link href="<?= baseUrl("assets/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="<?= baseUrl("assets/css/sb-admin-2.min.css"); ?>" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
        <a href="<?= baseUrl("index"); ?>">← Back to Dashboard</a>
    </div>
</div>
<script src="<?= baseUrl("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/js/sb-admin-2.min.js"); ?>"></script>
</body>
</html>
