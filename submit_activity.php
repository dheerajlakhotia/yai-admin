<?php
// Ensure session is started
session_start();
require_once 'includes/dbconfig.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validation and sanitization
    $location = $_POST['location'] ?? '';
    $description = $_POST['description'] ?? '';
    $start_time = $_POST['start-time'] ?? '';
    $end_time = $_POST['end-time'] ?? '';

    // Check if user ID is set in session
    if (!isset($_SESSION['user_id'])) {
        echo "Error: User ID not set in session.";
        exit();
    }

    $user_id = $_SESSION['user_id'];

   // File upload handling
$targetDir = "../uploads/";
$uploadedFiles = array();

if (!empty($_FILES['image']['name'])) {
    foreach ($_FILES['image']['name'] as $key => $value) {
        $fileName = basename($_FILES["image"]["name"][$key]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check file size and allowed types (you can customize these as needed)
        if ($_FILES["image"]["size"][$key] <= 5000000 && in_array($fileType, array('jpg', 'jpeg', 'png', 'gif'))) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)) {
                $uploadedFiles[] = $targetFilePath; // Store file path instead of file name
            } else {
                echo "Error uploading file: " . $_FILES["image"]["error"][$key];
                exit; // Exit the script if file upload fails
            }
        } else {
            echo "Invalid file: " . $_FILES["image"]["name"][$key];
            exit; // Exit the script if file size or type is invalid
        }
    }
}

// Insert data into the database
$sql = "INSERT INTO activities (user_id, location, description, start_time, end_time, images) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $user_id, $location, $description, $start_time, $end_time, $images);

// Assume $user_id is the ID of the currently logged-in user
$user_id = $_SESSION['user_id'] ?? null; // Assuming you have user authentication and session management
$images = implode(',', $uploadedFiles); // Store the uploaded file paths as a comma-separated string
    if ($stmt->execute()) {
?>
<div class="alert alert-success" role="alert">
    Activity shared successfully!
</div>
<?php
    } else {
?>
<div class="alert alert-danger" role="alert">
    Error sharing activity: <?php echo $stmt->error; ?>
</div>
<?php
    }
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted via POST method, return an error message
?>
<div class="alert alert-danger" role="alert">
    Error: Form not submitted.
</div>
<?php
}
?>