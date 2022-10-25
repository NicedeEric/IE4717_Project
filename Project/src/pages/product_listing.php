<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .homeBody {
        margin: 100px auto;
        height: 2000px;
        width: 80%;
        background-color: #f5f5f5;
        z-index: 0;
    }
</style>
<body style="min-width: 1400px">
    <!-- Header -->
    <?php
        includeWithVariables('./header.php', array('searchedText' => $searchedText));
    ?>
    <div class="homeBody">
        <?php
            include('./sidebar.php')
        ?>
        <div class="productListing">
            <?php
                $num_products = sizeof($product_arr);
                if ($num_products==0) {
                    echo "Seems like we don't have the product you want, please change the keyword and try again!";
                }
                for ($i=0; $i <$num_products; $i++) {
                    $productRow = $product_arr[$i];
                    includeWithVariables("./single_product.php", array("productRow" => $productRow));
                }
            ?>       
        </div>
    </div>
    <!-- Footer -->
    <?php
        include('./footer.php')
    ?>
</body>
</html>