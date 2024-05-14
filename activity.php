<?php
require 'includes/header.php';
require 'includes/navbar.php';
require 'includes/sidebar.php';

// Initialize an array to store validation errors
$errors = array();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validation and sanitization
    $location = trim($_POST['location']);
    $description = trim($_POST['description']);
    $start_time = trim($_POST['start-time']);
    $end_time = trim($_POST['end-time']);

    // Validate location
    if (empty($location)) {
        $errors['location'] = "Location is required.";
    }

    // Validate description
    if (empty($description)) {
        $errors['description'] = "Description is required.";
    }

    // Validate start time
    if (empty($start_time)) {
        $errors['start-time'] = "Start time is required.";
    }

    // Validate end time
    if (empty($end_time)) {
        $errors['end-time'] = "End time is required.";
    }

    // File upload handling
    $targetDir = "../uploads/";
    $uploadedFiles = array();

    foreach ($_FILES['image']['name'] as $key => $value) {
        $fileName = basename($_FILES["image"]["name"][$key]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Check file size
        if ($_FILES["image"]["size"][$key] > 5000000) { // Adjust the file size limit as needed
            $errors['image'] = "Sorry, your file is too large.";
        }

        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($fileType, $allowedTypes)) {
            $errors['image'] = "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        }

        // Move uploaded file to target directory
        if (empty($errors['image'])) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $targetFilePath)) {
                $uploadedFiles[] = $fileName;
            } else {
                $errors['image'] = "Sorry, there was an error uploading your file.";
            }
        }
    }

    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        // Insert data into the database
        $sql = "INSERT INTO activities (user_id, location, description, start_time, end_time, images) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Assuming $user_id is the ID of the currently logged-in user
        $user_id = $_SESSION['user_id']; // Assuming you have user authentication and session management

        // Combine uploaded file names into a comma-separated string
        $images = implode(',', $uploadedFiles);

        $stmt->bind_param("sssss", $user_id, $location, $description, $start_time, $end_time, $images);

        if ($stmt->execute()) {
            echo "Activity shared successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
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

    <?php
    // Fetch locations from the database
    $sql = "SELECT LocationName FROM locations";
    $result = $conn->query($sql);

    // Initialize an array to store location options
    $locationOptions = array();

    // Fetch location options
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $locationOptions[] = $row['LocationName'];
        }
    }

    // Initialize an array to store validation errors
    $errors = array();

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Your existing validation and form submission code
    }

    ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body mt-4">
                <form id="activity-form" enctype="multipart/form-data" method="POST">
                    <!-- Form fields with error handling -->
                    <div class="mb-3">
                        <label for="location" class="form-label">Location:</label>
                        <select class="form-select" id="location" name="location">
                            <?php 
                            // Populate select options with fetched locations
                            foreach ($locationOptions as $location) {
                                echo "<option value='$location'>$location</option>";
                            }
                            ?>
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
                    <button type="submit" class="btn btn-primary">Share Activity</button>
                </form>
            </div>
            <div class="container mt-5">




                <?php

                // Pagination variables
                $rows_per_page = 10; // Number of rows per page
                $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1; // Get current page number, default is 1

                // Calculate offset for SQL query
                $offset = ($current_page - 1) * $rows_per_page;

                // Fetch total number of activities for the logged-in user from the database
                $user_id = $_SESSION['user_id'];
                $sql_count = "SELECT COUNT(*) AS total_activities FROM activities WHERE user_id = ?";
                $stmt_count = $conn->prepare($sql_count);
                $stmt_count->bind_param("s", $user_id);
                $stmt_count->execute();
                $result_count = $stmt_count->get_result();
                $row_count = $result_count->fetch_assoc();
                $total_activities = $row_count['total_activities'];

                // Calculate total pages
                $total_pages = ceil($total_activities / $rows_per_page);

                // Fetch activities for the logged-in user with pagination from the database
                $sql = "SELECT id, start_time, end_time, location, DATE(created_at) AS created_date FROM activities WHERE user_id = ? LIMIT ?, ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sii", $user_id, $offset, $rows_per_page);
                $stmt->execute();
                $result = $stmt->get_result();

                // Counter variable for S.No
                $start_number = ($current_page - 1) * $rows_per_page + 1;

                ?>
                <h1 class="mb-4">Shared Activity</h1>
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
                        <tbody>
                            <?php
                            // Display each activity as a table row

// Fetch activities for the logged-in user from the database
$sql = "SELECT id, start_time, end_time, location, DATE(created_at) AS created_date FROM activities WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Display each activity as a table row with an edit button
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $start_number++ . "</td>"; // Display the row number
    echo "<td>" . $row['start_time'] . " - " . $row['end_time'] . "</td>"; // Combine start time and end time
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['created_date'] . "</td>"; // Display the extracted date
    echo "<td>";
    echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editActivityModal" . $row['id'] . "'>Edit</button>";

    // Edit Activity Modal for this row
    echo "<div class='modal fade' id='editActivityModal" . $row['id'] . "' tabindex='-1' aria-labelledby='editActivityModalLabel" . $row['id'] . "' aria-hidden='true'>";
    echo "<div class='modal-dialog'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h5 class='modal-title' id='editActivityModalLabel" . $row['id'] . "'>Edit Activity</h5>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<form id='edit-activity-form" . $row['id'] . "' method='POST'>";
    // Form fields for editing activity
    echo "<input type='hidden' name='edit-activity-id' value='" . $row['id'] . "'>";
    echo "<div class='mb-3'>";
    echo "<label for='edit-location' class='form-label'>Location:</label>";
    echo "<input type='text' class='form-control' id='edit-location" . $row['id'] . "' name='edit-location' value='" . htmlspecialchars($row['location']) . "'>";
    echo "</div>";  
    echo "<div class='mb-3'>";
    echo "<label for='edit-description' class='form-label'>Description:</label>";
    echo "<textarea class='form-control' id='edit-description" . $row['id'] . "' name='edit-description' rows='4'>" . htmlspecialchars($row['Description']) . "</textarea>";
    echo "</div>";
    echo "<div class='row mb-3'>";
    echo "<div class='col-md-6'>";
    echo "<label for='edit-start-time' class='form-label'>Start Time:</label>";
    echo "<input class='form-control' type='time' id='edit-start-time" . $row['id'] . "' name='edit-start-time' value='" . htmlspecialchars($row['start_time']) . "'>";
    echo "</div>";
    echo "<div class='col-md-6'>";
    echo "<label for='edit-end-time' class='form-label'>End Time:</label>";
    echo "<input class='form-control' type='time' id='edit-end-time" . $row['id'] . "' name='edit-end-time' value='" . htmlspecialchars($row['end_time']) . "'>";
    echo "</div>";
    echo "</div>";
    // Add any other fields here, such as the image field
    echo "<button type='submit' class='btn btn-primary'>Update Activity</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
}
                            ?>
                        </tbody>
                    </table>
                </div>


                <!-- Edit Activity Modal -->
                <div class="modal fade" id="editActivityModal" tabindex="-1" aria-labelledby="editActivityModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editActivityModalLabel">Edit Activity</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="edit-activity-form" method="POST">
                                    <!-- Form fields for editing activity -->
                                    <input type="hidden" id="edit-activity-id" name="edit-activity-id">
                                    <div class="mb-3">
                                        <label for="edit-location" class="form-label">Location:</label>
                                        <input type="text" class="form-control" id="edit-location" name="edit-location"
                                            value="<?php echo isset($location) ? htmlspecialchars($location) : ''; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit-description" class="form-label">Description:</label>
                                        <textarea class="form-control" id="edit-description" name="edit-description"
                                            rows="4"><?php echo isset($description) ? htmlspecialchars($description) : ''; ?></textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="edit-start-time" class="form-label">Start Time:</label>
                                            <input class="form-control" type="time" id="edit-start-time"
                                                name="edit-start-time"
                                                value="<?php echo isset($start_time) ? htmlspecialchars($start_time) : ''; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="edit-end-time" class="form-label">End Time:</label>
                                            <input class="form-control" type="time" id="edit-end-time"
                                                name="edit-end-time"
                                                value="<?php echo isset($end_time) ? htmlspecialchars($end_time) : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit-image" class="form-label">Current Image:</label>
                                        <?php
                        // Loop through existing images and display them with delete buttons
                        foreach ($uploadedFiles as $image) {
                            echo "<div>$image <button type='button' class='btn btn-danger btn-sm'>Delete</button></div>";
                        }
                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit-image-upload" class="form-label">Upload New Images (Max
                                            5):</label>
                                        <input class="form-control" type="file" id="edit-image-upload"
                                            name="edit-image-upload[]" accept="image/*" multiple>
                                        <div id="edit-image-preview-container" class="mt-2"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Activity</button>
                                </form>
                            </div>
                        </div>
                    </div>
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