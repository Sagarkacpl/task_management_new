<?php
session_start();
error_reporting(0);
include 'include/dbconn.php';
$admin_id = $_SESSION['admin_id'];
if (empty($admin_id)) {
    header('Location: index.php');
}
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
    <title>Add Designation </title>
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
                            <h3 class="page-title">Add Designation</h3>

                        </div>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title"></h4>
                                </div>
                                <!-- /.box-header -->
                                <form class="form" method="post">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select Department</label>
                                                        <select name="departmentName" id="" class="form-control">
                                                        <option>Select Department</option>
                                                        <?php 
                                                        $departments = mysqli_query($db,"SELECT * FROM `department` WHERE deletedStatus='0'");
                                                        while($read = mysqli_fetch_assoc($departments))
                                                        {      ?>
                                                        <option value="<?php echo $read['department_name'] ?>">
                                                            <?php echo $read['department_name'] ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Designation Name</label>
                                                    <input type="text" class="form-control" name="designationName"
                                                        placeholder="Designation Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="reset" class="btn btn-warning me-1">
                                            <i class="ti-trash"></i> Cancel
                                        </button>
                                        <button type="submit" name="add_Designation" class="btn btn-primary">
                                            <i class="ti-save-alt"></i> Save
                                        </button>
                                    </div>
                                </form>
                                <?php 
                                        if(isset($_POST['add_Designation']) && isset($_POST['designationName']))
                                           {
                                            $departmentName = mysqli_real_escape_string($db,$_POST['departmentName']);
                                            $designationName = mysqli_real_escape_string($db,$_POST['designationName']);
                                            $added_by = $_SESSION['admin_name'];
                                            $department = mysqli_query($db,"INSERT INTO `designation` (`ID`, `department_name` ,`designation_name`, `added_by`, `deletedStatus`, `created_at`) VALUES (NULL, '$departmentName', '$designationName', '$added_by', '0', current_timestamp())");
                                            if($department == TRUE)
                                            {
                                                echo "<script>alert('New Designation Has Been Saved Successfully')</script>";
                                                echo "<script>window.location.href='designation.php'</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Designation Not Save , Something Wrong')</script>";
                                            }
                                        }
                                    ?>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-lg-3"></div>
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