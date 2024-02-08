<?php require 'includes/header.php' ?>

<?php require 'includes/navbar.php' ?>

<?php require 'includes/sidebar.php' ?>

<main id="main" class="main">
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
                        <label for="inputText" class="form-label">HOD Name: </label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="inputText" class="form-label">HOD Contact: </label>
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

        <!-- Default Table -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Location</th>
                    <th scope="col">Description</th>
                    <th scope="col">HOD Name</th>
                    <th scope="col">HOD Contact</th>
                    <th scope="col">Total Childern</th>
                    <th scope="col">Total Volenteer</th>
                    <th scope="col">Image</th>
                    <th scope="col">Opration</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>mdv colony</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi accusantium dignissimos
                        dolorem veniam autem eos enim natus quis tempore molestias!</td>
                    <td>Brandon </td>
                    <td>7894561233</td>
                    <td>25</td>
                    <td>5</td>
                    <td>image</td>
                    <td>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>mdv colony</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi accusantium dignissimos
                        dolorem veniam autem eos enim natus quis tempore molestias!</td>
                    <td>Brandon </td>
                    <td>7894561233</td>
                    <td>25</td>
                    <td>5</td>
                    <td>image</td>
                    <td>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>mdv colony</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi accusantium dignissimos
                        dolorem veniam autem eos enim natus quis tempore molestias!</td>
                    <td>Brandon </td>
                    <td>7894561233</td>
                    <td>25</td>
                    <td>5</td>
                    <td>image</td>
                    <td>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>mdv colony</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi accusantium dignissimos
                        dolorem veniam autem eos enim natus quis tempore molestias!</td>
                    <td>Brandon </td>
                    <td>7894561233</td>
                    <td>25</td>
                    <td>5</td>
                    <td>image</td>
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