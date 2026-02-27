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
</style>
</head>
<body>

<?php
include('db_connect.php');

// Check if status column exists
$check_column = $conn->query("SHOW COLUMNS FROM criminals LIKE 'status'");
if ($check_column->num_rows > 0) {
    $sql = "SELECT * FROM criminals WHERE status = 'active' ORDER BY criminal_id DESC";
} else {
    $sql = "SELECT * FROM criminals ORDER BY criminal_id DESC";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Criminal ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Crime History</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['criminal_id']) . "</td>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['gender']) . "</td>
                <td>" . htmlspecialchars($row['age']) . "</td>
                <td>" . htmlspecialchars($row['address']) . "</td>
                <td>" . htmlspecialchars($row['crime_history']) . "</td>
                <td><a href='delete_criminal.php?criminal_id=" . urlencode($row['criminal_id']) . "' onclick='return confirm(\"Are you sure you want to remove this criminal?\")'>🗑️ Delete</a></td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='loading'>📭 No criminals found</div>";
}
$conn->close();
?>

<script>
if (window.parent.document.body.classList.contains('light-theme')) {
    document.body.classList.add('light-theme');
}
</script>

</body>
</html>
