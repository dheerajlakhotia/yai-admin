<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Gallery</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container mt-5">
        <form id="galleryForm" action="delete.php" method="POST">
            <div class="row row-cols-2 row-cols-md-4 gx-4 gy-4">
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="0">
                        <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 100%;">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="0">
                        <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 100%;">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="0">
                        <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 100%;">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="0">
                        <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 100%;">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="0">
                        <img src="https://via.placeholder.com/300" class="img-fluid img-thumbnail" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 100%;">
                    </div>
                </div>
                <!-- Repeat this structure for other images -->
            </div>
            <div class="text-center mt-4">
                <button type="submit" id="deleteBtn" class="btn btn-danger" name="deleteSelected">Delete
                    Selected</button>
            </div>
        </form>
    </div>
</main>


<?php include 'includes/footer.php' ?>