<?php defined("APPLICATION_NAME") OR die("Direct script access is not allowed."); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= APPLICATION_NAME . " : : " . Template::yield("title"); ?></title>
    <link rel="shortcut icon" href="<?= baseUrl("assets/img/undraw_rocket.svg"); ?>" type="image/x-icon">
    <link href="<?= baseUrl("assets/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?= baseUrl("assets/vendor/datatables/dataTables.bootstrap4.min.css"); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="<?= baseUrl("assets/css/sb-admin-2.min.css"); ?>" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
    <?php require "sidebar.php"; ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php require "header.php"; ?>

            <?= Template::yield("content"); ?>
        </div>
        <?php require "footer.php"; ?>
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= baseUrl("assets/vendor/jquery/jquery.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/js/sb-admin-2.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/vendor/datatables/jquery.dataTables.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/vendor/datatables/dataTables.bootstrap4.min.js"); ?>"></script>
<script src="<?= baseUrl("assets/js/demo/datatables-demo.js"); ?>"></script>

<?= Template::yield("script"); ?>
</body>
</html>
