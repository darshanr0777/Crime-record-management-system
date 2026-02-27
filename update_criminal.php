<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $criminal_id = $_POST['criminal_id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $crime_history = $_POST['crime_history'];
    $photo = $_FILES['photo']['name'];
    $target = "../uploads/" . basename($photo);

    if (!empty($photo)) move_uploaded_file($_FILES['photo']['tmp_name'], $target);

    $sql = "UPDATE criminals SET 
            name='$name', gender='$gender', age='$age', address='$address', crime_history='$crime_history',
            photo='$photo' WHERE criminal_id='$criminal_id'";

    echo ($conn->query($sql)) ? "✅ Criminal updated!" : "❌ Error: " . $conn->error;
}
$conn->close();
?>
