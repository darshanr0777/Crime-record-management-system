<?php
include('db_connect.php');

if (isset($_GET['station_id'])) {
    $station_id = $_GET['station_id'];
    
    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM police_station LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Soft delete - mark as inactive
        $stmt = $conn->prepare("UPDATE police_station SET status = 'inactive' WHERE station_id = ?");
        $stmt->bind_param("s", $station_id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Hard delete - remove from database
        $stmt = $conn->prepare("DELETE FROM police_station WHERE station_id = ?");
        $stmt->bind_param("s", $station_id);
        $stmt->execute();
        $stmt->close();
    }
    
    header("Location: fetch_police.php");
}
$conn->close();
?>
