<?php 
session_start();
error_reporting(0);
include('include/dbconn.php');
$admin_id = $_SESSION['admin_id'];
if(empty($admin_id))
{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from novo-admin-template.multipurposethemes.com/main/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 05:46:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://novo-admin-template.multipurposethemes.com/images/favicon.ico">

    <title><?php echo $_SESSION['admin_name']; ?> Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="main/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="main/css/style.css">
	<link rel="stylesheet" href="main/css/skin_color.css">
	<link rel="stylesheet" href="main/css/custom.css">
    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
  <?php include('include/header.php'); ?>
  <?php include('include/navbar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content bg-lightbrown p-0">
			<div class="row">
				<div class="col-xxl-9 col-12 big-left-section pt-35">
					<div class="box-body left-section">
						<div class="d-sm-flex align-items-center justify-content-between mb-30">
							<div class="d-flex align-items-center  mb-xl-0 w-p100">
								<div class="pb-20 pb-sm-0">
									<h2 class="m-0 fw-600 text-darkpurple">Hello, <?php echo $_SESSION['admin_name']; ?></h2>
									<p class="mb-0 fs-16 text-purple">Today is Monday, 20 Aug 2023</p>
								</div>
							</div>
						</div>							
					</div>

					<div class="row mt-xl-35 development-box left-section">
						<div class="col-xxl-4 col-xl-3 col-lg-3 col-md-6 col-12">
							<div class="box bg-transparent">
								<div class="box-body bg-purple p-20 p-xl-30 me-lg-10 me-0 pull-up">
									<div class="mt-25">
										<div class="col b-r">
											<h2 class="font-light fw-500 mb-30">12 tasks</h2>
											<p class="text-light mb-10 mb-0">Total Employee</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-3 col-lg-3 col-md-6 col-12">
							<div class="box bg-transparent">
								<div class="box-body bg-skyblue p-20 p-xl-30 me-lg-5 me-0 pull-up">
									<div class="mt-25">
										<div class="col b-r">
											<h2 class="font-light fw-500 mb-30">12 tasks</h2>
											<p class="text-white mb-10 mb-0">Total Tasks</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-3 col-lg-3 col-md-6 col-12">
							<div class="box bg-transparent">
								<div class="box-body bg-orange p-20 p-xl-30 ms-lg-5 me-0 pull-up">
									<div class="mt-25">
										<div class="col b-r">
											<h2 class="font-light fw-500 mb-30">12 tasks</h2>
											<p class="text-white mb-10 mb-0">Completed Tasks</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-3 col-lg-3 col-md-6 col-12">
							<div class="box bg-transparent">
								<div class="box-body bg-skyblue p-20 p-xl-30 me-lg-5 me-0 pull-up">
									<div class="mt-25">
										<div class="col b-r">
											<h2 class="font-light fw-500 mb-30">12 tasks</h2>
											<p class="text-white mb-10 mb-0">Ongoing Tasks</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				
				<div class="col-xxl-3 col-12">
					<div class="mt-20">
						<div class="box-body">							
							<div class="d-flex justify-content-between box-header bb-0 mb-10 right-section">
								<h3 class="text-darkpurple fw-600">Calendar</h3>
								<button class="btn bg-white px-10 pb-0" type="submit" id="button-addon3"><i class="icon-Notifications fs-24"><span class="path1"></span><span class="path2"></span></i></button>
							</div>
							<div class="row">
										<div class="col-xxl-12 col-xl-4 col-lg-4 right-border">
											<div class="mb-25 right-section">
												<div class=" no-shadow mb-0">
													<div class="px-0 d-flex box-header justify-content-between no-border mb-30">
														<p class="m-0 fs-16 text-purple">Ongoing Tasks</p>
														
													</div>
												</div>
												<a href="#">
													<div class="row">
														<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">13:20</h4>
													</div> -->
														<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
															<div class="bs-5 border-orange ps-10">
																<p class="text-purple fs-16 mb-5">Design</p>
																<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																	Task Managment</h4>
															</div>
														</div>
													</div>
												</a>
												<a href="#">
													<div class="row">
														<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">10:00</h4>
													</div> -->
														<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
															<div class="bs-5 border-orange ps-10">
																<p class="text-purple fs-16 mb-5">Dribbble shot</p>
																<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																	Facebook Brand</h4>
															</div>
														</div>
													</div>
												</a>
												<a href="#">
													<div class="row">
														<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">10:00</h4>
													</div> -->
														<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
															<div class="bs-5 border-orange ps-10">
																<p class="text-purple fs-16 mb-5">Dribbble shot</p>
																<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																	Facebook Brand</h4>
															</div>
														</div>
													</div>
												</a>
												<a href="#">
													<div class="row">
														<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">10:00</h4>
													</div> -->
														<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
															<div class="bs-5 border-orange ps-10">
																<p class="text-purple fs-16 mb-5">Dribbble shot</p>
																<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																	Facebook Brand</h4>
															</div>
														</div>
													</div>
												</a>
												<a href="#">
													<div class="row">
														<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">10:00</h4>
													</div> -->
														<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
															<div class="bs-5 border-orange ps-10">
																<p class="text-purple fs-16 mb-5">Dribbble shot</p>
																<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																	Facebook Brand</h4>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-xxl-12 col-xl-4 col-lg-4 right-border">
											<div class="mb-25 right-section">
												<div class=" no-shadow mb-0">
													<div class="px-0 d-flex box-header justify-content-between no-border mb-25">
														<p class=" m-0 fs-16 text-purple">Upcoming Tasks</p>
														<!-- <div class="dropdown me-1">
															<a data-bs-toggle="dropdown" href="#" aria-expanded="false"
																class=""><i class="ti-more-alt mt-5 "></i></a>
															<div class="dropdown-menu dropdown-menu-end" style="">
																<a class="dropdown-item" href="#"><i
																		class="fa fa-user"></i> Profile</a>
																<a class="dropdown-item" href="#"><i
																		class="fa fa-picture-o"></i> Shots</a>
																<a class="dropdown-item" href="#"><i
																		class="ti-check"></i> Follow</a>
																<div class="dropdown-divider"></div>
																<a class="dropdown-item" href="#"><i
																		class="fa fa-ban"></i> Block</a>
															</div>
														</div> -->
													</div>
												</div>
												<div class="row">
													<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
														<div class="bs-5 border-primary ps-10">
															<p class="text-purple fs-16 mb-5">UX Research</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Sleep App</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">11:20</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
														<div class="bs-5 border-primary ps-10">
															<p class="text-purple fs-16 mb-5">Design</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Task Managment</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">13:00</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
														<div class="bs-5 border-primary ps-10">
															<p class="text-purple fs-16 mb-5">Dribbble Shot</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Meet Up</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">13:00</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
														<div class="bs-5 border-primary ps-10">
															<p class="text-purple fs-16 mb-5">Dribbble Shot</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Meet Up</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">13:00</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 col-8 mb-30">
														<div class="bs-5 border-primary ps-10">
															<p class="text-purple fs-16 mb-5">Dribbble Shot</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Meet Up</h4>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xxl-12 col-xl-4 col-lg-4 ">
											<div class="mb-25 right-section">
												<div class=" no-shadow mb-0">
													<div class="px-0 d-flex box-header justify-content-between no-border mb-25">
														<p class=" m-0 fs-16 text-purple">Completed Tasks</p>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">10:00</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 mb-30 col-8">
														<div class="bs-5 border-success ps-10">
															<p class="text-purple fs-16 mb-5">Dribbble shot</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Meet Up</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">11:00</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 mb-30 col-8">
														<div class="bs-5 border-success ps-10">
															<p class="text-purple fs-16 mb-5">Design</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Mobile App</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">11:00</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 mb-30 col-8">
														<div class="bs-5 border-success ps-10">
															<p class="text-purple fs-16 mb-5">Design</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Mobile App</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">11:00</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 mb-30 col-8">
														<div class="bs-5 border-success ps-10">
															<p class="text-purple fs-16 mb-5">Design</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Mobile App</h4>
														</div>
													</div>
												</div>
												<div class="row">
													<!-- <div class="col-xxl-3 col-lg-4 col-md-4 col-4">
														<h4 class="fw-600 text-darkpurple">11:00</h4>
													</div> -->
													<div class="col-xxl-9 col-lg-8 col-md-8 mb-30 col-8">
														<div class="bs-5 border-success ps-10">
															<p class="text-purple fs-16 mb-5">Design</p>
															<h4 class="text-darkpurple fw-500 hover-primary mb-1 fs-18">
																Mobile App</h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
						</div>
					</div>
				</div>			
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="https://themeforest.net/item/novo-admin-project-management-dashboard-template/46592166?s_rank=1" target="_blank">Purchase Now</a>
		  </li>
		</ul>
    </div>
	  &copy; 2023 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" class="active"><i class="mdi mdi-message-text"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>			
			
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="fs-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>
			  
		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	<!-- ./side demo panel -->
	<div class="sticky-toolbar">	    
	    <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Buy Now" class="waves-effect waves-light btn btn-success btn-flat mb-5 btn-sm" target="_blank">
			<span class="icon-Money"><span class="path1"></span><span class="path2"></span></span>
		</a>
	    <a href="https://themeforest.net/user/multipurposethemes/portfolio" data-bs-toggle="tooltip" data-bs-placement="left" title="Portfolio" class="waves-effect waves-light btn btn-danger btn-flat mb-5 btn-sm" target="_blank">
			<span class="icon-Image"></span>
		</a>
	    <a id="chat-popup" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Live Chat" class="waves-effect waves-light btn btn-warning btn-flat btn-sm">
			<span class="icon-Group-chat"><span class="path1"></span><span class="path2"></span></span>
		</a>
	</div>
	<!-- Sidebar -->
		
	<div id="chat-box-body">
		<div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-lg btn-warning l-h-70">
            <div id="chat-overlay"></div>
            <span class="icon-Group-chat fs-30"><span class="path1"></span><span class="path2"></span></span>
		</div>

		<div class="chat-box">
            <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-45" type="button" data-bs-toggle="dropdown">
                      <span class="icon-Add-user fs-22"><span class="path1"></span><span class="path2"></span></span>
                  </button>
                  <div class="dropdown-menu min-w-200">
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Color me-15"></span>
                        New Group</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Clipboard me-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                        Contacts</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Group me-15"><span class="path1"></span><span class="path2"></span></span>
                        Groups</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Active-call me-15"><span class="path1"></span><span class="path2"></span></span>
                        Calls</a>
                    <a class="dropdown-item fs-16" href="#">
                        <span class="icon-Settings1 me-15"><span class="path1"></span><span class="path2"></span></span>
                        Settings</a>
                    <div class="dropdown-divider"></div>
					<a class="dropdown-item fs-16" href="#">
                        <span class="icon-Question-circle me-15"><span class="path1"></span><span class="path2"></span></span>
                        Help</a>
					<a class="dropdown-item fs-16" href="#">
                        <span class="icon-Notifications me-15"><span class="path1"></span><span class="path2"></span></span> 
                        Privacy</a>
                  </div>
                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark fs-18">Mayra Sibley</div>
                    <div>
                        <span class="badge badge-sm badge-dot badge-primary"></span>
                        <span class="text-muted fs-12">Active</span>
                    </div>
                </div>
                <div class="chat-box-toggle">
                    <a id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" href="#">
                      <span class="icon-Close fs-22"><span class="path1"></span><span class="path2"></span></span>
                    </a>                    
                </div>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">   
                </div>
                <div class="chat-logs">
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">2 Hours</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Hi there, I'm Jesse and you?
                        </div>
                    </div>
                    <div class="chat-msg self">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">You</a>
                                <p class="text-muted fs-12 mb-0">3 minutes</p>
                            </div>
                            <span class="msg-avatar">
                                <img src="../images/avatar/3.jpg" class="avatar avatar-lg">
                            </span>
                        </div>
                        <div class="cm-msg-text">
                           My name is Anne Clarc.         
                        </div>        
                    </div>
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
                            </span>
                            <div class="mx-10">
                                <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
                                <p class="text-muted fs-12 mb-0">40 seconds</p>
                            </div>
                        </div>
                        <div class="cm-msg-text">
                            Nice to meet you Anne.<br>How can i help you?
                        </div>
                    </div>
                </div><!--chat-log -->
            </div>
            <div class="chat-input">      
                <form>
                    <input type="text" id="chat-input" placeholder="Send a message..."/>
                    <button type="submit" class="chat-submit" id="chat-submit">
                        <span class="icon-Send fs-22"></span>
                    </button>
                </form>      
            </div>
		</div>
	</div>
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="main/js/vendors.min.js"></script>
	<script src="main/js/pages/chat-popup.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>

	<script src="assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="assets/vendor_components/fullcalendar/fullcalendar.js"></script>
	
	<!-- Novo Admin App -->
	<script src="main/js/template.js"></script>
	<script src="main/js/pages/dashboard.js"></script>
	<script src="main/js/pages/calendar.js"></script>
	
</body>

<!-- Mirrored from novo-admin-template.multipurposethemes.com/main/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 05:47:18 GMT -->
</html>
