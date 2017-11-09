<?php
include_once __DIR__."/../vendor/autoload.php";//需要用 .. 回到上一層才能找到 vendor/autoload.php

use Illuminate\Database\Capsule\Manager as Capsule;//使用安裝好的 database 套件

$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'phpMySQL',
    'username'  => 'homestead',
    'password'  => 'secret',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$students = Capsule::table('students')->get();

var_dump($students);

$students = Capsule::select("SELECT * FROM students");//直接使用 sql 語法, 得到跟上面一樣的結果

var_dump($students);

//不要用以下的方式,以免使用者輸入的 sql 語法造成 安全性的問題
//$userInput = $_GET["sql"];
//$results = Capsule::select($userInput);
