<?php
declare(strict_types=1);
// Task 4: Fibonacci Series printing using a Function

// Write a PHP function to print the first 15 numbers in the Fibonacci series. You should take
// this 15 as an argument of a function and use a for loop to generate these numbers and print
// them by calling the function.


function fibonacci(int $n): void
{
    $previous = 0;
    $current = 1;

    for ($i = 1; $i <= $n; $i++) {
        echo $previous, " ";

        $next = $previous + $current;
        $previous = $current;
        $current = $next;
    }
}

fibonacci(15);