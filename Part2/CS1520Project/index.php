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
    <link rel="stylesheet" href="css/app.css" />
	<link rel="stylesheet" href="css/iconStyles.css" />
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<!--NOTE: Currently, logins work using the "admin.txt" file. Username is 7thStringofZhef, password is AFinePassword-->
<div class="introBackground row">
    <h2 class="overBack">David Slayback's Homepage</h2>
</div>

<div class="row mainContent">
    <!--Main Content-->
    <div class="large-8 columns">
        <div id="personDiv" class="row" data-equalizer>
            <div class="large-6 columns panel" data-equalizer-watch>
                <h2>Profile</h2>
                <p><strong>Name: </strong>David Slayback</p>
                <p><strong>Age: </strong>23</p>
                <p><strong>Location: </strong>Maryland, U.S.</p>
                <p><strong>Education:</strong> B.S. in Computer Science from University of Pittsburgh</p>
				<p><strong>Occupation:</strong> ARL researcher</p>
            </div>
            <div class="large-6 columns panel" data-equalizer-watch>
                <H2>About Me</H2>
                <p>Hi! I'm David Slayback, a soon-to-be graduating senior from the University of Pittsburgh's Computer Science department.</p>
                <p>My professional interests include machine learning, brain computer interface applications, and general EEG processing.</p>
                <p>In my spare time, I'm learning how to work with graphics engines so that I can develop simulations and games.</p>
            </div>
        </div>
		
		<div id="langSkills" class="row" data-equalizer>
			<h2>Skills</h2>
			<div class="large-6 columns panel" data-equalizer-watch>
				<h3>Languages</h3>
				<h6>(in order of familiarity)</h6>
				<p>C/C++</p>
				<p>Java</p>
				<p>MATLAB</p>
				<p>PHP</p>
				<p>HTML</p>
				<p>JavaScript</p>
				<p>Python</p>
				<p>CSS(no SASS)</p>
			</div>
			<div class="large-6 columns callout panel radius" data-equalizer-watch>
				<h3>Libs, Frameworks, Software</h3>
				<p>OpenGL</p>
				<p>Psychtoolbox</p>
				<p>SDL 2.0</p>
				<p>Unreal Engine 4</p>
				<p>Spring Boot</p>
				<p>Python NLTK</p>
				<p>Blender</p>
				<p>GIMP</p>
			</div>
		</div>
		
        <div id="siteDiv" class="row">
            <div class="large-12 columns callout panel radius">
                <H2>About This Site</H2>
                <p>This site is still under construction, but feel free to take a look around. If you would like to contact me or reach any of my social media or code accounts, you can find links at the bottom of this page.</p>
                <p>In case you're interested in hiring a programmer, you can also find my resume among those links.</p>
                <p>Be sure to check back often! I have a lot of graphical content planned for this site as I learn to work with WebGL. I will also update the site with any coding projects I do.</p>
            </div>
        </div>
		
		<div id="gitId" class="row">
			<div id="gitPanel" class="large-12 columns panel">
				<h2>Recent Coding Updates</h2>
			</div>
			<button class="button expand" onclick="updateGithubEvents()">Click to get latest github updates above!</button>
		</div>
		
		<!--Video Section-->
		<div id="videoDiv" class="row callout panel radius">
			<div class="large-12 columns">
				<h2>Latest Tutorial Watched</h2>
				<div class="flex-video">
					<iframe width="420" height="315" src="https://www.youtube.com/embed/8JmoI4q7fTg" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		
    </div>

    <!--Navigation sidebar-->
    <div class="large-4 columns">
        <article class="panel sticky">
            <ul class="stack button-group">
				<li><a href="#" class="button">Top</a></li>
                <li><a href="#personDiv" class="button">Personal Info</a></li>
				<li><a href="#langSkills" class="button">Skills</a></li>
				<li><a href="#siteDiv" class="button">About Site</a></li>
				<li><a href="#gitPanel" class="button">Coding Updates</a></li>
				<li><a href="#videoDiv" class="button">Tutorial</a></li>
                <li><a href="#message" class="button">Contact and Links</a></li>
				<?php
					if(!empty($_SESSION['admin']))
						echo '<li><a href="scripts/logout.php" class="button">Logout</a></li>';
					else
						echo '<li><a href="pages/login.php" class="button">Login</a></li>';
                ?>
                <?php
                if(!empty($_SESSION['admin']))
                    echo '<li><a href="pages/messageView.php" class="button" style="background-color:#ff3300">View Messages</a></li>';
                ?>
            </ul>
        </article>
    </div>
</div>

<!--Footer with social links, contact form, resume-->
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
<script src="js/sidebarScript.js"></script>
<script src="js/githubScript.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>