<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $victim_id = trim($_POST['victim_id']);
    $name = trim($_POST['name']);
    $gender = trim($_POST['gender']);
    $address = trim($_POST['address']);
    $contact_no = trim($_POST['contact_no']);

    // Validate contact number: must be exactly 10 digits, numbers only
    if (!preg_match('/^\d{10}$/', $contact_no)) {
        echo "<div class='message error'>❌ Contact number must be exactly 10 digits and contain only numbers.</div>";
        exit();
    }

    // Check if status column exists
    $check_column = $conn->query("SHOW COLUMNS FROM victims LIKE 'status'");
    
    if ($check_column->num_rows > 0) {
        // Status column exists
        $stmt = $conn->prepare("INSERT INTO victims (victim_id, name, gender, address, contact_no, status) VALUES (?, ?, ?, ?, ?, 'active')");
        $stmt->bind_param("sssss", $victim_id, $name, $gender, $address, $contact_no);
    } else {
        // Status column doesn't exist
        $stmt = $conn->prepare("INSERT INTO victims (victim_id, name, gender, address, contact_no) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $victim_id, $name, $gender, $address, $contact_no);
    }

    if ($stmt->execute()) {
        echo "<div class='message success'>✅ Victim added successfully!</div>";
        echo "<script>setTimeout(() => window.location.href='../victims.html', 1500);</script>";
    } else {
        echo "<div class='message error'>❌ Error: " . htmlspecialchars($stmt->error) . "</div>";
    }

    $stmt->close();
}
$conn->close();
?>
