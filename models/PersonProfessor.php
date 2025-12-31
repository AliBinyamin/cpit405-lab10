<?php


class Person
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // speak(): prints a generic message
    public function speak(): string
    {
        return "Hello, my name is {$this->name}.";
    }

    // getName(): String
    public function getName(): string
    {
        return $this->name;
    }
}

class Professor extends Person
{
    private float $salary;

    public function __construct(string $name, float $salary)
    {
        parent::__construct($name);
        $this->salary = $salary;
    }

    // Teach(): returns a small message
    public function teach(): string
    {
        return "{$this->name} is teaching PHP & Databases.";
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
}