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
<!-- Mirrored from novo-admin-template.multipurposethemes.com/main/tables_data.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 05:48:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://novo-admin-template.multipurposethemes.com/images/favicon.ico">
    <title>Designation</title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="main/css/vendors_css.css">
    <!-- Style-->
    <link rel="stylesheet" href="main/css/style.css">
    <link rel="stylesheet" href="main/css/skin_color.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <div id="loader"></div>
        <?php include 'include/header.php'; ?>
        <?php include 'include/navbar.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="align-items-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box align-items-center justify-content-between">
                                <h3 class="page-title">Designation  
                                    <a href="add_designation.php" class="btn btn-primary float-end">Add New Designation</a></h3>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <!-- <h3 class="box-title">Hover Export Data Table</h3> -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="ExportDataTable" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Department Name</th>
                                                    <th>Designation Name</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                    $department = mysqli_query($db,"SELECT * FROM `designation` WHERE deletedStatus='0' ORDER BY `ID` DESC");
                                                    $count = 1;
                                                    while($read = mysqli_fetch_assoc($department))
                                                    {
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $read['department_name']; ?></td>
                                                    <td><?php echo $read['designation_name']; ?></td>
                                                    <td><?php echo date_format(date_create($read['created_at']),"d-M-Y") ?></td>
                                                    <td>
                                                        <div class="">
                                                            <a href="edit_designation.php?id=<?php echo $read['ID']; ?>" onclick="return confirm('Are You Sure You Want To Edit This Record ?');" class="btn btn-success"><i class="fa fa-pencil"></i></a>

                                                            <a href="deleted_designation.php?id=<?php echo $read['ID']; ?>" onclick="return confirm('Are You Sure You Want To Delete This Record ?');" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } $count; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <?php include 'include/footer.php'; ?>
        <!-- Control Sidebar -->
        
    <!-- Page Content overlay -->
    <!-- Vendor JS -->
    <script src="main/js/vendors.min.js"></script>
    <script src="main/js/pages/chat-popup.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>
    <script src="assets/vendor_components/datatable/datatables.min.js"></script>
    <!-- Novo Admin App -->
    <script src="main/js/template.js"></script>
    <!-- <script src="main/js/pages/data-table.js"></script> -->
    <script>
        $('#ExportDataTable').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
    </script>
</body>
</html>
