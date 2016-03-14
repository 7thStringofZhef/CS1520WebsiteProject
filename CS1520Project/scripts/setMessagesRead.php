<?php
    $db = new mysqli("localhost", "root", "", "message_schema");
    if ($db->connect_error){
        die ("Could not connect to db " . $db->connect_error);
    }

    //Update the database to mark all unread messages as read
    $query = "UPDATE messages SET was_read=TRUE WHERE was_read=FALSE";
    $db->query($query);
    $db->close();
	header('Location: ../pages/messageView.php');
?>