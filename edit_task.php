<?php
session_start();
error_reporting(0);
include 'include/dbconn.php';
$admin_id = $_SESSION['admin_id'];
if (empty($admin_id)) {
    header('Location: index.php');
}
$username = $_SESSION['admin_name'];
$id = $_GET['id'];
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
    <title>Edit Task </title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="main/css/vendors_css.css">
    <!-- Style-->
    <link rel="stylesheet" href="main/css/style.css">
    <link rel="stylesheet" href="main/css/skin_color.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
        integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
        crossorigin="anonymous">
    <link rel="stylesheet" href="main/css/virtual-select.min.css">
    <style>
        .vscomp-ele {
            max-width: 310px;
        }
    </style>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
        <!-- <div id="loader"></div> -->
        <?php include('include/header.php');?>
        <?php include('include/navbar.php');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <h3 class="page-title">Edit Task</h3>
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
                                    $edit_task = mysqli_query($db,"SELECT * FROM `tasks` WHERE DeletedStatus='0' AND task_id='$id'");
                                    $read = mysqli_fetch_assoc($edit_task);
                                ?>
                                <form class="form" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Task Name</label>
                                                    <input type="text" name="task_name" class="form-control"
                                                        value="<?php echo $read['task_name'] ?>"
                                                        placeholder="Task Name">
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Department</label>
                                                    <select name="emp_deptment" id="" class="form-control">
                                                        <option>Select Department</option>
                                                        <?php
                                                            $selectedDepartment = $read['emp_department']; // Assuming you have a selected department value
                                                            $departments = mysqli_query($db, "SELECT * FROM `department` WHERE deletedStatus='0'");
                                                            while ($read1 = mysqli_fetch_assoc($departments)) {
                                                                $departmentName = htmlspecialchars($read1['department_name']);
                                                                $isSelected = ($departmentName == $selectedDepartment) ? 'selected' : '';
                                                                echo '<option value="' . $departmentName . '" ' . $isSelected . '>' . $departmentName . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Designation</label>
                                                    <select name="emp_designation" id="" class="form-control">
                                                        <option>Select Designation</option>
                                                        <?php
                                                            $selectedDesignation = $read['emp_designation']; // Assuming you have a selected designation value
                                                            $designations = mysqli_query($db, "SELECT * FROM `designation` WHERE deletedStatus='0'");
                                                            while ($read2 = mysqli_fetch_assoc($designations)) {
                                                                $designationName = htmlspecialchars($read2['designation_name']);
                                                                $isSelected = ($designationName == $selectedDesignation) ? 'selected' : '';
                                                                echo '<option value="' . $designationName . '" ' . $isSelected . '>' . $designationName . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Task Assign <small>(Select
                                                            Employee)</small></label>
                                                    <select id="multipleSelect" multiple placeholder="Select"
                                                        data-search="true" data-silent-initial-value-set="true"
                                                        name="task_assign_to[]">
                                                        <?php 
                                                            $departments = mysqli_query($db, "SELECT * FROM `users` WHERE deletedStatus='0'");
                                                            while ($fetch = mysqli_fetch_assoc($departments)) {
                                                                $name = $fetch['Name'];
                                                                $empId = $fetch['Emp_id'];
                                                                $empDesignation = $fetch['Emp_designation'];
                                                                $empDepartment = $fetch['Emp_deptment'];

                                                                // Check if the current user's name is in the comma-separated list
                                                                $selected = '';
                                                                if (strpos($read['task_assign_to'], $name) !== false) {
                                                                    $selected = 'selected';
                                                                }
                                                        ?>
                                                        <option value="<?php echo $name ?>" <?php echo $selected ?>>
                                                            <?php echo $name ?> - (
                                                            <?php echo $empId ?> ) - (
                                                            <?php echo $empDesignation ?> ) - (
                                                            <?php echo $empDepartment ?> )
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div> <!-- end col -->
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Reporting Member</label>
                                                        <select id="multipleSelect" multiple placeholder="Select"
                                                            data-search="ture" data-silent-initial-value-set="true"
                                                            name="reporting_member[]">
                                                            <?php 
                                                                $departments = mysqli_query($db,"SELECT * FROM `users` WHERE deletedStatus='0'");
                                                                while($read6 = mysqli_fetch_assoc($departments))
                                                                {  
                                                                    $name = $read6['Name'];
                                                                    $empId = $read6['Emp_id'];
                                                                    $empDesignation = $read6['Emp_designation'];
                                                                    $empDepartment = $read6['Emp_deptment'];
                                                                    
                                                                    $selected = '';
                                                                    if (strpos($read['reporting_member'], $name) !== false) {
                                                                        $selected = 'selected';
                                                                    }
                                                                    
                                                            ?>
                                                            <option value="<?php echo $name ?>" <?php echo $selected ?>>
                                                            <?php echo $name ?> - (
                                                            <?php echo $empId ?> ) - (
                                                            <?php echo $empDesignation ?> ) - (
                                                            <?php echo $empDepartment ?> )
                                                        </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div> <!-- end col -->
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Start Date/ Time </label>
                                                        <input type="datetime-local" name="task_start_date_time"
                                                        value="<?php echo $read['task_start_date_time']; ?>"    class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">End Date/ Time </label>
                                                        <input type="datetime-local" name="task_end_date_time" value="<?php echo $read['task_end_date_time']; ?>"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Attachments </label>
                                                        <input type="file" name="documents[]" class="form-control" multiple>
                                                        <?php 
                                                            $filenames = explode(',', $read['attachments']);
                                                            
                                                        foreach ($filenames as $filename) {
                                                            // Trim any whitespace around the filename
                                                            $filename = trim($filename);
                                                            // Check if the filename is not empty
                                                            if (!empty($filename)) { ?>
                                                            <!-- Display a link to each file -->
                                                            <a href="assets/storage/Attachments/<?php echo $filename; ?>" target="_blank"><img
                                                                    src="assets/pdf-icon.png" alt="pdf-icon" width="22"
                                                                    style="margin: 5px 5px;"></a>
                                                            <?php } } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Task Description </label>
                                                        <textarea name="task_desc" class="form-control" cols="30"
                                                            rows="4"><?php echo $read['task_desc'] ?></textarea>
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
                                                <i class="ti-save-alt"></i> Update
                                            </button>
                                        </div>
                                </form>
                                <?php
                                if (isset($_POST['save'])) {
                                    // Escape and retrieve form inputs
                                    $task_name = mysqli_real_escape_string($db, $_POST['task_name']);
                                    $emp_deptment = mysqli_real_escape_string($db, $_POST['emp_deptment']);
                                    $emp_designation = mysqli_real_escape_string($db, $_POST['emp_designation']);
                                    $task_start_date_time = mysqli_real_escape_string($db, $_POST['task_start_date_time']);
                                    $task_end_date_time = mysqli_real_escape_string($db, $_POST['task_end_date_time']);
                                    $task_desc = mysqli_real_escape_string($db, $_POST['task_desc']);
                                
                                    // Handle selected values from the task_assign_to dropdown
                                    if (isset($_POST['task_assign_to'])) {
                                        $selectedAssignees = $_POST['task_assign_to'];
                                        $assigneesString = implode(', ', $selectedAssignees);
                                    } else {
                                        $assigneesString = ''; // Default value if nothing is selected
                                    }
                                
                                    // Handle selected values from the reporting_member dropdown
                                    if (isset($_POST['reporting_member'])) {
                                        $selectedReportingMembers = $_POST['reporting_member'];
                                        $reportingMembersString = implode(', ', $selectedReportingMembers);
                                    } else {
                                        $reportingMembersString = ''; // Default value if nothing is selected
                                    }
                                
                                    // Initialize an array to store uploaded file names
                                    $uploadedFiles = array();
                                
                                    if (isset($_FILES['documents']['name'][0])) {
                                        // Move the new files to the upload directory
                                        $uploadDir = 'assets/storage/Attachments/';
                                        $uploadedFiles = array();
                                        foreach ($_FILES['documents']['name'] as $i => $fileName) {
                                            $uniqueFileName = time() . "-" . rand(1000, 9999) . "-DOC-" . $fileName;
                                            $fileTmpName = $_FILES['documents']['tmp_name'][$i];
                                            $uploadPath = $uploadDir . basename($uniqueFileName);
                                            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                                                $uploadedFiles[] = $uniqueFileName;
                                            }
                                        }
                                    }
                                
                                    // If no new files were uploaded, use the existing attachments
                                    if (empty($uploadedFiles)) {
                                        $existingAttachments = $read['attachments']; // Assuming $read contains the existing task data
                                        $uploadedFiles = explode(",", $existingAttachments);
                                    }
                                
                                    // Combine the uploaded files into a single string, separated by commas
                                    $new_file = implode(",", $uploadedFiles);
                                                                
                                    // update record into the database
                                    $UpdateQuery = "UPDATE tasks SET task_name='$task_name', emp_department='$emp_deptment', emp_designation='$emp_designation', task_assign_to='$assigneesString', reporting_member='$reportingMembersString', task_start_date_time='$task_start_date_time', task_end_date_time='$task_end_date_time', attachments='$new_file', task_desc='$task_desc' WHERE task_id='$id'";

                                    if (mysqli_query($db, $UpdateQuery)) {
                                        echo "<script>alert('Task Record Updated Successfully.')</script>";
                                        echo "<script>window.location.href='tasks.php'</script>";
                                    } else {
                                        echo "<script>alert('Error updating task record:')</script>";
                                        echo mysqli_error($db);
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
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
        <script src="main/js/vendors.min.js"></script>
        <script src="main/js/pages/chat-popup.js"></script>
        <script src="assets/icons/feather-icons/feather.min.js"></script>
        <!-- Novo Admin App -->
        <script src="main/js/template.js"></script>

        <script src="main/js/custom.js"></script>
        <script src="main/js/virtual-select.min.js"></script>
        <script>
            VirtualSelect.init({
                ele: '#multipleSelect'
            });
        </script>


</body>
<!-- Mirrored from novo-admin-template.multipurposethemes.com/main/forms_general.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 05:48:32 GMT -->

</html>