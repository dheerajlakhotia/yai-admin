<?php require 'includes/header.php' ?>
<?php require 'includes/navbar.php' ?>
<?php require 'includes/sidebar.php' ?>

<?php
// Initialize user_id variable
$user_id = null;

// Check if user ID is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from the database based on the ID
    $query = "SELECT * FROM yai_users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "User not found";
        exit;
    }
} else {
    echo "User ID not provided";
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['user_id'], $_POST['exampleInputname'], $_POST['gender'], $_POST['exampleInputEmail1'], $_POST['examplepassword'], $_POST['exampleInputAddress'], $_POST['exampleInputMobile'], $_POST['dob'], $_POST['occupation'], $_POST['idType'], $_POST['role'])) {
        // Get form data
        $user_id = $_POST['user_id'];
        $name = $_POST['exampleInputname'];
        $gender = $_POST['gender'];
        $email = $_POST['exampleInputEmail1'];
        $password = $_POST['examplepassword'];
        $address = $_POST['exampleInputAddress'];
        $mobile = $_POST['exampleInputMobile'];
        $dob = $_POST['dob'];
        $occupation = $_POST['occupation'];
        $id_type = $_POST['idType'];
        $role_name = $_POST['role'];

        // Map role names to role IDs
        $role_id = null;
        switch ($role_name) {
            case 'Founding Member':
                $role_id = 1;
                break;
            case 'HOD':
                $role_id = 2;
                break;
            case 'Volunteer':
                $role_id = 3;
                break;
            case 'Intern':
                $role_id = 4;
                break;
            case 'Counseling Member':
                $role_id = 5;
                break;
            default:
                // Handle default case or error
                break;
        }

        // Ensure user ID is still set
        if (!$user_id) {
            echo "User ID not provided";
            exit;
        }

        $image_path_escaped = "NULL";
        $id_image_path_escaped = "NULL";

        // Handle image upload
        if ($_FILES['imageUpload']['error'] === UPLOAD_ERR_OK) {
            $image_tmp = $_FILES['imageUpload']['tmp_name'];
            $image_name = $_FILES['imageUpload']['name'];
            $image_path = '../uploads/' . $image_name; // Set your upload directory
            move_uploaded_file($image_tmp, $image_path);
            $image_path_escaped = "'" . mysqli_real_escape_string($conn, $image_path) . "'";
        }

        // Handle ID image upload
        if ($_FILES['idProof']['error'] === UPLOAD_ERR_OK) {
            $id_image_tmp = $_FILES['idProof']['tmp_name'];
            $id_image_name = $_FILES['idProof']['name'];
            $id_image_path = '../uploads/' . $id_image_name; // Set your upload directory
            move_uploaded_file($id_image_tmp, $id_image_path);
            $id_image_path_escaped = "'" . mysqli_real_escape_string($conn, $id_image_path) . "'";
        }

        // Prepare the SQL statement
        $update_query = "UPDATE yai_users SET 
                        name = ?, 
                        gender = ?, 
                        email = ?, 
                        password = ?, 
                        address = ?, 
                        mobile = ?, 
                        dob = ?, 
                        occupation = ?, 
                        id_type = ?, 
                        role_id = ?, 
                        image = ?,
                        id_image = ?
                        WHERE id = ?";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $update_query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ssssssssssssi", $name, $gender, $email, $password, $address, $mobile, $dob, $occupation, $id_type, $role_id, $image_path_escaped, $id_image_path_escaped, $user_id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "User details updated successfully.";
        } else {
            // Handle the case where the query fails
        }
    }
}
?>

<?php
// Check if user ID is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from the database based on the ID
    $query = "SELECT * FROM yai_users WHERE id = $user_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "User not found";
        exit;
    }
} else {
    echo "User ID not provided";
    exit;
}
?>

<main id="main" class="main">
    <form method="post" enctype="multipart/form-data" action="">
        <!-- Add a hidden input field to store user ID -->
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

        <div class="form-group">
            <label for="exampleInputname">Full Names <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="exampleInputname" name="exampleInputname"
                value="<?php echo $row['name']; ?>" placeholder="Enter your full name">
        </div>

        <div class="form-group">
            <label for="exampleInputImage">Upload Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control-file" id="exampleInputImage" name="imageUpload"
                onchange="previewImage(event)">
        </div>

        <div id="imagePreview" class="mb-3">
            <img id="preview" src="<?php echo $row['image']; ?>" alt="Image Preview"
                style="max-width: 100px; max-height: 100px;">
        </div>

        <div class="form-group">
            <label>Gender <span style="color: red;">*</span></label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male"
                    <?php if ($row['gender'] == 'Male') echo 'checked'; ?>>
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female"
                    <?php if ($row['gender'] == 'Female') echo 'checked'; ?>>
                <label class="form-check-label" for="female">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="other" value="Other"
                    <?php if ($row['gender'] == 'Other') echo 'checked'; ?>>
                <label class="form-check-label" for="other">Other</label>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address <span style="color: red;">*</span></label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1"
                placeholder="Enter email" value="<?php echo $row['email']; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password <span style="color: red;">*</span></label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1"
                placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputAddress">Address <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="exampleInputAddress" name="exampleInputAddress"
                placeholder="Enter your address" value="<?php echo $row['address']; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputMobile">Contact Number <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="exampleInputMobile" name="exampleInputMobile"
                placeholder="Enter your Mobile Number" value="<?php echo $row['mobile']; ?>">
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth <span style="color: red;">*</span></label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
        </div>

        <div class="form-group">
            <label for="occupation">Occupation <span style="color: red;">*</span></label>
            <select class="form-control" id="occupation" name="occupation">
                <option value="" <?php if ($row['occupation'] == '') echo 'selected'; ?>>Choose...</option>
                <option value="student" <?php if ($row['occupation'] == 'student') echo 'selected'; ?>>Student</option>
                <option value="teacher" <?php if ($row['occupation'] == 'teacher') echo 'selected'; ?>>Teacher</option>
                <option value="engineer" <?php if ($row['occupation'] == 'engineer') echo 'selected'; ?>>Engineer
                </option>
                <option value="doctor" <?php if ($row['occupation'] == 'doctor') echo 'selected'; ?>>Doctor</option>
                <option value="artist" <?php if ($row['occupation'] == 'artist') echo 'selected'; ?>>Artist</option>
                <option value="business" <?php if ($row['occupation'] == 'business') echo 'selected'; ?>>Business
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="idType">Select Identification Type <span style="color: red;">*</span></label>
            <select class="form-control" id="idType" name="idType">
                <option value="" <?php if ($row['id_type'] == '') echo 'selected'; ?>>Choose...</option>
                <option value="passport" <?php if ($row['id_type'] == 'passport') echo 'selected'; ?>>Passport</option>
                <option value="driverLicense" <?php if ($row['id_type'] == 'driverLicense') echo 'selected'; ?>>
                    Driver's License</option>
                <option value="nationalId" <?php if ($row['id_type'] == 'nationalId') echo 'selected'; ?>>National ID
                </option>
                <option value="other" <?php if ($row['id_type'] == 'other') echo 'selected'; ?>>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="idProof">Upload ID Proof <span style="color: red;">*</span></label>
            <input type="file" class="form-control-file" id="idProof" name="idProof" onchange="previewIdProof(event)">
            <small class="form-text text-muted">Please upload a valid ID proof (e.g., Passport,
                Driver's License, National ID).</small>
        </div>

        <div id="idProofPreview" class="mb-3" style="display: none;">
            <img id="idProofPreviewImg" src="<?php echo $row['id_image']; ?>" alt="ID Proof Preview"
                style="max-width: 100px; max-height: 100px;">
            <button type="button" class="btn btn-outline-danger btn-sm ml-2"
                onclick="deleteImage('idProof')">Delete</button>
        </div>

        <div class="form-group">
            <label for="exampleInputHobbies">Hobbies/skills</label>
            <input type="text" class="form-control" id="exampleInputHobbies" name="exampleInputHobbies"
                placeholder="Enter your hobbies or skills" value="<?php echo $row['hobbies']; ?>">
        </div>

        <div class="form-group">
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-select" aria-label="Select Role" name="role">
                    <option value="" <?php if ($row['role_id'] == '') echo 'selected'; ?>>Open this select menu</option>
                    <option value="Founding Member" <?php if ($row['role_id'] == 'Founding Member') echo 'selected'; ?>>
                        Founding Member
                    </option>
                    <option value="Volunteer" <?php if ($row['role_id'] == 'Volunteer') echo 'selected'; ?>>Volunteer
                    </option>
                    <option value="intern" <?php if ($row['role_id'] == 'intern') echo 'selected'; ?>>Intern</option>
                    <option value="HOD" <?php if ($row['role_id'] == 'HOD') echo 'selected'; ?>>HOD</option>
                    <option value="C.M." <?php if ($row['role_id'] == 'C.M.') echo 'selected'; ?>>C.M.</option>
                </select>
            </div>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Accept YAI terms <a href="terms.php"><span
                        style="color: red;">*</span></a></label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

<?php include 'includes/footer.php' ?>