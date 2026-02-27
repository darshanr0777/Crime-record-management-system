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

$check_column = $conn->query("SHOW COLUMNS FROM cases LIKE 'status'");
if ($check_column->num_rows > 0) {
    $sql = "SELECT * FROM cases WHERE status = 'active' ORDER BY case_id DESC";
} else {
    $sql = "SELECT * FROM cases ORDER BY case_id DESC";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Case ID</th>
                    <th>Case Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Officer ID</th>
                    <th>Crime ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['case_id']) . "</td>
                <td>" . htmlspecialchars($row['case_title']) . "</td>
                <td>" . htmlspecialchars($row['start_date']) . "</td>
                <td>" . htmlspecialchars($row['end_date']) . "</td>
                <td>" . htmlspecialchars($row['investigation_status']) . "</td>
                <td>" . htmlspecialchars($row['officer_id']) . "</td>
                <td>" . htmlspecialchars($row['crime_id']) . "</td>
                <td><a href='delete_case.php?case_id=" . urlencode($row['case_id']) . "' onclick='return confirm(\"Are you sure?\")'>🗑️ Delete</a></td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='loading'>📭 No cases found</div>";
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
