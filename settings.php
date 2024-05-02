<?php
require 'includes/header.php';
require 'includes/navbar.php';
require 'includes/sidebar.php';

// Initialize variables
$metaDescription = '';
$metaTags = '';
$contactNumber = '';
$contactEmail = '';
$address = '';
$facebook = '';
$twitter = '';
$instagram = '';
$youtube = '';

// Check if form is submitted and use POST method (avoid hardcoding)
if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['submitGeneralDetails'])) {
    // Escape user input to prevent SQL injection (security best practice)
    $metaDescription = isset($_POST['metaDescription']) ? mysqli_real_escape_string($conn, $_POST['metaDescription']) : '';
    $metaTags = isset($_POST['metaTags']) ? mysqli_real_escape_string($conn, $_POST['metaTags']) : '';
    $contactNumber = isset($_POST['contactNumber']) ? mysqli_real_escape_string($conn, $_POST['contactNumber']) : '';
    $contactEmail = isset($_POST['contactEmail']) ? mysqli_real_escape_string($conn, $_POST['contactEmail']) : '';
    $address = isset($_POST['Address']) ? mysqli_real_escape_string($conn, $_POST['Address']) : '';
    $facebook = isset($_POST['socialMediaFacebook']) ? mysqli_real_escape_string($conn, $_POST['socialMediaFacebook']) : '';
    $twitter = isset($_POST['socialMediaTwitter']) ? mysqli_real_escape_string($conn, $_POST['socialMediaTwitter']) : '';
    $instagram = isset($_POST['socialMediaInstagram']) ? mysqli_real_escape_string($conn, $_POST['socialMediaInstagram']) : '';
    $youtube = isset($_POST['socialMediaYoutube']) ? mysqli_real_escape_string($conn, $_POST['socialMediaYoutube']) : '';

    // SQL query to insert or update data
    $checkQuery = "SELECT * FROM general_details";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Update data
        $sql = "UPDATE general_details 
                  SET meta_description = '$metaDescription', 
                      meta_tags = '$metaTags', 
                      contact_number = '$contactNumber', 
                      contact_email = '$contactEmail', 
                      address = '$address', 
                      facebook = '$facebook', 
                      twitter = '$twitter', 
                      instagram = '$instagram', 
                      youtube = '$youtube'
                  WHERE 1";  // Assuming you have a unique identifier for update

        if (mysqli_query($conn, $sql)) {
            echo "Data updated successfully!";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    } else {
        // Insert data
        $sql = "INSERT INTO general_details 
                  (meta_description, meta_tags, contact_number, contact_email, address, facebook, twitter, instagram, youtube) 
                  VALUES 
                  ('$metaDescription', '$metaTags', '$contactNumber', '$contactEmail', '$address', '$facebook', '$twitter', '$instagram', '$youtube')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully!";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Settings</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="card">
            <div class="card-body mt-4">
                <h2 class="card-title">General Settings</h2>
                <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="metaDescription">Meta Description</label>
                        <textarea class="form-control" id="metaDescription" name="metaDescription" rows="3"
                            placeholder="Use 150 words only"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="metaTags">Meta Tags</label>
                        <input type="text" class="form-control" id="metaTags" name="metaTags"
                            placeholder="Enter meta tags">
                    </div>

                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber"
                            placeholder="Enter contact number">
                    </div>
                    <div class="form-group">
                        <label for="contactEmail">Contact Email</label>
                        <input type="email" class="form-control" id="contactEmail" name="contactEmail"
                            placeholder="Enter contact email">
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaFacebook">Facebook</label>
                        <input type="text" class="form-control" id="socialMediaFacebook" name="socialMediaFacebook"
                            placeholder="Enter Facebook link">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaTwitter">Twitter</label>
                        <input type="text" class="form-control" id="socialMediaTwitter" name="socialMediaTwitter"
                            placeholder="Enter Twitter link">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaInstagram">Instagram</label>
                        <input type="text" class="form-control" id="socialMediaInstagram" name="socialMediaInstagram"
                            placeholder="Enter Instagram link">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaYoutube">Youtube</label>
                        <input type="text" class="form-control" id="socialMediaYoutube" name="socialMediaYoutube"
                            placeholder="Enter Youtube link">
                    </div>
                    <button type="submit" name="submitGeneralDetails" class="btn btn-primary mt-2">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <?php
// Assuming you have already established a connection to your MySQL database

$errors = array();
$youtubeLink = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitAboutVideo'])) {
    // Validate and sanitize the input
    if (empty($_POST["youtubelink"])) {
        $errors[] = "Youtube Link is required";
    } else {
        $youtubeLink = $_POST["youtubelink"];
        // Validate youtube link format - You can add more specific validation as needed
        if (!filter_var($youtubeLink, FILTER_VALIDATE_URL)) {
            $errors[] = "Invalid Youtube Link format";
        }
    }

    // If there are no validation errors, check if record exists and perform SQL INSERT or UPDATE query
    if (empty($errors)) {
        $result = mysqli_query($conn, "SELECT id FROM aboutvideo LIMIT 1");
        if ($row = mysqli_fetch_assoc($result)) {
            // If record exists, update it
            $id = $row['id'];
            $sql = "UPDATE aboutvideo SET link = '$youtubeLink' WHERE id = $id";
        } else {
            // If no record exists, insert it
            $sql = "INSERT INTO aboutvideo (link) VALUES ('$youtubeLink')";
        }

        if (mysqli_query($conn, $sql)) {
            echo "Record saved successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

      
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

    <!-- Your HTML Form -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">About Video</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                        <label for="youtubelink">Youtube Link</label>
                        <input type="text" class="form-control mt-2" id="youtubelink" name="youtubelink"
                            placeholder="Enter Your Youtube Video Link">
                    </div>
                    <button type="submit" name="submitAboutVideo" class="btn btn-primary mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>



    <?php
    ob_start(); // Start output buffering
// Assuming you have established a database connection

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Check if both logo and favicon files are uploaded
    if (isset($_FILES['logoUpload']) && isset($_FILES['faviconUpload'])) {
        // Handle file uploads
        $logoUpload = $_FILES['logoUpload'];
        $faviconUpload = $_FILES['faviconUpload'];

        // File upload directory
        $targetDir = "../uploads/";

        // Upload logo file
        $logoFileName = basename($logoUpload["name"]);
        $logoTargetFilePath = $targetDir . $logoFileName;
        $logoFileType = pathinfo($logoTargetFilePath, PATHINFO_EXTENSION);

        // Upload favicon file
        $faviconFileName = basename($faviconUpload["name"]);
        $faviconTargetFilePath = $targetDir . $faviconFileName;
        $faviconFileType = pathinfo($faviconTargetFilePath, PATHINFO_EXTENSION);

        // Check if file is a real image
        $logoUploadOk = true;
        $faviconUploadOk = true;

        // Check logo file size
        if ($logoUpload["size"] > 10000000) {
            echo "Sorry, your logo file is too large.";
            $logoUploadOk = false;
        }

        // Check favicon file size
        if ($faviconUpload["size"] > 10000000) {
            echo "Sorry, your favicon file is too large.";
            $faviconUploadOk = false;
        }

        // Allow certain file formats
        $allowedFileTypes = array("jpg", "jpeg", "png", "gif", "ico"); // Added "ico" for favicon
        if (!in_array($logoFileType, $allowedFileTypes)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and ICO files are allowed for the logo.";
            $logoUploadOk = false;
        }

        if (!in_array($faviconFileType, $allowedFileTypes)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF, and ICO files are allowed for the favicon.";
            $faviconUploadOk = false;
        }

        // Check if uploads are OK
        if ($logoUploadOk && $faviconUploadOk) {
            // Move logo file to uploads directory
            if (move_uploaded_file($logoUpload["tmp_name"], $logoTargetFilePath)) {
                // Move favicon file to uploads directory
                if (move_uploaded_file($faviconUpload["tmp_name"], $faviconTargetFilePath)) {
                    // Insert or update file paths into the database
                    $logoFilePath = mysqli_real_escape_string($conn, $logoTargetFilePath);
                    $faviconFilePath = mysqli_real_escape_string($conn, $faviconTargetFilePath);

                    // Check if the record already exists in the database
                    $sql_check = "SELECT id FROM image LIMIT 1";
                    $result_check = mysqli_query($conn, $sql_check);

                    if ($row = mysqli_fetch_assoc($result_check)) {
                        // If record exists, update it
                        $id = $row['id'];
                        $sql = "UPDATE image SET logo = '$logoFilePath', favicon = '$faviconFilePath' WHERE id = $id";
                    } else {
                        // If no record exists, insert it
                        $sql = "INSERT INTO image (logo, favicon) VALUES ('$logoFilePath', '$faviconFilePath')";
                    }

                    if (mysqli_query($conn, $sql)) {
                        
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                } else {
                    echo "Sorry, there was an error uploading your favicon file.";
                }
            } else {
                echo "Sorry, there was an error uploading your logo file.";
            }
        }
    } else {
        echo "Please select files to upload.";
    }
}
?>

    <div class="container">
        <div class="card">
            <div class="card-body mt-4">
                <h2 class="card-title">Logo and Favicon Settings</h2>
                <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="logoUpload">Upload Logo (Max: 10MB)</label>
                        <input type="file" class="form-control-file" id="logoUpload" name="logoUpload">
                    </div>
                    <div class="form-group mb-2">
                        <label for="faviconUpload">Upload Favicon (Max: 10MB)</label>
                        <input type="file" class="form-control-file" id="faviconUpload" name="faviconUpload">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </div>






</main>

<?php include 'includes/footer.php' ?>