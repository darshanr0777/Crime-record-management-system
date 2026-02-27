<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../style.css">
<style>
body {
    margin: 0;
    padding: 20px;
    background: transparent;
    min-height: auto;
}

table {
    box-shadow: none;
    background: transparent;
    border: none;
}

body.light-theme table tbody tr:hover {
    background: rgba(59, 130, 246, 0.08);
}

.loading {
    text-align: center;
    padding: 40px;
    color: var(--text-dark);
    font-size: 16px;
}

.loading::after {
    content: '...';
    animation: dots 1.5s infinite;
}

@keyframes dots {
    0%, 20% { content: '.'; }
    40% { content: '..'; }
    60%, 100% { content: '...'; }
}
</style>
</head>
<body>

<?php
include('db_connect.php');

// Check if status column exists
$check_column = $conn->query("SHOW COLUMNS FROM officers LIKE 'status'");
if ($check_column->num_rows > 0) {
    $sql = "SELECT * FROM officers WHERE status = 'active' ORDER BY user_id DESC";
} else {
    $sql = "SELECT * FROM officers ORDER BY user_id DESC";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Username</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['user_id']) . "</td>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['role']) . "</td>
                <td>" . htmlspecialchars($row['username']) . "</td>
                <td>" . htmlspecialchars($row['contact_no']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td><a href='delete_officer.php?user_id=" . urlencode($row['user_id']) . "' onclick='return confirm(\"Are you sure you want to remove this officer?\")'>🗑️ Delete</a></td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='loading'>📭 No officers found</div>";
}
$conn->close();
?>

<script>
// Sync theme with parent
if (window.parent.document.body.classList.contains('light-theme')) {
    document.body.classList.add('light-theme');
}

// Listen for theme changes
window.addEventListener('storage', function(e) {
    if (e.key === 'theme') {
        document.body.classList.toggle('light-theme', e.newValue === 'light');
    }
});
</script>

</body>
</html>

