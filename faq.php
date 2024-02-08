<?php require 'includes/header.php'?>

<?php require 'includes/navbar.php'?>

<?php require 'includes/sidebar.php'?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Frequently Asked Questions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Frequently Asked Questions</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section faq">
        <div class="row">

            <!-- F.A.Q Group 2 and General Form Elements -->
            <div class="col-lg-6">

                <!-- General Form Elements -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add F.A.Q.</h5>

                        <form>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Qustion</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Answer</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <!-- Add other form elements as needed -->

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div><!-- End col-lg-6 -->

            <!-- F.A.Q Group 2 -->
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Deserunt ut unde corporis</h5>

                        <div class="accordion accordion-flush" id="faq-group-2">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1" type="button"
                                        data-bs-toggle="collapse">
                                        Cumque voluptatem recusandae blanditiis?
                                    </button>
                                </h2>
                                <div id="faqsTwo-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                                    <div class="accordion-body">
                                        Ut quasi odit odio totam accusamus vero eius. Nostrum asperiores voluptatem
                                        eos nulla ab dolores est asperiores iure. Quo est quis praesentium aut
                                        maiores. Corrupti sed aut expedita fugit vero dolorem. Nemo rerum sapiente.
                                        A quaerat dignissimos.
                                    </div>
                                </div>
                            </div>

                            <!-- Add other FAQ items as needed -->

                        </div>
                    </div>
                </div><!-- End F.A.Q Group 2 -->

            </div>
            <div class="card-body">
                <h5 class="card-title">Default Table</h5>

                <!-- Default Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Qustion</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Opration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Brandon Jacob</td>
                            <td>Designer</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Bridie Kessler</td>
                            <td>Designer</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Ashleigh Langosh</td>
                            <td>Finance</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Angus Grady</td>
                            <td>HR</td>
                            <td>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Raheem Lehner</td>
                            <td>Dynamic Division Officer</td>
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
    </section>

</main><!-- End #main -->

<?php include 'includes/footer.php' ?>