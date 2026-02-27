<?php include('backend/session_check.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard - Crime Management System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-container">
    <header>
        <h2>Crime Record Management System</h2>
        <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!</p>
    </header>

    <div class="menu">
        <a href="police.html">🏢 Police Stations</a>
        <a href="officers.html">👮 Officers</a>
        <a href="crime_reports.html">🧾 Crime Reports</a>
        <a href="cases.html">⚖️ Cases</a>
        <a href="victims.html">🧍 Victims</a>
        <a href="criminals.html">🧑‍⚖️ Criminals</a>
        <a href="evidence.html">🧩 Evidence</a>
    </div>

    <div class="logout">
        <a href="backend/logout.php">Logout</a>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
