<?php
include "dbconnect.php";
session_start();
// $_SESSION['userId'] = "none";
// if (isset($_POST['userId']) && isset($_POST['password'])) {
//   // if the user has just tried to log in
//     $userId = $_POST['userId'];
//     $password = $_POST['password'];
//     // $password = md5($password);
//     // $query = 'select * from users '
//     //     ."where username='$userid' "
//     //     ." and password='$password'";
//     // $result = $dbcnx->query($query);
//     // if ($result->num_rows >0 ) {
//     //     // if they are in the database register the user id
//     //     $_SESSION['userId'] = $userid;    
//     // }
//     // $dbcnx->close();
//     $_SESSION['userId'] = $userid;
// }
?>

<?php
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
    include_once('../dbconnect.php');
    $categoryType = $_GET["categoryType"];
    if ($categoryType=="all") {
        $query = "select * from Products";
    }
    else {
        $query = "select * from Products where category = '".$categoryType."';";
    }
    // echo $searchedText;
    $result = $db->query($query);
    $num_results = $result->num_rows;
    $product_arr = array();
    for ($i=0;$i<$num_results;$i++) {
        $row = $result->fetch_assoc();
        array_push($product_arr,$row);
    }
    includeWithVariables('./product_listing.php', array("product_arr" => $product_arr, "searchedText" => $searchedText, "categoryType" => $categoryType));
?> 