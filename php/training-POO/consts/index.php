<?php
    class Consts 
    {
        public const message = "Hello Word";

        public function hello() : string {
            return $this::message;
        }
    }

    $hello =  new Consts();
    echo $hello->hello();