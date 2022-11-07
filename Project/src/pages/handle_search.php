<?php
include "../dbconnect.php";
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
    $searchedText = $_GET["searchText"];
    // echo $searchedText;
    $query = "select * from Products where name like '%".$searchedText."%';";
    $result = $db->query($query);
    $num_results = $result->num_rows;
    $product_arr = array();
    for ($i=0;$i<$num_results;$i++) {
        $row = $result->fetch_assoc();
        array_push($product_arr,$row);
    }
    $_SESSION['product_arr'] = $product_arr;
    $_SESSION['searchedText'] = $searchedText;
    include('./product_listing.php');
?> 