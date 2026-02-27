<?php
session_start();     // Start the session
session_unset();     // Remove all session variables
session_destroy();   // Destroy the entire session

// Redirect user back to login page
header("Location: ../index.html");
exit();
?>
