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

$sql = "SELECT * FROM crime_report ORDER BY report_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Report ID</th>
                    <th>Crime Type</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Filed By</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['report_id']) . "</td>
                <td>" . htmlspecialchars($row['crime_type']) . "</td>
                <td>" . htmlspecialchars($row['crime_date']) . "</td>
                <td>" . htmlspecialchars($row['location']) . "</td>
                <td>" . htmlspecialchars($row['filed_by']) . "</td>
                <td>" . htmlspecialchars($row['status']) . "</td>
                <td>" . htmlspecialchars($row['description']) . "</td>
                <td><a href='delete_crime_report.php?report_id=" . urlencode($row['report_id']) . "' onclick='return confirm(\"Are you sure?\")'>🗑️ Delete</a></td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='loading'>📭 No crime reports found</div>";
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
