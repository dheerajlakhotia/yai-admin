<?php
require 'includes/header.php';
require 'includes/navbar.php';
require 'includes/sidebar.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validation and sanitization
    $location = $_POST['location'];
    $description = $_POST['description'];
    $start_time = $_POST['start-time'];
    $end_time = $_POST['end-time'];

    // File upload handling
    $targetDir = "../uploads/";
    $uploadOk = 1;
    $uploadedFiles = array();

    foreach ($_FILES['image']['name'] as $key => $value) {
        $fileName = basename($_FILES["image"]["name"][$key]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check file size
        if ($_FILES["image"]["size"][$key] > 5000000) { // Adjust the file size limit as needed
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($fileType, $allowedTypes)) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)) {
                $uploadedFiles[] = $fileName;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO activities (user_id, location, description, start_time, end_time, images) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $user_id, $location, $description, $start_time, $end_time, $images);

    // Assume $user_id is the ID of the currently logged-in user
    $user_id = $_SESSION['user_id']; // Assuming you have user authentication and session management
    var_dump($_SESSION['user_id']); 
    $images = implode(',', $uploadedFiles); // Store the uploaded filenames as a comma-separated string
    if ($stmt->execute()) {
        echo "Activity shared successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Activity</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Activity</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body mt-4">
                <form id="activity-form" enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <label for="location" class="form-label">Location:</label>
                        <select class="form-select" id="location" name="location">
                            <option value="mp_colony">MP Colony</option>
                            <option value="jailroad">Jailroad</option>
                            <option value="pawanpuri">Pawanpuri</option>
                            <option value="sagar">Sagar</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Describe Your Activity:</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start-time" class="form-label">Start Time:</label>
                            <input class="form-control" type="time" id="start-time" name="start-time">
                        </div>
                        <div class="col-md-6">
                            <label for="end-time" class="form-label">End Time:</label>
                            <input class="form-control" type="time" id="end-time" name="end-time">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Images (Max 5):</label>
                        <input class="form-control" type="file" id="image" name="image[]" accept="image/*" multiple>
                        <div id="image-preview-container" class="mt-2"></div>
                    </div>
                    <button type="button" id="submit-btn" class="btn btn-primary">Share Activity</button>
                </form>
            </div>
            <?php
// Include your database configuration and establish a database connection

// Check if the delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_activity"])) {
    // Get the activity ID to delete
    $activityId = $_POST["activity_id"];

    // Prepare and execute the SQL statement to delete the activity
    $sql = "DELETE FROM activities WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activityId);
    if ($stmt->execute()) {
        // Return a success message
        echo "Activity deleted successfully!";
    } else {
        // Return an error message
        echo "Error deleting activity: " . $stmt->error;
    }
    exit; // Exit to prevent further output
}
?>

            <?php
// Fetch total number of drives for the logged-in user from the database
$user_id = $_SESSION['user_id'];
$sql_count = "SELECT COUNT(*) AS total_drives FROM activities WHERE user_id = ?";
$stmt_count = $conn->prepare($sql_count);
$stmt_count->bind_param("s", $user_id);
$stmt_count->execute();
$result_count = $stmt_count->get_result();
$row_count = $result_count->fetch_assoc();
$total_drives = $row_count['total_drives'];

// Pagination variables
$rows_per_page = 10; // Number of rows per page
$total_pages = ceil($total_drives / $rows_per_page); // Calculate total pages
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; // Get current page number, default is 1
$offset = ($current_page - 1) * $rows_per_page; // Calculate offset for SQL query

// Fetch activities for the logged-in user with pagination from the database
$sql = "SELECT start_time, end_time, location, DATE(created_at) AS created_date FROM activities WHERE user_id = ? LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $user_id, $offset, $rows_per_page);
$stmt->execute();
$result = $stmt->get_result();

// Counter variable for S.No
$start_number = ($current_page - 1) * $rows_per_page + 1;
?>

            <div class="container mt-5">
                <h1 class="mb-4">Shared Activity</h1>
                <small>Total Drives: <?php echo $total_drives; ?></small>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Time Interval</th>
                                <th>Location</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="activityTableBody">
                            <?php
                // Display each activity as a table row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $start_number++ . "</td>"; // Display the row number
                    echo "<td>" . $row['start_time'] . " - " . $row['end_time'] . "</td>"; // Combine start time and end time
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['created_date'] . "</td>"; // Display the extracted date
                    echo "<td>";
                    echo "<button type='button' class='btn btn-link'><i class='bi bi-pencil-fill'></i></button>";
                    
                    echo "<button type='submit' class='btn btn-link' name='delete_activity'><i class='bi bi-trash-fill' style='color: red;'></i></button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination links -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
                        <li class="page-item <?php if ($page === $current_page) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>








        </div>
    </div>




</main>


<?php include 'includes/footer.php' ?>