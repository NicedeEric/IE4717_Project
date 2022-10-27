<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawrence Electronics Shops Online</title>
    <link rel="stylesheet" href="../CSS/color.css">
    <link rel="stylesheet" href="../CSS/base.css">
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
    .sortingBar {
        width: 80%;
        margin-left: 20%;
        height: 50px;
        background-color: #EDEDED;
    }
    .sortingBar span {
        display: inline-block;
        width: 15%;
        height: 30px;
        line-height: 30px;
        margin-top: 10px;
        margin-left: 20px;
        background-color: #fff;
        text-align: center;
        cursor: pointer;
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
            <div style="height: 50px;"></div>
            <div class="sortingBar" id="sortingBar">
                <b style="margin-left: 20px; color: #555;">Sort By</b> <span style="background-color: #00b0ff;color: #fff;">default</span> <span>price: low to high</span>  <span>price: high to low</span> 
            </div>
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
<script src="../JS/priceFilter.js"></script>
<script src="../JS/sortProduct.js"></script>
<script>
    // implement category selection 
    var productDivs = document.getElementsByClassName("singleProduct");
    var selectedProductForm = document.getElementById("selectedProductForm");
    for (let i=0;i<productDivs.length;i++) {
        productDivs[i].onclick = function () {
            selectedProductForm.getElementsByTagName("input")[0].value = productDivs[i].id;
            selectedProductForm.submit();
        }
    }
    var categoryType = "<?php echo $categoryType; ?>";
    if (categoryType != "" ) {
        var selectedLi = document.getElementById(categoryType);
        selectedLi.style.color = "#00b0ff";
    }

    // implement price filter
    var allProducts = document.getElementsByClassName("singleProduct");
    var minPrice = document.getElementById("minPrice");
    var maxPrice = document.getElementById("maxPrice");
    var applyPriceFilterButton = document.getElementById("applyPriceFilterButton");
    applyPriceFilterButton.onclick = function () {
        priceFilter(allProducts, minPrice, maxPrice);
    }



    // implement sorting
    var sortingBar = document.getElementById("sortingBar");
    var sortOptions = sortingBar.getElementsByTagName("span");
    for (let j=0;j<sortOptions.length;j++) {
        sortOptions[j].onclick = function () {
            sortOptions[j].style.color = "#fff";
            sortOptions[j].style.backgroundColor = "#00b0ff";
            sortProduct(sortOptions[j].innerHTML, productDivs);
            for (let k=0;k<sortOptions.length;k++) {
                if (k!=j) {
                    sortOptions[k].style.color = "#000";
                    sortOptions[k].style.backgroundColor = "#fff";
                }
            }
        }
    }
</script>
</html>