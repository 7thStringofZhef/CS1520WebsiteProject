<?php
    session_start();
    //If the user reaches this page without having logged in, deny access

    if(empty($_SESSION['admin']))
    {
        session_destroy();
        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Message view page</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <link rel="stylesheet" href="../otherAssets/foundation-icons/foundation-icons.css" /> <!-- Foundation icons-->
    <link rel="stylesheet" href="../css/app.css" />
    <script src="../js/vendor/modernizr.js"></script>
</head>
<body>
<div class="row">
    <div class="large-8 columns">
        <h1>Message Viewer</h1>
    </div>
    <div class="large-4 columns">
        <a href="../index.php" class="button">Home</a>
    </div>
</div>

<!--Panel stores all messages not read-->
<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <h2>Unread messages</h2>
            <?php
                include '../scripts/getUnreadMessages.php';
            ?>
        </div>
    </div>
</div>

<!--Panel stores all messages that are read-->
<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <h2>Read messages</h2>
            <?php
                include '../scripts/getReadMessages.php';
            ?>
        </div>
    </div>
</div>

<!--Short form to mark all read-->
<div class="row">
	<div class="large-12 columns">
		<div class="panel">
			<form action="../scripts/setMessagesRead.php" method="post">
				<input class="success button" type="submit" value="Mark All Read"/>
			</form>
		</div>
	</div>
</div>




<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>