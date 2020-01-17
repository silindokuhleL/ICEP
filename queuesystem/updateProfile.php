<?php
	session_start();
	$role = $_SESSION["role"];
	
	include 'adminDAO.php';
	$adminDAO = new AdminDAO;
	function message($message){
		?><script>alert("<?php echo $message?>");</script><?php
	}
	if($role != "Patient"){
		header("Location:index.php");
	}
	
	if(isset($_POST["update"])) {
		require_once('dbConnect.php');
		$id = $_SESSION['id'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$cellNumber = $_POST['cellNumber'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		message($adminDAO->updateUser($con,$id, $name, $lastname, $cellNumber, $email, $password));
	}
	
?>
<!DOCTYPE html>
<html lang="">
<head>
<title>Admin</title>
<!-- for-meta-tags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> 
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-meta-tags-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/JiSlider.css" rel="stylesheet"> 
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/team.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 

</head>
	
<body>

<div class="main" id="home">
<!-- banner -->
	<div class="header_of_web">
						<div class="doctor_header_text">
								<ul class="doctor_top_info_icons">
									<li class="text-left"><i class="fa fa-home" aria-hidden="true"></i>Pretoria, 1685</li>									
									<li class="text-left"><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@alphaeventshire.co.za">info@myshop.co.za</a></li>
									<li class="user-info"><i class="fa fa-user" aria-hidden="true"></i><a href="clearSession.php">Logout</li>
								</ul>
						</div>
						<div class="clearfix"> </div>
		</div>				

		<div class="header-bottom">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo">
						<h1><a class="navbar-brand" href="index.php">DOCTER SYSTEM<i class="fa fa-users" aria-hidden="true"></i></a></h1>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="menu menu--sebastian">
					<ul id="m_nav_list" class="m_nav menu__list">
						<li class="m_nav_item menu__item" id="moble_nav_item_4"> <a href="index.php" class="menu__link">Home</a> </li>
						<li class="m_nav_item menu__item" id="moble_nav_item_4"> <a href="about.php" class="menu__link">About Us</a> </li>
						<li class="m_nav_item menu__item" id="moble_nav_item_6"> <a href="contact.php" class="menu__link"> Contact Us </a> </li>
					</ul>
				</nav>

				</div>
				<!-- /.navbar-collapse -->
			</nav>
	 </div>
</div>
<!-- banner -->
<!-- banner1 -->
	<div class="banner1 jarallax">
		<div class="container">
			<marquee><h3 class="page-heading"><?php echo $_SESSION["name"] . ' ' . $_SESSION["lastname"];?> Welcome to DOCTER SYSTEM System</h3></marquee>
		</div>
	</div>

	<div class="band-devider">
		<div class="container">
			<ul>
				<li><a href="student.php">Home</a><i>|</i></li>
				<li><a><?php echo $_SESSION["name"] . ' ' . $_SESSION["lastname"];?></a></li>
			</ul>
		</div>
	</div>
<!-- //banner1 -->


<!-- //banner -->

<!-- about -->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12">
				<aside class="quick-links">
					<table class="table-responsive">
						<tr class="quick-links-header">
							<td>Navigation links</td>
					    </tr>
						<tr>
							<td><li><a class="btn"  href="patient.php">Home</a></li></td>
						</tr>
						<tr>
							<td><li><a class="btn"  href="updateProfile.php">Update Profile</a></li></td>
						</tr>
					</table>
				</aside>
			</div>
			<div class="col-md-8 col-xs-12">
				<article class="admin-dashboard margin-top">
					<div class="panel panel-primary">
						<div class="panel-heading"><h5 class="thin text-center">Update Profile</h5></div>
							<div class="panel-body">
								<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
									<div class="row margin-top">
										<div class="col-md-6">
											<input type="text" name="name" id="name" onkeyup="validateName()" value="<?php echo $_SESSION["name"];?>" class="form-control" required="required" placeholder="Name" autofocus>
											<label id="lblName"></label>
										</div>
										<div class="col-md-6">
											<input type="text" name="lastname" id="lastname" onkeyup="validateLastname()" value="<?php echo $_SESSION["lastname"];?>" class="form-control" required="required" placeholder="Lastname" autofocus>
											<label id="lblLastname"></label>
										</div>
										
									</div>
									<div class="row margin-top">
										<div class="col-md-6">
											<input type="text" name="cellNumber" id="cellNO" onkeyup="validateCellNO()" value="<?php echo $_SESSION["cellNumber"];?>" class="form-control" required="required" placeholder="Cell Number" autofocus>
											<label id="lblCellNO"></label>
										</div>
										<div class="col-md-6">
											<input type="email" name="email" id="email" onkeyup="validateEmail()"  class="form-control" value="<?php echo $_SESSION["email"];?>"required="required" placeholder="Email" autofocus>
											<label id="lblEmail"></label>
										</div>
									</div>
									<div class="row margin-top">
										<div class="col-md-6">
											<input type="password" name="password" id="password" onkeyup="validatePassword()" class="form-control" required="required" placeholder="Password" autofocus>
											<label id="lblPassword"></label>
										</div>
										<div class="col-md-6">
											<input type="password" name="confirmPassword" id="confirmPassword" onkeyup="validatePasswordMatch()" class="form-control" required="required" placeholder="Confirm Password" autofocus>
											<label id="lblConfirm"></label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<button class="btn btn-login btn-block" name="update" type="submit"><i class="fa fa-add"></i>Update Profile</button>
										</div>
									</div>
								</form>
							</div>
					</div>
				</article>
			</div>
		</div>
	</div>

<div class="service-w3l jarallax" id="service">
	<div class="container">
		
	</div>
</div>

<!-- stats -->
	<div class="stats_inner jarallax" id="stats">
	    <div class="container"> 
			<div class="doctor_stats_grid">
				<div class="col-md-4 doctor_count_left">
					<i class="fa fa-building-o" aria-hidden="true"></i>
					<p class="counter">8</p>
					<h3>Surgery Rooms</h3>
				</div>
				<div class="col-md-4 doctor_count_left">
				   <i class="fa fa-wheelchair" aria-hidden="true"></i>
					<p class="counter">10</p>
					<h3>Wheel Chairs</h3>
				</div>
				<div class="col-md-4 doctor_count_left">
					<i class="fa fa-users" aria-hidden="true"></i>
					<p class="counter">125</p>
					<h3>Treated Patients per day</h3>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>	
	</div>
<!-- //stats -->

<!-- footer -->
	 <div class="footer">
                <div class="container">
                    <div class="footer_copy ">
				<div class="w3agile_footer_grids ">

					<div class="clearfix "> </div>
				</div>
			</div>
			<div class="w3_agileits_copy_right_social ">
				<div class="col-md-6 agileits_w3layouts_copy_right ">

				</div>
				<div class="clearfix "> </div>
			</div>
<!-- //footer -->
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
 <!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>

<script src="js/ziehharmonika.js"></script>
<script>
$(document).ready(function() {
		$('.ziehharmonika').ziehharmonika({
			collapsible: true,
			prefix: ''
		});
	});
</script>
<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
	<!-- Gallery-Tab-JavaScript -->
			<script src="js/cbpFWTabs.js"></script>
			<script>
				(function() {
					[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
						new CBPFWTabs( el );
					});
				})();
			</script>
		<!-- //Gallery-Tab-JavaScript -->


<!-- Swipe-Box-JavaScript -->
			<script src="js/jquery.swipebox.min.js"></script> 
				<script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
			</script>
		<!-- //Swipe-Box-JavaScript -->

<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
  </script>
<!-- //flexSlider -->


<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
			<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	
	<script src="js/bootstrap.js"></script>
	<script src="js/validation.js "></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>