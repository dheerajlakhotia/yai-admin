<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<?php
// Initialize variables
$title = '';
$description = '';

// Check if form is submitted and use POST method
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Escape user input to prevent SQL injection
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle file upload
    $imageUpload = $_FILES['Image'];
    $imageFilename = "";

    if ($imageUpload['error'] === UPLOAD_ERR_OK) {
        $imageFilename = $imageUpload['name'];
        $imageDestination = "../uploads/" . $imageFilename;

        // Debugging: Print out the filename and destination
        echo "Filename: " . $imageFilename . "<br>";
        echo "Destination: " . $imageDestination . "<br>";

        // Check if the file has been successfully uploaded
        if (move_uploaded_file($imageUpload['tmp_name'], $imageDestination)) {
            // File successfully moved to uploads folder
            echo "File uploaded successfully.";
        } else {
            // Failed to move the file
            echo "Error: Failed to move the file to the uploads folder.";
        }
    } else {
        // Error during file upload
        echo "Error: " . $imageUpload['error'];
    }

    // Check if data exists
    $checkQuery = "SELECT * FROM aboutus";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Update data
        $sql = "UPDATE aboutus 
                SET description = '$description', 
                    image = '$imageFilename' 
                WHERE 26";  // Assuming you have a unique identifier for update

        if (mysqli_query($conn, $sql)) {
            echo "Data updated successfully!";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    } else {
        // Insert data
        $sql = "INSERT INTO aboutus (title, description, image) 
                VALUES ('$title', '$description', '$imageFilename')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully!";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>









<main id="main" class="main">
    <div class="pagetitle">
        <h1>About</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container-fluid">
        <!-- Use container-fluid for full width -->

        <!-- General Form Elements -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">About Us</h5>

                <form enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Title: </label>
                        <input type="text" class="form-control" name="title" value="<?php echo $title ?>">
                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Description: </label>
                        <input type="text" class="form-control" name="description" value="<?php echo $description ?>">
                    </div>
                    <div class="mb-3">
                        <label for="locationImage" class="form-label">Image: </label>
                        <input type="file" class="form-control" id="Image" name="Image">
                    </div>

                    <!-- Hidden field to store the ID of the record to update -->
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <!-- Add other form elements as needed -->

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>

    </div><!-- End container-fluid -->
    <div class="card-body">
        <h5 class="card-title">Edit About Us</h5>

        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Opration</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lorem ipsum dolor sit...</td>
                    <td>
                        <a href="#" class="mx-3"><i class="bi bi-pencil"></i></a>
                        <a href="#"><i class="bi bi-trash" style="color: red;"></i></a>

                    </td>

                </tr>

            </tbody>
        </table>
        <!-- End Default Table Example -->
    </div>
</main>


<?php include 'includes/footer.php' ?>