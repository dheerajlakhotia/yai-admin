<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <div class="d-grid gap-2 mt-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalDialogScrollable">
                    Add New Member
                </button>
            </div>
            <!-- Modal Dialog Scrollable -->

            <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ADD NEW MEMBER IN YAI</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputname">Full Names <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputname"
                                        placeholder="Enter your full name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputImage">Upload Image <span
                                            style="color: red;">*</span></label>
                                    <input type="file" class="form-control-file" id="exampleInputImage"
                                        name="imageUpload" onchange="previewImage(event)">
                                </div>

                                <div id="imagePreview" class="mb-3" style="display: none;">
                                    <img id="preview" src="" alt="Image Preview"
                                        style="max-width: 100px; max-height: 100px;">
                                    <button type="button" class="btn btn-outline-danger btn-sm ml-2"
                                        onclick="deleteImage()">Delete</button>
                                </div>

                                <div class="form-group">
                                    <label>Gender <span style="color: red;">*</span></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Other</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address <span
                                            style="color: red;">*</span></label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputAddress">Address <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputAddress"
                                        placeholder="Enter your address">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputMobile">Contact Number <span
                                            style="color: red;">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputMobile"
                                        placeholder="Enter your Mobile Number">
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth <span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" id="dob" name="dob">
                                </div>

                                <div class="form-group">
                                    <label for="occupation">Occupation <span style="color: red;">*</span></label>
                                    <select class="form-control" id="occupation" name="occupation">
                                        <option value="" selected>Choose...</option>
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="engineer">Engineer</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="artist">Artist</option>
                                        <option value="business">Business</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="idType">Select Identification Type <span
                                            style="color: red;">*</span></label>
                                    <select class="form-control" id="idType" name="idType">
                                        <option value="" selected>Choose...</option>
                                        <option value="passport">Passport</option>
                                        <option value="driverLicense">Driver's License</option>
                                        <option value="nationalId">National ID</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="idProof">Upload ID Proof <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control-file" id="idProof" name="idProof"
                                        onchange="previewIdProof(event)">
                                    <small class="form-text text-muted">Please upload a valid ID proof (e.g., Passport,
                                        Driver's License, National ID).</small>
                                </div>

                                <div id="idProofPreview" class="mb-3" style="display: none;">
                                    <img id="idProofPreviewImg" src="" alt="ID Proof Preview"
                                        style="max-width: 100px; max-height: 100px;">
                                    <button type="button" class="btn btn-outline-danger btn-sm ml-2"
                                        onclick="deleteImage('idProof')">Delete</button>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputHobbies">Hobbies/skills</label>
                                    <input type="text" class="form-control" id="exampleInputHobbies"
                                        placeholder="Enter your hobbies or skills">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputHobbies">Role</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">Volenteer</option>
                                        <option value="2">HOD</option>
                                        <option value="3">F.M.</option>
                                    </select>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Accept YAI terms <a
                                            href="terms.php"><span style="color: red;">*</span></a></label>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!-- End Modal Dialog Scrollable-->
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">All YAI Members Details</h5>

            <form method="get" action="">
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="search" class="form-control" placeholder="Search..."
                            value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    </div>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Brandon Jacob</td>
                            <td>
                                <!-- Edit icon -->
                                <a href="#" class="btn btn-link">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                <!-- Delete icon with red color -->
                                <a href="#" class="btn btn-link">
                                    <i class="bi bi-trash-fill" style="color: red;"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- More rows... -->
                    </tbody>
                </table>
            </div>

            <!-- End Default Table Example -->
        </div>
    </div>
</main>


<?php include 'includes/footer.php' ?>