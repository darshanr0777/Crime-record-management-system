<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evidence_id = trim($_POST['evidence_id']);
    $evidence_type = trim($_POST['evidence_type']);
    $description = trim($_POST['description']);
    $collected_date = trim($_POST['collected_date']);
    $crime_id = trim($_POST['crime_id']);

    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM evidence LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Status column exists
        $stmt = $conn->prepare("INSERT INTO evidence (evidence_id, evidence_type, description, collected_date, crime_id, status) VALUES (?, ?, ?, ?, ?, 'active')");
        $stmt->bind_param("sssss", $evidence_id, $evidence_type, $description, $collected_date, $crime_id);
    } else {
        // Status column doesn't exist
        $stmt = $conn->prepare("INSERT INTO evidence (evidence_id, evidence_type, description, collected_date, crime_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $evidence_id, $evidence_type, $description, $collected_date, $crime_id);
    }

    if ($stmt->execute()) {
        echo "<div class='message success'>✅ Evidence added successfully!</div>";
        echo "<script>setTimeout(() => window.location.href='../evidence.html', 1500);</script>";
    } else {
        echo "<div class='message error'>❌ Error: " . htmlspecialchars($stmt->error) . "</div>";
    }

    $stmt->close();
}
$conn->close();
?>
