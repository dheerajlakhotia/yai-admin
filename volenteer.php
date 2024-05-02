<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>


<main id="main" class="main">


    <!-- Card with Buttons -->
    <div class="card">
        <div class="card-body">
            <div class="button-container">
                <button type="button" class="btn btn-primary btn-sm mt-4" data-bs-toggle="modal"
                    data-bs-target="#modalDialogScrollable">
                    Add New Member
                </button>


            </div>
        </div>
    </div>

    <!-- Modal Dialog Scrollable -->
    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['exampleInputname']);
    $gender = mysqli_real_escape_string($conn, $_POST['inlineRadioOptions']);
    $email = mysqli_real_escape_string($conn, $_POST['exampleInputEmail1']);
    $password = mysqli_real_escape_string($conn, $_POST['examplepassword']); // Get password from form
    $address = mysqli_real_escape_string($conn, $_POST['exampleInputAddress']);
    $mobile = mysqli_real_escape_string($conn, $_POST['exampleInputMobile']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
    $id_type = mysqli_real_escape_string($conn, $_POST['idType']);
    $hobbies = mysqli_real_escape_string($conn, $_POST['exampleInputHobbies']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);


     // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Set default values for status and role_id
    $status = 1;
    $role_id = 0; // Default role_id

    // Set role_id based on the selected role
    switch ($role) {
        case 'HOD':
            $role_id = 2;
            break;
        case 'Volunteer':
            $role_id = 3;
            break;
        case 'Intern':
            $role_id = 4;
            break;
        case 'cm':
            $role_id = 5;
            break;
        default:
            $role_id = 0; // Default value
    }

    // Handle image upload
    $target_dir = "../uploads/"; // Directory where the file will be stored
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]); // Path of the uploaded file
    $uploadOk = 1; // Flag to check if upload is successful
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // File extension

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["imageUpload"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
           // Image uploaded successfully
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert data into the database
    $query = "INSERT INTO yai_users (name, gender, email, password, address, mobile, dob, occupation, id_type, hobbies, status, role_id, image)
              VALUES ('$name', '$gender', '$email', '$hashed_password', '$address', '$mobile', '$dob', '$occupation', '$id_type', '$hobbies', $status, $role_id, '$target_file')";

    if (mysqli_query($conn, $query)) {
         echo '<div class="alert alert-success" role="alert">';
        echo 'New member added successfully!';
        echo '</div>';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

    <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ADD NEW MEMBER IN YAI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputname">Full Names <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="exampleInputname" name="exampleInputname"
                                placeholder="Enter your full name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputImage">Upload Image <span style="color: red;">*</span></label>
                            <input type="file" class="form-control-file" id="exampleInputImage" name="imageUpload"
                                onchange="previewImage(event)">
                        </div>

                        <div id="imagePreview" class="mb-3" style="display: none;">
                            <img id="preview" src="" alt="Image Preview" style="max-width: 100px; max-height: 100px;">
                            <button type="button" class="btn btn-outline-danger btn-sm ml-2"
                                onclick="deleteImage()">Delete</button>
                        </div>

                        <div class="form-group">
                            <label>Gender <span style="color: red;">*</span></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="Male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                                    value="Other">
                                <label class="form-check-label" for="inlineRadio3">Other</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password <span style="color: red;">*</span></label>
                            <input type="password" class="form-control" id="examplepassword" name="examplepassword"
                                placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputAddress">Address <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="exampleInputAddress" name="exampleInputAddress"
                                placeholder="Enter your address">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputMobile">Contact Number <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="exampleInputMobile" name="exampleInputMobile"
                                placeholder="Enter your Mobile Number">
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>

                        <div class="form-group">
                            <label for="occupation">Occupation <span style="color: red;">*</span></label>
                            <select class="form-control" id="occupation" name="occupation">
                                <option value="" selected>Choose...</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="engineer">Engineer</option>
                                <option value="doctor">Doctor</option>
                                <option value="artist">Artist</option>
                                <option value="business">Business</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="idType">Select Identification Type <span style="color: red;">*</span></label>
                            <select class="form-control" id="idType" name="idType">
                                <option value="" selected>Choose...</option>
                                <option value="passport">Passport</option>
                                <option value="driverLicense">Driver's License</option>
                                <option value="nationalId">National ID</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="idProof">Upload ID Proof <span style="color: red;">*</span></label>
                            <input type="file" class="form-control-file" id="idProof" name="idProof"
                                onchange="previewIdProof(event)">
                            <small class="form-text text-muted">Please upload a valid ID proof (e.g., Passport,
                                Driver's License, National ID).</small>
                        </div>

                        <div id="idProofPreview" class="mb-3" style="display: none;">
                            <img id="idProofPreviewImg" src="" alt="ID Proof Preview"
                                style="max-width: 100px; max-height: 100px;">
                            <button type="button" class="btn btn-outline-danger btn-sm ml-2"
                                onclick="deleteImage('idProof')">Delete</button>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputHobbies">Hobbies/skills</label>
                            <input type="text" class="form-control" id="exampleInputHobbies" name="exampleInputHobbies"
                                placeholder="Enter your hobbies or skills">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputHobbies">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option selected>Open this select menu</option>
                                <option value="Volunteer">Volunteer</option>
                                <option value="intern">intern</option>
                                <option value="HOD">HOD</option>
                                <option value="cm">C.M.</option>
                            </select>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Accept YAI terms <a
                                    href="terms.php"><span style="color: red;">*</span></a></label>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div><!-- End Modal Dialog Scrollable-->

    </div>
    </div>

    <?php
// Assuming you have a database connection established already

// Check if search form is submitted
if (isset($_GET['search'])) {
    // Sanitize the input
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    // Query to fetch data from the database based on the search input
    $query = "SELECT * FROM yai_users WHERE name LIKE '%$search%'";
} else {
    // Default query to fetch all data
    $query = "SELECT * FROM yai_users";
}

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All YAI Members Details</h5>

            <!-- Search form -->
            <form method="get" action="">
                <div class="row mb-3">
                    <div class="col">
                        <!-- Search input field -->
                        <input type="text" name="search" class="form-control" placeholder="Search..."
                            value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    </div>
                    <div class="col-auto">
                        <!-- Search button -->
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </form>

            <!-- Display total number of members -->
            <span>Total Members: <?php echo mysqli_num_rows($result); ?></span>

            <!-- Table to display user details -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th> <!-- New column for Image -->
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">ID Type</th>
                            <th scope="col">ID Image</th>
                            <th scope="col">Hobbies</th>
                            <th scope="col">Role</th>

                            <!-- You can add more columns here -->
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the result set and display data in table rows
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <tr>
                            <!-- Serial number -->
                            <th scope="row"><?php echo $counter; ?></th>
                            <!-- User details -->
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <img src="<?php echo $row['image']; ?>" alt="User Image" class="img-thumbnail"
                                    width="100">
                            </td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['occupation']; ?></td>
                            <td><?php echo $row['id_type']; ?></td>
                            <td>
                                <img src="<?php echo $row['id_image']; ?>" alt="User Image" class="img-thumbnail"
                                    width="100">
                            </td>
                            <td><?php echo $row['hobbies']; ?></td>
                            <td>
                                <?php
                                    // Convert role ID to role name
                                    switch ($row['role_id']) {
                                        case 1:
                                            echo "Founding Member";
                                            break;
                                        case 2:
                                            echo "HOD";
                                            break;
                                        case 3:
                                            echo "Volunteer";
                                            break;
                                        case 4:
                                            echo "Intern";
                                            break;
                                        case 5:
                                            echo "Counseling Member";
                                            break;
                                        default:
                                            echo "Unknown";
                                    }
                                    ?>
                            </td>
                            <!-- Display image -->



                            <td>
                                <!-- Edit icon -->
                                <!-- Edit icon -->
                                <a href="update_user.php?id=<?php echo $row['id']; ?>" class="btn btn-link">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                <!-- Delete icon with red color -->
                                <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-link">
                                    <i class="bi bi-trash-fill"></i>
                                </a>

                            </td>
                        </tr>
                        <?php
                            $counter++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
} else {
    // Error handling if the query fails
    echo "Error: " . mysqli_error($connection);
}
?>



</main>


<?php include 'includes/footer.php' ?>