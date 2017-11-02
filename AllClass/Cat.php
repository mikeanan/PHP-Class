<?php

include_once "Animal.php";

class Cat extends Animal
{
    private $petName;

    public function __construct($petNameFromOut) {
        parent::__construct("貓");//需要呼叫父類別初始化的方法, 否則父類別不會做他的建構子的初始動作
        $this->petName = $petNameFromOut;
//        var_dump($this->position);
    }

    public function getPetName() {
//        $this->getAnimalType();//測試 protected 方法
        return $this->petName;
    }
}

//測試
//$cat = new Cat("Kitty");
//echo $cat->getAnimalType();//繼承後可以直接使用父類別的 public 方法
//
//$cat->getFood("小魚");
//$cat->moveDxDy(1,1);
//$cat->moveDxDy(1,2);