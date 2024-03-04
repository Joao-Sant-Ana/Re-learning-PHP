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

            public function __construct (string $name, string $color, string $size)
            {
                $this->name = $name;
                $this->color = $color;     
                $this->size = $size;          
            }

            public function __destruct () 
            {
                echo "O nome da fruta é " . $this->name . "<br>";    
            }

            private function test() 
            {
                echo "Test" . "<br>";
            }

            public function get_name() : string
            {
                return $this->name;
            }

            public function get_color() : string
            {
                return $this->color;
            }

            public function get_size() : string
            {
                return $this->size;
            }

            public function test2()
            {
                return $this->test();    
            }
        }
    
        $apple = new Fruit("apple", "red", "medium");

        echo $apple->get_name() . "<br>";
        echo $apple->get_color() . "<br>";
        echo $apple->get_size() . "<br>";
        echo $apple->test2();
    ?>
</body>
</html>