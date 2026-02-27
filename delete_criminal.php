<?php
include('db_connect.php');

if (isset($_GET['criminal_id'])) {
    $criminal_id = $_GET['criminal_id'];
    
    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM criminals LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Soft delete - mark as inactive
        $stmt = $conn->prepare("UPDATE criminals SET status = 'inactive' WHERE criminal_id = ?");
        $stmt->bind_param("s", $criminal_id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Hard delete - remove from database
        $stmt = $conn->prepare("DELETE FROM criminals WHERE criminal_id = ?");
        $stmt->bind_param("s", $criminal_id);
        $stmt->execute();
        $stmt->close();
    }
    
    header("Location: fetch_criminal.php");
}
$conn->close();
?>
