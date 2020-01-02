<?php
include_once 'user_functions.php';
include_once 'functions.php';
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
$conn = config();
$sql = "SELECT * FROM menu_tbl ORDER BY id DESC limit 1";
$result = mysqli_query($conn, $sql);

$connection = config();
$sql1 = "SELECT * FROM menu_tbl ORDER BY id DESC";
$result1 = mysqli_query($connection, $sql1);


//اختلاف زمانی سرور
$time_zone = 12600;

//تاریخ امروز
$today = date("Y-m-d", time() + $time_zone);

//تاریخ دیروز
$yesterday = date("Y-m-d", time() - 86400 + $time_zone);

//آدرس فایل
$file_src = 'visit-stats.txt';
chmod($file_src, 0755);

//خواندن فایل
$read_file = file_get_contents($file_src);

//اگر فایل خالی نبود
if (filesize($file_src) > 0 || $read_file != '') {
	$split_file = explode('|', $read_file);

	//print_r($split_file);
	$modify = $split_file[3];

	//اگر تاریخ آخرین ویرایش برابر تاریخ امروز نبود
	if ($modify != $today) {
		$today_visit = 1;

		if ($modify == $yesterday) {
			$yesterday_visit = $split_file[0];
		} else {
			$yesterday_visit = 0;
		}

		$total_visit = $split_file[2] + 1;
		$last_modify = $today;
	} //اگر تاریخ آخرین ویرایش برابر امروز بود
	else {
		$today_visit = $split_file[0] + 1;
		$yesterday_visit = $split_file[1];
		$total_visit = $split_file[2] + 1;
		$last_modify = $today;
	}
} //اگر فایل خالی بود
else {
	$today_visit = 1;
	$yesterday_visit = 0;
	$total_visit = 1;
	$last_modify = $today;
}

//نوشتن آمار جدید در فایل
$file_src_handle = fopen($file_src, 'w+');
$visit_data = $today_visit . '|' . $yesterday_visit . '|' . $total_visit . '|' . $last_modify;
fwrite($file_src_handle, $visit_data);
fclose($file_src_handle);

//محاسبه تعداد کاربران آنلاین
$config_array = array(
	'user_time' => date("YmdHis", time() + $time_zone),
	'user_ip' => $_SERVER['REMOTE_ADDR'],
	'file_name' => 'visit-online.txt'
);
chmod($config_array['file_name'], 0755);

//خواندن اطلاعات فایل
$online_file = file_get_contents($config_array['file_name']);

//تجزیه به آرایه
$online_file = explode("\r\n", $online_file);

//حذف مقادیر خالی
foreach ($online_file as $key => $value) {
	if (is_null($value) || $value == '') {
		unset($online_file[$key]);
	}
}

//حذف آی پی های قدیمی و آی پی فعلی
foreach ($online_file as $key => $value) {
	$user_ip_time = explode("|", $value);
	if ($user_ip_time[1] <= date("YmdHis", time() + $time_zone - 300)) {
		unset($online_file[$key]);
	}

	if ($user_ip_time[0] == $config_array['user_ip']) {
		unset($online_file[$key]);
	}
}

//محاسبه تعداد افراد آنلاین
$online = 1;
foreach ($online_file as $online_users) {
	$user_ip_time = explode("|", $online_users);
	if ($user_ip_time[1] >= date("YmdHis", time() + $time_zone - 300)) {
		$online++;
	}
}

//آمار کاربرانی که آنلاین هستند به اضافه کاربر فعلی
$new_online = $config_array['user_ip'] . "|" . $config_array['user_time'] . "\r\n";;
foreach ($online_file as $key => $value) {
	$new_online .= $value . "\r\n";
}

//نوشتن آمار جدید در فایل
$file_src_handle = fopen($config_array['file_name'], 'w+');
fwrite($file_src_handle, $new_online);
fclose($file_src_handle);

//////////////// Webgoo.ir ///////////////

//گرفتن خروجی

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

	<title>سیستم سازمانی مدیریت رزومه</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/neon-rtl.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<style>
		body {
			font-family: Tahoma, Geneva, sans-serif;
			font-size: 12px;
			direction: rtl;
		}

		.stats {
			color: #fff;
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 259px;
			height: auto;
			padding: 13px;
			line-height: 29px;
			margin-top: 10px;
		}
	</style>
</head>

<body class="page-body  page-fade" data-url="http://neon.dev">
	<div class="page-container">
		<div class="sidebar-menu">
			<div class="sidebar-menu-inner">
				<header class="logo-env">
					<!-- logo -->
					<div class="logo">
						<a href="index.php">
							<img src="assets/images/logo@2x.png" width="150" alt="23" />
						</a>
					</div>
					<br />

					<!-- logo collapse icon -->

					<div class="sidebar-mobile-menu visible-xs">
						<a href="#" class="with-animation">
							<i class="entypo-menu"></i>
						</a>
					</div>
				</header>
				<ul id="main-menu" class="main-menu">
					<li class="active">
						<a href="index.php">
							<i class="entypo-gauge"></i>
							<span class="title">داشبورد</span>
						</a>
					</li>
					<li class="has-sub root-level">

					<li>
						<a href="addFolder.php">
							<span class="title">مدیریت پوشه ها</span>
						</a>
					</li>


					</li>

					</li>
				</ul>
			</div>
		</div>
		<div class="main-content">
			<div class="row">
				<!-- Profile Info and Notifications -->
				<div class="col-md-6 col-sm-8 clearfix">
					<ul class="user-info pull-left pull-none-xsm">
						<!-- Profile Info -->
						<li class="profile-info dropdown">
							<!-- add class "pull-right" if you want to place this from right -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
								<?php
								echo "" . "  " . $_SESSION['username'];

								?>
							</a>
							<ul class="dropdown-menu">
								<!-- Reverse Caret -->
								<li class="caret"></li>
								<!-- Profile sub-links -->
								<li>
									<a href="data/coming_soon.html">
										<i class="entypo-user"></i>
										ویرایش پروفایل (بزودی)
									</a>
								</li>
								<li>
									<a href="http://time.ir">
										<i class="entypo-calendar"></i>
										نمایش آنلاین ساعت و تاریخ
									</a>
								</li>
								<li>
									<a href="mailto:bluecode@gmail.com">
										<i class="entypo-clipboard"></i>
										ارسال پیام به پشتیبانی
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- Raw Links -->
				<div class="col-md-6 col-sm-4 clearfix hidden-xs">

					<ul class="list-inline links-list pull-right">
						<li>
							<a href="login.php">
								خروج <i class="entypo-logout right"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<hr />
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					// Sample Toastr Notification
					setTimeout(function() {
						var opts = {
							"closeButton": true,
							"debug": false,
							"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ?
								"toast-top-left" : "toast-top-right",
							"toastClass": "black",
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "5000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						};
						toastr.success("You have been awarded with 1 year free subscription. Enjoy it!",
							"Account Subcription Updated", opts);
					}, 3000);
				})
			</script>
			<div class="row">
				<div class="col-sm-6 col-xs-6">

					<div class="tile-stats tile-red" style="padding: -1px;height: 122px;">
						<div class="icon"><i class="entypo-mail"></i></div>

						<div class="num" data-start="0" data-end="" data-postfix="" data-duration="0" data-delay="1500">
							<?php
							while ($row = mysqli_fetch_assoc($result)) {
								if (true) {
									echo $row['id'];
								} else {
									echo '<div>0</div>';
								}
							} ?> </div>

						<h3>تعداد رزومه های ارسالی</h3>
					</div>
				</div>


				<div class="clear visible-xs"></div>
				<div class="col-sm-6 col-xs-7" style="padding: -1px">
					<div class="tile-stats tile-aqua" style="
    											padding: 10px;">
						<div class="icon"><i class="entypo-users"></i></div>
						<h5>
							<?php echo '<div class="stats">
									&raquo; بازدید امروز: ' . $today_visit . '
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
									&raquo; بازدید دیروز: ' . $yesterday_visit . '
									بازدید کل: ' . $total_visit . '
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&raquo; افراد آنلاین: ' . $online . '
                       		 </div>';
							?>
						</h5>
					</div>
				</div>
			</div>


			<br />

		</div>
		<!-- Imported styles on this page -->

		<!-- Custom CSS Link -->
		<link rel="stylesheet" href="assets/css/custom.css">
		<!-- Bottom scripts (common) -->

		<script src="assets/js/bootstrap.js"></script>

		<!-- Imported scripts on this page -->




		<!-- JavaScripts initializations and stuff -->
		<script src="assets/js/neon-custom.js"></script>
		<!-- Demo Settings -->


</body>

</html>