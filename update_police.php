<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $station_id = $_POST['station_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $contact_no = $_POST['contact_no'];

    // Validate contact number: must be exactly 10 digits, numbers only
    if (!preg_match('/^\d{10}$/', $contact_no)) {
        echo "<div class='message error'>❌ Contact number must be exactly 10 digits and contain only numbers.</div>";
        exit();
    }

    $sql = "UPDATE police_station SET 
            name='$name', location='$location', contact_no='$contact_no'
            WHERE station_id='$station_id'";

    echo ($conn->query($sql)) ? "✅ Updated successfully!" : "❌ Error: " . $conn->error;
}
$conn->close();
?>
