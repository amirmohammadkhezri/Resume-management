<?php
include_once 'functions.php';
include_once 'user_functions.php';
$introNamber = $_GET['secret'];
$string = md5(rand(1000, 7800787));

if (strlen($introNamber) == strlen($string)) {
	$connection = config();
	$sql = "SELECT * FROM menu_tbl WHERE introNamber LIKE '%$introNamber'";
	$result = mysqli_query($connection, $sql);

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
		<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/neon-core.css">
		<link rel="stylesheet" href="assets/css/neon-theme.css">
		<link rel="stylesheet" href="assets/css/neon-forms.css">
		<link rel="stylesheet" href="assets/css/neon-rtl.css">


		<script src="assets/js/jquery-1.11.3.min.js"></script>


	</head>

	<body class="page-body" data-url="http://neon.dev">

		<div class="page-container">
			<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			<div class="main-content">

				<div class="row">

					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">
						پیام
					</div>
					<!-- Raw Links -->


				</div>

				<hr />

				<br />

				<script type="text/javascript">
					jQuery(document).ready(function($) {
						var $table1 = jQuery('#table-1');

						// Initialize DataTable
						$table1.DataTable({
							"aLengthMenu": [
								[10, 25, 50, -1],
								[10, 25, 50, "All"]
							],
							"bStateSave": true
						});

						// Initalize Select Dropdown after DataTables is created
						$table1.closest('.dataTables_wrapper').find('select').select2({
							minimumResultsForSearch: -1
						});
					});
				</script>

				<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th data-hide="phone">نام و نام خانوادگی</th>

							<th data-hide="phone">شماره تماس</th>
							<th data-hide="phone">جنسیت</th>
							<th data-hide="phone,tablet">رزومه ها</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = mysqli_fetch_assoc($result)) {
						?>
							<tr class="odd gradeX">
								<td><?php echo $row['fullname']; ?></td>
								<td><?php echo $row['tel']; ?></td>
								<td><?php echo $row['gender']; ?></td>
								</td>
								<td class="text-center">
									<a href="<?php echo $row['pivast']; ?>" download>
										<input type="submit" class="btn btn-blue btn-xs" name="btnx" value="دانلود رزومه">
									</a>

								<?php
							}
								?>
								</td>
							</tr>

							<!-- <p>Input field: <input type="text" id="test3"></p>

						<button id="btn3" type="submit" onclick="Copy();" class="btn btn-blue btn-xs" name="btnx" value="کپی لینک">Set Value</button> -->
					</tbody>
				</table>
			</div>



			<!-- Imported styles on this page -->
			<link rel="stylesheet" href="assets/js/datatables/datatables.css">


			<!-- Custom CSS File -->
			<link rel="stylesheet" href="assets/css/custom.css">

			<!-- Bottom scripts (common) -->

			<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
			<script src="assets/js/bootstrap.js"></script>



			<!-- Imported scripts on this page -->
			<script src="assets/js/datatables/datatables.js"></script>



			<!-- JavaScripts initializations and stuff -->
			<script src="assets/js/neon-custom.js"></script>


			<!-- Demo Settings -->


	</body>
<?php
} else {
	echo '<h1>شما به این صفحه دسترسی ندارید<h1>';
}
?>

	</html>