<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = trim($_POST['user_id']);
    $name = trim($_POST['name']);
    $role = trim($_POST['role']);
    $username = trim($_POST['username']);
    $contact_no = trim($_POST['contact_no']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate contact number: must be exactly 10 digits, numbers only
    if (!preg_match('/^\d{10}$/', $contact_no)) {
        echo "<div class='message error'>❌ Contact number must be exactly 10 digits and contain only numbers.</div>";
        exit();
    }

    // Prepared statement for UPDATE operation
    $stmt = $conn->prepare("UPDATE officers SET name = ?, role = ?, username = ?, contact_no = ?, email = ?, password = ? WHERE user_id = ?");
    $stmt->bind_param("sssssss", $name, $role, $username, $contact_no, $email, $password, $user_id);

    if ($stmt->execute()) {
        echo "<div class='message success'>✅ Officer updated successfully!</div>";
        echo "<script>setTimeout(() => window.location.href='../officers.html', 1500);</script>";
    } else {
        echo "<div class='message error'>❌ Error: " . htmlspecialchars($stmt->error) . "</div>";
    }

    $stmt->close();
}
$conn->close();
?>
