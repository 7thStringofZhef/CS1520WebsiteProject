<?php
    session_start();
    $_SESSION=array(); //Clear elements, since session_destroy doesn't do that
    session_destroy();
    header('Location: ../index.php');
    exit;
?>