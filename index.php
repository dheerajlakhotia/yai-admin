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


        <div class="row">

            <!-- Top Performers Section -->
            <div class="col-12">
                <h2>Top Performers </h2> <small> <span>Month</span></small>
                <div class="row">
                    <!-- Top Performer 1 -->
                    <div class="col-md-3">
                        <div class="card performer-card">
                            <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top" alt="Performer Image">
                            <div class="card-body">
                                <h5 class="card-title">Neeraj</h5>
                                <p class="card-text">Total Drives: 7</p>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for Top Performer 2, 3, and 4 -->
                    <!-- Top Performer 2 -->
                    <div class="col-md-3">
                        <div class="card performer-card">
                            <img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top" alt="Performer Image">
                            <div class="card-body">
                                <h5 class="card-title">Dheeraj</h5>
                                <p class="card-text">Total Drives: 15</p>

                            </div>
                        </div>
                    </div>
                    <!-- Top Performer 3 -->
                    <div class="col-md-3">
                        <div class="card performer-card">
                            <img src="https://images.unsplash.com/photo-1504593811423-6dd665756598?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top" alt="Performer Image">
                            <div class="card-body">
                                <h5 class="card-title">Yash</h5>
                                <p class="card-text">Total Drives: 10</p>

                            </div>
                        </div>
                    </div>
                    <!-- Top Performer 4 -->
                    <div class="col-md-3">
                        <div class="card performer-card">
                            <img src="https://images.unsplash.com/photo-1500048993953-d23a436266cf?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top" alt="Performer Image">
                            <div class="card-body">
                                <h5 class="card-title">Suraj</h5>
                                <p class="card-text">Total Drives: 20</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Top Performers Section -->


            <!-- Member Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">



                    <div class="card-body">
                        <h5 class="card-title">Total Members<span>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3 mt-3">
                                        <h6>145</h6>
                                    </div>
                                </div>
                    </div>
                </div>
            </div><!-- End Member Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Fund<span>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                        <i class="bi bi-currency-rupee"></i>
                                    </div>
                                    <div class="ps-3 mt-3">
                                        <h6>5000rs</h6>
                                    </div>
                                </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- childenes Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">


                    <div class="card-body">
                        <h5 class="card-title">Total childenes<span>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3 mt-3">
                                        <h6>1244</h6>
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
                                        <h6>4</h6>
                                    </div>
                                </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->
            <!-- News & Updates Traffic -->
            <div class="col-lg">
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Blogs</h5>

                        <div class="news">
                            <div class="post-item clearfix">
                                <img src="assets/img/news-1.jpg" alt="">
                                <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut
                                    harum...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-2.jpg" alt="">
                                <h4><a href="#">Quidem autem et impedit</a></h4>
                                <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona
                                    nande...
                                </p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-3.jpg" alt="">
                                <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et
                                    totam...
                                </p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-4.jpg" alt="">
                                <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum
                                    cuder...
                                </p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-5.jpg" alt="">
                                <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae
                                    dignissimos
                                    eius...</p>
                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->
            </div>
            <div class="container">

                <div class="card">
                    <div class="card-body">


                        <h5 class="card-title">Today Drive</h5>
                        <div class="row">
                            <div class="col-12">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-bs-toggle="list" href="#list-home" role="tab"
                                        aria-controls="list-home">SAGAR
                                        ROAD</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-bs-toggle="list" href="#list-profile" role="tab"
                                        aria-controls="list-profile">PAWANPURI</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        data-bs-toggle="list" href="#list-messages" role="tab"
                                        aria-controls="list-messages">JAILROAD</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list"
                                        data-bs-toggle="list" href="#list-settings" role="tab"
                                        aria-controls="list-settings">MP
                                        COLONY</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- first location  -->
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                        aria-labelledby="list-home-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Yash</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                                <tr>
                                                    <td>Pawan</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis Lorem ipsum dolor sit amet.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- secound location  -->
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                        aria-labelledby="list-profile-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Dheeraj</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis Lorem ipsum dolor sit amet.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- third location  -->
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                        aria-labelledby="list-messages-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Neeraj</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                                <tr>
                                                    <td>Suraj</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                                <tr>
                                                    <td>Seema</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- fourth location -->
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                        aria-labelledby="list-settings-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ashish</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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


            <div class="container">
                <h2 class="card-title">Contact Massge</h2>
                <?php
// Assuming you have already established a database connection and selected the appropriate database

// Query to fetch data from the ContactForm table
$sql = "SELECT * FROM contactform";
?>

                <!-- Display fetched data in HTML table with Bootstrap styling -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-4 text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Dismiss</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    // Check if there are any rows returned by the query
    if ($result->num_rows > 0) {
        $count = 1;
        // Loop through each row of data
        while ($row = $result->fetch_assoc()) {
            // Output data for each row in table format
            echo "<tr>";
            echo "<td>" . $count++ . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["subject"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal'><i class='bi bi-x'></i></button></td>";
            echo "</tr>";
        }
    } else {
        // No rows returned by the query
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }
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