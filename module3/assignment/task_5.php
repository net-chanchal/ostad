<?php
// Task 5: Password Generator
// Create a PHP function called generatePassword($length) that generates a random password of the specified length.
// The password should include lowercase letters, uppercase letters, numbers, and special characters
// (!@#$%^&*()_+). Write a PHP program to generate a password with a length of 12 characters using this
// function and print the password.

/**
 * Generates a random password of the specified length.
 *
 * @param int $length The length of the password.
 * @return string  The generated password.
 */
function generatePassword(int $length): string
{
    $lowercaseChars = "abcdefghijklmnopqrstuvwxyz";
    $uppercaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numericChars = "0123456789";
    $specialChars = "!@#$%^&*()_+";

    $allChars = $lowercaseChars . $uppercaseChars . $numericChars . $specialChars;
    $totalChars = strlen($allChars);

    $password = "";

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, $totalChars - 1);
        $password .= $allChars[$randomIndex];
    }

    $condition = preg_match("/[$lowercaseChars]/", $password) &&
        preg_match("/[$uppercaseChars]/", $password) &&
        preg_match("/[$numericChars]/", $password) &&
        preg_match("/[$specialChars]/", $password);

    if ($condition == false) {
        // Generate a new password and return it
        return generatePassword($length);
    }

    return $password;
}

// Generate a password with a length of 12 characters
$password = generatePassword(12);

// Print generated password
echo "Password: ", $password;