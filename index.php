<?php 
    session_start();
    error_reporting(0);
    include('include/dbconn.php');
    $admin_id = $_SESSION['admin_id'];
    if($admin_id == TRUE )
    {
        header("Location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from novo-admin-template.multipurposethemes.com/main/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 05:49:45 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="https://novo-admin-template.multipurposethemes.com/images/favicon.ico">

	<title>Log in | Task Management System </title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="main/css/vendors_css.css">

	<!-- Style-->
	<link rel="stylesheet" href="main/css/style.css">
	<link rel="stylesheet" href="main/css/skin_color.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(images/auth-bg/bg-1.jpg)">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Task Management System</h2>
								<p class="mb-0">Sign in to continue.</p>
							</div>
							<div class="p-40">
								<form method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="email" name="email" class="form-control ps-15 bg-transparent"
												placeholder="Enter Email ID">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i
													class="ti-lock"></i></span>
											<input type="password" name="password" class="form-control ps-15 bg-transparent"
												placeholder="Enter Password">
										</div>
									</div>
									<div class="row">
										<!-- <div class="col-6">
											<div class="checkbox">
												<input type="checkbox" id="basic_checkbox_1">
												<label for="basic_checkbox_1">Remember Me</label>
											</div>
										</div> -->
										<!-- /.col -->
										<!-- <div class="col-6">
											<div class="fog-pwd text-end">
												<a href="javascript:void(0)" class="hover-warning"><i
														class="ion ion-locked"></i> Forgot pwd?</a><br>
											</div>
										</div> -->
										<!-- /.col -->
										<div class="col-12 text-center">
											<button type="submit" name="login" class="btn btn-danger mt-10">SIGN IN</button>
										</div>
										<!-- /.col -->
									</div>
								</form>
								<?php 
                                                if(isset($_POST['email']) && isset($_POST['password'])){
                                                    $mail = mysqli_real_escape_string($db,$_POST['email']);
                                                    $password = md5(trim($_POST['password']));
                                                    $DeletedStatus = 0;
                                                
                                                    // Query to check if the user exists and retrieve user data
                                                    $query = 'SELECT * FROM `users` WHERE Email="'.$mail.'" AND Password="'.$password.'" AND DeletedStatus="'.$DeletedStatus.'" ';
                                                    $result = mysqli_query($db, $query);
                                                
                                                    if(mysqli_num_rows($result) > 0) {
                                                        $row = mysqli_fetch_array($result);
                                                            // information store in sessions
                                                            $_SESSION['admin_email'] = $row['Email'];
                                                            $_SESSION['admin_id'] = $row['ID'];
                                                            $_SESSION['admin_name'] = $row['Name'];
															$_SESSION['designation'] = $row['Emp_designation'];
                                                            echo '<div class="alert alert-info mt-3" id="register_en">Employee Login Success Redirect......</div>';
                                                            echo "<script>window.location.href='dashboard.php'</script>";
                                                    } else {
                                                        echo '<div class="alert alert-danger mt-3" id="register_en">User Does Not Exist.</div>';
                                                    }
                                                }
                                                
                                            ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="main/js/vendors.min.js"></script>
	<script src="main/js/pages/chat-popup.js"></script>
	<script src="assets/icons/feather-icons/feather.min.js"></script>

</body>

<!-- Mirrored from novo-admin-template.multipurposethemes.com/main/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 05:49:47 GMT -->

</html>