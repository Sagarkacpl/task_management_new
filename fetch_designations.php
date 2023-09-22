<?php
session_start();
error_reporting(0);
include 'include/dbconn.php';
$admin_id = $_SESSION['admin_id'];
if (empty($admin_id)) {
    header('Location: index.php');
}
// Include your database connection code here
// e.g., require_once('db_connection.php');

if (isset($_POST['designations'])) {
    $designations = $_POST['designations'];

    // Perform a database query to fetch designations for the selected department using MySQLi
    $query = "SELECT * FROM designation WHERE department_name = '$designations'";
    $result = mysqli_query($db, $query);

    // Build the HTML options for the Designation dropdown
    $options = '<option value="">Select Designation</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= '<option value="' . $row['designation_name'] . '">' . $row['designation_name'] . '</option>';
    }

    echo $options;
}
?>