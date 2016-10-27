<?php
header('Content-Type: text/plain');

//@note: __constructor, private, protected, public

/**
 * Class Student
 */
class Student
{
    public $university = 'J.J. Strossmayer';
    public $name;

    public function __construct($name)//mozes _construct($name,$lname =null) i moze _construct(...$args) isto kao i u javi
    {
        $this->name = $name;
    }

    public function echoName()
    {
        echo $this->name . "\n";
    }

}

$student1 = new Student('Mujo');
var_dump($student1);

$student2 = new Student('Pero');
var_dump($student2);
$student2->echoName();



/**
 * Class FeritStudent
 */
class FeritStudent extends Student
{
    public $faculty = 'FERIT';

    public function echoFaculty()
    {
        echo $this->faculty . ', ' . $this->university . "\n";
    }
    public function  echoName()
    {
        echo 'ime: ';
        parent::echoName();
    }

}

$student3 = new FeritStudent('Hrvoje');
$student3->echoFaculty();
var_dump($student3);
$student3->echoName();

//make echoName() private, protected, override, call parent::