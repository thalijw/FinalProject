<?php 

ini_set('display_errors' , 'on');
include  'config.php';

$mysqli = new mysqli($dbhost, $dbuser, $password , $dbname);
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; 
}

function queryMysqli($query) {
	global $mysqli ;
	$result = $mysqli->query($query);
	if(!$result) {
		die($mysqli->error);
	}
	return $result;
}

function destroySession(){
	$_SESSION = array();
	/*if(session_id() != "" || isset($_COOKIE[session_name()])){
		setcookie(session_name(), '' ,time()-2492000, '/');
	}*/
	session_destroy();
}

function sanitizeString($var){
	global $mysqli;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripcslashes($var);
	return $mysqli->real_escape_string($var);
}

function showProfile($user){
	if(file_exists("$user.jpg")){
		echo "<img src = '$user.jpg' style = 'float:left;'>";
	}
	$result = queryMysqli("SELECT * FROM profiles WHERE user='$user'");
	if ($result->num_rows){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo stripslashes($row['text']) . "<br style = 'clear:left;'><br>";
	}
}



?>
