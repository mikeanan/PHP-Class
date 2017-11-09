<?php
include_once __DIR__."/../vendor/autoload.php";//需要用 .. 回到上一層才能找到 vendor/autoload.php
include_once "read.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('orders', function ($table) {
    $table->increments('id');
    $table->string('customer_name');
    $table->json('book_ids_prices');
    $table->string('address');
    $table->string('phone');
    $table->integer('total_price');
    $table->timestamps();
});