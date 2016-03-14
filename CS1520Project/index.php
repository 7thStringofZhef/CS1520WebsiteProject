<?php
session_start();
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>David's Homepage</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="otherAssets/foundation-icons/foundation-icons.css" /> <!-- Foundation icons-->
    <link rel="stylesheet" href="css/iconStyles.css" />
    <link rel="stylesheet" href="css/app.css" />
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<!--Header with links
    If not logged in, there is a login button. Otherwise it is logout.
    If logged in, there is also an additional button to get to a page to read messages-->
<div class="row">
    <div class="large-4 columns">
        <ul class="button-group">
            <li><a href="#" class="button">Home</a></li>
            <?php
                if(!empty($_SESSION['admin']))
                    echo '<li><a href="scripts/logout.php" class="button">Logout</a></li>';
                else
                    echo '<li><a href="pages/login.php" class="button">Login</a></li>';
            ?>
        </ul>
    </div>
    <div class="large-4 columns">
        <h4>David Slayback's Homepage</h4>
    </div>
    <div class="large-4 columns">
        <ul class="button-group">
            <li><a href="#footer" class="button">Find My Work</a></li>
            <li><a href="#message" class="button">Contact</a></li>
            <?php
                if(!empty($_SESSION['admin']))
                    echo '<li><a href="pages/messageView.php" class="button" style="background-color:#ff3300">View Messages</a></li>'
            ?>
        </ul>
    </div>
</div>
<div class = "row">
    <p><img src="img/smokey-lace-ribbon-banner.jpg"/></p>
</div>

<!--Introductory Content-->
<div class="row">
    <div class="large-12 columns">
        <div class="large-6 columns">
            <H2>About Me</H2>
            <p>Hi! I'm David Slayback, a soon-to-be graduating senior from the University of Pittsburgh's Computer Science department.</p>
            <p>My professional interests include machine learning, brain computer interface applications, and general EEG processing.</p>
            <p>In my spare time, I'm learning how to work with graphics engines so that I can develop simulations and games.</p>
        </div>
        <div class="large-6 columns">
            <H2>About This Site</H2>
            <p>This site is still under construction, but feel free to take a look around. If you would like to contact me or reach any of my social media or code accounts, you can find links at the bottom of this page.</p>
            <p>In case you're interested in hiring a programmer, you can also find my resume among those links.</p>
            <p>Be sure to check back often! I have a lot of graphical content planned for this site as I learn to work with WebGL. I will also update the site with any coding projects I do.</p>
        </div>
    </div>
</div>

<!--News Feed-->
<div class="row">
    <div class="panel" style="background:#b3ffb3">
        <h2>Recent Coding Updates</h2>
        <p>For this section, I intend to create an asynchronous script that updates with the latest pushes to github, posts to my facebook, and the like.</p>
        <p>From what I've looked into, I anticipate that this will take a bit more work with javascript</p>
    </div>
</div>

<!--Video Section-->
<div class="row">
    <div class="large-12 columns">
        <h2>Latest Tutorial Watched</h2>
        <div class="flex-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/NZZtMNdJk5o" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>

<footer class="footer" id="footer">
    <div class="row">
        <div class="large-6 columns">
            <ul class="contact">
                <li><p><i class="fi-torso style6"></i>My links</p></li>
                <li><p><i class="fi-telephone style6"></i>(410)920-2810</p></li>
                <li><p><i class="fi-mail style6"></i>dts24@pitt.edu</p></li>
            </ul>
            <div class="icon-bar four-up">
                <a class="item" href="http://www.facebook.com/david.slayback1"><i class="fi-social-facebook style6"></i></a>
                <a class="item" href="http://www.linkedin.com/in/david-slayback-381717aa"><i class="fi-social-linkedin style6"></i></a>
                <a class="item" href="http://github.com/7thStringofZhef"><i class="fi-social-github style6"></i></a>
                <a class="item" href="otherAssets/David%20Slayback%20Resume_2_13_2015.doc" download><i class="fi-page-doc style6"></i>Resume</a>
            </div>
        </div>

        <!--Contact form-->
        <div class="large-6 columns">
            <form class="footer-form" action="scripts/contact.php" method="post">
                <div class="row">
                    <div class="large-9 large-push-3 columns">
                        <label>
                            <label for="email" class="contact">Contact Me!</label>
                            <input type="email" id="email" name="email" placeholder="Email Address" />
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="large-9 large-push-3 columns">
                        <label>
                            <textarea rows="5" id="message" name="message" placeholder="Message"></textarea>
                        </label>
                    </div>
                    <div class="row">
                        <div class="large-9 large-push-3 columns">
                            <button class="submit" type="submit" value="Submit">Send</button>
                        </div>
                    </div>
					<div class="large-9 large-push-7 columns">
						<?php
							//If the contact was sent correctly, print that out. Otherwise, tell the user
							if(isset($_SESSION['contactMessageSent']) && $_SESSION['contactMessageSent'])
							{
								echo '<p style="color:green">Sent!</p>';
							}
							elseif(isset($_SESSION['contactMessageSent']) && !$_SESSION['contactMessageSent'])
							{
								echo '<p style="color:red">Error with message</p>';
							}
						?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</footer>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>