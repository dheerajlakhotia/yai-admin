<?php require 'includes/header.php' ?>
<?php require 'includes/navbar.php' ?>
<?php require 'includes/sidebar.php' ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Gallery</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container mt-5">
        <form id="galleryForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="row row-cols-2 row-cols-md-4 gx-4 gy-4">
                <?php
                // Fetch images from the activities table where images is not null
                $sql = "SELECT id, images FROM activities WHERE images IS NOT NULL";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-md-3">';
                        // Separate multiple images and display them individually
                        $images = explode(',', $row['images']);
                        foreach ($images as $image) {
                            echo '<div class="form-check">
                                    <input class="form-check-input" type="radio" name="selectedImage[' . htmlspecialchars($row['id']) . ']" value="' . htmlspecialchars($image) . '">
                                    <img src="../uploads/' . htmlspecialchars($image) . '" class="img-fluid img-thumbnail" alt="Image" style="max-width: 100%; height: auto; max-width: 100%;">
                                </div>';
                        }
                        echo '</div>';
                    }
                } else {
                    echo "<p>No images found.</p>";
                }
                ?>
            </div>
            <div class="text-center mt-4">
                <button type="submit" id="updateBtn" class="btn btn-primary" name="updateSelected">Update
                    Selected</button>
            </div>
        </form>
        <?php
        // Update selected image
        if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['updateSelected'])) {
            // Check if selected images are provided
            if (isset($_POST['selectedImage']) && !empty($_POST['selectedImage'])) {
                // Loop through each selected image
                foreach ($_POST['selectedImage'] as $activityId => $selectedImage) {
                    // Sanitize the selected image
                    $selectedImage = mysqli_real_escape_string($conn, $selectedImage);

                    // Construct the UPDATE query for selected image
                    $updateQuery = "UPDATE activities SET images = '" . $selectedImage . "' WHERE id = " . $activityId;

                    // Execute the UPDATE query
                    if (mysqli_query($conn, $updateQuery)) {
                        // Update successful
                        echo "<div class='container mt-5'><div class='alert alert-success' role='alert'>Selected image updated successfully.</div></div>";
                    } else {
                        // Update failed
                        echo "<div class='container mt-5'><div class='alert alert-danger' role='alert'>Error updating image: " . mysqli_error($conn) . "</div></div>";
                    }
                }
            } else {
                // No image selected for update
                echo "<div class='container mt-5'><div class='alert alert-warning' role='alert'>No image selected for update.</div></div>";
            }
        }
        ?>
    </div>
</main>

<?php include 'includes/footer.php' ?>