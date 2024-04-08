<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">

    <h1>Recent Donation</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Donation Card 1 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Donation Details <br>
                    <span><strong>11-08-2024</strong></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Donor Name: John Doe</h5>
                    <p class="card-text">Mobile Number: +1234567890</p>
                    <p class="card-text">Type of Donation: Monetary</p>
                    <!-- Action Icons -->
                    <i class="bi bi-check2 text-success me-2"></i>
                    <i class="bi bi-trash text-danger"></i>
                    <!-- See Details Icon -->
                    <i class="bi bi-info-circle text-primary" data-bs-toggle="modal"
                        data-bs-target="#donationModal"></i>
                </div>
            </div>
        </div>
        <!-- Donation Card 2 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Donation Details <br>
                    <span><strong>11-08-2024</strong></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Donor Name: Jane Smith</h5>
                    <p class="card-text">Mobile Number: +9876543210</p>
                    <p class="card-text">Type of Donation: Goods</p>
                    <!-- Action Icons -->
                    <i class="bi bi-check2 text-success me-2"></i>
                    <i class="bi bi-trash text-danger"></i>
                    <!-- See Details Icon -->
                    <i class="bi bi-info-circle text-primary" data-bs-toggle="modal"
                        data-bs-target="#donationModal"></i>
                </div>
            </div>
        </div>
        <!-- Donation Card 3 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Donation Details <br>
                    <span><strong>11-08-2024</strong></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Donor Name: Alice Johnson</h5>
                    <p class="card-text">Mobile Number: +1112223333</p>
                    <p class="card-text">Type of Donation: Volunteer</p>
                    <!-- Action Icons -->
                    <i class="bi bi-check2 text-success me-2"></i>
                    <i class="bi bi-trash text-danger"></i>
                    <!-- See Details Icon -->
                    <i class="bi bi-info-circle text-primary" data-bs-toggle="modal"
                        data-bs-target="#donationModal"></i>
                </div>
            </div>
        </div>
        <!-- Donation Card 4 -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Donation Details <br>
                    <span><strong>11-08-2024</strong></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Donor Name: Bob Johnson</h5>
                    <p class="card-text">Mobile Number: +4445556666</p>
                    <p class="card-text">Type of Donation: In-kind</p>
                    <!-- Action Icons -->
                    <i class="bi bi-check2 text-success me-2"></i>
                    <i class="bi bi-trash text-danger"></i>
                    <!-- See Details Icon -->
                    <i class="bi bi-info-circle text-primary" data-bs-toggle="modal"
                        data-bs-target="#donationModal"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Input and Filter Dropdown -->
    <div class="row mb-3 my-5 mx-2">
        <div class="col-md-6 my-4">
            <input type="text" class="form-control" id="searchInput" placeholder="Search by Donor Name">
        </div>
        <div class="col-md-6">
            <select class="form-select" id="filterBy">
                <option value="">All</option>
                <option value="Monetary">Monetary</option>
                <option value="Goods">Goods</option>
                <option value="Volunteer">Volunteer</option>
                <option value="In-kind">In-kind</option>
            </select>
        </div>
    </div>

    <span class="my-4">Total Donation:50</span>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Donor Name</th>
                    <th>Type of Donation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Donation Row 1 -->
                <tr>
                    <td>John Doe</td>
                    <td>Monetary</td>
                    <td>
                        <div class="d-flex">
                            <!-- See Details Button -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#donationModal">
                                <i class="bi bi-info-circle-fill"></i> See Details
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Donation Row 2 -->
                <tr>
                    <td>Jane Smith</td>
                    <td>Goods</td>
                    <td>
                        <div class="d-flex">
                            <!-- See Details Button -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#donationModal">
                                <i class="bi bi-info-circle-fill"></i> See Details
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Donation Row 3 -->
                <tr>
                    <td>Alice Johnson</td>
                    <td>Volunteer</td>
                    <td>
                        <div class="d-flex">
                            <!-- See Details Button -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#donationModal">
                                <i class="bi bi-info-circle-fill"></i> See Details
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Donation Row 4 -->
                <tr>
                    <td>Bob Johnson</td>
                    <td>In-kind</td>
                    <td>
                        <div class="d-flex">
                            <!-- See Details Button -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#donationModal">
                                <i class="bi bi-info-circle-fill"></i> See Details
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<!-- donation Modal -->
<div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Donation Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Donation Type:</strong> Food</p>
                <p><strong>Name:</strong> John Doe</p>
                <p><strong>Email:</strong> john@example.com</p>
                <p><strong>Address:</strong> xyz</p>
                <p><strong>Phone:</strong> 7894561237</p>
                <p><strong>Date:</strong> 11-08-2024</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<?php include 'includes/footer.php' ?>