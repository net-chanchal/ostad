<?php
// Task 3: Break on Condition

// Write a PHP program that calculates and prints the first 10 Fibonacci numbers. But, if a
// Fibonacci number is greater than 100, break out of the loop using the break statement.

$limit = 10; // Maximum print Fibonacci numbers

$previous = 0;
$current = 1;

for ($i = 1; $i <= $limit; $i++) {
    if ($previous > 100) break; // Break out of loop
    echo $previous, " ";

    $next = $previous + $current;
    $previous = $current;
    $current = $next;
}