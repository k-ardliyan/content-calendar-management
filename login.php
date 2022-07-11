<?php

session_start();
// condition to check if the user is logged in
if (isset($_SESSION['team_id'])) {
	// if the user is logged in, redirect to the dashboard
	header("Location: calendar.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="assets/images/logo.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/toastr.min.css">
	<link rel="stylesheet" href="assets/css/my-login.css">
	<title>Login &mdash; Content Calendar Management</title>
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper mt-auto">
					<div class="brand">
						<img src="assets/images/logo.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form class="my-login-validation" novalidate="" id="formLogin">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										<!-- <a href="forgot.html" class="float-right">
											Forgot Password?
										</a> -->
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<!-- <div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remeber Me</label>
									</div>
								</div> -->

								<div class="form-group m-0">
									<button type="submit" id="login" name="login" value="login" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2022 &mdash; Content Calendar Management 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/toastr.min.js"></script>
	<script src="assets/js/my-login.js"></script>
	<script>
		$('#formLogin').submit(function(e) {
			e.preventDefault();
			var email = $('#email').val();
			var password = $('#password').val();
			$.ajax({
				url: 'config/auth.php',
				type: 'POST',
				data: {
					email: email,
					password: password,
					login: true
				},
				dataType: 'json',
				success: function(data) {
					if (data.status == 200) {
						// toastr with progress bar + setTimeout
						toastr.success(data.message, 'Success', {
							progressBar: true,
							timeOut: 1000,
							onHidden: function() {
								window.location.href = 'calendar.php';
							}
						});
					} else {
						toastr.error(data.message, 'Error', {
							progressBar: true,
							timeOut: 1000,
						});
					}
				}
			});
		});
	</script>
</body>
</html>
