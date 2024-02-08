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
                                    <input type="file" class="form-control-file" id="idProof" name="idProof">
                                    <small class="form-text text-muted">Please upload a valid ID proof (e.g., Passport,
                                        Driver's License,
                                        National ID).</small>
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

            <!-- Default Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Role</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Occupation</th>
                        <th scope="col">ID</th>
                        <th scope="col">Hobbies</th>
                        <th scope="col">Password</th>
                        <th scope="col">Oprations</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td scope="row">Volenteer</td>
                        <td>Brandon Jacob</td>
                        <td>Male</td>
                        <td>abc@gmail.com</td>
                        <td>987654321</td>
                        <td>xyz</td>
                        <td>11-08-2001</td>
                        <td>studend</td>
                        <td>aadhar</td>
                        <td>sb</td>
                        <td>bdvfbc</td>
                        <td>
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>


                </tbody>
            </table>
            <!-- End Default Table Example -->
        </div>
    </div>
</main>


<?php include 'includes/footer.php' ?>