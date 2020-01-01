<?php
include_once 'functions.php';
if(isset($_POST['btnx'])) {
	header("location:index.php");
}
	$id=$_GET['id'];
	$connection=config();
	$sql="SELECT * FROM menu_tbl WHERE id='$id'";
	$result=mysqli_query($connection,$sql);
	$row=mysqli_fetch_assoc($result);
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
	<title>سیستم سازمانی رزومه</title>
	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/neon-rtl.css">
	<script src="assets/js/jquery-1.11.3.min.js"></script>
</head>
<body class="page-body  page-fade" data-url="http://neon.dev">
	<div class="page-container">
		<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<div class="main-content">
			<div class="row">
				<!-- Profile Info and Notifications -->
				<div class="col-md-6 col-sm-8 clearfix">
				</div>
				<!-- Raw Links -->
				<div class="col-md-6 col-sm-4 clearfix hidden-xs">
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								مشاهده رزومه
							</div>
						</div>
						<div class="panel-body">
							<form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">
								<div class="row-col">

								</div>

								<div class="row-col">

									<div class="col-sm-4">

										<div class="form-group">
											<label class="col-sm-12 control-label" >نام</label>

											<div class="col-sm-12" >
                                                    <input type="text" name="frm[firstname]"  class="form-control "
                                                           value="<?php echo $row['firstname'];?>" disabled>

												<span style="font-size: 10px"></span>

											</div>
										</div>

									</div>

									<div class="col-sm-4">

										<div class="form-group">
											<label class="col-sm-12 control-label">نام خانوادگی</label>

											<div class="col-sm-12">
                                                    <input type="text" name="frm[lastname]" class="form-control "
                                                           value="<?php echo $row['lastname']; ?>"disabled>

												<span style="font-size: 10px"></span>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="col-sm-12 control-label">شماره تماس </label>
											<div class="col-sm-12">
												<input type="text" name="frm[tle]" class="form-control " value="<?php echo $row['tel'];?> "disabled>
												<span style="font-size: 10px"></span>

											</div>
										</div>
									</div>
								</div>
								</div>
								<div class="row-col-12">

									<div class="col-sm-12">

										<div class="form-group">
											<label class="alert alert-warning" role="alert">توضیحات رزومه ارسالی</label>
											<div class="alert alert-success" role="alert" style="line-height: 2";><?php echo $row['run'];?></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
									<label class="col-sm-12 control-label">فایل پیوست</label>
								<embed src="<?php echo $row['pivast'];?>" type="application/pdf" width="100%" height="600px" />
										
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<br />
		</div>
	</div>

	<!-- Imported styles on this page -->
	

	<!-- Custom CSS File -->
	<link rel="stylesheet" href="assets/css/custom.css">

	<!-- Bottom scripts (common) -->
	
	<script src="assets/js/bootstrap.js"></script>
	

	<!-- Imported scripts on this page -->
	

	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->


</body>

</html>
