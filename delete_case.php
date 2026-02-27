<?php
include('db_connect.php');

if (isset($_GET['case_id'])) {
    $case_id = $_GET['case_id'];
    
    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM cases LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Soft delete - mark as inactive
        $stmt = $conn->prepare("UPDATE cases SET status = 'inactive' WHERE case_id = ?");
        $stmt->bind_param("s", $case_id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Hard delete - remove from database
        $stmt = $conn->prepare("DELETE FROM cases WHERE case_id = ?");
        $stmt->bind_param("s", $case_id);
        $stmt->execute();
        $stmt->close();
    }
    
    header("Location: fetch_case.php");
}
$conn->close();
?>
