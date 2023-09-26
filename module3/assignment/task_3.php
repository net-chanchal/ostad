<?php
// Task 3: Array Sorting
// Create an array called $grades with the following values: 85, 92, 78, 88, 95. Write a PHP function which
// takes "$grades" as an argument to sort the array in descending order and print the sorted grades as array.

/**
 * Return descending order as an array.
 *
 * @param array $array
 * @return array
 */
function sortGradesDesc(array $array): array
{
    // Sort the grades array in descending order
     rsort($array);

     return $array;
}

// Creat an array of grades
$grades = [85, 92, 78, 88, 95];

// Call the function to sort grades in descending order
$result = sortGradesDesc($grades);

// Print the sorted grades
print_r($result);

