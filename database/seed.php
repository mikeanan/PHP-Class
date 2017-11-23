<html>
<body>


<?php
include_once __DIR__."/../vendor/autoload.php";
include_once "read.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Carbon\Carbon;

$faker = Faker\Factory::create();

//echo "<h3>$faker->name</h3>";
//echo "<h4>$faker->address</h4>";
//echo $faker->text."<br>";

for($i=0; $i<5; $i++){
    Capsule::table('users')->insert(
        [
            'name' => $faker->name,
            'phone' => $faker->phoneNumber,
            "address" => $faker->address,
            "email" => $faker->email,
            "created_at" => $faker->dateTime($max = 'now'),//時間要自己在這產生
            "updated_at" => $faker->dateTime($max = 'now')
        ]
    );
}

//$faker = new Faker\Generator();
$faker->addProvider(new Faker\Provider\en_US\Company($faker));//使用 faker 的 company 相關資料

for($i=0; $i<5; $i++){
    Capsule::table('providers')->insert(
        [
            'name' => $faker->company,
            'company_id' => $faker->numberBetween(1,999999),
            'phone' => $faker->phoneNumber,
            "address" => $faker->address,
            "created_at" => $faker->dateTime($max = 'now'),
            "updated_at" => $faker->dateTime($max = 'now')
        ]
    );
}


for($i=0; $i<5; $i++){
    Capsule::table('books')->insert(
        [
            'ISBN' => $faker->isbn13,
            'name' => $faker->name,
            'author' => $faker->name,
            'publisher' => $faker->name,
            "list_price" => $faker->randomNumber(3),//3位數之內
            "created_at" => $faker->dateTime($max = 'now'),
            "updated_at" => $faker->dateTime($max = 'now')
        ]
    );
}

for($i=0; $i<5; $i++){//產生5個訂單
    //每個訂單的品項資料會由網頁傳過來, 目前先自己用程式產生
    $max = Capsule::table("books")->count();//先找出目前有多少書的記錄
    $records = $faker->numberBetween(1,5);//每個訂單假設不超過5個品項
    $book_ids_prices = [];//先宣告要轉成 json 的陣列
    $total_price = 0;
    for($n=0; $n<$records; $n++)
    {
        //實際上會由網頁傳過來
        $book_id = $faker->numberBetween(1,$max);//隨機產生不超過書的記錄的id
        $number = $faker->numberBetween(1,3);//每個品項買幾本?
        $item = ["id"=>$book_id, "number"=>$number];//每個品項的內容: 書的 id, 買幾本
        var_dump($item);
//        array_splice($book_ids_prices,$n*2,0,$item);
        $book_ids_prices = array_add($book_ids_prices, $n, $item);
        var_dump($book_ids_prices);
        echo "<br>";
        $total_price += Capsule::table("books")->find($book_id)->list_price * $number;
    }

    Capsule::table('orders')->insert(
        [
            'customer_name' => $faker->name,
            'book_ids_prices' => json_encode($book_ids_prices, JSON_UNESCAPED_UNICODE),
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'total_price' => $total_price,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]
    );
}

?>


</body>
</html>