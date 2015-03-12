<?php 

require_once 'Header.php';

if (!isset($_POST['user'])) 
	echo "<div class = 'main'> <h3>Please enter your details to log in.</h3>";
$error = $user = $password = '' ;

if(isset($_POST['user'])){
	//$user = sanitizeString($_POST['user']);
	$user = $_POST['user'];
	//$password = sanitizeString($_POST['password']);
	$password = $_POST['password'];

	if($user == "" || $password == "")
		$error = "Not all fields were entered!<br>";
	else
	{
		$result = queryMysqli("SELECT user, password FROM members 
			WHERE user = '$user' AND password = '$password'");

		if($result->num_rows == 0){
			$error = "<span class = 'error'>Username or Password invalid</span><br><br>";

		} else {
			$_SESSION['user'] = $user;
			$_SESSIOM['password'] = $password;
			die("You are now logged in. Please <a href ='members.php?view=$user'>" .
				"Click here</a> to continue.<br><br>");
			
		}
	}
}

echo <<<_END
	<form method = 'post' action = 'login.php' >$error
	<span class = 'fieldname'>Username</span><input type='text'
	maxlength = '25' name = 'user' value = '$user'><br><br>
	<span class ='fieldname'>Password</span><input type = 'password'
	maxlength = '25' name = 'password' value = '$password'><br>
_END;

?>
	<br>
	<span class = 'fieldname'>&nbsp;</span>
	<input type = 'submit' value = 'login' id='But1'>
	
    </form><br><br>
  </body>
</html>
			