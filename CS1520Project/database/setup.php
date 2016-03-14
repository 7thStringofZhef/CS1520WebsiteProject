<?php
    //Set up my database
    $db = new mysqli('localhost', 'root', '', 'message_schema');
    if ($db->connect_error) {
        die ("Could not connect to db: " . $db->connect_error);
    }

    $db-query("drop table messages");
    $query = "create table messages (
              messageId  INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
              email VARCHAR(60) NOT NULL,
              messageContent VARCHAR(1024) NOT NULL,
              was_read BOOLEAN NOT NULL DEFAULT false,
              )";


?>