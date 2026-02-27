<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $criminal_id = trim($_POST['criminal_id']);
    $name = trim($_POST['name']);
    $gender = trim($_POST['gender']);
    $age = trim($_POST['age']);
    $address = trim($_POST['address']);
    $crime_history = trim($_POST['crime_history']);

    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM criminals LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Status column exists
        $stmt = $conn->prepare("INSERT INTO criminals (criminal_id, name, gender, age, address, crime_history, status) VALUES (?, ?, ?, ?, ?, ?, 'active')");
        $stmt->bind_param("sssiss", $criminal_id, $name, $gender, $age, $address, $crime_history);
    } else {
        // Status column doesn't exist
        $stmt = $conn->prepare("INSERT INTO criminals (criminal_id, name, gender, age, address, crime_history) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiss", $criminal_id, $name, $gender, $age, $address, $crime_history);
    }

    if ($stmt->execute()) {
        echo "<div class='message success'>✅ Criminal added successfully!</div>";
        echo "<script>setTimeout(() => window.location.href='../criminals.html', 1500);</script>";
    } else {
        echo "<div class='message error'>❌ Error: " . htmlspecialchars($stmt->error) . "</div>";
    }

    $stmt->close();
}
$conn->close();
?>
