<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <?php
// Get the current month and year
$currentMonth = date('m');
$currentYear = date('Y');

// Get the name of the current month
$currentMonthName = strftime('%B', mktime(0, 0, 0, $currentMonth, 1, $currentYear));

// Query to get the count of activities for each user in the current month
$activityCountQuery = "SELECT user_id, COUNT(*) AS activity_count FROM activities WHERE MONTH(created_at) = $currentMonth AND YEAR(created_at) = $currentYear GROUP BY user_id";

// Execute the query
$activityCountResult = $conn->query($activityCountQuery);

// Associative array to store user IDs and their corresponding activity counts
$userActivityCounts = [];

// Store the results in the associative array
while ($row = $activityCountResult->fetch_assoc()) {
    $userActivityCounts[$row['user_id']] = $row['activity_count'];
}

// Sort the userActivityCounts array in descending order based on activity count
arsort($userActivityCounts);

// Counter for ranking
$rank = 1;
?>

        <!-- Top Performers Section -->
        <div class="col-12">
            <h2>Top 5 Performers - <?php echo $currentMonthName . ' ' . $currentYear; ?></h2>
            <div class="row">
                <?php
        // Output the top 5 performers
        $count = 0;
        foreach ($userActivityCounts as $userId => $activityCount) {
            if ($count >= 5) {
                break;
            }
            // Fetch user details from the users table based on user ID
            $userQuery = "SELECT * FROM yai_users WHERE id = $userId";
            $userResult = $conn->query($userQuery);
            $userRow = $userResult->fetch_assoc();
        ?>
                <div class="col-md-3">
                    <div class="card performer-card">
                        <img src="<?php echo $userRow['image']; ?>" class="card-img-top" alt="Performer Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $userRow['name']; ?></h5>
                            <p class="card-text">Total Drives: <?php echo $activityCount; ?></p>
                            <p class="card-text">Rank: <?php echo $rank; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            // Increment the rank and counter
            $rank++;
            $count++;
        }
        ?>
            </div>
        </div><!-- End Top Performers Section -->




        <!-- Member Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Total Volunteers<span>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3 mt-3">
                                    <?php
                        // Query to get the count of volunteers (users with status 1)
                        $volunteerCountQuery = "SELECT COUNT(*) AS volunteer_count FROM yai_users WHERE status = 1";
                        
                        // Execute the query
                        $volunteerCountResult = $conn->query($volunteerCountQuery);

                        // Fetch the result
                        $volunteerCountRow = $volunteerCountResult->fetch_assoc();
                        
                        // Output the total volunteer count
                        echo "<h6>{$volunteerCountRow['volunteer_count']}</h6>";
                        ?>
                                </div>
                            </div>
                </div>
            </div>
        </div><!-- End Member Card -->




        <!-- childenes Card -->
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


                <div class="card-body">
                    <h5 class="card-title">Total children<span>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3 mt-3">
                                    <?php
        // Query to get the total count of children
        $totalChildrenQuery = "SELECT SUM(TotalChildren) AS TotalChildren FROM locations";
        
        // Execute the query
        $totalChildrenResult = $conn->query($totalChildrenQuery);

        // Fetch the result
        $totalChildrenRow = $totalChildrenResult->fetch_assoc();
        
        // Output the total count of children
        echo "<h6>{$totalChildrenRow['TotalChildren']}</h6>";
        ?>
                                </div>
                            </div>

                </div>

            </div>

        </div><!-- End Customers Card -->
        <!-- Location Card -->
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">


                <div class="card-body">
                    <h5 class="card-title">Total Locations<span>

                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                    <i class="bi bi-pin"></i>
                                </div>
                                <div class="ps-3 mt-3">
                                    <?php
                // Query to get the total count of locations
                $totalLocationsQuery = "SELECT COUNT(*) AS TotalLocations FROM locations";

                // Execute the query
                $totalLocationsResult = $conn->query($totalLocationsQuery);

                // Fetch the result
                $totalLocationsRow = $totalLocationsResult->fetch_assoc();

                // Output the total count of locations
                echo "<h6>{$totalLocationsRow['TotalLocations']}</h6>";
                ?>
                                </div>
                            </div>

                    </h5>
                </div>

            </div>

        </div><!-- End Customers Card -->


        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Today Drive - <?php echo date("Y-m-d"); ?></h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                                <?php
                            // Fetch unique locations from the activities table for the current date
                            $current_date = date("Y-m-d");
                            $sql = "SELECT DISTINCT location FROM activities WHERE DATE(created_at) = '$current_date'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Display each location as a list item
                                    echo '<a class="list-group-item list-group-item-action" id="list-' . str_replace(' ', '-', strtolower($row['location'])) . '-list" data-bs-toggle="list" href="#list-' . str_replace(' ', '-', strtolower($row['location'])) . '" role="tab" aria-controls="list-' . str_replace(' ', '-', strtolower($row['location'])) . '">' . $row['location'] . '</a>';
                                }
                            } else {
                                echo "<p class='text-muted'>No activities found for today.</p>";
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <?php
                            // Reset locations result set pointer
                            mysqli_data_seek($result, 0);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Fetch activities for the current location and date
                                    $location = $row['location'];
                                    $activities_query = "SELECT * FROM activities WHERE location = '$location' AND DATE(created_at) = '$current_date'";
                                    $activities_result = mysqli_query($conn, $activities_query);
                                    ?>
                                <!-- Display activity details for each location -->
                                <div class="tab-pane fade show"
                                    id="list-<?php echo str_replace(' ', '-', strtolower($location)); ?>"
                                    role="tabpanel"
                                    aria-labelledby="list-<?php echo str_replace(' ', '-', strtolower($location)); ?>-list">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th scope="col">User</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            // Display activities for the current location and date
                                            while ($activity_row = mysqli_fetch_assoc($activities_result)) {
                                                // Fetch user's name from yai_users table
                                                $user_id = $activity_row['user_id'];
                                                $user_query = "SELECT name FROM yai_users WHERE id = '$user_id'";
                                                $user_result = mysqli_query($conn, $user_query);
                                                $user_data = mysqli_fetch_assoc($user_result);

                                                // Format start time and end time
                                                $start_time = date('h:i A', strtotime($activity_row['start_time']));
                                                $end_time = date('h:i A', strtotime($activity_row['end_time']));

                                                echo '<tr>
                                                        <td>' . $user_data['name'] . '</td>
                                                        <td>' . $start_time . ' - ' . $end_time . '</td>
                                                        <td>' . $activity_row['description'] . '</td>
                                                    </tr>';
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!-- only founding member can see this part  -->
        <?php
          // Fetch the user's role from the database
$user_id = $_SESSION["user_id"];
$sql = "SELECT role_id FROM yai_users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_role = $row["role_id"];
} else {
    // Handle error if user role cannot be retrieved
    // You can redirect the user to an error page or display an error message
    echo "Error: User role not found.";
    exit();
}

// Check if the user is a founding member (role_id = 1)
if ($user_role == 1) {
    // Display the section for founding members
    ?>


        <!-- volenteer req -->
        <div class="container">
            <h2 class="card-title">Volunteer Requests</h2>
            <div class="table-responsive">
                <table class="table table-bordered mt-4 text-center">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">ID Proof</th>
                            <th scope="col">ID Image</th>
                            <th scope="col">Hobbies</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    // Include database connection file
    include 'includes/dbconfig.php';

    // Function to approve or delete a user
    function approveOrDeleteUser($conn, $user_id, $action) {
        if ($action === 'approve') {
            $sql = "UPDATE yai_users SET status = 1 WHERE id = $user_id ";
        } elseif ($action === 'delete') {
            $sql = "DELETE FROM yai_users WHERE id = $user_id";
        }
        if ($conn->query($sql) === TRUE) {
            echo "User $action successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['approve']) && isset($_POST['user_id'])) {
            approveOrDeleteUser($conn, $_POST['user_id'], 'approve');
        } elseif (isset($_POST['delete']) && isset($_POST['user_id'])) {
            approveOrDeleteUser($conn, $_POST['user_id'], 'delete');
        }
    }

    // Fetching data
    $sql = "SELECT * FROM yai_users WHERE status = 0 AND role_id = 3";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td><img src='" . $row["image"] . "' alt='Image' class='img-fluid'></td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td>";
            echo "<td>" . $row["dob"] . "</td>";
            echo "<td>" . $row["occupation"] . "</td>";
            echo "<td>" . $row["id_type"] . "</td>";
            echo "<td><img src='" . $row["id_image"] . "' alt='ID Image' class='img-fluid'></td>";
            echo "<td>" . $row["hobbies"] . "</td>";
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='user_id' value='" . $row["id"] . "'>
                        <button type='submit' name='approve' class='btn btn-success me-2'>Approve</button>
                        <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                    </form>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='13'>No volunteer requests found.</td></tr>";
    }
   
    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- intern req -->
        <div class="container">
            <h2 class="card-title">Internship Requests</h2>
            <div class="table-responsive">
                <table class="table table-bordered mt-4 text-center">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Occupation</th>
                            <th scope="col">ID Proof</th>
                            <th scope="col">ID Image</th>
                            <th scope="col">Hobbies</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    // Fetching data for internship requests with status = 0 and role ID = 4
    $sql = "SELECT * FROM yai_users WHERE status = 0 AND role_id = 4";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td><img src='" . $row["image"] . "' alt='Image' class='img-fluid'></td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td>";
            echo "<td>" . $row["dob"] . "</td>";
            echo "<td>" . $row["occupation"] . "</td>";
            echo "<td>" . $row["id_type"] . "</td>";
            echo "<td><img src='" . $row["id_image"] . "' alt='ID Image' class='img-fluid'></td>";
            echo "<td>" . $row["hobbies"] . "</td>";
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='user_id' value='" . $row["id"] . "'>
                        <button type='submit' name='approve' class='btn btn-success me-2'>Approve</button>
                        <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                    </form>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='13'>No internship requests found.</td></tr>";
    }
 
    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Donation approval -->
        <div class="container">
            <h2 class="card-title">Donation Requests</h2>

            <div class="table-responsive">
                <table class="table table-bordered mt-4 text-center">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Donation Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                    // Function to approve or delete a donation
function approveOrDeleteDonation($conn, $donation_id, $action) {
    if ($action === 'approve') {
        $sql = "UPDATE donation_requests SET status = '1' WHERE id = $donation_id";
    } elseif ($action === 'delete') {
        $sql = "DELETE FROM donation_requests WHERE id = $donation_id";
    }
    if ($conn->query($sql) === TRUE) {
        echo "Donation $action successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}


    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['approve']) && isset($_POST['donation_id'])) {
            approveOrDeleteDonation($conn, $_POST['donation_id'], 'approve');
        } elseif (isset($_POST['delete']) && isset($_POST['donation_id'])) {
            approveOrDeleteDonation($conn, $_POST['donation_id'], 'delete');
        }
    }

    // Fetching data with status 0 (pending)
    $sql = "SELECT * FROM donation_requests WHERE status = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $count++ . "</td>";
            echo "<td>" . $row["donation_type"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["mobile"] . "</td>";
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='donation_id' value='" . $row["id"] . "'>
                        <button type='submit' name='approve' class='btn btn-success me-2'>Approve</button>
                        <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                    </form>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No donation requests found.</td></tr>";
    }
     $conn->close();
    ?>
                    </tbody>
                </table>
            </div>
        </div>




        <!-- Founding member can see this section -->
        <?php
} else {
    // Redirect the user or display a message indicating access denied
    exit();
}
?>



    </section>


</main><!-- End #main -->

<?php include'includes/footer.php'?>