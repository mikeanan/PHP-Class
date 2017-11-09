<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello</title>
</head>
<body>
<h1>Hello Composer World~</h1>
</body>
</html>


<?php
include_once __DIR__."/vendor/autoload.php";

use Carbon\Carbon;

printf("現在時間是: %s", Carbon::now()->toDateTimeString());
?>

