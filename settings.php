<?php require 'includes/header.php' ?>

<?php require 'includes/navbar.php' ?>

<?php require 'includes/sidebar.php' ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Settings</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Santtings</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="card">
            <div class="card-body mt-4">
                <h2 class="card-title">General Settings</h2>
                <form>
                    <div class="form-group">
                        <label for="metaDescription">Meta Description</label>
                        <textarea class="form-control" id="metaDescription" rows="3"
                            placeholder="use 150 words only"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="metaTags">Meta Tags</label>
                        <input type="text" class="form-control" id="metaTags" placeholder="Enter meta tags">
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" placeholder="Enter contact number">
                    </div>
                    <div class="form-group">
                        <label for="contactEmail">Contact Email</label>
                        <input type="email" class="form-control" id="contactEmail" placeholder="Enter contact email">
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" placeholder="Enter Address">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaFacebook">Facebook</label>
                        <input type="text" class="form-control" id="socialMediaFacebook"
                            placeholder="Enter Facebook link">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaTwitter">Twitter</label>
                        <input type="text" class="form-control" id="socialMediaTwitter"
                            placeholder="Enter Twitter link">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaInstagram">Instagram</label>
                        <input type="text" class="form-control" id="socialMediaInstagram"
                            placeholder="Enter Instagram link">
                    </div>
                    <div class="form-group">
                        <label for="socialMediaYoutube">Youtube</label>
                        <input type="text" class="form-control" id="socialMediaYoutube"
                            placeholder="Enter Youtube link">
                    </div>
                    <div class="form-group my-4">
                        <label for="logoUpload">Logo Upload</label>
                        <input type="file" class="form-control-file" id="logoUpload">
                    </div>
                    <div class="form-group mb-2">
                        <label for="faviconUpload">Favicon Upload</label>
                        <input type="file" class="form-control-file" id="faviconUpload">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>

            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body mt-4">
                <h2 class="card-title">User and Permission Settings</h2>
                <form>
                    <div class="form-group">
                        <label for="userRole">Select User Role</label>
                        <select class="form-control" id="userRole">
                            <option>Founding Member</option>
                            <option>HOD</option>
                            <option>Volunteer</option>
                            <option>Intern</option>
                            <!-- Add more user roles if needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Permissions for Pages</label>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page1">
                                    <label class="form-check-label" for="page1">Profile</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page2">
                                    <label class="form-check-label" for="page2">About</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page3">
                                    <label class="form-check-label" for="page3">Activity</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page4">
                                    <label class="form-check-label" for="page4">Volenteer</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page5">
                                    <label class="form-check-label" for="page5">Donation</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page6">
                                    <label class="form-check-label" for="page6">Blog</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page7">
                                    <label class="form-check-label" for="page7">Gallery</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page8">
                                    <label class="form-check-label" for="page8">Event</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page9">
                                    <label class="form-check-label" for="page9">Location</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page10">
                                    <label class="form-check-label" for="page10">Contact</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page11">
                                    <label class="form-check-label" for="page11">FAQ</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page12">
                                    <label class="form-check-label" for="page12">Settings</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="page13">
                                    <label class="form-check-label" for="page13">Suggetion</label>
                                </div>
                            </div>

                        </div>
                        <!-- Add more pages with checkboxes as needed -->
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Save Permissions</button>
                </form>

            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Frequently Asked Questions</h2>
                <form>
                    <div class="form-group">
                        <label for="faqQuestion">Question</label>
                        <input type="text" class="form-control" id="faqQuestion" placeholder="Enter question">
                    </div>
                    <div class="form-group">
                        <label for="faqAnswer">Answer</label>
                        <input type="text" class="form-control" id="faqAnswer" placeholder="Enter answer">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Add FAQ</button>
                </form>

                <hr>

                <span class="mt-4">Frequently Asked Questions Table</span>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>What is Lorem Ipsum?</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </td>
                                <td>
                                    <i class="bi bi-pencil text-primary"></i>
                                    <i class="bi bi-trash text-danger"></i>
                                </td>
                            </tr>
                            <!-- Add more rows for additional FAQs -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





</main>

<?php include 'includes/footer.php' ?>