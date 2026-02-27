<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evidence_id = $_POST['evidence_id'];
    $evidence_type = $_POST['evidence_type'];
    $description = $_POST['description'];
    $collected_date = $_POST['collected_date'];
    $crime_id = $_POST['crime_id'];

    $sql = "UPDATE evidence SET 
            evidence_type='$evidence_type', description='$description', 
            collected_date='$collected_date', crime_id='$crime_id'
            WHERE evidence_id='$evidence_id'";

    echo ($conn->query($sql)) ? "✅ Evidence updated!" : "❌ Error: " . $conn->error;
}
$conn->close();
?>
