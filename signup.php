<?php 
require_once 'Header.php';

echo <<<_END
	<script>
		function checkUser(user) {
			
			if(user.value == ''){
				O('info').innerHTML = ''
				return;
			}
			params = "user= "+ user.value
			
			request = new ajaxRequest()
			request.open("POST" , "checkuser.php", true)
			request.setRequestHeader("Content-type",
				"application/x-www-form-urlencoded")
			request.setRequestHeader("Content-length", params.length)
			request.setRequestHeader("Connection", "close")

			request.onreadystatechange = function()
			{
				if(this.readyState == 4)
					if(this.status == 200)
						if(this.responseText != null)
							O('info').innerHTML = this.responseText
			}
			request.send(params)
		}
		function ajaxRequest(){
			try { var request = new XMLHttpRequest() }
			catch(e1) {
				try { request = new ActiveXObject("Msxml2.XMLHTTP") }
				catch(e2){
					try { request = new ActiveXObject("Microsoft.XMLHTTP") }
					catch(e3){
						request = false
					}
				}
			}
			return request
		}
		</script>
		<div class = 'main' ><h3>Please enter your details to sign up.</h3>
_END;


$error = $user = $password = '';
if (isset($_SESSION['user'])) destroySession();

if(isset($_POST['user'])){
	$user = sanitizeString($_POST['user']);
	//$user = $_POST['user'];
	$password = sanitizeString($_POST['password']);
	//$password = $_POST['password'];

	if ($user == "" || $password == "")
		$error = "NOT all fields were entered!<br><br>";
	else{
		$result = queryMysqli("SELECT * FROM members WHERE user='$user'");
		if ($result->num_rows){
			$error = "That username already exists<br><br>";
		}else{
			queryMysqli("INSERT INTO members VALUES('$user' , '$password')");
			die("<h4>Account created</h4>Please Log in.<br><br>");
		}
	}
}
echo <<<_END

	<form method = 'post' action = 'signup.php'>$error
	<span class = 'fieldname'>Username</span>
	<input type = 'text' maxlength = '25' name = 'user' value = '$user' onBlur = 'checkUser(this)'><span id = 'info'></span><br><br>
	<span class = 'fieldname'>Password</span>
	<input type = 'text' maxlength = '25' name = 'password' value = '$password'><br><br>
_END;

?>
	<span class = 'fieldname'>&nbsp;</span>
	<input type = 'submit' value = 'Sign up' name='test' id = "But1">
	</form></div><br>
</body>
</html>
