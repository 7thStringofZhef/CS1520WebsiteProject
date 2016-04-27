<?php
//This file takes the input from the contact form and puts it in the database.
    session_start();
    $_SESSION['contactMessageSent'] = false;
    //Pull the variables from POST
    $contactEmail = $_POST['email'];
    $contactText = $_POST['message'];

    //Load db
    $db = new mysqli("localhost", "root", "", "message_schema");
    if ($db->connect_error){
        die ("Could not connect to db " . $db->connect_error);
    }

    //Make the query
    $query = "insert into messages (email, messageContent) values ('$contactEmail', '$contactText')";
    $db->query($query) or die ("Invalid insert " . $db->error);

    //Send back a success message with a global
    $_SESSION['contactMessageSent'] = true;
	header('Location: ../index.php#message');
?>