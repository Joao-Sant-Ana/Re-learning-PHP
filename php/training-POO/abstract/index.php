<?php 
    abstract class Car 
    {
        protected $name;

        function __construct(string $name)
        {
            $this->name = $name;
        }

        abstract protected function intro() : string;
    }

    Class brand extends Car 
    {
        function intro() : string 
        {
            switch ($this->name) 
            {
                case "Audi":
                    return "This is a $this->name <br>";
                case "Citroen":
                    return "This is a $this->name <br>";
                case "Volvo":
                    return "This is a $this->name <br>";
                default:
                    return "Maybe it's a $this->name <br>";
            }
        }
    }

    $audi = new brand("Audi");
    echo $audi->intro();
    $volvo = new brand("Volvo");
    echo $volvo->intro();
    $citroen = new brand("Citroen");
    echo $citroen->intro();
    $puma = new brand("Puma");
    echo $puma->intro();
