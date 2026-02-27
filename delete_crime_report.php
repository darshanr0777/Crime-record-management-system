<?php
include('db_connect.php');

if (isset($_GET['report_id'])) {
    $report_id = $_GET['report_id'];
    
    $stmt = $conn->prepare("DELETE FROM crime_report WHERE report_id = ?");
    $stmt->bind_param("s", $report_id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: fetch_crime_report.php");
}
$conn->close();
?>
