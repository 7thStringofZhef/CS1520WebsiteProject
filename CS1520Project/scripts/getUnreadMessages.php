<?php
//This file echos out all messages in the database that were not marked as read yet
    $db = new mysqli("localhost", "root", "", "message_schema");
    if ($db->connect_error){
        die ("Could not connect to db " . $db->connect_error);
    }
    $query = "SELECT email, messageContent FROM messages WHERE was_read=FALSE";
    $result = $db->query($query) or die ("Invalid request " . $db->error);
    if($result->num_rows > 0)
    {
        //Echo data in html format
        while($row = $result->fetch_assoc())
        {
            $email = $row['email'];
            $messageText = $row['messageContent'];
			echo '<div class="radius callout panel">';
            echo "<p><strong>From $email</strong></p>";
            echo "<p>Message: $messageText</p>";
			echo '</div>';
        }
    }
	$db->close();
?>