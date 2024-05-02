<?php
require 'includes/header.php';
require 'includes/navbar.php';
require 'includes/sidebar.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $locationName = $_POST['locationName'];
    $description = $_POST['description'];
    $totalChildrens = $_POST['totalChildrens'];
    $totalVolunteers = $_POST['totalVolunteers'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    // File upload handling
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES["locationImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["locationImage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["locationImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["locationImage"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["locationImage"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert data into the locations table using prepared statements
    $insertQuery = $conn->prepare("INSERT INTO locations (LocationName, Description, TotalChildren, TotalVolunteers, City, State, LocationImage) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    $insertQuery->bind_param("ssiiiss", $locationName, $description, $totalChildrens, $totalVolunteers, $city, $state, $targetFile);

    // Execute the prepared statement
    if ($insertQuery->execute()) {
        // Redirect to the same page after successful insertion
        header("Location: location.php");
        exit();
    } else {
        echo "Error: " . $insertQuery->error;
    }

    // Close the prepared statement
    $insertQuery->close();

    // Close the database connection
    $conn->close();
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Location</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Location</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- F.A.Q Group 2 and General Form Elements -->
    <div class="container-fluid">
        <!-- Use container-fluid for full width -->

        <!-- General Form Elements -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Location</h5>

                <form enctype="multipart/form-data" method="post"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="locationName" class="form-label">Location Name:</label>
                        <input type="text" class="form-control" id="locationName" name="locationName">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="totalChildrens" class="form-label">Total Childrens:</label>
                        <input type="text" class="form-control" id="totalChildrens" name="totalChildrens">
                    </div>
                    <div class="mb-3">
                        <label for="totalVolunteers" class="form-label">Total Volunteers:</label>
                        <input type="text" class="form-control" id="totalVolunteers" name="totalVolunteers">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City:</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="state" class="form-label">State:</label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="locationImage" class="form-label">Location Image:</label>
                        <input type="file" class="form-control" id="locationImage" name="locationImage">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Add Location</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End container-fluid -->

    <div class="card-body">
        <h5 class="card-title">Default Table</h5>
        <span>Total Location: 4</span>
        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Location</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>mdv colony</td>
                    <td>
                        <span class="bi bi-pencil-square text-primary" title="Edit"></span>
                        <span class="bi bi-trash text-danger" title="Delete"></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- End Default Table Example -->
    </div>
</main>

<?php include 'includes/footer.php' ?>