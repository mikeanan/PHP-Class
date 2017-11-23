<html>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
</head>
<body>

<?php
include_once __DIR__."/vendor/autoload.php";
include_once __DIR__."/database/read.php";

use Illuminate\Database\Capsule\Manager as Capsule;

?>

<div class="ui container">
    <h3>訂單列表</h3>

    <?php
    $max = Capsule::table("orders")->count();

    for($i=1; $i<$max+1; $i++) {
//    ?>

        <div class="ui segment">

            <h4>顧客名稱: <?php echo Capsule::table("orders")->find($i)->customer_name; ?></h4>
            <table class="ui celled table">
                <thead>
                <tr>
                    <th>編號</th>
                    <th>書名</th>
                    <th>數量</th>
                    <th>單價</th>
                    <th>小計</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $items = json_decode(Capsule::table("orders")->find($i)->book_ids_prices);
//                var_dump($items);
                $total_price = 0;
                foreach($items as $key => $value) {
//                    var_dump($value);
//                    echo $value->id;
//                    echo $value->number;
                    ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo Capsule::table("books")->find($value->id)->name; ?></td>
                        <td><?php echo $value->number; ?></td>
                        <td><?php echo Capsule::table("books")->find($value->id)->list_price; ?></td>
                        <td><?php
                            $step_price = Capsule::table("books")->find($value->id)->list_price * $value->number;
                            $total_price += $step_price;
                            echo $step_price;
                            ?></td>
                    </tr>
                    <?php
                }
                ?>

                </tbody>
                <tfoot>
                <tr>
                    <th colspan="3">
                    <th>總金額</th>
                    <th><?php echo $total_price; ?></th>
                </tr>
                </tfoot>
            </table>

        </div>

        <?php
    }
    ?>

</div>


</body>
</html>