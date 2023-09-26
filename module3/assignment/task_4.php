<?php
// Task 4: Multidimensional Array
// Create a multidimensional array called $studentGrades to store the grades of three students. Each student
// has grades for three subjects: Math, English, and Science. Write a PHP function which takes"$studentGrades" as
// an argument to calculate and print the average grade for each student.


// Marks    Letter Grade    Grade Point
// -----------------------------------
// 80-100   A+              5
// 70-79    A               4
// 60-69    A-              3.5
// 50-59    B               3
// 40-49    C               2
// 33-39    D               1
// 0-32     F               0

/**
 * Returns the letter great by calculating the score.
 *
 * @param float|int $mark
 * @return string
 */
function getLetterGrade(float|int $mark): string
{
    if ($mark >= 80) {
        return "A+";
    } elseif ($mark >= 70) {
        return "A";
    } elseif ($mark >= 60) {
        return "A-";
    } elseif ($mark >= 50) {
        return "B";
    } elseif ($mark >= 40) {
        return "C";
    } elseif ($mark >= 33) {
        return "D";
    } else {
        return "F";
    }
}

/**
 * Return students average grades an associative array.
 * Array key is student name and value is grade.
 *
 * @param array $array
 * @return array
 */
function calculateAverageGrades(array $array): array
{
    $averageGrades = [];

    // Calculate the average grade for each student
    foreach ($array as $studentName => $subjects) {
        $averageMarks = array_sum($subjects) / count($subjects);
        $averageGrades[$studentName] = getLetterGrade($averageMarks);
    }

    return $averageGrades;
}

// Create a multidimensional array of student grades
$studentGrades = [
    "James" => ["math" => 98, "english" => 82, "science" => 90],
    "Bobby" => ["math" => 68, "english" => 12, "science" => 80],
    "Larry" => ["math" => 30, "english" => 39, "science" => 76]
];

// Call the function to calculate average grades
$result = calculateAverageGrades($studentGrades);

// Printing the average grade of each student
foreach ($result as $studentName => $letterGrade) {
    echo "$studentName: $letterGrade\n";
}