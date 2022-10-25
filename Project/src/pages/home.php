<?php
include "dbconnect.php";
session_start();
$_SESSION['userId'] = "none";
if (isset($_POST['userId']) && isset($_POST['password'])) {
  // if the user has just tried to log in
    $userId = $_POST['userId'];
    $password = $_POST['password'];
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
    $_SESSION['userId'] = $userid;
}

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
</style>
<body>
    <!-- Header -->
    <?php
        includeWithVariables('./header.php', array('userId' => $_SESSION["userId"]));
        // include_once('./header.php');
    ?>
    <div class="homeBody">
        <div style="height: 50px">
        </div>
        <div class="categoryList">
            <div class="categoryTitle">
                <span style="display: inline-block; height: 50px;border-bottom: 3px solid #00b0ff;"><strong>CATEGORIES</strong></span>
            </div>
            <div class="categoryType">
                <ul style="width: 100%; margin: 0 auto;">
                    <li>
                        <img src="../img/mobilePhone.png" alt="mobilePhone">
                        <p>Mobile Phone</p>
                    </li><li>
                        <img src="../img/laptop.png" alt="mobilePhone">
                        <p>Laptop</p>
                    </li><li>
                        <img src="../img/tablet.png" alt="mobilePhone">
                        <p>Tablet</p>
                    </li><li>
                        <img src="../img/earphone.png" alt="mobilePhone">
                        <p>Earphone</p>
                    </li><li>
                        <img src="../img/monitor.png" alt="mobilePhone">
                        <p>Monitor</p>
                    </li><li>
                        <img src="../img/console.png" alt="mobilePhone">
                        <p>Game Console</p>
                    </li><li>
                        <img src="../img/camera.png" alt="mobilePhone">
                        <p>Camera</p>
                    </li>
                </ul>
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
                    includeWithVariables("./single_product.php", array("productRow" => $row));
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