<?php
//使用類別

include_once "AllClass/Cat.php";
include_once "AllClass/Dog.php";

$cat = new Cat("Kitty");
echo $cat->getPetName();
echo "<br>";

$dog = new Dog("WangWang");
echo $dog->getPetName();