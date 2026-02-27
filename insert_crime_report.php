<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_id = trim($_POST['report_id']);
    $crime_type = trim($_POST['crime_type']);
    $crime_date = trim($_POST['crime_date']);
    $location = trim($_POST['location']);
    $filed_by = trim($_POST['filed_by']);
    $status = trim($_POST['status']);
    $description = trim($_POST['description']);

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO crime_report (report_id, crime_type, crime_date, location, filed_by, status, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $report_id, $crime_type, $crime_date, $location, $filed_by, $status, $description);

    if ($stmt->execute()) {
        echo "<div class='message success'>✅ Crime report added successfully!</div>";
        echo "<script>setTimeout(() => window.location.href='../crime_reports.html', 1500);</script>";
    } else {
        echo "<div class='message error'>❌ Error: " . htmlspecialchars($stmt->error) . "</div>";
    }

    $stmt->close();
}
$conn->close();
?>
