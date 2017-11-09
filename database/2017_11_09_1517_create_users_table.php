<?php
include_once __DIR__."/../vendor/autoload.php";//需要用 .. 回到上一層才能找到 vendor/autoload.php
include_once "read.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('phone');
    $table->string('address');
    $table->string('email');
    $table->timestamps();
});