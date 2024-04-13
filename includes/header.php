<?php


// Start the session
session_start();

// Set a cookie named "username" with the value "John" that expires in 30 days
setcookie("username", "John", time() + (30 * 24 * 60 * 60), "/");

// Set a cookie named "language" with the value "en" that expires when the browser is closed
setcookie("language", "en", 0, "/");


// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["user_id"])) {
    header("Location: ../front/login.php"); // Redirect to front-end login page
    exit();
}
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

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">

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