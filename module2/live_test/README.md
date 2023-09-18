# Module Two Live Test

1. Create a PHP script using a loop to print all even numbers between 1 and 10.

```php
for ($i = 2; $i <= 10; $i += 2) {
    echo $i, " ";
}
```

2. Declare a function named 'greet' that takes one parameter, 'name'. The function should print a greeting message with
   the name passed to it when it is called.

```php
function greet($name) {
    printf("Hello, %s!", $name);
}

greet("Chanchal");
```

3. Create a recursive function called 'factorial' in PHP that calculates and returns the factorial of a number.

```php
function factorial($n) {
    if ($n <= 1) return 1;

    return $n * factorial($n - 1);
}

echo factorial(3);
```

4. Write a PHP function named 'fibonacci' that prints the Fibonacci series up to 10 numbers.

```php
function fibonacci($n, $a = 0, $b = 1) {
    if ($n > 0) {
        echo $a, " ";
        fibonacci($n - 1, $b, $a + $b);
    }
}

fibonacci(10);
```

[View source code](live_test1.php)