<?php

//1. 定義 Animal 類別
//2. 屬性 position 可被繼承
//3. 初始化時可以設定物種名稱及初始化位置
//4. 可以取得物種名稱
//5. 可以從外部得到食物

class Animal
{
    private $animalType = "default animal Type";//若沒有呼叫父類別的建構子, 會印出這個
    protected $position;
    protected $foodName;

    public function __construct($animalTypeFromOut) {
        $this->animalType = $animalTypeFromOut;
        $this->position = [ "x" => 0, "y" => 0 ];
    }

    public function getAnimalType() {
        return $this->animalType;
    }

    public function getFood($foodName) {
        $this->foodName = $foodName;
        echo "得到食物: $foodName<br>";
        //判斷要不要吃
        $this->eat();
    }

    protected function eat() {
        echo "吃".$this->foodName."<br>";

        $this->digest();
    }

    private function digest() {
        echo "消化".$this->foodName."<br>";
    }
}

//$animal = new Animal("test");