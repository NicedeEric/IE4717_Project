<?php
include ("../dbconnect.php");
session_start();
$_SESSION["searchedText"] = "";
// $_SESSION['userId'] = "none";
// if (isset($_POST['userId']) && isset($_POST['password'])) {
  // if the user has just tried to log in
    // $userId = $_POST['userId'];
    // $password = $_POST['password'];
    // $password = md5($password);
    // $query = 'select * from users '
    //     ."where username='$userid' "
    //     ." and password='$password'";
    // $result = $dbcnx->query($query);
    // if ($result->num_rows >0 ) {
    //     // if they are in the database register the user id
    //     $_SESSION['userId'] = $userid;    
    // }
    // $dbcnx->close();
//     $_SESSION['userId'] = $userid;
// }

function includeWithVariables($filePath, $variables = array(), $print = true) {
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $filePath;

        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;
}
?>

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
        height: 2500px;
        width: 80%;
        background-color: #f5f5f5;
        z-index: 0;
    }
    body {
        min-width:1400px;
    }
    .categoryList {
        height: 250px;
        background-color: #fff;
    }
    .categoryTitle {
        padding-left: 10px;
        height: 50px;
        line-height: 50px;
        color: #757575;
    }
    .categoryType {
        height: 200px;
    }
    .categoryType ul {
        height: 200px;
    }
    .categoryType ul li {
        display: inline-block;
        list-style: none;
        width: 14.1%;
        height: 100%;
        border: 1px solid #f5f5f5;
        border-collapse: collapse;
        text-align: center;
        cursor: pointer;
    }
    .categoryType ul li:hover {
        box-shadow: 2px 2px 2px #aaa;
    }
    .categoryType ul li img {
        margin-top: 25%;
        height: 40%;
        width: 50%;
    }
    .listingTitle {
        padding-left: 10px;
        height: 50px; 
        line-height: 50px;
        color: #757575;
        background-color: #fff;
        box-shadow: 0px 5px 5px #e8e8e8;
    }
	
	
    * {box-sizing:border-box}

	/* Slideshow container */
	.slideshow-container {
	  width: 100%;
	  height: 650px;
	  position: relative;
	  margin: auto;
	  background-color: #fff;
	}

	.slideshow-container img {
		height: 650px;
		width: 100%;
		cursor: pointer;
	}
	.mySlides {
	  display: none;
	}
	.prev, .next {
		position: absolute;
		top: 50%;
		margin-top: -21px;
		padding: 15px;
		color: #fff;
		font-weight: 700;
		font-size: 24px;
		transition: 0.5s ease;
		border-radius: 0 5px 5px 0;
		user-select: none;
		cursor: pointer;
	}
	.next {
	  right: 0;
	  border-radius: 3px 0 0 3px;
	}
	.prev:hover, .next:hover {
		background-color: #777;
		opacity: 0.8;
	}
	.dot_option {
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #f5f5f5;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.5s ease;
		cursor: pointer;
	}

	.active, .dot_option:hover {
		background-color: #777;
	}
	.fade {
	  animation-name: fade;
	  animation-duration: 1.5s;
	}

	@keyframes fade {
	  from {opacity: 0.5}
	  to {opacity: 1}
	}
</style>
<body>
    <!-- Header -->
    <?php
        // includeWithVariables('./header.php', array('userId' => $_SESSION["userId"]));
        include_once('./header.php');
    ?>
    <div class="homeBody">
		<div style="height: 50px">
        </div>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img id="focus1" src="../img/focus1.jpg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img id="focus2" src="../img/focus2.jpeg" style="width:100%">
            </div>
            <div class="mySlides fade">
                <img id="focus3" src="../img/focus3.png" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div style="text-align:center;position: relative; top: -20px;">
            <span class="dot_option" onclick="currentSlide(1)"></span>
            <span class="dot_option" onclick="currentSlide(2)"></span>
            <span class="dot_option" onclick="currentSlide(3)"></span>
        </div>
        <div style="height: 50px">
        </div>
        <div class="categoryList">
            <div class="categoryTitle">
                <span style="display: inline-block; height: 50px;border-bottom: 3px solid #00b0ff;"><strong>CATEGORIES</strong></span>
            </div>
            <div class="categoryType">
                <ul style="width: 100%; margin: 0 auto;">
                    <li id="Mobile Phone">
                        <img src="../img/mobilePhone.png" alt="mobilePhone">
                        <p>Mobile Phone</p>
                    </li><li id="Laptop">
                        <img src="../img/laptop.png" alt="mobilePhone">
                        <p>Laptop</p>
                    </li><li id="Tablet">
                        <img src="../img/tablet.png" alt="mobilePhone">
                        <p>Tablet</p>
                    </li><li id="Earphone">
                        <img src="../img/earphone.png" alt="mobilePhone">
                        <p>Earphone</p>
                    </li><li id="Monitor">
                        <img src="../img/monitor.png" alt="mobilePhone">
                        <p>Monitor</p>
                    </li><li id="Game Console">
                        <img src="../img/console.png" alt="mobilePhone">
                        <p>Game Console</p>
                    </li><li id="Camera">
                        <img src="../img/camera.png" alt="mobilePhone">
                        <p>Camera</p>
                    </li>
                </ul>
                <form action="handle_categorize.php" method="GET" id="categorizeForm">
                    <input type="hidden" name="categoryType" id="categoryType">
                </form>
            </div>
        </div>
        <div style="height: 50px">
        </div>
        <div class="listingTitle">
            <span style="display: inline-block; height: 50px;border-bottom: 3px solid #00b0ff;"><strong>Discover Your Favorite</strong></span>
        </div>
        <div class="productListing">
            <?php
                include_once('../dbconnect.php');
                $query = "select * from Products;";
                $result = $db->query($query);
                $num_results = $result->num_rows;
                for ($i=0; $i <$num_results; $i++) {
                    $row = $result->fetch_assoc();
                    $_SESSION['productRow'] = $row;
                    include('./single_product.php');
                    // includeWithVariables("./single_product.php", array("productRow" => $row));
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
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
		window.clearTimeout(window.myTimeOut);
		showSlides(slideIndex += n);
    }

    function currentSlide(n) {
		window.clearTimeout(window.myTimeOut);
		showSlides(slideIndex = n);
    }

    function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dot_options = document.getElementsByClassName("dot_option");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dot_options.length; i++) {
        dot_options[i].className = dot_options[i].className.replace(" active", "");
    }
    if (n > slides.length) {n = 1}
    if (n < 1) {n = slides.length}
    slides[n-1].style.display = "block";
    dot_options[n-1].className += " active";  
    window.myTimeOut = setTimeout(()=>{
        showSlides(n+1)
    }, 4000);
    }   
</script>
<script>
    function addFocusLinkedProducts(imgId, productId) {
        let focusImg = document.getElementById(imgId);
        focusImg.onclick = function () {
            window.location = 'product_detail.php?selectedProductId='+ productId;
        }
    }
    addFocusLinkedProducts("focus1", 3);
    addFocusLinkedProducts("focus2", 4);
    addFocusLinkedProducts("focus3", 11);
</script>
<script>
    var productDivs = document.getElementsByClassName("singleProduct");
    var selectedProductForm = document.getElementById("selectedProductForm");
    for (let i=0;i<productDivs.length;i++) {
        productDivs[i].onclick = function () {
            selectedProductForm.getElementsByTagName("input")[0].value = productDivs[i].id;
            selectedProductForm.submit();
        }
    }
    var liElements = document.getElementsByTagName('li');
    var categorizeForm = document.getElementById("categorizeForm");
    var categoryTypeInput = document.getElementById("categoryType");
    for (let i=0;i<liElements.length;i++) {
        let li = liElements[i];
        li.onclick = function () {
            categoryTypeInput.value = li.id;
            categorizeForm.submit();
        }
    }
</script>
</html>