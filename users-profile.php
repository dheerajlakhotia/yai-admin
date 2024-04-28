<?php
session_start();
require 'includes/dbconfig.php';

if (isset($_SESSION["user_id"]) && isset($_POST["newpassword"]) && isset($_POST["renewpassword"])) {
    $newPassword = $_POST["newpassword"];
    $reenteredPassword = $_POST["renewpassword"];

    // Check if the passwords match
    if ($newPassword === $reenteredPassword) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $userId = $_SESSION["user_id"]; // Assuming you have stored user ID in the session
        $sql = "UPDATE yai_users SET password='$hashedPassword' WHERE id='$userId'";
        if ($conn->query($sql) === TRUE) {
            echo "Password updated successfully";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Passwords do not match";
    }
} 
elseif (!isset($_SESSION["user_id"])) {
    echo "User is not logged in.";
}
elseif (!isset($_POST["newpassword"]) || !isset($_POST["renewpassword"])) {
   
}

// Fetch user's details including name, role, and image path
if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"]; // Assuming you have stored user ID in the session

    $sql = "SELECT name, role_id, image, gender, email, mobile, address, dob, occupation, hobbies FROM yai_users WHERE id='$userId'";
    $result = $conn->query($sql);

    $userName = '';
    $userRole = '';
    $userImagePath = '';
    $userGender = '';
    $userEmail = '';
    $userPhone = '';
    $userAddress = '';
    $userDOB = '';
    $userOccupation = '';
    $userHobbies = '';

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userName = $row["name"];

        // Determine user's role
        switch ($row["role_id"]) {
            case 1:
                $userRole = 'Founding Member';
                break;
            case 2:
                $userRole = 'HOD';
                break;
            case 3:
                $userRole = 'Volunteer';
                break;
            case 4:
                $userRole = 'Intern';
                break;
            default:
                $userRole = 'Unknown';
        }

        // User's profile image path
        $userImagePath = $row["image"];

        // Additional user details
        $userGender = $row["gender"];
        $userEmail = $row["email"];
        $userPhone = $row["mobile"];
        $userAddress = $row["address"];
        $userDOB = $row["dob"];
        $userOccupation = $row["occupation"];
        $userHobbies = $row["hobbies"];
    }
}

// Handle profile image upload
if (isset($_SESSION["user_id"]) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_image"])) {
    // Get the user ID from the session
    $userId = $_SESSION["user_id"];

    // File upload path
    $targetDir = "../uploads/";
    $fileName = basename($_FILES["profile_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if file is a valid image
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath)) {
            // Image uploaded successfully
            // Now update $userImagePath with the new image path
            $userImagePath = $targetFilePath;

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("UPDATE yai_users SET image = ? WHERE id = ?");
            $stmt->bind_param("si", $userImagePath, $userId);

            // Set parameters and execute
            $stmt->execute();

            // Close statement and database connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
}
?>









<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <div id="profile-image-container">
                            <?php
                // Fetch the user's profile image path from the database based on their ID
                // Assuming $userId contains the user's ID
               
                $sql = "SELECT image FROM yai_users WHERE id = $userId";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $userImagePath = $row["image"];
                        echo '<img id="profile-image" src="' . $userImagePath . '" alt="Profile" class="rounded-circle">';
                    }
                } else {
                    echo "No profile image found.";
                }
                $conn->close();
                ?>
                        </div>
                        <form id="image-upload-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                            method="post" enctype="multipart/form-data">
                            <div class="col-12 col-md-6 mx-auto">
                                <!-- Center the content in mobile view -->
                                <input type="file" name="profile_image" id="image-input" class="form-control">
                                <input type="submit" value="Upload" name="submit" class="btn btn-primary mt-2">
                            </div>


                        </form>
                        <h2><?php echo $userName; ?></h2>
                        <h3><?php echo $userRole; ?></h3>
                    </div>
                </div>
            </div>


            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title">Profile Details</h5>

                                <!-- Display additional user details -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $userName; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Gender</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $userGender; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $userEmail; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $userPhone; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $userAddress; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $userDOB; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Occupation</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $userOccupation; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Hobbies</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $userHobbies; ?></div>
                                </div>
                                <!-- End of additional user details -->



                            </div>


                            <div class="tab-pane fade pt-3" id="profile-settings">



                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" name="change_password">Change
                                            Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->
                            </div>





                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->


<?php include 'includes/footer.php' ?>