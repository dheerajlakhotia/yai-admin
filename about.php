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
        <h5 class="card-title">Default Table</h5>

        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Opration</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, reiciendis!</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi accusantium dignissimos
                        dolorem veniam autem eos enim natus quis tempore molestias!</td>
                    <td>Image</td>
                    <td>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
                </tr>

            </tbody>
        </table>
        <!-- End Default Table Example -->
    </div>
</main>


<?php include 'includes/footer.php' ?>