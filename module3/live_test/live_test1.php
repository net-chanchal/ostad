<?php
// Task 1:
// Create an associative array called $student with the following key-value pairs:
// 'name' => 'Alice', 'age' => 22, 'grade' => 'A'
// Print the age of the student.
$student = [
    "name" => "Alice",
    "age" => 22,
    "grade" => "A"
];

echo $student["age"], PHP_EOL;


// Task 2:
// Create an associative array called $student with the key-value pairs:
// 'name' => 'Alice', 'age' => 22, 'grade' => 'A'
// Check if the 'grade' key exists in the array using array_key_exists() and print the result.
$student = [
    "name" => "Alice",
    "age" => 22,
    "grade" => "A"
];

if (array_key_exists("grade", $student)) {
    echo "'grade' Key exist in the array.\n";
} else {
    echo "'grade' Key does not exist in the array.\n";
}


// Task 3:
// Create an array called $numbers with values 100, 200, 50, 40, 50.
// Use a foreach loop to print each value in the array.
$numbers = [100, 200, 50, 40, 50];

foreach ($numbers as $number) {
    echo $number, " ";
}
echo PHP_EOL;

// Task 4:
// Create an array called $names with values 'Talha', 'Afnan', 'Mashrufa', 'Zia', 'Iqbal', 'Habib', 'Airin', ‘Moni’.
// Use the array_filter() function to filter names that start with the letter 'M'.
// Print the filtered names.
$names = ["Talha", "Afnan", "Mashrufa", "Zia", "Iqbal", "Habib", "Airin", "Moni"];

$filteredNames = array_filter($names, function($name) {
    return str_starts_with($name, "M");
});

foreach ($filteredNames as $filteredName) {
    echo $filteredName, PHP_EOL;
}


// Task 5:
// Create a string variable $originalString with the value 'Hello, World!'.
// Use the strrev() function to reverse the string.
// Print the reversed string.
$originalString = "Hello, World!";
$reversedString = strrev($originalString);

echo $reversedString;