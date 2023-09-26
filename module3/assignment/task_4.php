<?php
// Task 4: Multidimensional Array
// Create a multidimensional array called $studentGrades to store the grades of three students. Each student
// has grades for three subjects: Math, English, and Science. Write a PHP function which takes"$studentGrades" as
// an argument to calculate and print the average grade for each student.

/**
 * Return students average grades an array.
 *
 * @param array $array
 * @return array
 */
function calculateAverageGrades(array $array): array
{
    $averageGrades = [];

    // Calculate the average grade for each student
    foreach ($array as $row) {
        $averageGrades[] = array_sum($row) / count($row);
    }

    return $averageGrades;
}

// Create a multidimensional array of student grades
$studentGrades = [
    ["math" => 98, "english" => 82, "science" => 90],
    ["math" => 68, "english" => 72, "science" => 80],
    ["math" => 80, "english" => 79, "science" => 76]
];

// Call the function to calculate average grades
$result = calculateAverageGrades($studentGrades);

// Printing the average grade of each student
foreach ($result as $i => $grade) {
    printf("Student %d: %0.2f\n", $i + 1, $grade);
}
