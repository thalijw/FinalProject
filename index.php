<?php 

ini_set('display_errors' , 'on');

require_once 'Header.php';

$userStr = ' (Guest)';

echo "<br><span class = 'main'> Welcome to my Final Project (OSU Friends)<br>
			<span class = 'main'><i>By Wisam Thalij.</span></i><br><br>";

if ($loggedin)
	echo "<span class = 'main'>Welcome $user, you are logged in.</span>";
else 
	echo "<span class = 'main'>Please Sign up and/or Log in to join in.</span>";

echo "<div class ='main'><h3>About This Project</h3>
		This project built based on information from the book<br>
		PHP, MYSQL and JavaScript by the Author <b><i>Robin Nixon</i></b>.<br><br>
		This project is a simple Friends network website where you can sign in as a new user<br>
		, log in to your profile page, add friends who are memebrs of the website, <br>
		Send messages to other members and finally log out from your profile.</div>"


?>
		</span><br><br>
	</body>
</html>