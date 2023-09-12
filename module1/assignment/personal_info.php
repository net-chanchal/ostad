<?php
// Task 1: Personal Information Page
// Create a PHP file named personal_info.php that displays your personal information using
// variables and the echo statement. Include your name, age, country, and a brief introduction.

// Personal Information
$name = "Md. Chanchal Biswas";
$age = 21;
$country = "Bangladesh";
$briefIntroduction = "My name is $name. I'm studying CSE. I love computer programming. 
Web programming is my favorite, and now I am a student of Ostad.";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Information Page</title>
    <link rel="shortcut icon" href="https://ostad.app/ostad-logo.png" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, sans-serif;
            font-weight: 300;
            color: #3b3b3b;
        }

        h1 {
            font-weight: 400;
        }

        .title {
            text-align: center;
            margin: 15px 0;
        }

        table {
            width: 70%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th {
            width: 200px;
            text-align: right;
            background: #f0f0f0;
            font-weight: 400;
        }

        tr, td, th {
            border: 1px solid silver;
            padding: 5px 15px;
        }
    </style>
</head>
<body>
<h1 class="title">Personal Information</h1>
<table>
    <tr>
        <th>Name</th>
        <td><?= $name; ?></td>
    </tr>
    <tr>
        <th>Age</th>
        <td><?= $age; ?></td>
    </tr>
    <tr>
        <th>Country</th>
        <td><?= $country; ?></td>
    </tr>
    <tr>
        <th>Brief Introduction</th>
        <td><?= $briefIntroduction; ?></td>
    </tr>
</table>
</body>
</html>
