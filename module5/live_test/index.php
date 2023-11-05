<?php
// Task 1
// Write a PHP code to read the content of a text file and display it on the webpage.


/*
Demo data file and format.
path/data/users.txt

id,first_name,last_name,email
12001,Chanchal,Biswas,admin@gmail.com
12002,Abdur,Rahim,manager@gmail.com
12004,Jon,Deo,user@gmail.com
 */

// File Path
$filePath = __DIR__ . DIRECTORY_SEPARATOR . "data/users.txt";

// Check file exist
if (!file_exists($filePath)) {
    exit("File not found.");
}

// Open the file
$file = fopen($filePath, "r");

$data = [];
if ($file) {
    // Read the content of the file
    while (($row = fgetcsv($file)) !== false) {
        $data[] = $row;
    }
    // Close the file
    fclose($file);
} else {
    echo "Failed to open the file.";
}

// Display the content
foreach ($data as $row) {
    printf("%s,%s,%s,%s<br>", $row[0], $row[1], $row[2], $row[3]);
}


// Task 2
// Write a PHP code to append new data to an existing text file.

// File Path
$filePath = __DIR__ . DIRECTORY_SEPARATOR . "data/users.txt";

// Check file exist
if (!file_exists($filePath)) {
    exit("File not found.");
}

// Open the file in append mode
$file = fopen($filePath, "a");

$data = "12004,Sami,Jeo,samijeo@gmail.com";

if ($file) {
    fwrite($file, $data . "\n");

    // Close the file
    fclose($file);
} else {
    echo "Failed to open the file.";
}
