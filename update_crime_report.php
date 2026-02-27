<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_id = $_POST['report_id'];
    $crime_type = $_POST['crime_type'];
    $crime_date = $_POST['crime_date'];
    $location = $_POST['location'];
    $filed_by = $_POST['filed_by'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    $sql = "UPDATE crime_report SET 
            crime_type='$crime_type', crime_date='$crime_date', location='$location',
            filed_by='$filed_by', status='$status', description='$description'
            WHERE report_id='$report_id'";

    echo ($conn->query($sql)) ? "✅ Report updated!" : "❌ Error: " . $conn->error;
}
$conn->close();
?>
