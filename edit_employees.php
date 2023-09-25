<?php
session_start();
error_reporting(0);
include 'include/dbconn.php';
$admin_id = $_SESSION['admin_id'];
if (empty($admin_id)) {
    header('Location: index.php');
}
$username = $_SESSION['admin_name'];
$record_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from novo-admin-template.multipurposethemes.com/main/forms_general.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 05:48:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://novo-admin-template.multipurposethemes.com/images/favicon.ico">
    <title>Edit Employee </title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="main/css/vendors_css.css">
    <!-- Style-->
    <link rel="stylesheet" href="main/css/style.css">
    <link rel="stylesheet" href="main/css/skin_color.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <div id="loader"></div>
        <?php include('include/header.php');?>
        <?php include('include/navbar.php');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <h3 class="page-title">Edit Employee</h3>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title"></h4>
                                </div>
                                <?php 
                                    $record = mysqli_query($db,"SELECT * FROM `users` WHERE ID='$record_id'");
                                    $execute = mysqli_fetch_assoc($record);
                                ?>
                                <form class="form" method="post">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Employee ID</label>
                                                    <input type="text" name="emp_id" class="form-control"
                                                        value="<?php echo $execute['Emp_id']; ?>"
                                                        placeholder="Employee ID">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="emp_name" class="form-control"
                                                        value="<?php echo $execute['Name']; ?>"
                                                        placeholder="Employee Name">
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Email ID</label>
                                                    <input type="text" name="emp_email" class="form-control"
                                                        value="<?php echo $execute['Email']; ?>" placeholder="Email ID">
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Phone No</label>
                                                    <input type="text" name="emp_phone" class="form-control"
                                                        value="<?php echo $execute['Phone_no']; ?>"
                                                        placeholder="Phone No">
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Department</label>
                                                    <select name="emp_deptment" id="" class="form-control">
                                                        <option>Select Department</option>
                                                        <?php
                                                            $selectedDepartment = $execute['Emp_deptment']; // Assuming you have a selected department value
                                                            $departments = mysqli_query($db, "SELECT * FROM `department` WHERE deletedStatus='0'");
                                                            while ($read = mysqli_fetch_assoc($departments)) {
                                                                $departmentName = htmlspecialchars($read['department_name']);
                                                                $isSelected = ($departmentName == $selectedDepartment) ? 'selected' : '';
                                                                echo '<option value="' . $departmentName . '" ' . $isSelected . '>' . $departmentName . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Designation</label>
                                                    <select name="emp_designation" id="" class="form-control">
                                                        <option>Select Designation</option>
                                                        <?php
                                                            $selectedDesignation = $execute['Emp_designation']; // Assuming you have a selected designation value
                                                            $designations = mysqli_query($db, "SELECT * FROM `designation` WHERE deletedStatus='0'");
                                                            while ($read = mysqli_fetch_assoc($designations)) {
                                                                $designationName = htmlspecialchars($read['designation_name']);
                                                                $isSelected = ($designationName == $selectedDesignation) ? 'selected' : '';
                                                                echo '<option value="' . $designationName . '" ' . $isSelected . '>' . $designationName . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Reporting Member</label>
                                                    <?php
                                                        $selectedReporting = $execute['Emp_reporting']; // Assuming you have a selected reporting member value
                                                        $reportingMembers = mysqli_query($db, "SELECT * FROM `users` WHERE deletedStatus='0'");
                                                    ?>
                                                    <select name="emp_reporting" id="designation" class="form-control">
                                                        <option>Select Reporting Member</option>
                                                        <?php while ($read4 = mysqli_fetch_assoc($reportingMembers)) {
                                                            $reportingName = htmlspecialchars($read4['Name']);
                                                            $isSelected = ($reportingName == $selectedReporting) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?php echo $reportingName ?>" <?php echo
                                                            $isSelected ?>>
                                                            <?php echo $read4['Name'] ?> -
                                                            ( <?php echo $read4['Emp_id'] ?> ) -
                                                            ( <?php echo $read4['Emp_designation'] ?> ) -
                                                            ( <?php echo $read4['Emp_deptment'] ?> )
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Date of Joining </label>
                                                    <input type="date" name="emp_joining_date" id=""
                                                        value="<?php echo $execute['Emp_joining_date']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Date of Birth </label>
                                                    <input type="date" name="emp_dob" id=""
                                                        value="<?php echo $execute['Date_of_Birth']; ?>"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Password </label>
                                                    <input type="password" name="emp_password" id=""
                                                        class="form-control"
                                                        placeholder="Create Employee Login Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="reset" class="btn btn-warning me-1">
                                            <i class="ti-trash"></i> Cancel
                                        </button>
                                        <button type="submit" name="save" class="btn btn-primary">
                                            <i class="ti-save-alt"></i> Save
                                        </button>
                                    </div>
                                </form>
                                <?php 
                                        if(isset($_POST['save']))
                                        {
                                            $emp_id = mysqli_real_escape_string($db,$_POST['emp_id']);
                                            $emp_name = mysqli_real_escape_string($db,$_POST['emp_name']);
                                            $emp_email = mysqli_real_escape_string($db,$_POST['emp_email']);
                                            $emp_phone = mysqli_real_escape_string($db,$_POST['emp_phone']);
                                            $emp_deptment = mysqli_real_escape_string($db,$_POST['emp_deptment']);
                                            $emp_designation = mysqli_real_escape_string($db,$_POST['emp_designation']);
                                            $emp_reporting = mysqli_real_escape_string($db,$_POST['emp_reporting']);
                                            $emp_joining_date = mysqli_real_escape_string($db,$_POST['emp_joining_date']);
                                            $emp_dob = mysqli_real_escape_string($db,$_POST['emp_dob']);
                                            // $emp_password = '';
                                            // Check if a new password is provided
                                            if (!empty($_POST['emp_password'])) {
                                                $emp_password = md5($_POST['emp_password']);
                                            } else {
                                                // If no new password is provided, use the existing password
                                                $emp_password = $execute['Password'];
                                            }
                                            $edit_employee = mysqli_query($db,"UPDATE `users` SET `Emp_id` = '$emp_id', `Name` = '$emp_name', `Phone_no` = '$emp_phone', `Email` = '$emp_email', `Password` = '$emp_password', `Emp_deptment` = '$emp_deptment', `Emp_designation` = '$emp_designation', `Date_of_Birth` = '$emp_dob', `Emp_reporting` = '$emp_reporting' WHERE `ID` = '$record_id'");
                                            if($edit_employee == TRUE)
                                            {
                                                echo "<script>alert('New Employee Update Sucessfully');window.location.href='employees.php';</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Employee Not Updated, Try Again')</script>";
                                            }
                                        }
                                    ?>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <?php include('include/footer.php') ?>
        <!-- Page Content overlay -->
        <!-- Vendor JS -->
        <script src="main/js/vendors.min.js"></script>
        <script src="main/js/pages/chat-popup.js"></script>
        <script src="assets/icons/feather-icons/feather.min.js"></script>
        <!-- Novo Admin App -->
        <script src="main/js/template.js"></script>
</body>
<!-- Mirrored from novo-admin-template.multipurposethemes.com/main/forms_general.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 05:48:32 GMT -->
</html>