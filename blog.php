<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Upload Blog Post</h1>
        <form action="/upload" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
            </div>
            <div class="mb-3">
                <label for="featureImage" class="form-label">Feature Image:</label>
                <input type="file" class="form-control" id="featureImage" name="featureImage" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="additionalImage" class="form-label">Additional Image:</label>
                <input type="file" class="form-control" id="additionalImage" name="additionalImage" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>


<?php include 'includes/footer.php' ?>