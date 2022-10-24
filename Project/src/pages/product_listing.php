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

function includeWithVariables($filePath, $variables = array(), $print = true)
{
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
</style>
<body style="min-width: 1000px">
    <!-- Header -->
    <?php
        includeWithVariables('./header.php', array('userId' => $_SESSION["userId"]));
        // include_once('./header.php');
    ?>
    <div class="homeBody">
        <?php
            include('./sidebar.php')
        ?>
        <div class="productListing">
            <?php
                include('./single_product.php');
                include('./single_product.php');
                include('./single_product.php');
                include('./single_product.php');
                include('./single_product.php');
                include('./single_product.php');
            ?>       
        </div>
    </div>
    <!-- Footer -->
    <?php
        include('./footer.php')
    ?>
</body>
</html>