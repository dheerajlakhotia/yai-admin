<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Donation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Donation</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <?php
// Assuming you already have a database connection established

// Function to update donation request status
function updateDonationStatus($conn, $id) {
    $sql = "UPDATE donation_requests SET status = 1 WHERE id = $id";
    return $conn->query($sql);
}

// Function to delete donation request
function deleteDonationRequest($conn, $id) {
    $sql = "DELETE FROM donation_requests WHERE id = $id";
    return $conn->query($sql);
}

// Check if update request or delete request is made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_id'])) {
        // Update donation request status
        $update_id = $_POST['update_id'];
        updateDonationStatus($conn, $update_id);
    } elseif (isset($_POST['delete_id'])) {
        // Delete donation request
        $delete_id = $_POST['delete_id'];
        deleteDonationRequest($conn, $delete_id);
    }
}

// Fetch donation requests with status 0
$sql = "SELECT * FROM donation_requests WHERE status = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each donation request
    while ($row = $result->fetch_assoc()) {
        $donorName = isset($row['name']) ? $row['name'] : "";
        $mobileNumber = isset($row['mobile']) ? $row['mobile'] : "";
        $donationType = isset($row['donation_type']) ? $row['donation_type'] : "";
?>
    <!-- Donation Card -->
    <div class="col">
        <div class="card">
            <div class="card-header">
                Donation Details <br>
                <span><strong><?php echo $row['created_at']; ?></strong></span>
            </div>
            <div class="card-body">
                <h5 class="card-title">Donor Name: <strong><?php echo $donorName; ?></strong></h5>
                <p class="card-text">Mobile Number: <strong><?php echo $mobileNumber; ?></strong></p>
                <p class="card-text">Type of Donation: <strong><?php echo $donationType; ?></strong></p>
                <!-- Other Donation Details -->
                <p><strong>Email:</strong> <?php echo isset($row['email']) ? $row['email'] : ""; ?></p>
                <p><strong>Address:</strong> <?php echo isset($row['address']) ? $row['address'] : ""; ?></p>
                <p><strong>Discription:</strong> <?php echo isset($row['description']) ? $row['description'] : ""; ?>
                </p>
                <!-- Action Icons -->
                <form method="post" style="display: inline;">
                    <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check2"></i> Update</button>
                </form>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
} else {
    echo "No donation requests found ";
}
?>

    <?php
// Fetch all donation requests with status 1
$sql = "SELECT * FROM donation_requests WHERE status = 1";
$result = $conn->query($sql);
$totalDonations = $result->num_rows;

// Fetch unique donation types for dropdown filter
$sql = "SELECT DISTINCT donation_type FROM donation_requests";
$typeResult = $conn->query($sql);
?>

    <!-- Search Input and Filter Dropdown -->
    <form method="get">
        <div class="row mb-3 my-5 mx-2">
            <div class="col-md-6 my-4">
                <input type="text" class="form-control" name="searchInput" placeholder="Search by Donor Name"
                    value="<?php echo isset($_GET['searchInput']) ? $_GET['searchInput'] : ''; ?>">
            </div>
            <div class="col-md-6 mt-4">
                <select class="form-select" name="filterBy">
                    <option value="">All</option>
                    <?php
                // Output donation type options
                while ($typeRow = $typeResult->fetch_assoc()) {
                    $selected = isset($_GET['filterBy']) && $_GET['filterBy'] == $typeRow['donation_type'] ? 'selected' : '';
                    echo "<option value='" . $typeRow['donation_type'] . "' $selected>" . $typeRow['donation_type'] . "</option>";
                }
                ?>
                </select>
            </div>
        </div>
        <div class="row mb-3 mx-2">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Apply Filter</button>
            </div>
        </div>
    </form>

    <?php
// Define default conditions
$searchCondition = "1=1";
$filterCondition = "1=1";

// Apply search condition
if (isset($_GET['searchInput']) && !empty($_GET['searchInput'])) {
    $searchCondition = "name LIKE '%" . $_GET['searchInput'] . "%'";
}

// Apply filter condition
if (isset($_GET['filterBy']) && !empty($_GET['filterBy'])) {
    $filterCondition = "donation_type LIKE '%" . $_GET['filterBy'] . "%'";
}

// Combine conditions
$condition = "$searchCondition AND $filterCondition";

// Fetch filtered donation requests with status 1
$sql = "SELECT * FROM donation_requests WHERE status = 1 AND $condition";
$result = $conn->query($sql);
$totalDonations = $result->num_rows;

if ($result->num_rows > 0) {
?>
    <span class="my-4">Total Donation: <?php echo $totalDonations; ?></span>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Donor Name</th>
                    <th>Type of Donation</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Date</th>
                    <!-- No action column -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Output data for each filtered donation request
                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['donation_type']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    echo "No donation requests found";
}
?>




</main>





<?php include 'includes/footer.php' ?>