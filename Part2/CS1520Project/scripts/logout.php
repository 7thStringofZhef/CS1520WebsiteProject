<?php
	//Log the user out and destroy his session
    session_start();
    $_SESSION=array(); //Clear elements, since session_destroy doesn't do that
    session_destroy();
    header('Location: ../index.php');
    exit;
?>