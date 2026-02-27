<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $case_id = trim($_POST['case_id']);
    $case_title = trim($_POST['case_title']);
    $start_date = trim($_POST['start_date']);
    $end_date = trim($_POST['end_date']);
    $investigation_status = trim($_POST['investigation_status']);
    $officer_id = trim($_POST['officer_id']);
    $crime_id = trim($_POST['crime_id']);

    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM cases LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Status column exists
        $stmt = $conn->prepare("INSERT INTO cases (case_id, case_title, start_date, end_date, investigation_status, officer_id, crime_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'active')");
        $stmt->bind_param("sssssss", $case_id, $case_title, $start_date, $end_date, $investigation_status, $officer_id, $crime_id);
    } else {
        // Status column doesn't exist
        $stmt = $conn->prepare("INSERT INTO cases (case_id, case_title, start_date, end_date, investigation_status, officer_id, crime_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $case_id, $case_title, $start_date, $end_date, $investigation_status, $officer_id, $crime_id);
    }

    if ($stmt->execute()) {
        echo "<div class='message success'>✅ Case added successfully!</div>";
        echo "<script>setTimeout(() => window.location.href='../cases.html', 1500);</script>";
    } else {
        echo "<div class='message error'>❌ Error: " . htmlspecialchars($stmt->error) . "</div>";
    }

    $stmt->close();
}
$conn->close();
?>
