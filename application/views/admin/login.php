<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login PYBW UII</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/login/images/icons/logoybw1.png') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"href="<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/main.css') ?>">
<!--===============================================================================================-->
</head>
<body>

	<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-success" role="alert">
					<?= validation_errors() ?>
					<?= $this->session->flashdata('error') ?>
				</div>
				<?php endif; ?>

				
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">

				<form class="login100-form validate-form" action="<?php echo base_url('login/auth')?>" method="POST" >
					<span class="login100-form-title p-b-43">
						<img src="<?php echo base_url('assets/images/logoybw1.png')?>" alt="image login" width="120"><br><br>
<!-- 						<label style="color: #111111">Account Login</label> -->
					</span>
					<div class="wrap-input100 rs1 validate-input" data-validate = "Username is required"  style="box-shadow: 0px 1px 2px;">
						<input class="input100" type="text" name="username">
						<span class="label-input100">Username</span>
					</div>
					<div class="wrap-input100 rs2 validate-input" data-validate="Password is required" style="box-shadow: 0px 1px 2px;">
						<input class="input100" type="password" name="password">
						<span class="label-input100">Password</span>
					</div>
					<div class="container-login100-form-btn" >
						<button class="login100-form-btn" >
							Sign in
						</button>
					</div>
				</form><br><br>
				<center><label style="color: red"><?php echo $this->session->flashdata('msg');?></label></center>
			</div>
		</div>
	</div>	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login/vendor/daterangepicker/daterangepicker.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/vendor/countdowntime/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login/js/main.js') ?>"></script>
</body>
</html>