<?php
require 'includes/header.php';
require 'includes/navbar.php';
require 'includes/sidebar.php';

// Check if form is submitted for adding testimonial
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $embedCode = $_POST['youtube_embed_code'];
    // Prepare and execute SQL statement to insert new testimonial
    $sql = "INSERT INTO testimonials (name, youtube_link) VALUES ('$name', '$embedCode')";
    if ($conn->query($sql) === TRUE) {
        echo "Testimonial added successfully!";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error adding testimonial: " . $conn->error . "</div>";
    }
}

// Check if form is submitted for deleting testimonial
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];
    // Prepare and execute SQL statement to delete the testimonial
    $sql = "DELETE FROM testimonials WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "Testimonial deleted successfully!";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting testimonial: " . $conn->error . "</div>";
    }
}

// Fetch testimonials from database
$sql = "SELECT * FROM testimonials";
$result = $conn->query($sql);
?>

<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Add Testimonial</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="youtube_embed_code">YouTube Embed Code:</label>
                        <textarea class="form-control" id="youtube_embed_code" name="youtube_embed_code" rows="3"
                            required></textarea>

                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
            <div class="col-lg-6">
                <h2>Testimonials</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if testimonials exist
                        if ($result->num_rows > 0) {
                            // Display testimonials
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>";
                                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST' style='display:inline;'>";
                                echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                                echo "<button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No testimonials available.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php' ?>