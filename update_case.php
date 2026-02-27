<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $case_id = $_POST['case_id'];
    $case_title = $_POST['case_title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $investigation_status = $_POST['investigation_status'];
    $officer_id = $_POST['officer_id'];
    $crime_id = $_POST['crime_id'];

    $sql = "UPDATE cases SET 
            case_title='$case_title', start_date='$start_date', end_date='$end_date',
            investigation_status='$investigation_status', officer_id='$officer_id', crime_id='$crime_id'
            WHERE case_id='$case_id'";

    echo ($conn->query($sql)) ? "✅ Case updated!" : "❌ Error: " . $conn->error;
}
$conn->close();
?>
