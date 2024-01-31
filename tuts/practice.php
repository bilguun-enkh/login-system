<?php

// const
//  define('NAME', 'Yoshi');

//  echo 'Hello World!';
 
//  // let
 $name = 'Mario';

//  echo "Hey my name is $name";

//  STRINGS
//  echo "What does \"this\" mean?";
//  echo 'What does "this" mean?';

//  echo $name[2]

//  echo strlen($name);
//  echo strtoupper($name);
//  echo strtolower($name);
//  echo str_replace('M', 'W', $name);

// NUMBERS

//  $radius = 25;
//  $pi = 3.14;
// basics - *, /, +, -, **

//  echo $pi * $radius**2

// for ($i = 0; $i < 5; $i++) {
//     echo 'loop ';
//    }
//  $arrays = ['One', 'Two', 'Three'];

//  foreach ($arrays as $array ){
//     echo '<br />' . $array ;
//  }

 $products = [
    ['name' => 'shiny star' , 'price' => 20],
    ['name' => 'green shell' , 'price' => 10],
    ['name' => 'red shell' , 'price' => 15],
    ['name' => 'gold coin' , 'price' => 50],
    ['name' => 'lightning bolt' , 'price' => 40],
    ['name' => 'banana skin' , 'price' => 2],
 ];

 foreach ($products as $product) {
    echo '<br />';
    echo $product['name'] . ' - ' . $product['price'];
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Home page</h1>
    <div>
        <h2>Enter Username:</h2>
    </div>
    <div>
        <h2>Enter Password:</h2>
    </div>

    <div>
        <h1>Products</h1>
        <ul>
            <?php foreach( $products as $product){ ?>
                <h2> <?php echo $product['name']; ?> $<?php echo $product['price']; ?> </h2>
            <?php } ?>
        </ul>
    </div>
</body>
</html>

