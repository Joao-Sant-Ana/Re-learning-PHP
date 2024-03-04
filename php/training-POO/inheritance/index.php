<?php
    declare(strict_types=1);

    class Person 
    {
        protected string $name;
        protected int $age;
        protected string $id;

        function __construct(string $name, int $age, string $id)
        {
            $this->name = $name;   
            $this->age = $age;   
            $this->id = $id;
            return true;
        }

        function __destruct() 
        {
            return "Objeto deletado";
        }

        function get_name() : string 
        {
            return $this->name;
        }

        function get_age() : int 
        {
            return $this->age;
        }

        function get_id() : string 
        {
            return $this->id;
        }

        protected function sum (int $a, int $b) : int
        {
            return $a + $b; 
        }

    }

    class PersonalData extends Person
    {
        private string $birth;

        function __construct(string $name) 
        {
            $this->name = $name;
        }

        function get_name2() : string {
            return $this->name;
        }

        function sumValue(int $a, int $b) : int {
            return $this->sum($a, $b);
        }
    }

    $joao = new Person("Joao", 17, "1.1.1.1-1");
    echo $joao->get_name() . "<br>";
    echo $joao->get_age() . "<br>";
    echo $joao->get_id() . "<br>";

    $data = new PersonalData($joao->get_name());
    echo $data->get_name2() ."<br>" ;
    echo $data->sumValue(2, 6);

