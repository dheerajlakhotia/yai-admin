<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="container-fluid">
        <!-- Use container-fluid for full width -->

        <!-- General Form Elements -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">About Us</h5>

                <form enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Title: </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">Description: </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="locationImage" class="form-label">Image: </label>
                        <input type="file" class="form-control" id="Image" name="Image">
                    </div>


                    <!-- Add other form elements as needed -->

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>

    </div><!-- End container-fluid -->
    <div class="card-body">
        <h5 class="card-title">Edit About Us</h5>

        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Opration</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lorem ipsum dolor sit...</td>
                    <td>
                        <a href="#" class="mx-3"><i class="bi bi-pencil"></i></a>
                        <a href="#"><i class="bi bi-trash" style="color: red;"></i></a>

                    </td>

                </tr>

            </tbody>
        </table>
        <!-- End Default Table Example -->
    </div>
</main>


<?php include 'includes/footer.php' ?>