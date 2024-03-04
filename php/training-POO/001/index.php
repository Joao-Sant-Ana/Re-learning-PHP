<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
</head>
<body>
    <?php 
        class Fruit {
            private $name;
            private $color;
            private $size;

            function __construct (string $name, string $color, string $size)
            {
                $this->name = $name;
                $this->color = $color;     
                $this->size = $size;          
            }

            function __destruct () {
                echo "O nome da fruta é " . $this->name . "<br>";    
            }

            function get_name() : string
            {
                return $this->name;
            }

            function get_color() : string
            {
                return $this->color;
            }

            function get_size() : string
            {
                return $this->size;
            }
        }
    
        $apple = new Fruit("apple", "red", "medium");

        echo $apple->get_name() . "<br>";
        echo $apple->get_color() . "<br>";
        echo $apple->get_size() . "<br>";

        $banana = new Fruit("banana", "yellow", "medium");

        echo $banana->get_name() . "<br>";
        echo $banana->get_color() . "<br>";
        echo $banana->get_size() . "<br>";
    ?>
</body>
</html>