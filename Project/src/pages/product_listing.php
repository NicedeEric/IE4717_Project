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
        margin-bottom: 0;
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
            <form action="product_detail.php" method="GET" id="selectedProductForm">
                <input type="hidden" name="selectedProductId" id="selectedProductId" value="">
            </form>   
        </div>
    </div>
    <!-- Footer -->
    <?php
        include('./footer.php')
    ?>
</body>
<script>
    var productDivs = document.getElementsByClassName("singleProduct");
    var selectedProductForm = document.getElementById("selectedProductForm");
    for (let i=0;i<productDivs.length;i++) {
        productDivs[i].onclick = function () {
            selectedProductForm.getElementsByTagName("input")[0].value = productDivs[i].id;
            selectedProductForm.submit();
        }
    }
    var allProducts = document.getElementsByClassName("singleProduct");
    
    var categoryType = "<?php echo $categoryType; ?>";
    if (categoryType != "" ) {
        var selectedLi = document.getElementById(categoryType);
        selectedLi.style.color = "#00b0ff";
    }
    var minPrice = document.getElementById("minPrice");
    var maxPrice = document.getElementById("maxPrice");
    var applyPriceFilterButton = document.getElementById("applyPriceFilterButton");
    console.log(applyPriceFilterButton);
    applyPriceFilterButton.onclick = function () {
        console.log(parseInt(minPrice.value));
        for (let i=0;i<allProducts.length;i++) {
            productElement = allProducts[i];
            price = productElement.getElementsByClassName("price")[0].innerHTML.slice(1);
            if (price<parseInt(minPrice.value) || price>parseInt(maxPrice.value)) {
                productElement.style.display = "none";
            }
            else {
                productElement.style.display = "inline-block";
            }
        }
    }
</script>
</html>