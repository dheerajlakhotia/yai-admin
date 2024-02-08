<?php require'includes/header.php'?>

<?php require'includes/navbar.php'?>

<?php require'includes/sidebar.php'?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">


        <div class="row">

            <!-- Member Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">



                    <div class="card-body">
                        <h5 class="card-title">Total Members<span>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3 mt-3">
                                        <h6>145</h6>
                                    </div>
                                </div>
                    </div>
                </div>
            </div><!-- End Member Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Fund<span>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                        <i class="bi bi-currency-rupee"></i>
                                    </div>
                                    <div class="ps-3 mt-3">
                                        <h6>5000rs</h6>
                                    </div>
                                </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- childenes Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">


                    <div class="card-body">
                        <h5 class="card-title">Total childenes<span>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3 mt-3">
                                        <h6>1244</h6>
                                    </div>
                                </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->
            <!-- Location Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">


                    <div class="card-body">
                        <h5 class="card-title">Total Locations<span>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center mt-3">
                                        <i class="bi bi-pin"></i>
                                    </div>
                                    <div class="ps-3 mt-3">
                                        <h6>4</h6>
                                    </div>
                                </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->

            <!-- VOlenteer approval -->

            <div class="container mt-5">
                <h2>Volunteer Admission Requests</h2>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data; replace with dynamic data from your backend -->
                        <tr>
                            <th scope="row">1</th>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>123-456-7890</td>
                            <td>
                                <button class="btn btn-success" onclick="approveRequest(1)">Approve</button>
                                <button class="btn btn-danger" onclick="rejectRequest(1)">Reject</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    See Details
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jane Doe</td>
                            <td>jane@example.com</td>
                            <td>987-654-3210</td>
                            <td>
                                <button class="btn btn-success">Approve</button>
                                <button class="btn btn-danger">Reject</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    See Details
                                </button>


                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Name:</strong> John Doe</p>
                            <p><strong>Email:</strong> john@example.com</p>
                            <p><strong>Gender:</strong> Male</p>
                            <p><strong>Address:</strong> xyz</p>
                            <p><strong>Phone:</strong> 7894561237</p>
                            <p><strong>Date Of Birth:</strong> 11-08-2001</p>
                            <p><strong>Occupation:</strong> student</p>
                            <p><strong>ID Proof:</strong> aadhar</p>
                            <p><strong>Hobbies:</strong> football</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Donation approval -->

            <div class="container mt-5">
                <h2>Donation Requests</h2>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data; replace with dynamic data from your backend -->
                        <tr>
                            <th scope="row">1</th>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>123-456-7890</td>
                            <td>
                                <button class="btn btn-success" onclick="approveRequest(1)">Approve</button>
                                <button class="btn btn-danger" onclick="rejectRequest(1)">Reject</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#donationModal">
                                    See Details
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jane Doe</td>
                            <td>jane@example.com</td>
                            <td>987-654-3210</td>
                            <td>
                                <button class="btn btn-success">Approve</button>
                                <button class="btn btn-danger">Reject</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#donationModal">
                                    See Details
                                </button>


                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Donation Type:</strong> Food</p>
                            <p><strong>Name:</strong> John Doe</p>
                            <p><strong>Email:</strong> john@example.com</p>
                            <p><strong>Address:</strong> xyz</p>
                            <p><strong>Phone:</strong> 7894561237</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Donation approval -->

            <div class="container mt-5">
                <h2>Contact</h2>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data; replace with dynamic data from your backend -->
                        <tr>
                            <th scope="row">1</th>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>123-456-7890</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#ContactModal">
                                    See Massage
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jane Doe</td>
                            <td>jane@example.com</td>
                            <td>987-654-3210</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#ContactModal">
                                    See Massage
                                </button>


                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- Modal -->
            <div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Massage</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Subject:</strong> Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Velit, unde.</p>
                            <p><strong>Massage:</strong> Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                                Necessitatibus, magnam deleniti. Nam iure dignissimos ea culpa inventore eos
                                perspiciatis aperiam aut iste quidem nulla illum deleniti, ratione quisquam,
                                similique at dicta obcaecati, suscipit fuga praesentium architecto libero? Quas
                                tempora nulla architecto voluptatibus veniam earum, porro molestias amet
                                delectus maxime explicabo.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>





            <!-- News & Updates Traffic -->
            <div class="col-lg">
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Blogs</h5>

                        <div class="news">
                            <div class="post-item clearfix">
                                <img src="assets/img/news-1.jpg" alt="">
                                <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut
                                    harum...</p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-2.jpg" alt="">
                                <h4><a href="#">Quidem autem et impedit</a></h4>
                                <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona
                                    nande...
                                </p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-3.jpg" alt="">
                                <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et
                                    totam...
                                </p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-4.jpg" alt="">
                                <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum
                                    cuder...
                                </p>
                            </div>

                            <div class="post-item clearfix">
                                <img src="assets/img/news-5.jpg" alt="">
                                <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae
                                    dignissimos
                                    eius...</p>
                            </div>

                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daily Drives</h5>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">location</th>
                                    <th scope="col">date</th>
                                    <th scope="col">description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tempore
                                        ratione
                                        voluptates ut neque corporis dolorum perspiciatis ipsa accusamus veritatis
                                        porro
                                        inventore repellendus, sapiente fugiat animi doloribus quas eligendi
                                        voluptatem
                                        similique non tenetur necessitatibus vitae beatae? Perspiciatis doloribus
                                        debitis,
                                        dolore animi veniam quos, in porro ex provident omnis facilis incidunt.</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tempore
                                        ratione
                                        voluptates ut neque corporis dolorum perspiciatis ipsa accusamus veritatis
                                        porro
                                        inventore repellendus, sapiente fugiat animi doloribus quas eligendi
                                        voluptatem
                                        similique non tenetur necessitatibus vitae beatae? Perspiciatis doloribus
                                        debitis,
                                        dolore animi veniam quos, in porro ex provident omnis facilis incidunt.</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tempore
                                        ratione
                                        voluptates ut neque corporis dolorum perspiciatis ipsa accusamus veritatis
                                        porro
                                        inventore repellendus, sapiente fugiat animi doloribus quas eligendi
                                        voluptatem
                                        similique non tenetur necessitatibus vitae beatae? Perspiciatis doloribus
                                        debitis,
                                        dolore animi veniam quos, in porro ex provident omnis facilis incidunt.</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tempore
                                        ratione
                                        voluptates ut neque corporis dolorum perspiciatis ipsa accusamus veritatis
                                        porro
                                        inventore repellendus, sapiente fugiat animi doloribus quas eligendi
                                        voluptatem
                                        similique non tenetur necessitatibus vitae beatae? Perspiciatis doloribus
                                        debitis,
                                        dolore animi veniam quos, in porro ex provident omnis facilis incidunt.</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tempore
                                        ratione
                                        voluptates ut neque corporis dolorum perspiciatis ipsa accusamus veritatis
                                        porro
                                        inventore repellendus, sapiente fugiat animi doloribus quas eligendi
                                        voluptatem
                                        similique non tenetur necessitatibus vitae beatae? Perspiciatis doloribus
                                        debitis,
                                        dolore animi veniam quos, in porro ex provident omnis facilis incidunt.</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>
            </div>


    </section>

</main><!-- End #main -->

<?php include'includes/footer.php'?>