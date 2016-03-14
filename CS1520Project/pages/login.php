<?php
    session_start();

if($_SERVER['REQUEST_METHOD']=='POST') {
//Get all the username-password combos from the text file
    $list = file_get_contents("../otherAssets/admin.txt");
    $list = explode(PHP_EOL, $list);
    //If fields are missing, say so
    if (empty($_POST['username']) || empty($_POST['password'])) {
        if (isset($_SESSION['admin'])) {
            $_SESSION['admin'] = false;
        }
        $GLOBALS['loginMessage'] = "Missing a field. Please enter a username and password";
    }
    else {
        $wasFound = false;
        //Compare the posted values to those
        foreach ($list as $pair) {
            $temp = explode(":", $pair);
            if (trim($temp[0]) === trim($_POST['username']) && trim($temp[1]) === trim($_POST['password'])) {
                $wasFound = true;
                break;
            }
        }

    //Login if the combination was found
        if ($wasFound) {
            $_SESSION['admin'] = true;
            $GLOBALS['loginMessage'] = "You have been logged in.";
        } //Otherwise send back a message to that effect, and ensure this user does not have admin priveleges
        else {
            $GLOBALS['loginMessage'] = "Wrong username or password entered. Try again.";
            if (isset($_SESSION['admin'])) {
                $_SESSION['admin'] = false;
            }
        }
    }
	
	//Clear the post array each time so that I give the right error message
	unset($_POST['username']);
	unset($_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../otherAssets/foundation-icons/foundation-icons.css" /> <!-- Foundation icons-->
    <link rel="stylesheet" href="../css/app.css" />
    <script src="../js/vendor/modernizr.js"></script>
</head>
<body>
    <div class="row">
        <div class="large-8 columns">
            <h1>Enter username and password for admin login</h1>
        </div>
        <div class="large-4 columns">
            <a href="../index.php" class="button">Home</a>
        </div>
    </div>

    <!--form for login-->
    <div class="row">
        <div class="large-12 columns">
            <div class="panel">
                <form action="login.php" method="post">
                    <div class="row">
                        <div class="large-6 columns">
                            <label>Username
                                <input type="text" name="username" value=""/>
                            </label>
                            <label>Password
                                <input type="password" name="password" value=""/>
                            </label>
                            <input class="success button" type="submit" value="Submit"/>
                        </div>
                    </div>
                </form>
                <h3 style="color:red">
                    <?php
                    if(isset($GLOBALS['loginMessage']))
                        echo $GLOBALS['loginMessage'];
                    ?>
                </h3>
            </div>
        </div>
    </div>


</body>
</html>