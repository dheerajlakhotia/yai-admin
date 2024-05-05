<?php
require 'includes/dbconfig.php'; // Include your database connection file

// Check if the delete button is clicked
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_activity"])) {
    // Get the activity ID to delete
    $activityId = $_POST["activity_id"];

    // Prepare and execute the SQL statement to delete the activity
    $sql = "DELETE FROM activities WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activityId);
    
    if ($stmt->execute()) {
        // Redirect back to the activity page
        header("Location: activity.php");
        exit;
    } else {
        // Return an error message
        echo "Error deleting activity: " . $stmt->error;
    }
} else {
    // Invalid request
    http_response_code(400);
    exit();
}
?>