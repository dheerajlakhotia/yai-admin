<?php require 'includes/header.php' ?>

<?php require 'includes/navbar.php' ?>

<?php require 'includes/sidebar.php' ?>




<?php



// Check if form is submitted and use POST method (avoid hardcoding)
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  // Escape user input to prevent SQL injection (security best practice)
  $metaDescription = mysqli_real_escape_string($conn, $_POST['metaDescription']);
  $metaTags = mysqli_real_escape_string($conn, $_POST['metaTags']);
  $contactNumber = mysqli_real_escape_string($conn, $_POST['contactNumber']);
  $contactEmail = mysqli_real_escape_string($conn, $_POST['contactEmail']);
  $address = mysqli_real_escape_string($conn, $_POST['Address']);
  $facebook = mysqli_real_escape_string($conn, $_POST['socialMediaFacebook']);
  $twitter = mysqli_real_escape_string($conn, $_POST['socialMediaTwitter']);
  $instagram = mysqli_real_escape_string($conn, $_POST['socialMediaInstagram']);
  $youtube = mysqli_real_escape_string($conn, $_POST['socialMediaYoutube']);

  // Handle file uploads with error checking
  $logoUpload = $_FILES['logoUpload'];
  $faviconUpload = $_FILES['faviconUpload'];

  $logoFilename = "";
  $faviconFilename = "";

  if ($logoUpload['error'] === UPLOAD_ERR_OK) {
    $logoFilename = $logoUpload['name'];
    $logoDestination = "../uploads/" . $logoFilename;
    move_uploaded_file($logoUpload['tmp_name'], $logoDestination);
  }

  if ($faviconUpload['error'] === UPLOAD_ERR_OK) {
    $faviconFilename = $faviconUpload['name'];
    $faviconDestination = "../uploads/" . $faviconFilename;
    move_uploaded_file($faviconUpload['tmp_name'], $faviconDestination);
  }

  // Check if data exists (same logic as before)
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
                  youtube = '$youtube', 
                  logo_filename = '$logoFilename', 
                  favicon_filename = '$faviconFilename'
              WHERE 1";  // Assuming you have a unique identifier for update

    if (mysqli_query($conn, $sql)) {
      echo "Data updated successfully!";
    } else {
      echo "Error updating data: " . mysqli_error($conn);
    }
  } else {
    // Insert data (same logic as before)
    $sql = "INSERT INTO general_details 
              (meta_description, meta_tags, contact_number, contact_email, address, facebook, twitter, instagram, youtube, logo_filename, favicon_filename) 
              VALUES 
              ('$metaDescription', '$metaTags', '$contactNumber', '$contactEmail', '$address', '$facebook', '$twitter', '$instagram', '$youtube', '$logoFilename', '$faviconFilename')";

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
                <li class="breadcrumb-item active">Santtings</li>
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
                            placeholder="use 150 words only"><?php echo isset($metaDescription) ? $metaDescription : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="metaTags">Meta Tags</label>
                        <input type="text" class="form-control" id="metaTags" name="metaTags"
                            placeholder="Enter meta tags" value="<?php echo isset($metaTags) ? $metaTags : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber"
                            placeholder="Enter contact number"
                            value="<?php echo isset($contactNumber) ? $contactNumber : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="contactEmail">Contact Email</label>
                        <input type="email" class="form-control" id="contactEmail" name="contactEmail"
                            placeholder="Enter contact email"
                            value="<?php echo isset($contactEmail) ? $contactEmail : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Address"
                            value="<?php echo isset($address) ? $address : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaFacebook">Facebook</label>
                        <input type="text" class="form-control" id="socialMediaFacebook" name="socialMediaFacebook"
                            placeholder="Enter Facebook link" value="<?php echo isset($facebook) ? $facebook : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaTwitter">Twitter</label>
                        <input type="text" class="form-control" id="socialMediaTwitter" name="socialMediaTwitter"
                            placeholder="Enter Twitter link" value="<?php echo isset($twitter) ? $twitter : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaInstagram">Instagram</label>
                        <input type="text" class="form-control" id="socialMediaInstagram" name="socialMediaInstagram"
                            placeholder="Enter Instagram link"
                            value="<?php echo isset($instagram) ? $instagram : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaYoutube">Youtube</label>
                        <input type="text" class="form-control" id="socialMediaYoutube" name="socialMediaYoutube"
                            placeholder="Enter Youtube link" value="<?php echo isset($youtube) ? $youtube : ''; ?>">
                    </div>
                    <div class="form-group my-4">
                        <label for="logoUpload">Logo Upload</label>
                        <input type="file" class="form-control-file" id="logoUpload" name="logoUpload">
                    </div>
                    <div class="form-group mb-2">
                        <label for="faviconUpload">Favicon Upload</label>
                        <input type="file" class="form-control-file" id="faviconUpload" name="faviconUpload">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>



            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Frequently Asked Questions</h2>
                <form>
                    <div class="form-group">
                        <label for="faqQuestion">Question</label>
                        <input type="text" class="form-control" id="faqQuestion" placeholder="Enter question">
                    </div>
                    <div class="form-group">
                        <label for="faqAnswer">Answer</label>
                        <input type="text" class="form-control" id="faqAnswer" placeholder="Enter answer">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Add FAQ</button>
                </form>

                <hr>

                <span class="mt-4">Frequently Asked Questions Table</span>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>What is Lorem Ipsum?</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </td>
                                <td>
                                    <i class="bi bi-pencil text-primary"></i>
                                    <i class="bi bi-trash text-danger"></i>
                                </td>
                            </tr>
                            <!-- Add more rows for additional FAQs -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





</main>

<?php include 'includes/footer.php' ?>