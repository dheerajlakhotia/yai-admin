<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Event</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Event</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container">
        <div class="card">
            <div class="card-body mt-4">
                <h2 class="text-center">Event Form</h2>
                <?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    // Escape user inputs for security
    $eventName = mysqli_real_escape_string($conn, $_POST['eventName']);
    $venue = mysqli_real_escape_string($conn, $_POST['venue']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // File upload handling
    $uploadDirectory = "../uploads/";
    $imageUrls = array();
    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'][0])) {
        $fileNames = $_FILES['image']['name'];
        $fileTmpNames = $_FILES['image']['tmp_name'];
        $fileError = $_FILES['image']['error'];

        foreach($fileTmpNames as $key => $fileTmpName) {
            if($fileError[$key] === 0) {
                $fileName = $fileNames[$key];
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $uniqueFileName = uniqid('', true) . "." . $fileExt;
                $fileDestination = $uploadDirectory . $uniqueFileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $imageUrl = $fileDestination;
                array_push($imageUrls, $imageUrl);
            }
        }
    }

    // Insert data into database
    $sql = "INSERT INTO events (event_name, venue, description, event_date) VALUES ('$eventName', '$venue', '$description', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Form not submitted!";
}
?>

                <form id="eventForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="eventName">Event Name:</label>
                        <input type="text" class="form-control" id="eventName" name="eventName" required>
                    </div>

                    <div class="form-group">
                        <label for="venue">Venue:</label>
                        <input type="text" class="form-control" id="venue" name="venue" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image[]" accept="image/*"
                            multiple>
                        <small class="form-text text-muted">You can upload up to 5 images.</small>
                        <div id="imagePreview" class="mt-2"></div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>

                <div class="mt-5">
                    <h2 class="text-center">All Events</h2>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="dateFilter">Filter by Date:</span>
                        <input type="date" class="form-control" aria-describedby="dateFilter">
                    </div>
                    <span>Total Events:150</span>
                    <div class="table-responsive">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="eventsTableBody">
                                <tr>
                                    <td>Event 1</td>
                                    <td>2024-04-11</td>
                                    <td>
                                        <span class="bi bi-pencil-square text-primary mr-2" title="Edit"
                                            onclick="editEvent('Event 1')"></span>
                                        <span class="bi bi-trash text-danger" title="Delete"
                                            onclick="deleteEvent('Event 1')"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Event 2</td>
                                    <td>2024-04-12</td>
                                    <td>
                                        <span class="bi bi-pencil-square text-primary mr-2" title="Edit"
                                            onclick="editEvent('Event 1')"></span>
                                        <span class="bi bi-trash text-danger" title="Delete"
                                            onclick="deleteEvent('Event 1')"></span>
                                    </td>
                                </tr>
                                <!-- More rows can be added dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>



<?php include 'includes/footer.php' ?>