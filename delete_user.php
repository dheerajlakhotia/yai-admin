<?php
// Include the file with database connection
include 'includes/dbconfig.php';

// Check if user_id is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $user_id = htmlspecialchars($_GET['id']);

    // Delete associated records in the activities table
    $sql_delete_activities = "DELETE FROM activities WHERE user_id = ?";
    $stmt_delete_activities = $conn->prepare($sql_delete_activities);
    $stmt_delete_activities->bind_param('i', $user_id);
    $stmt_delete_activities->execute();
    $stmt_delete_activities->close();

    // Prepare a DELETE statement for the user
    $sql_delete_user = "DELETE FROM yai_users WHERE id = ?";
    $stmt_delete_user = $conn->prepare($sql_delete_user);
    $stmt_delete_user->bind_param('i', $user_id);

    // Execute the DELETE statement for the user
    if ($stmt_delete_user->execute()) {
        // User deleted successfully, redirect to the volunteer page
        header("Location: volenteer.php");
        exit; // Ensure that script execution stops after redirection
    } else {
        echo "Error: " . $stmt_delete_user->error;
    }

    // Close the statement
    $stmt_delete_user->close();
} else {
    // Redirect to an error page or display an error message
    echo "Invalid user ID.";
}

// Close the database connection
$conn->close();
?>