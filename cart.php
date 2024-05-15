<?php
include ('flower.php');

class ShoppingCart{
    public array $cart;
    private float $total;
    private float $fee;
    private float $off;

    function __construct(){
        $this->cart = [];
        $this->total = 0.00;
        $this->fee = 0.00;
        $this->off = 0.00;
    }
    function addToCart(Flower $flower){
        $this-> cart[] = $flower; // this is the same as calling push
    }

    function getSubTotal() : float{
        for($i=0; $i<count($this->cart); $i++){
            $temp = $this -> cart[$i] -> getPrice();
            $this -> total += $temp;
        }
        return $this -> total;
    }

    function getDelivery() : float{
        if($this -> total >= 50.0 && $this -> total < 90.0){
            $this -> fee = 2.95;
        }
        elseif($this -> total > 90) {
            $this -> fee = 0.0;
        }
        elseif($this -> total < 50){
            $this -> fee  = 4.95;
        }
        return $this -> fee;
    }

    function getDeal(Flower $deal_flow) : float{
        $tally = 0;
        for($i=0; $i<count($this -> cart); $i++){
            if ($this -> cart[$i] -> getCode() == $deal_flow -> getCode()){
                $tally += 1;
            }
        }
        if($tally % 2 != 0 && $tally > 2){
            $this -> off = round(($deal_flow -> getPrice() / 2.00) * (($tally - 1)/2), 2, PHP_ROUND_HALF_UP);
        }
        elseif($tally % 2 == 0){
            $this -> off = round(($deal_flow -> getPrice() / 2.00) * ($tally/2), 2, PHP_ROUND_HALF_UP);
        }
        return $this -> off;
    }

    function total($sub, $dev, $deal) : float{
        return ($sub + $dev) - $deal;
    }

    function printMenu(array $menu_array){
        echo "Menu:\n";
        for($i = 0, $len = count($menu_array); $i < $len; $i++){
            echo $menu_array[$i] -> getName() . " $" .
                $menu_array[$i] -> getPrice() . " | code: " .
                $menu_array[$i] -> getCode() . "\n";
        }
        echo "-----------\n";
    }

    function displayCart(){
        echo "-----------\nCart: \n";
        for($i = 0; $i < count($this->cart); $i++){
            $this -> cart[$i] -> flowerInfo() . "\n";
        }
    }

    function printReceipt($subtotal, $delivery, $offer){
        $total = $this -> total($subtotal, $delivery, $offer);
        echo "-----------\nHere is your receipt:\n";
        echo "Subtotal: $" . number_format(($subtotal), '2', '.', ',' ). "\n";
        echo "Delivery fee: $" . number_format(($delivery), '2', '.', ',' ). "\n";
        echo "Offer on flowers: -$" . number_format(($offer), '2', '.', ',' ). "\n";
        echo "-----------\n";
        echo "Total: $" . number_format(($total), '2', '.', ','). "\n";
    }

    function __Destruct(){}
}