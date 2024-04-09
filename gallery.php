<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Photo Gallery</h1>
        <form id="galleryForm" action="delete.php" method="POST">
            <div class="row row-cols-2 row-cols-md-4 gx-4 gy-4">
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="0">
                        <img src="https://via.placeholder.com/300" class="img-fluid" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 150px;">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="1">
                        <img src="https://via.placeholder.com/300" class="img-fluid" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 150px;">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="2">
                        <img src="https://via.placeholder.com/300" class="img-fluid" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 150px;">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="selectedImages[]" value="3">
                        <img src="https://via.placeholder.com/300" class="img-fluid" alt="Image 1"
                            style="max-width: 100%; height: auto; max-width: 150px;">
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" id="deleteBtn" class="btn btn-danger" name="deleteSelected">Delete
                    Selected</button>
            </div>
        </form>
</main>


<?php include 'includes/footer.php' ?>