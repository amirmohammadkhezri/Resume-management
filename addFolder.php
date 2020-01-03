<?php
include_once 'user_functions.php';
$connection = config();
$sql = "SELECT * FROM folder ORDER BY id DESC";
$result = mysqli_query($connection, $sql);

include_once 'user_functions.php';
include_once 'functions.php';
if (!isset($_SESSION['username'])) {
	header("location:login.php");
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

<body class="page-body" data-url="http://neon.dev">

	<div class="page-container">
		<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

		<div class="sidebar-menu">

			<div class="sidebar-menu-inner">

				<header class="logo-env">

					<!-- logo -->
					<div class="logo">

						<a href="index.php">

							<img src="assets/images/logo@2x.png" width="150" alt="" />
						</a>
					</div>
					<br>

					<br>

					<!-- logo collapse icon -->
					<div class="sidebar-collapse">
						<br>

						<!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->

						</a>

					</div>


					<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->

					<div class="sidebar-mobile-menu visible-xs">
						<a href="#" class="with-animation">
							<!-- add class "with-animation" to support animation -->

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




					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/thumb-1@2x.png" alt="" class="img-circle" width="44" />
						<?php
						echo $_SESSION['username'];
						?>
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

				$('#send').setTimeout(function() {
					button.removeAttr('enable');
				}, 1000);;
			</script>

			<table class="table table-bordered datatable" id="table-1">
				<thead>
					<a href="newfolder.php">

						<button type="button" class="btn btn-success"><i class="entypo-folder"> </i>ایجاد پوشه</button>
					</a>
					<br />
					<br />
					<br />
					<tr>

						<th>ردیف</th>
						<th data-hide="phone">عنوان</th>
						<th>شماره آگهی</th>


						<th data-hide="phone,tablet">حذف</th>
						<th data-hide="phone,tablet">بروزرسانی لینک ها</th>
					</tr>
				</thead>
				<tbody>

					<?php
					while ($row = mysqli_fetch_assoc($result)) {
					?>
						<tr class="odd gradeX">

							<td><?php echo $row['id']; ?></td>
							<td>
								<a href="list_protocol.php?secret=<?php echo $row['hashing']; ?>"><?php echo '<i class="entypo-folder" style="color: darkorange;"></i>' . '&nbsp;' . $row['title']; ?></a>
							</td>
							<td><?php echo $row['introNamber']; ?></td>
							<script>
								function confirmation() {
									var result = confirm("Are you sure to delete?");
									if (result) {
										// Delete logic goes here
									}
								}
							</script>
							<td class="text-center">
								<a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm(' آیا از حذف پوشه مطمعا هستید امکان بازیابی پوشه پاک شده وجود ندارد')">
									<button type="button" class="btn btn-red btn-xs">حذف پوشه ×</button>
								</a>

								<!-- id="urlCopied"  -->
								<!-- <textarea onclick="myFunction()" class="btn btn-blue" id="urlCopied" rows="1" cols="30"></textarea> -->
							</td>

							<td class="text-center">
								<a href="generate.php?id=<?php echo $row['hashing']; ?>" onclick="return confirm('میخواد لینک جدید بسازید ؟ ')">

									<button type="button" id="send" class="btn btn-secondary  btn-xs" disabled>دریافت لینک جدید +</button>
								</a>

							<?php
						}

							?>

							<!-- id="urlCopied"  -->
							<input type="hidden" value="<?php echo (md5(rand(1000, 7800787))) ?>" name="frm[hashing]">


							<!-- <textarea onclick="myFunction()" class="btn btn-blue" id="urlCopied" rows="1" cols="30"></textarea> -->
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

</html>