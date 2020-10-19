<?php

$pi=3.14;
$stringOne = 'my email is';
$stringTwo = 'mario123@gmail.com';
//echo 'hey, my name is' . $stringTwo;

//echo floor($pi); 
//echo ceil($pi);

//Arrays
$peopleOne = ['shaun', 'cristal', 'ryy'];
$name = 'shaun';
//echo $peopleOne[1];

$peopleTwo = array('ken', 'chun-li');
//echo $peopleTwo[1];

$ages = [20, 30, 40, 50];
//print_r($ages);

$ages[1] = 25;
//print_r($ages)

$ages[] = 60;
//print_r($ages)

array_push($ages, 70);
//print_r($ages);

//echo count($ages);

//echo array_sum($ages);

$peopleThree = array_merge($peopleOne, $peopleTwo);
//print_r($peopleThree);

//associative arrays (key & value pairs)

$ninjasOne = ['shaun' => 'black', 'mario' => 'orange', 'luigi' => 'brown'];
//echo $ninjasOne['mario'];


$blogs = [
    ['title' => 'mario party', 'author' => 'mario', 'content' => 'lorem', 'likes' => 30],
    ['mario kart cheats', 'toad', 'lorem', 'likes' => 25],
    ['zelda hidden chests', 'link', 'lorem', 'likes' => 50]
];

$blogs[] = ['title' => 'castle party', 'author' => 'peach', 'content' => 'lorem', 'likes' => 100];

print_r($blogs);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first php file</title>
</head>

<body>
</body>

</html>