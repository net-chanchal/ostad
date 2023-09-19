<?php
declare(strict_types=1);
// Task 1: Looping with Increment using a Function

// Write a PHP function that uses a for loop to print all even numbers from 1 to 20, but with a
// step of 2. In other words, you should print 2, 4, 6, 8, 10, 12, 14, 16, 18, 20. The function
// should take the arguments like start as 1, end as 20 and step as 2. You must call the function
// to print. Also do the same using while loop and do-while loop also.


// These methods always print even numbers
// `variable % 2` equivalent `variable & 1` and return 1 or 0 [It's work quickly]

/**
 * Function using a for loop
 *
 * @param int $start
 * @param int $end
 * @param int $step
 */
function printEvenNumbersFor(int $start, int $end, int $step): void
{
    $start += $start & 1; // The initial value always create even number

    for ($i = $start; $i <= $end; $i += $step) {
        if ($i & 1) continue; // Skip when value is odd and continue next
        echo $i, " ";
    }
}

/**
 * Function using a for while loop
 *
 * @param int $start
 * @param int $end
 * @param int $step
 */
function printEvenNumbersWhile(int $start, int $end, int $step): void
{
    $start += $start & 1; // The initial value always create even number

    $i = $start;
    while ($i <= $end) {
        if ($i & 1) {
            // Skip when value is odd and continue next
            $i += $step;
            continue;
        }

        echo $i, " ";
        $i += $step;
    }
}

/**
 * Function using a do-while loop
 *
 * @param int $start
 * @param int $end
 * @param int $step
 */
function printEvenNumbersDoWhile(int $start, int $end, int $step): void
{
    $start += $start & 1; // The initial value always create even number
    $i = $start;

    do {
        if ($i & 1) {
            // Skip when value is odd and continue next
            $i += $step;
            continue;
        }

        echo $i, " ";
        $i += $step;
    } while ($i <= $end);
}

// Call the functions
echo "For Loop: ";
printEvenNumbersFor(1, 20, 2);

echo "\nWhile Loop: ";
printEvenNumbersWhile(1, 20, 2);

echo "\nDo-While Loop: ";
printEvenNumbersDoWhile(1, 20, 2);