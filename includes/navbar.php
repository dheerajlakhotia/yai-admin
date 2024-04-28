<?php
require 'includes/dbconfig.php';

// Fetch user's details including name, role, and image path
$userId = $_SESSION["user_id"]; // Assuming you have stored user ID in the session

$sql = "SELECT name, role_id, image FROM yai_users WHERE id='$userId'";
$result = $conn->query($sql);

$userName = '';
$userRole = '';
$userImagePath = '';

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
            case 5:
            $userRole = 'Counsling Member';
            break;
        default:
            $userRole = 'Unknown';
    }

   
}
?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo.jpg" alt="" style="border-radius: 50%;">
            <span class="d-none d-lg-block">YAI</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">

        <ul class="d-flex align-items-center">


            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $userName; ?></span>


                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo $userName; ?></h6>
                        <span><?php echo $userRole; ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="faq.php">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->