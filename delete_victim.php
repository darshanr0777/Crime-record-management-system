<?php
include('db_connect.php');

if (isset($_GET['victim_id'])) {
    $victim_id = $_GET['victim_id'];
    
    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM victims LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Soft delete - mark as inactive
        $stmt = $conn->prepare("UPDATE victims SET status = 'inactive' WHERE victim_id = ?");
        $stmt->bind_param("s", $victim_id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Hard delete - remove from database
        $stmt = $conn->prepare("DELETE FROM victims WHERE victim_id = ?");
        $stmt->bind_param("s", $victim_id);
        $stmt->execute();
        $stmt->close();
    }
    
    header("Location: fetch_victim.php");
}
$conn->close();
?>
