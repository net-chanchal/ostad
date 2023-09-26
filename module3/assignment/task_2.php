<?php
// Task 2: Array Manipulation
// Create an array called $numbers containing the numbers 1 to 10. Write a PHP function which takes
// the "$numbers" array as an argument to remove the even numbers from the array and print the resulting array.

/**
 * Return all odd numbers as an array
 *
 * @param array $numbers
 * @return array
 */
function removeEvenNumbers(array $numbers): array
{
    // Keep only odd numbers
    return array_filter($numbers, function($number) {
       return $number & 1;
    });
}

// Create an array containing numbers from 1 to 10
$numbers = range(1, 10);

// Call the function to remove even numbers
$result = removeEvenNumbers($numbers);

// Print the resulting array
print_r($result);




