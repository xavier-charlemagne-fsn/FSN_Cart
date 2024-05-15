<?php
include 'cart.php';
function TwoDealFlowTest(Flower $flower)
{
    $test_cart = new ShoppingCart();
    $test_cart->addToCart($flower);
    $test_cart->addToCart($flower);

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($flower);

    $test_cart->displayCart();
    $test_cart->printReceipt($sub, $del, $off);
    echo "two deal flowers test\n\n";
}

function ThreeDealFlowTest(Flower $flower)
{
    $test_cart = new ShoppingCart();
    $test_cart->addToCart($flower);
    $test_cart->addToCart($flower);
    $test_cart->addToCart($flower);

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($flower);

    $test_cart->displayCart();
    $test_cart->printReceipt($sub, $del, $off);
    echo "three deal flowers test\n\n";
}

function FourDealFlowTest(Flower $flower)
{
    $test_cart = new ShoppingCart();
    $test_cart->addToCart($flower);
    $test_cart->addToCart($flower);
    $test_cart->addToCart($flower);
    $test_cart->addToCart($flower);

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($flower);

    $test_cart ->displayCart();
    $test_cart ->printReceipt($sub, $del, $off);
    echo "four deal flowers test\n\n";
}

function test_large_cart(array $large_cart){
    $test_cart = new ShoppingCart();
    for($i = 0; $i < count($large_cart); $i++){
        $test_cart->addToCart($large_cart[$i]);
    }

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($large_cart[1]);

    $test_cart->displayCart();
    $test_cart->printReceipt($sub, $del, $off);
    echo "Every flower test\n\n";
}

function test_under_50USD($flower1)
{
    $test_cart = new ShoppingCart();
    $test_cart->addToCart($flower1);

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($flower1);

    $test_cart->displayCart();
    $test_cart->printReceipt($sub, $del, $off);
    echo "Under 50 dollar delivery test\n\n";
}

function test_50USD($flower1, $flower2)
{
    $test_cart = new ShoppingCart();
    $test_cart->addToCart($flower1);
    $test_cart->addToCart($flower2);

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($flower1);

    $test_cart->displayCart();
    $test_cart->printReceipt($sub, $del, $off);
    echo "Exactly 50 dollar delivery test\n\n";
}

function test_under_90USD($flower1, $flower2, $flower3){
    $test_cart = new ShoppingCart();
    $test_cart->addToCart($flower1);
    $test_cart->addToCart($flower2);
    $test_cart->addToCart($flower3);

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($flower1);

    $test_cart->displayCart();
    $test_cart->printReceipt($sub, $del, $off);
    echo "just under 90 dollars delivery test\n\n";
}

function test_90USD($flower1, $flower2){
    $test_cart = new ShoppingCart();
    $test_cart->addToCart($flower1);
    $test_cart->addToCart($flower2);

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($flower1);
    $test_cart->displayCart();
    $test_cart->printReceipt($sub, $del, $off);
    echo "Exactly 90 dollar delivery test\n\n";
}

function test_over_90USD($flower1, $flower2, $flower3){
    $test_cart = new ShoppingCart();
    $test_cart -> addToCart($flower1);
    $test_cart -> addToCart($flower2);
    $test_cart -> addToCart($flower3);

    $sub = $test_cart->getSubTotal();
    $del = $test_cart->getDelivery();
    $off = $test_cart->getDeal($flower1);
    $test_cart->displayCart();
    $test_cart->printReceipt($sub, $del, $off);
    echo ".50 cents over 90 dollar delivery test\n\n";
}


/*
echo "------------------------ Testing Area -----------------------\n";

//Flowers for testing
$rose = new Flower("Rose", 32.95, "RF1");
$tulip = new Flower("Tulip", 2.96, "TF1");
$lily = new Flower("Lily", 45.00, "LF1");
$dandy = new Flower("Dandy", 27.43, "DF1");
$violet = new Flower("Violet", 25.00, "VF1");
$sakura = new Flower("Sakura", 25.00, "SF1");
$onion = new Flower("Onion", 40.00, "OF1");
$lotus = new Flower("Lotus", 7.05, "LF1");
$gardenweed = new Flower("Gardenweed", .50, "WF1");
$applegrass = new Flower("Applegrass", .75, "AG1");
$goldrose  = new Flower("Goldrose", 50.00, "GR1");

//For tests regarding the special offer the first flower will have the special offer "active"
TwoDealFlowTest($RedFlower);
ThreeDealFlowTest($RedFlower);
FourDealFlowTest($RedFlower);
test_under_50USD($tulip);
test_50USD($violet, $sakura);
test_under_90USD($goldrose, $violet, $applegrass);
test_90USD($goldrose, $onion);
test_over_90USD($goldrose, $onion, $gardenweed);
$big_order = [$RedFlower, $GreenFlower, $BlueFlower, $rose, $tulip, $lily, $dandy, $violet, $sakura,$onion, $gardenweed, $applegrass, $goldrose];
test_large_cart($big_order);
*/