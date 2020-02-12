<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login PYBW</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/logoybw1.png') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/vendor/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/vendor/daterangepicker/daterangepicker.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login2/css/main.css') ?>">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
        
			<div class="wrap-login100">
            
                <form class="login100-form validate-form" action="<?php echo base_url('login/auth')?>" method="POST">
                <img src="<?php echo base_url('assets/images/logoybw1.png')?>" alt="image login" width="120"><br><br>
					<span class="login100-form-title p-b-43">
						<b>PYBW UII</b>
                    </span>
                    <center><label>Sistem Surat </br>Pengurus Yayasan Badan Wakaf UII</label></center><br>
                    <center>Login dengan akun anda</center>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					
				</form>

				<div class="login100-more" style="background-image: <?php echo base_url('assets/images/logoybw1.png')?>;">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login2/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login2/vendor/animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login2/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('assets/login2/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login2/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login2/vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/login2/vendor/daterangepicker/daterangepicker.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login2/vendor/countdowntime/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/login2/js/main.js') ?>"></script>

</body>
</html>