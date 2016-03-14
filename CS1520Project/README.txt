Functionality:

-Homepage (navigation, introduction, video, and contact+links sections).
-Login Screen (for admin funtions. Only valid user-pass combo is 7thStringofZhef AFinePassword)
-Message Viewer (only accessible by admin).

-Contacting does not work unless a database is up that can be accessed by a mysqli object this way: mysqli('localhost', 'root', '', 'message_schema');
-Table structure expected is laid out in 'setup.php', but that file is not used. Instead, I manually configure my database on phpmyadmin.