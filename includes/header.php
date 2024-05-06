<?php
include 'includes/dbconfig.php';
// Check if session is not active
if (session_status() === PHP_SESSION_NONE) {
    // Start the session
    session_start();
}

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["user_id"])) {
    header("Location: ../front/login.php"); // Redirect to front-end login page
    exit();
}

// Set a cookie named "username" with the value "John" that expires in 30 days
setcookie("username", "John", time() + (30 * 24 * 60 * 60), "/");

// Set a cookie named "language" with the value "en" that expires when the browser is closed
setcookie("language", "en", 0, "/");

// Function to fetch user role from the database
function getUserRoleFromDatabase() {
    global $conn; // Declare $conn as a global variable

    // Fetch the role_id for the logged-in user
    $userId = $_SESSION["user_id"];
    $sql = "SELECT role_id FROM yai_users WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If a row is found, fetch the role_id and return it
        $row = $result->fetch_assoc();
        return $row["role_id"];
    } else {
        // If no row is found, return null or handle the case as needed
        return null;
    }
}

// Example: Fetch $user_role from the database after login
// Assuming you have a function getUserRoleFromDatabase() that retrieves the user role
$user_role = getUserRoleFromDatabase(); // This function should return the user's role

// Check if $user_role is set and not null before setting it in the session
if (isset($user_role)) {
    $_SESSION['role_id'] = $user_role; // Corrected the session variable name
} else {
    // If $user_role is not set or null, you can handle the case here
    // For example, you can set a default role ID
    $_SESSION['role_id'] = DEFAULT_ROLE_ID; // Replace DEFAULT_ROLE_ID with a default role ID
}

echo "$user_role";
?>


<?php
$active_page = basename($_SERVER['PHP_SELF'], ".php");

// Define an array to map page names to their corresponding titles
$page_titles = array(
    'index' => 'Dashboard',
    'users-profile' => 'Profile',
    'about' => 'About',
    'activity' => 'Activity',
    'volenteer' => 'Volunteer',
    'certificate' => 'Certificate',
    'internship' => 'Internship',
    'donation' => 'Donation',
    'blog' => 'Blog',
    'gallery' => 'Gallery',
    'event' => 'Events',
    'location' => 'Locations',
    'contact' => 'Contact',
    'faq' => 'F.A.Q',
    'suggetion' => 'Suggetion',
    'settings' => 'Settings',
    'logout' => 'Logout'
);

// If the active page exists in the array, set its title dynamically
$page_title = isset($page_titles[$active_page]) ? $page_titles[$active_page] : 'YAI'; // Default to 'YAI' if the page title is not found
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $page_title; ?> - YAI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <?php
    // Fetch favicon path from the database
    $sql_favicon = "SELECT favicon FROM image LIMIT 1"; // Assuming there's only one row in the image table
    $result_favicon = mysqli_query($conn, $sql_favicon);

    if (mysqli_num_rows($result_favicon) > 0) {
    $row_favicon = mysqli_fetch_assoc($result_favicon);
    $faviconPath = $row_favicon['favicon'];
    } else {
    // If no favicon path found in the database, set a default path
    $faviconPath = "images/default-favicon.ico"; // Path to a default favicon image
    }
    ?>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo $faviconPath; ?>">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>