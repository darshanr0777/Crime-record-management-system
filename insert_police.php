<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $station_id = trim($_POST['station_id']);
    $name = trim($_POST['name']);
    $location = trim($_POST['location']);
    $contact_no = trim($_POST['contact_no']);

    // Validate contact number: must be exactly 10 digits, numbers only
    if (!preg_match('/^\d{10}$/', $contact_no)) {
        echo "<div class='message error'>❌ Contact number must be exactly 10 digits and contain only numbers.</div>";
        exit();
    }

    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM police_station LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Status column exists
        $stmt = $conn->prepare("INSERT INTO police_station (station_id, name, location, contact_no, status) VALUES (?, ?, ?, ?, 'active')");
        $stmt->bind_param("ssss", $station_id, $name, $location, $contact_no);
    } else {
        // Status column doesn't exist
        $stmt = $conn->prepare("INSERT INTO police_station (station_id, name, location, contact_no) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $station_id, $name, $location, $contact_no);
    }

    if ($stmt->execute()) {
        echo "<div class='message success'>✅ Police Station added successfully!</div>";
        echo "<script>setTimeout(() => window.location.href='../police.html', 1500);</script>";
    } else {
        echo "<div class='message error'>❌ Error: " . htmlspecialchars($stmt->error) . "</div>";
    }

    $stmt->close();
}
$conn->close();
?>
