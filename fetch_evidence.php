<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../style.css">
<style>
body { margin: 0; padding: 20px; background: transparent; min-height: auto; }
table { box-shadow: none; background: transparent; border: none; }
body.light-theme table tbody tr:hover { background: rgba(59, 130, 246, 0.08); }
.loading { text-align: center; padding: 40px; color: var(--text-dark); font-size: 16px; }
</style>
</head>
<body>

<?php
include('db_connect.php');

$check_column = $conn->query("SHOW COLUMNS FROM evidence LIKE 'status'");
if ($check_column->num_rows > 0) {
    $sql = "SELECT * FROM evidence WHERE status = 'active' ORDER BY evidence_id DESC";
} else {
    $sql = "SELECT * FROM evidence ORDER BY evidence_id DESC";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Evidence ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Collected Date</th>
                    <th>Crime ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['evidence_id']) . "</td>
                <td>" . htmlspecialchars($row['evidence_type']) . "</td>
                <td>" . htmlspecialchars($row['description']) . "</td>
                <td>" . htmlspecialchars($row['collected_date']) . "</td>
                <td>" . htmlspecialchars($row['crime_id']) . "</td>
                <td><a href='delete_evidence.php?evidence_id=" . urlencode($row['evidence_id']) . "' onclick='return confirm(\"Are you sure?\")'>🗑️ Delete</a></td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='loading'>📭 No evidence found</div>";
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

