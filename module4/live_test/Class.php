<?php

use JetBrains\PhpStorm\Pure;

// 1.Create a class called 'Person' with the following attributes and methods:

class Person
{
    /**
     * @var string Person name
     */
    public string $name;

    /**
     * @var int Person age
     */
    public int $age;

    /**
     * Person constructor.
     *
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * Introduce method
     */
    public function introduce(): void
    {
        echo "My name is $this->name and I am $this->age years old.\n";
    }
}

// Example Object
$person = new Person("John", 30);
$person->introduce();


// 2. Create a child class called 'Student' that extends the 'Person' class. The 'Student' class should have an
// additional attribute called 'mark' (string) and an additional method called 'calculate_grade_percentage()' that
// returns the mark percentage (string). Assume that the mark is out of 100.

class Student extends Person
{
    /**
     * @var string Subject mark
     */
    public string $mark;

    /**
     * Student constructor.
     *
     * @param string $name
     * @param int $age
     * @param string $mark
     */
    #[Pure] public function __construct(string $name, int $age, string $mark)
    {
        parent::__construct($name, $age);
        $this->mark = $mark;
    }

    /**
     * Method override to introduce the student
     */
    public function introduce(): void
    {
        echo "My name is $this->name, I am $this->age years old.\n";
    }

    /**
     * Additional method to calculate grade percentage
     *
     * @return string
     */
    public function calculate_grade_percentage(): string
    {
        $gradePercentage = ($this->mark / 100) * 100;
        return number_format($gradePercentage, 2) . "%";
    }
}

// Example Object
$student = new Student("Robert", 18, "85");
$student->introduce();
$gradePercentage = $student->calculate_grade_percentage();
echo "My grade percentage is $gradePercentage\n";
