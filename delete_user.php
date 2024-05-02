<?php
// Include the file with database connection
include 'includes/dbconfig.php';

// Check if user_id is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $user_id = htmlspecialchars($_GET['id']);

    // Prepare a DELETE statement
    $sql = "DELETE FROM yai_users WHERE id = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param('i', $user_id);

    // Execute the statement
    if ($stmt->execute()) {
        // User deleted successfully, redirect to the volunteer page
        header("Location: volenteer.php");
        exit; // Ensure that script execution stops after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect to an error page or display an error message
    echo "Invalid user ID.";
}

// Close the database connection
$conn->close();
?>