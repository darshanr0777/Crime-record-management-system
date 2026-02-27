<?php
include('db_connect.php');

if (isset($_GET['evidence_id'])) {
    $evidence_id = $_GET['evidence_id'];
    
    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM evidence LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Soft delete - mark as inactive
        $stmt = $conn->prepare("UPDATE evidence SET status = 'inactive' WHERE evidence_id = ?");
        $stmt->bind_param("s", $evidence_id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Hard delete - remove from database
        $stmt = $conn->prepare("DELETE FROM evidence WHERE evidence_id = ?");
        $stmt->bind_param("s", $evidence_id);
        $stmt->execute();
        $stmt->close();
    }
    
    header("Location: fetch_evidence.php");
}
$conn->close();
?>
