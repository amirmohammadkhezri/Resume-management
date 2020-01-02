<?php
include_once 'user_functions.php';
if (isset($_POST['btn'])) {
	$data = $_POST['frm'];
	user_login($data);
}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="assets/images/favicon.ico">

	<title>سیستم سازمانی مدیریت پروتکل</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">

	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/neon-rtl.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>



</head>

<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


	<!-- This is needed when you send requests via Ajax -->


	<div class="login-container">

		<div class="login-header login-caret">

			<div class="login-content">

				<a href="index.php" class="logo">
					<img src="assets/images/logo@2x.png" width="250" alt="" />
				</a>

				<!-- <p class="description">لطفا نام کاربری و رمز عبور خود را وارد کنید</p>
			
			progress bar indicator -->

			</div>

		</div>



		<div class="form-group">

			<div class="login-content">

				<div class="form-login-error">
					<h3>لطفا نام کاربری و رمز عبور صحیح را وارد کنید</h3>
				</div>

				<form action="" method="post">

					<div class="form-group">

						<div class="input-group">
							<div class="input-group-addon">

							</div>

							<input type="text" class="form-control" name="frm[username]" placeholder="نام کاربری" />
						</div>

					</div>

					<div class="form-group">

						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-key"></i>
							</div>

							<input type="password" class="form-control" name="frm[password]" placeholder="رمز عبور" />
						</div>

					</div>

					<div class="form-group">
						<button type="submit" name="btn" class="btn btn-primary">
							<i class="entypo-login"></i>
							ورود
						</button>
					</div>



			</div> -->

			</form>



		</div>

	</div>

	</div>


	<!-- Bottom scripts (common) -->


	<!-- JavaScripts initializations and stuff -->


</body>

</html>