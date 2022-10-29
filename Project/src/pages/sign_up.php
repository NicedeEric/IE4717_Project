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
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lawrence Electronics Shops Online - Sign Up Page</title>
    <link rel="stylesheet" href="stylesheet.css">
	<script type="text/javascript" src="">
	</script>
</head>
<style>
    .homeBody {
        margin: 100px auto;
        margin-bottom: 0;
        height: 1000px;
        width: 80%;
        background-color: #f5f5f5;
        z-index: 0;
    }
    .content {
        padding: 50px;
    }
    body {
        min-width:1400px;
    }
    .button1 {
        width: 15%;
        height: 30px;
        border: none;
        color: #fff;
        background-color: #00b0ff;
        font-size: 15px;
        cursor: pointer;
    }
    .button2 {
        width: 15%;
        height: 30px;
        border: 2px solid #00b0ff;
        color: #00b0ff;
        background-color: #DAE9F5;
        font-size: 15px;
        cursor: pointer;
    }
</style>
<body>
<header>
    <?php
        includeWithVariables('./header.php', array('searchedText' => $searchedText));
    ?>
</header>
<div class="homeBody">
<div class="content">
    <h1>Please sign up here<br><br></h1>
    <form action="handle_sign_up.php" method='post'>
        <label for="username">Username:</label><br>
        <input type="text" name="username"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br><br>
        <label for="password2">Password confirmation:</label><br>
        <input type="password" name="password2"><br><br>
        <label for="address">Address:</label><br>
        <input type="text" name="address"><br><br>
        <input class="button1" type="submit" value="Submit"><br><br>
    </form>
    <script type = "text/javascript" src = "../JS/form_validator.js">
    </script>
    <form action="sign_in.php">
        <input class="button2" type="submit" value="Go to Login" />
    </form>
    <br><br>
</div>
</div>
<footer>
    <?php
        include('./footer.php');
    ?>
</footer>
</body>
</html>