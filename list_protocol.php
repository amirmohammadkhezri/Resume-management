<?php
include_once 'user_functions.php';
	$connection=config();
	$sql="SELECT * FROM menu_tbl ORDER BY id DESC";
	$result=mysqli_query($connection,$sql);

	include_once 'user_functions.php';
	   include_once 'functions.php';
	   if(!isset($_SESSION['username'])){
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

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


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
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
					<li class="active">
						<a href="index.php">
							<i class="entypo-gauge"></i>
							<span class="title">داشبورد</span>
						</a>
					</li>
					<li class="has-sub root-level">

							<li>
								<a href="add-protocol.php">
									<span class="title">افزودن پروتکل</span>
								</a>
							</li>
							<li>
								<a href="list_protocol.php">
									<span class="title">لیست پروتکل ها</span>
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
						echo "خوش آمدید".".".$_SESSION['username'];
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
		jQuery( document ).ready( function( $ ) {
			var $table1 = jQuery( '#table-1' );

			// Initialize DataTable
			$table1.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
			});

			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
		} );
		</script>
		
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th data-hide="phone">نام</th>
					<th>نام خانوادگی</th>
					<th data-hide="phone">شماره تماس</th>
					<th data-hide="phone,tablet">رزومه ها</th>
				</tr>
			</thead>
			<tbody>
			<?php
				while($row=mysqli_fetch_assoc($result)){
			?>
					<tr class="odd gradeX">

                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['tel']; ?></td>
                  
                        <td class="text-center">
                            <a href="viewedit.php?id=<?php echo $row['id']; ?>">
                                <button type="button"
                                        class="btn btn-success btn-xs">مشاده رزومه به همراه فایل پیوست                                </button>
                            </a>
                        
						
                           <a href="<?php echo $row['pivast'];?>"download>

						  
                                <input type="submit" class="btn btn-blue btn-xs" name="btnx" value="دانلود فایل پیوست" >
                            </a>
                            
                            

                                <?php
								}
                                ?>
							</td>
						</tr>
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