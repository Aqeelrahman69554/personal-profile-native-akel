<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login Personal Profile Aqeel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../../template/login_v8/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../../template/login_v8/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" action="process.php" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						Login Admin
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>

					<br>

					<!-- <div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div> -->

					<div class="container-login100-form-btn">
						<button type="submit" name="login" class="login100-form-btn">
							Sign in
						</button>
					</div>

					<!-- <div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="#" class="txt3">
							Sign up now
						</a>
					</div> -->
					<br>
				</form>
				<br>
				<?php if (isset($_GET['error'])): ?>
					<div class="alert alert-danger">
						<?php
						if ($_GET['error'] == 'username') {
							echo "username tidak ditemukan!";
						} elseif ($_GET['error'] == 'password') {
							echo "password salah";
						}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>


	<!--===============================================================================================-->
	<script src="../../../template/login_v8/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../../template/login_v8/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../../template/login_v8/vendor/bootstrap/js/popper.js"></script>
	<script src="../../../template/login_v8/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../../template/login_v8/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../../template/login_v8/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../../template/login_v8/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../../../template/login_v8/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../../../template/login_v8/js/main.js"></script>

</body>

</html>