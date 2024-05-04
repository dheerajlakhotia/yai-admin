<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Contact</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

        <div class="row gy-4">

            <div class="col-xl-6">

                <div class="row">
                    <?php
                // Assuming you have already established a database connection
                // Query to fetch data from the general_details table
                $sql_general_details = "SELECT * FROM general_details";
                $result_general_details = $conn->query($sql_general_details);

                // Check for errors
                if (!$result_general_details) {
                    // Query execution failed
                    echo "Error: " . $conn->error;
                } else {
                    // Check if any rows were returned
                    if ($result_general_details->num_rows > 0) {
                        $row_general_details = $result_general_details->fetch_assoc();
                        echo "<div class='col-lg-6'>";
                        echo "<div class='info-box card'>";
                        echo "<i class='bi bi-telephone'></i>";
                        echo "<h3>Call Us</h3>";
                        echo "<p>" . $row_general_details['contact_number'] . "</p>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-lg-6'>";
                        echo "<div class='info-box card'>";
                        echo "<i class='bi bi-geo-alt'></i>";
                        echo "<h3>Address</h3>";
                        echo "<p>" . $row_general_details['address'] . "</p>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-lg-6'>";
                        echo "<div class='info-box card'>";
                        echo "<i class='bi bi-envelope'></i>";
                        echo "<h3>Email Us</h3>";
                        echo "<p>" . $row_general_details['contact_email'] . "</p>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-lg-6'>";
                        echo "<div class='info-box card'>";
                        echo "<i class='bi bi-facebook'></i>";
                        echo "<h3>Facebook</h3>";
                        echo "<a href='" . $row_general_details['facebook'] . "' target='_blank'>Visit Page</a>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-lg-6'>";
                        echo "<div class='info-box card'>";
                        echo "<i class='bi bi-instagram'></i>";
                        echo "<h3>Instagram</h3>";
                        echo "<a href='" . $row_general_details['instagram'] . "' target='_blank'>Visit Page</a>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-lg-6'>";
                        echo "<div class='info-box card'>";
                        echo "<i class='bi bi-twitter'></i>";
                        echo "<h3>Twitter</h3>";
                        echo "<a href='" . $row_general_details['twitter'] . "' target='_blank'>Visit Page</a>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-lg-6'>";
                        echo "<div class='info-box card'>";
                        echo "<i class='bi bi-youtube'></i>";
                        echo "<h3>YouTube</h3>";
                        echo "<a href='" . $row_general_details['youtube'] . "' target='_blank'>Visit Channel</a>";
                        echo "</div>";
                        echo "</div>";
                    } else {
                        // No records found
                        echo "<p>No contact details found.</p>";
                    }
                }
                ?>
                </div>

            </div>

        </div>

    </section>


</main><!-- End #main -->


<?php include 'includes/footer.php' ?>