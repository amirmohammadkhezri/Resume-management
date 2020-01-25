<?php
 include_once 'user_functions.php';
    include_once 'functions.php';
if(isset($_POST['btn'])){
	$data=$_POST['frm'];
	$dir='uploader/';
	$file='image';
	$new_name1=rand(1,10000);
	mkdir($dir.$new_name1);
	$picname=$_FILES[$file]['name'];
	$array=explode(".",$picname);
	$ext=end($array);
	$new_name=rand(10000,50000).".".$ext;
	$from=$_FILES[$file]['tmp_name'];
	$to=$dir.$new_name1."/".$new_name;
	move_uploaded_file($from,$to);
	addmenu($data,$to);
	header("location:add_list_protocol.php");
}
$connections=config();
$sqls="SELECT * FROM folder ORDER BY id DESC";
$results=mysqli_query($connections,$sqls);
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
	<title>سیستم مدیریت رزومه ها</title>
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
		<!-- side bar delete -->
		<!-- CODE -->
		<!-- side bar delete -->
		<div class="main-content">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-heading">
							<div class="panel-title">
								ارسال رزومه
							</div>
						</div>
						<div class="panel-body">
							<form role="form" class="form-horizontal form-groups-bordered" action="" method="post" enctype="multipart/form-data">
								<div class="row-col">
									<div class="col-sm-4">
										<div class="form-group">
											<label class="col-sm-12 control-label">نام و نام خانوادگی</label>
											<div class="col-sm-12">
												<input type="text" value="" name="frm[fullname]" class="form-control" placeholder="fullname" required>
												
											</div>
										</div>
									</div>
									<div class="col-sm-8">
									<div class="col-sm-4">
										<div class="form-group">
											<label class="col-sm-12 control-label">شماره تماس</label>
											<div class="col-sm-12">
												<input type="text" value="" name="frm[tel]" class="form-control" placeholder="PhoneNumber" required>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="col-sm-12 control-label">جنسیت</label>
											<div class="col-sm-12">
											<select name="frm[gender]" style="width: 150px";>
												<option value="مرد" selected>مرد</option>
																<option value="زن">زن</option>
													</select>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
									<div class="form-group">
									<label class="col-sm-12 control-label">شماره آگهی</label>
									<div class="col-sm-12">
											<select name="frm[introNamber]" style="width: 150px";>
												<?php
													while($rows=mysqli_fetch_assoc($results)){
														?>
														<option value="<?php echo $rows['introNamber'].$rows['hashing']; ?>"><?php echo $rows['introNamber']; ?></option>
														<?php
													};
												?>
											</select>
											</div>
									</div>
									</div>
								</div>
								</div>
								<div class="alert alert-info" role="alert">رزومه کاری خود را پیوست کنید و در صورت لزوم میتوانید توضیحاتی در رابطه با رزومه کاری خود ارسال کنید</div>
								<div class="row-col">
									<div class="form-group">
												<label class="col-sm-12 control-label">بارگذاری فایل رزومه</label>
												<div class="col-sm-12">
														<input type="file"  name="image" class="btn btn-info" multiple="1" required data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;فایل ها را انتخاب کنید" >
												</div>
											<?php
											$i=0;
											for ($i=0; $i <= 2; $i++) { 
												echo '<br/>';
											}?>
										<hr/>
										<div class="alert alert-warning" role="alert">
										<h4 class="alert-heading">هشدار !</h4>
										<p>امکان ویرایش رزومه ارسالی وجود ندارد</p>
										<p class="mb-0">لطفا قبل از ارسال رزومه کاری خود ورودی های خود را چک کنید</p>
										</div>
												<div class="form-group">
													<label class="col-sm-12 control-label">&nbsp;</label>
													<div class="col-sm-12">
															<input type="submit" class="btn btn-success" name="btn" value="ارسال رزومه کاری">
													</div>
												</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<textarea id="field-ta" name="frm[run]" ></textarea>
												<script>
													$(function () {
														$('#field-ta').ckeditor();
													});
										</script>
										</div>
									</div>
								</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">
	<link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/minimal/_all.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/square/_all.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/flat/_all.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/futurico/futurico.css">
	<link rel="stylesheet" href="assets/js/icheck/skins/polaris/polaris.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<!-- Bottom scripts (common) -->
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/select2/select2.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/adapters/jquery.js"></script>
	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>
	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>
</body>
</html>