<?php 
require 'includes/header.php';
require 'includes/navbar.php';
require 'includes/sidebar.php';

// Query to fetch data from the FAQ table
$sql = "SELECT * FROM faq_table";

// Execute the query using the existing database connection
$result = $conn->query($sql);

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Frequently Asked Questions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Frequently Asked Questions</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Add F.A.Q. Group 2 Section -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <?php 
                // Check if there are FAQs available
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                       
                        echo '<div class="accordion accordion-flush" id="faq-group-' . $row["id"] . '">';
                        echo '<div class="accordion-item">';
                        echo '<h2 class="accordion-header">';
                        echo '<button class="accordion-button collapsed" data-bs-target="#faqsTwo-' . $row["id"] . '" type="button" data-bs-toggle="collapse">';
                        echo $row["question"];
                        echo '</button>';
                        echo '</h2>';
                        echo '<div id="faqsTwo-' . $row["id"] . '" class="accordion-collapse collapse" data-bs-parent="#faq-group-' . $row["id"] . '">';
                        echo '<div class="accordion-body">' . $row["answer"] . '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No FAQs available";
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    </section>

</main><!-- End #main -->

<?php include 'includes/footer.php'; ?>