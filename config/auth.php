<?php
 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
require_once 'db.php';

$login = isset($_POST['login']) ? $_POST['login'] : false;
$register = isset($_POST['register']) ? $_POST['register'] : false;
$logout = isset($_POST['logout']) ? $_POST['logout'] : false;

if ($login=='login'){
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$result = $mysqli->query("SELECT * FROM teams WHERE email='$email' AND password='$password'");
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION['team_id'] = $row['id'];
		$_SESSION['role'] = $row['role'];
		$status = 200;
		$message = "Success Login";
	} else {
		$status = 400;
		$message = "Failed Login";
	}
} else if ($register=='register'){
	//check email already exists
	$email = $_POST['email'];
	$result = $mysqli->query("SELECT * FROM teams WHERE email='$email'");
	if ($result->num_rows > 0) {
		$status = 400;
		$message = "Email already exists";
	} else {
		$name = $_POST['name'];
		$password = md5($_POST['password']);
		$role = 3;
		$result = $mysqli->query("INSERT INTO teams (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
		if ($result) {
			$status = 200;
			$message = "Menuju halaman login";
		} else {
			$status = 400;
			$message = "Failed Register";
		}
	}
	
} else if ($logout==true){
	$status = 200;
	$message = "Success Logout";
	session_start();
	session_destroy();
	header("Location: ../login.php");
}

$status = [
	'status' => $status,
	'message' => $message,
];

echo json_encode($status);

?>