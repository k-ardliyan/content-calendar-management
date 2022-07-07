<?php

session_start();

// check if session is set
if (isset($_SESSION['team_id'])) {
	// redirect to dashboard
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" href="assets/images/logo.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="assets/css/my-login.css">
	<title>Register &mdash; Content Calendar Management</title>
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
							<h4 class="card-title">Register</h4>
							<form id="formRegister" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" required autofocus>
									<div class="invalid-feedback">
										What's your name?
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<!-- <div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div> -->

								<div class="form-group m-0">
									<button type="submit" name="register" value="register" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="login.php">Login</a>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="assets/js/my-login.js"></script>
	<script>
		$('#formRegister').submit(function(e) {
			e.preventDefault();
			var name = $('#name').val();
			var email = $('#email').val();
			var password = $('#password').val();
			$.ajax({
				url: 'config/auth.php',
				type: 'POST',
				dataType: 'json',
				data: {
					name: name,
					email: email,
					password: password,
					register: true
				},
				success: function(data) {
					if (data.status == 200) {
						toastr.success(data.message, 'Success', {
							progressBar: true,
							timeOut: 1000,
							onHidden: function() {
								window.location.href = 'login.php';
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