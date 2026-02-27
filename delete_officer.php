<?php
include('db_connect.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM officers LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Soft delete - mark as inactive
        $stmt = $conn->prepare("UPDATE officers SET status = 'inactive' WHERE user_id = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Hard delete - remove from database
        $stmt = $conn->prepare("DELETE FROM officers WHERE user_id = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $stmt->close();
    }
    
    header("Location: fetch_officer.php");
}
$conn->close();
?>
