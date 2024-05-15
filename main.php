<?php
include_once('cart.php');

$cart = new ShoppingCart();
$RedFlower = new Flower("Red Flower", 32.95, "RF1");
$GreenFlower = new Flower("Green Flower", 24.95, "GF1");
$BlueFlower = new Flower("Blue Flower", 7.95, "BF1");
$menu = [$RedFlower, $GreenFlower, $BlueFlower];
$cart -> printMenu($menu);

$input = "";
while(strtoupper($input) != "END"){
    $input = readline('Add flowers via their code (RF1, TF1, LF1) | To get cart total enter "end": ');
    if(strtoupper($input) == "RF1"){
        $cart->addToCart($RedFlower);
        echo "Red Flower added\n";
    }
    elseif(strtoupper($input) =="GF1"){
        $cart->addToCart($GreenFlower);
        echo "Green Flower added\n";
    }
    elseif(strtoupper($input) == "BF1"){
        $cart->addToCart($BlueFlower);
        echo "Blue Flower added\n";
    }
    elseif(strtoupper($input) == "END"){
        echo "\nThank you for shopping with us :)\n";
    }
    else{
        echo "Invalid input\n";
    }
}

$sub = $cart -> getSubTotal();
$del = $cart -> getDelivery();
$off = $cart -> getDeal($RedFlower);

$cart -> displayCart();
$cart -> printReceipt($sub, $del, $off);