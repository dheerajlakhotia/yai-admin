<?php
session_start(); // Start the session

// Check if the user is logged in and has the appropriate role
if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) {
    // Include necessary files
    require 'includes/header.php';
    require 'includes/navbar.php';
    require 'includes/sidebar.php';

 

    // Check if there is any data in the table
    $result = $conn->query("SELECT COUNT(*) as count FROM aboutus");
    $row = $result->fetch_assoc();
    $count = $row['count'];

    // Form submission handling
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Image upload
        $target_dir = "../uploads/"; // Folder where images will be stored
        $target_file = $target_dir . basename($_FILES["Image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["Image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["Image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["Image"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // Check if there is any data in the table
        if ($count > 0) {
            // Data exists, perform update query
            $update_sql = "UPDATE aboutus SET title = ?, description = ?, image = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("sss", $title, $description, $target_file);
            if ($update_stmt->execute()) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $update_stmt->error;
            }
            $update_stmt->close();
        } else {
            // No data exists, perform insert query
            $insert_sql = "INSERT INTO aboutus (title, description, image) VALUES (?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("sss", $title, $description, $target_file);
            if ($insert_stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error inserting record: " . $insert_stmt->error;
            }
            $insert_stmt->close();
        }

        // Close connection
        $conn->close();
    }
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
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Description: </label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="locationImage" class="form-label">Image: </label>
                        <input type="file" class="form-control" id="Image" name="Image">
                    </div>

                    <!-- Add other form elements as needed -->

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>


    </div>
</main>

<?php include 'includes/footer.php'; ?>

<?php
} else {
    // Redirect or show a message indicating no access
   echo "<h2>You have no access</h2>";
    exit; // Stop script execution
}
?>