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
    <title>Employees List</title>
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
        <!-- <div id="loader"></div> -->
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
                                <h3 class="page-title">Employees List  
                                    <a href="add_employees.php" class="btn btn-primary float-end">Add New Employee</a></h3>
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
                                                    <th data-toggle="tooltip" data-placement="top" title="Employee Code">Emp ID</th>
                                                    <th data-toggle="tooltip" data-placement="top" title="Employee Name">Name</th>
                                                    <th data-toggle="tooltip" data-placement="top" title="Email">Email</th>
                                                    <th data-toggle="tooltip" data-placement="top" title="Date of Birth">Date of Birth</th>
                                                    <th data-toggle="tooltip" data-placement="top" title="Date of Joining">Date of Joining</th>
                                                    <th data-toggle="tooltip" data-placement="top" title="Department">Department</th>
                                                    <th data-toggle="tooltip" data-placement="top" title="Designation">Designation</th>
                                                    <th data-toggle="tooltip" data-placement="top" title="Phone">Phone</th>
                                                    <th data-toggle="tooltip" data-placement="top" title="Reporting Member">Reporting Member</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                                <?php 
                                                    $show_emp = mysqli_query($db,"SELECT * FROM `users` WHERE DeletedStatus='0' AND Emp_designation !='Admin' ORDER BY ID DESC");
                                                    $count = 1;
                                                    while($read = mysqli_fetch_assoc($show_emp))
                                                    {
                                                ?>
                                                <tr>
                                                    <td scope="row"><?php echo $count++; ?></td>
                                                    <td><?php echo $read['Emp_id'] ?></td>
                                                    <td><?php echo $read['Name'] ?></td>
                                                    <td><?php echo $read['Email'] ?></td>
                                                    <td><?php echo date_format(date_create($read['Date_of_Birth']),"d-M-Y"); ?></td>
                                                    <td><?php echo date_format(date_create($read['Emp_joining_date']),"d-M-Y"); ?></td>
                                                    <td><?php echo $read['Emp_deptment'] ?></td>
                                                    <td><?php echo $read['Emp_designation'] ?></td>
                                                    <td><?php echo $read['Phone_no'] ?></td>
                                                    <td>
                                                        <?php 
                                                            if(!empty($read['Emp_reporting'])){
                                                                echo $read['Emp_reporting'];
                                                            }else{
                                                                echo "No Reporting Member";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <a href="edit_employees.php?id=<?php echo $read['ID']; ?>" onclick="return confirm('Are You Sure You Want To Edit This Record ?');" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                                                            <a href="delete_employee.php?id=<?php echo $read['ID']; ?>" onclick="return confirm('Are You Sure You Want To Delete This Record ?');" class="btn btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } $count;?>
                                            <tbody>
                                            
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
