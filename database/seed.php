<html>
<body>


<?php
include_once __DIR__."/../vendor/autoload.php";
include_once "read.php";

$faker = Faker\Factory::create();

echo "<h3>$faker->name</h3>";
echo "<h4>$faker->address</h4>";
echo $faker->text."<br>";

?>


</body>
</html>