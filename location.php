<?php require 'includes/header.php' ?>

<?php require 'includes/navbar.php' ?>

<?php require 'includes/sidebar.php' ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Location</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Location</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <!-- F.A.Q Group 2 and General Form Elements -->
    <div class="container-fluid">
        <!-- Use container-fluid for full width -->

        <!-- General Form Elements -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Location</h5>

                <form enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Location Name: </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Description: </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Total childrens: </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Total volunteers: </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city" class="form-label">City: </label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="state" class="form-label">State: </label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="locationImage" class="form-label">Location Image: </label>
                        <input type="file" class="form-control" id="locationImage" name="locationImage">
                    </div>


                    <!-- Add other form elements as needed -->

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Location</button>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>

    </div><!-- End container-fluid -->
    <div class="card-body">
        <h5 class="card-title">Default Table</h5>
        <span>Total Location: 4</span>
        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Location</th>
                    <th scope="col">Opration</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>mdv colony</td>
                    <td>
                        <span class="bi bi-pencil-square text-primary" title="Edit"></span>
                        <span class="bi bi-trash text-danger" title="Delete"></span>

                    </td>
                </tr>

            </tbody>
        </table>
        <!-- End Default Table Example -->
    </div>

</main>

<?php include 'includes/footer.php' ?>