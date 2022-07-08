<?php
 
session_start();
require_once 'db.php';

$login = isset($_POST['login']) ? $_POST['login'] : false;
$register = isset($_POST['register']) ? $_POST['register'] : false;
$logout = isset($_POST['logout']) ? $_POST['logout'] : false;

if ($login == true) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$stmt = $pdo->prepare("SELECT * FROM teams WHERE email = :email AND password = :password");
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($result) {
		$_SESSION['team_id'] = $result['id'];
		$_SESSION['name'] = $result['name'];
		$_SESSION['role_id'] = $result['role_id'];
		$status = 200;
		$message = "Success Login";
	} else {
		$status = 400;
		$message = "Failed Login";
	}
} else if ($register == true) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$role_id = 3;
	$stmt = $pdo->prepare("INSERT INTO teams (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)");
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':role_id', $role_id);
	$stmt->execute();
	$status = 200;
	$message = "Success Register";
} else if ($logout == true) {
	session_destroy();
	$status = 200;
	$message = "Success Logout";
} else {
	$status = 400;
	$message = "Failed";
}

$status = [
	'status' => $status,
	'message' => $message,
];

echo json_encode($status);

$pdo = null;

?>