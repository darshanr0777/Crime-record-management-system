<?php
session_start();
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Backdoor access for demo
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['username'] = 'admin';
        $_SESSION['role'] = 'Administrator';
        $_SESSION['user_id'] = 'ADMIN';
        
        header("Location: ../dashboard.php");
        exit();
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM officers WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // ✅ Successful login
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['user_id'] = $user['user_id'];

        header("Location: ../dashboard.php");
        exit();
    } else {
        // ❌ Invalid credentials
        echo "<script>
                alert('Invalid Username or Password');
                window.location.href='../index.html';
              </script>";
    }

    $stmt->close();
}
$conn->close();
?>
