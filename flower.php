<?php
class Flower{
    public $name;
    public $price;
    public $code;
    function __construct($fn, $fp, $fc){
        $this -> name = $fn;
        $this -> price = $fp;
        $this -> code = $fc;
    }
    public function getPrice(){
        return $this -> price;
    }
    public function getName(){
        return $this -> name;
    }
    public function getCode(){
        return $this -> code;
    }
    public function flowerInfo(){
         echo $this -> name . " $" .
             number_format((float)$this -> price, '2', '.', ','). "\n";
    }
}