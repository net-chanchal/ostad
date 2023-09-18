<?php
// Task 1: Looping with Increment using a Function

// Write a PHP function that uses a for loop to print all even numbers from 1 to 20, but with a
// step of 2. In other words, you should print 2, 4, 6, 8, 10, 12, 14, 16, 18, 20. The function
// should take the arguments like start as 1, end as 20 and step as 2. You must call the function
// to print. Also do the same using while loop and do-while loop also.


// Function using a for loop
function printEvenNumbersFor(int $start, int $end, int $step): void
{
    for ($i = $start; $i <= $end; $i += $step) {
        echo $i, ($i < $end) ? ", " : "";
    }
}

// Function using a for while loop
function printEvenNumbersWhile(int $start, int $end, int $step): void
{
    $i = $start;
    while ($i <= $end) {
        echo $i, ($i < $end) ? ", " : "";
        $i += $step;
    }
}

// Function using a do-while loop
function printEvenNumbersDoWhile(int $start, int $end, int $step): void
{
    $i = $start;
    do {
        echo $i, ($i < $end) ? ", " : "";
        $i += $step;
    } while ($i <= $end);
}

// Call the functions
echo "For Loop: ";
printEvenNumbersFor(2, 20, 2);

echo "\nWhile Loop: ";
printEvenNumbersWhile(2, 20, 2);

echo "\nDo-While Loop: ";
printEvenNumbersDoWhile(2, 20, 2);