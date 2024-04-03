<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="container mt-5">
        <h1 class="mb-4">Daily Activity</h1>
        <form id="activity-form" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <select class="form-select" id="location" name="location">
                    <option value="mp_colony">MP Colony</option>
                    <option value="jailroad">Jailroad</option>
                    <option value="pawanpuri">Pawanpuri</option>
                    <option value="sagar">Sagar</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Discribe Your Activity:</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="start-time" class="form-label">Start Time:</label>
                    <input class="form-control" type="time" id="start-time" name="start-time">
                </div>
                <div class="col-md-6">
                    <label for="end-time" class="form-label">End Time:</label>
                    <input class="form-control" type="time" id="end-time" name="end-time">
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Images (Max 5):</label>
                <input class="form-control" type="file" id="image" name="image[]" accept="image/*" multiple>
                <div id="image-preview-container" class="mt-2"></div>
            </div>
            <button type="submit" class="btn btn-primary">Share Activity</button>
        </form>
    </div>

    <div class="container mt-5">
        <h1 class="mb-4">Shared Activity</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="activityTableBody">
                    <tr>
                        <td>2024-04-01</td>

                        <td>Jailroad</td>
                        <td>
                            <button type="button" class="btn btn-link"><i class="bi bi-pencil-fill"></i></button>
                            <button type="button" class="btn btn-link"><i class="bi bi-trash-fill"
                                    style="color: red;"></i></button>

                        </td>
                    </tr>
                    <tr>
                        <td>2024-04-01</td>
                        <td>Sagar</td>
                        <td>
                            <button type="button" class="btn btn-link"><i class="bi bi-pencil-fill"></i></button>
                            <button type="button" class="btn btn-link"><i class="bi bi-trash-fill"
                                    style="color: red;"></i></button>

                        </td>
                    </tr>
                </tbody>



            </table>
        </div>
    </div>





</main>


<?php include 'includes/footer.php' ?>