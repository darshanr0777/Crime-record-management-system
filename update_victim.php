<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $victim_id = $_POST['victim_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];

    // Validate contact number: must be exactly 10 digits, numbers only
    if (!preg_match('/^\d{10}$/', $contact_no)) {
        echo "<div class='message error'>❌ Contact number must be exactly 10 digits and contain only numbers.</div>";
        exit();
    }

    $sql = "UPDATE victims SET 
            name='$name', gender='$gender', address='$address', contact_no='$contact_no'
            WHERE victim_id='$victim_id'";

    echo ($conn->query($sql)) ? "✅ Victim updated!" : "❌ Error: " . $conn->error;
}
$conn->close();
?>
