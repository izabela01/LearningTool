<?php

class hotel{
var $var1;
var $var2;
function __construct( $bill, $food ){
$this->var1 = $bill;
$this->var2 = $food;}
}

// Creating object
$food = new hotel(500, "biriyani");
echo "Before conversion:";
echo "<br>";
var_dump($food);
echo "<br>";


// Converting object to associative array
$foodArray = json_decode(json_encode($food), true);
echo "After conversion:";
var_dump($foodArray);
?>