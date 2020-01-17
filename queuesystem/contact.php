<?php
	session_start();
	include 'adminDAO.php';
	$adminDAO = new AdminDAO;

	function message($message) {
		?>
			<script>
				alert("<?php echo $message?>");
			</script>
		<?php
	}
	if(isset($_POST["register"])) {
		require_once('dbConnect.php');
		$studentNumber = $_POST['studentNumber'];
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$cellNumber = $_POST['cellNumber'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = "Student";
		message($adminDAO->addUser($con,$studentNumber, $name, $lastname, $cellNumber, $email, $password, $role));

	} else if(isset($_POST["login"])) {
		$studentNumber  = $_POST['studentNumber'];
		$password = $_POST['password'];
		require_once('dbConnect.php');
		$result = $adminDAO->signin($studentNumber, $password, $con);
        if($result["status"]) {
			header("Location:".$result["page"]);
		} else {
			message($result["message"]);
		}
	}
	if(isset($_POST["send"])){
		$to = "info@myshop.co.za";
		$regard = $_POST["name"];
		$subject = "Query From Customer";
		$from = $_POST["email"];
				
		$message = $_POST["message"];
		$headers = 'From: ' . $from . "\r\n" .'Reply-To: ' . $from . "\r\n" .'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
				
		?>
			<script>
				alert("Email successfully sent to My shop");
			</script>
		<?php

	}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Shop</title>
<!-- for-meta-tags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dr Nyiko Given Mabasa, Xitanga Xa Nyiko Mabasa, Dr N.G Mabasa, Dr Nyiko Mabasa, Xitanga xa Given Mabasa,  Ivory Park Surgery,Doctor In Midrand, Consultation in Ivory, Tembisa Doctor, Medical Doctor" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-meta-tags-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href="//fonts.googleapis.com/css?family=Raleway:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
</head>
	
<body  onload="startTime()">
<div class="main" id="home">
<!-- banner -->
		<div class="header_of_web">
						<div class="doctor_header_text">
								<ul class="doctor_top_info_icons">
									<li class="text-left"><i class="fa fa-home" aria-hidden="true"></i>Pretoria, 1685</li>
                            <li class="text-left"><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@doctorsystem.co.za">info@doctorsystem.co.za</a></li>
                            <li class="user-info"><i class="fa fa-user" aria-hidden="true"></i><a href="#" data-toggle="modal" data-target="#loginDialog">Sign in</li>
							<li class="user-info "><i class="fa fa-users" aria-hidden="true"></i><a href="#" data-toggle="modal" data-target="#createAccountDialog">Create Account</a></li>
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
						<li class="m_nav_item menu__item" id="moble_nav_item_2"> <a href="index.php" class="menu__link">Home </a> </li>		
						<li class="m_nav_item menu__item" id="moble_nav_item_2"> <a href="about.php" class="menu__link"> About Us </a> </li>
						<li class="m_nav_item menu__item menu__item--current" id="moble_nav_item_6"> <a href="contact.php" class="menu__link"> Contact Us </a> </li>
						
					</ul>
				</nav>
				</div>
				<div class="modal fade" id="loginDialog" role="dialog">
                        <div class="modal-dialog login-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Login</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form">
                                            <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                                                <br>
                                                <input type="number" name="studentNumber" class="form-control" required="required" placeholder="Student Number" autofocus>
                                                <br>
                                                <input type="password" name="password" class="form-control" required="required" placeholder="Password">
                                                <button class="btn btn-login btn-block" name="login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                                                <hr>

                                                <div class="login-social-link centered">
                                                    <p>Check our social network</p>
                                                    <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                                                    <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="modal fade" id="createAccountDialog" role="dialog">
                        <div class="modal-dialog create-form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Create Account</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form">
                                            <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                                                <div class="row margin-top">
													<div class="col-md-12">
														<input type="number" name="studentNumber" class="form-control" required="required" placeholder="Student Number" autofocus>
													</div>
													
                                                </div>
												<div class="row margin-top">
													<div class="col-md-6">
														<input type="text" name="name" class="form-control" required="required" placeholder="Name" autofocus>
													</div>
													<div class="col-md-6">
														<input type="text" name="lastname" class="form-control" required="required" placeholder="Lastname" autofocus>
													</div>
													
                                                </div>
												<div class="row margin-top">
													<div class="col-md-6">
														<input type="number" name="cellNumber" class="form-control" required="required" placeholder="Cell Number" autofocus>
													</div>
													<div class="col-md-6">
														<input type="email" name="email" class="form-control" required="required" placeholder="Email" autofocus>
													</div>
                                                </div>
												<div class="row margin-top">
													<div class="col-md-6">
														<input type="password" name="password" class="form-control" required="required" placeholder="Password" autofocus>
													</div>
													<div class="col-md-6">
														<input type="password" name="confirmPassword" class="form-control" required="required" placeholder="Confirm Password" autofocus>
													</div>
                                                </div>
												<div class="row col-md-offset-6">
													<div class="col-md-6 text-left">
														<button class="btn btn-login" name="register" type="submit"></i>Create Account</button>
													</div>
                                                </div>
                                                <hr>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
				<!-- /.navbar-collapse -->
			</nav>
	 </div>
</div>
<!-- banner -->
<!-- banner1 -->
	<div class="banner1 jarallax">
		<div class="container">
			<marquee><h3 class="page-heading">Contact us at info@doctorsystem.co.za</h3></marquee>
		</div>
	</div>

	<div class="band-devider">
		<div class="container">
			<ul>
				<li><a href="index.html">Home</a><i>|</i></li>
				<li>Contact<i>|</i></li>
				<li><div class="text-left" id="time"></div></li>
			</ul>
		</div>
	</div>
<!-- //banner1 -->
	<div class="banner-bottom" id="about">
		<div class="container">
			<h2 class="doctor_heade_tittle_agile">Contact Us</h2>
		    <p class="sub_t_agileits">Want to hear from us? Leave a message</p>

           <div class="contact-top-agileits contact-background">
               <div class="col-md-12 contact-grid">
					<div class="contact-grid1 agileits-wlayouts">
						<div class="con-w3l-info text-center">
							
						   <h4>Address</h4>
						  <p>13920 Ningel Street<span>, Ivory Park 3</span></p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
				
			</div>
			<div class="contact-form-aits">
				 <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
					<input type="text" class="form-control margin-right " name="name" placeholder="Name" required="">
					<input type="email" class="form-control" name="email" placeholder="Email (Optional)">
					<textarea name="message" class="form-control" placeholder="Message" required=""></textarea>
					<div class="send-button text-right">
						<button name="send" class="btn btn-primary">SEND MESSAGE</button>
					</div>
				  </form>     
			</div>
	    </div>
	</div>
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
<!-- //bootstrap-pop-up -->
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