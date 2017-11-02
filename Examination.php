<?php
//還是需要 include 才能使用 use
include_once "MikePHPOOP/AllClass/Cat.php";
include_once "MikePHPOOP/AllClass/Dog.php";

use MikePHPOOP\AllClass\Cat;
use MikePHPOOP\AllClass\Cat as CatA;//可以取別名, 以避開其他同名的類別
use MikePHPOOP\AllClass\Dog;
use const MikePHPOOP\AllClass\TEST;//也可以用在變數, 通常是常數
use const MikePHPOOP\AllClass\TEST as const_TEST;//也可以用別名
use function MikePHPOOP\AllClass\test;//也可以用在函式
use function MikePHPOOP\AllClass\test as func_test;//也可以用別名

echo Cat::$staticProperty;//還未初始化即可使用
echo "<br>";
Cat::staticFunction("類別");
echo "<br>";
echo Cat::$staticProperty;//在靜態方法中被設定
echo "<br>";

$cat = new Cat("Kitty");
echo $cat->getPetName();
echo "<br>";
echo Cat::$staticProperty;//new 之後, 仍可以使用
echo "<br>";
Cat::staticFunction("類別");
echo "<br>";

$dog = new Dog("WangWang");
echo $dog->getPetName();
echo "<br>";

$cat2 = new Cat("BanBan");
echo $cat2::$staticProperty;
$cat2::staticFunction("cat2");
echo "<br>";
echo $cat::$staticProperty;//另一個物件的角度, 但仍使用同一個靜態屬性
echo "<br>";

$catA = new CatA("Hello");//使用別名來產生物件
echo $catA->getPetName();
echo "<br>";

$catNamespace = new MikePHPOOP\AllClass\Cat("喵喵");//直接到 namespace 使用
echo $catNamespace->getPetName();
echo "<br>";

echo MikePHPOOP\AllClass\TEST;
echo TEST;
echo const_TEST;
MikePHPOOP\AllClass\test();
echo "<br>";
test();
echo "<br>";
func_test();
echo "<br>";

