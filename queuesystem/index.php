<!DOCTYPE html>
<html lang="">
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
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$cellNumber = $_POST['cellNumber'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = "Patient";
		message($adminDAO->addUser($con,$name, $lastname, $cellNumber, $email, $password, $role));

	} else if(isset($_POST["login"])) {
		$email  = $_POST['email'];
		$password = $_POST['password'];
		require_once('dbConnect.php');
		$result = $adminDAO->signin($email, $password, $con);
		if($result["status"]) {
			header("Location:".$result["page"]);
		} else {
			message($result["message"]);
		}
	}
?>

        <head>
            <title>Home</title>
            <!-- for-meta-tags-->
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="keywords" content="" />
            <script type="application/x-javascript">
                addEventListener("load", function() {
                    setTimeout(hideURLbar, 0);
                }, false);

                function hideURLbar() {
                    window.scrollTo(0, 1);
                }
            </script>
            <!-- //for-meta-tags-->
            <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
            <link href="css/JiSlider.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
            <link href="css/team.css" rel="stylesheet" type="text/css" media="all" />
            <link href="css/shop.css" rel="stylesheet" type="text/css" media="all" />
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
                            <li class="text-left"><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@doctorsystem.co.za">info@doctorsystem.co.za</a></li>
                            <li class="user-info"><i class="fa fa-user" aria-hidden="true"></i><a href="#" data-toggle="modal" data-target="#loginDialog">Sign in</li>
							<li class="user-info "><i class="fa fa-users" aria-hidden="true"></i><a href="#" data-toggle="modal" data-target="#createAccountDialog">Create Account</a></li>

                        </ul>
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
												</br>
                                                <input type="email" name="email" class="form-control student" required="required" placeholder="Email" autofocus>
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
													<div class="col-md-6">
														<input type="text" name="name" id="name" onkeyup="validateName()" class="form-control" required="required" placeholder="Name" autofocus>
														<label id="lblName"></label>
													</div>
													<div class="col-md-6">
														<input type="text" name="lastname" id="lastname" class="form-control" onkeyup="validateLastname()" required="required" placeholder="Lastname" autofocus>
														<label id="lblLastname"></label>
													</div>
                                                </div>
												<div class="row margin-top">
													<div class="col-md-6">
														<input type="text" name="cellNumber" id="cellNO" onkeyup="validateCellNO()" class="form-control" required="required" placeholder="Cell Number" autofocus>
														<label id="lblCellNO"></label>
													</div>
													<div class="col-md-6">
														<input type="email" name="email" id="email" onkeyup="validateEmail()" class="form-control" required="required" placeholder="Email" autofocus>
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
                                    <li class="m_nav_item menu__item menu__item--current" id="m_nav_item_1"> <a href="index.php" class="menu__link"> Home </a></li>
                                    <li class="m_nav_item menu__item" id="moble_nav_item_2"> <a href="about.php" class="menu__link"> About Us </a> </li>
                                    <li class="m_nav_item menu__item" id="moble_nav_item_6"> <a href="contact.php" class="menu__link"> Contact Us</a> </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
            <!-- banner -->
            <div class="banner-silder">
                <div id="JiSlider" class="jislider">
                    <ul>
                        <li>
                            <div class="doctor-banner-top">

                                <div class="container">
                                    <div class="agileits-banner-info">

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="doctor-banner-top doctor-banner-top1">
                                <div class="container">
                                    <div class="agileits-banner-info">

                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="doctor-banner-top doctor-banner-top2">
                                <div class="container">
                                    <div class="agileits-banner-info">

                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- //banner -->

            <!-- about -->
            <div class="about" id="about">
                <div class="container">
                    <h2 class="doctor_heade_tittle_agile">Welcome to Patients Portal</h2>
                    <p class="sub_t_agileits">We care about your health</p>
                    <p class="ab">Best health service you can possible find</p>
                    <div class="clearfix"> </div>
                </div>
            </div>
            </div>

            <!-- services section -->
            <div class="service-w3l jarallax" id="service">
            </div>
            <!-- /services section -->

            <!-- stats -->
            <div class="stats" id="stats">
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

            <!-- services-bottom -->
            <div class="services-bottom">

            </div>
            <!-- //services-bottom -->

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
		</div>
	</div>
<script src="js/jquery-2.2.3.min.js "></script>
<script src="js/MyImageSlider.js "></script>
<script src="js/validation.js "></script>
<script>
	$(window).load(function () {
		$('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: true}).addClass('ff')
	})
	function checkRadio(name) {
		if(name == "student"){
			document.getElementById("student").checked = true;
			document.getElementById("staff").checked = false;

		} else if (name == "staff") {
			document.getElementById("staff").checked = true;
			document.getElementById("student").checked = false;
		}
	}
</script>
<script src="js/bootstrap.js "></script>
<script src="scripts.js "></script>

<!-- //for bootstrap working -->
</body>
</html>