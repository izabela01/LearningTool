<?php


class hotel{
var $item1;
var $item2;
var $item3;
function __construct( $food1, $food2, $food3)
{
$this->item1 = $food1;
$this->item2 = $food2;
$this->item3 = $food3;
}
}


// Create object for class(hotel)
$food = new hotel("biriyani", "burger", "pizza");

echo "Before conversion : ";
echo "<br>";

var_dump($food);
echo "<br>";


// Taking the object $food and converting it into an array called $foodArray
$foodArray = (array)$food;
echo "After conversion :";
var_dump($foodArray);


// unpacking the new array
foreach($foodArray as $item){
    echo 'This item is called ' . $item . PHP_EOL ;
};
        
        ?>