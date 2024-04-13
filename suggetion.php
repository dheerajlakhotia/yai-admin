<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Suggestions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Suggestions</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container mt-4">

        <div class="card">
            <div class="card-body mt-4">
                <h2 class="text-center mb-4">Suggestions</h2>
                <form>
                    <div class="form-group my-3">
                        <label for="suggestionTitle">Title</label>
                        <input type="text" class="form-control" id="suggestionTitle"
                            placeholder="Enter suggestion title">
                    </div>
                    <div class="form-group">
                        <label for="suggestionDescription">Description</label>
                        <textarea class="form-control" id="suggestionDescription" rows="5"
                            placeholder="Enter suggestion description"></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label for="imageUpload">Upload Image</label>
                        <input type="file" class="form-control-file" id="imageUpload">
                    </div>
                    <div class="mb-3"></div> <!-- Adding some gap -->
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

</main>


<?php include 'includes/footer.php' ?>