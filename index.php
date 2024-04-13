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

            <!-- Top Performers Section -->
            <div class="col-12">
                <h2>Top Performers </h2> <small> <span>Month</span></small>
                <div class="row">
                    <!-- Top Performer 1 -->
                    <div class="col-md-3">
                        <div class="card performer-card">
                            <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top" alt="Performer Image">
                            <div class="card-body">
                                <h5 class="card-title">Neeraj</h5>
                                <p class="card-text">Total Drives: 7</p>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for Top Performer 2, 3, and 4 -->
                    <!-- Top Performer 2 -->
                    <div class="col-md-3">
                        <div class="card performer-card">
                            <img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top" alt="Performer Image">
                            <div class="card-body">
                                <h5 class="card-title">Dheeraj</h5>
                                <p class="card-text">Total Drives: 15</p>

                            </div>
                        </div>
                    </div>
                    <!-- Top Performer 3 -->
                    <div class="col-md-3">
                        <div class="card performer-card">
                            <img src="https://images.unsplash.com/photo-1504593811423-6dd665756598?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top" alt="Performer Image">
                            <div class="card-body">
                                <h5 class="card-title">Yash</h5>
                                <p class="card-text">Total Drives: 10</p>

                            </div>
                        </div>
                    </div>
                    <!-- Top Performer 4 -->
                    <div class="col-md-3">
                        <div class="card performer-card">
                            <img src="https://images.unsplash.com/photo-1500048993953-d23a436266cf?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="card-img-top" alt="Performer Image">
                            <div class="card-body">
                                <h5 class="card-title">Suraj</h5>
                                <p class="card-text">Total Drives: 20</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Top Performers Section -->


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





            <!-- volenteer approval -->

            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="card-title">Volenteer Requests</h2>

                                <table class="table table-bordered mt-4 text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data; replace with dynamic data from your backend -->
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>John Doe</td>
                                            <td>
                                                <a href="#" onclick="approveRequest(1)" class="me-2">
                                                    <i class="bi bi-check"></i><!-- Use Bootstrap Icons for approval -->
                                                </a>
                                                <a href="#" onclick="rejectRequest(1)" class="me-2">
                                                    <i class="bi bi-trash"></i>
                                                    <!-- Use Bootstrap Icons for rejection -->
                                                </a>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#volenteerModal">
                                                    See Detail <i class="bi bi-primery"></i>
                                                </button>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jane Doe</td>

                                            <td>
                                                <a href="#" onclick="approveRequest(1)" class="me-2">
                                                    <i class="bi bi-check"></i><!-- Use Bootstrap Icons for approval -->
                                                </a>
                                                <a href="#" onclick="rejectRequest(1)" class="me-2">
                                                    <i class="bi bi-trash"></i>
                                                    <!-- Use Bootstrap Icons for rejection -->
                                                </a>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#volenteerModal">
                                                    See Detail <i class="bi bi-primery"></i>
                                                </button>


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-5">
                                <!-- Donation approval -->
                                <div class="container">
                                    <h2 class="card-title">Donation Requests</h2>

                                    <table class="table table-bordered mt-4 text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">S.No.</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Sample data; replace with dynamic data from your backend -->
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>John Doe</td>
                                                <td>
                                                    <a href="#" onclick="approveRequest(1)" class="me-2">
                                                        <i class="bi bi-check"></i>
                                                        <!-- Use Bootstrap Icons for approval -->
                                                    </a>
                                                    <a href="#" onclick="rejectRequest(1)" class="me-2">
                                                        <i class="bi bi-trash"></i>
                                                        <!-- Use Bootstrap Icons for rejection -->
                                                    </a>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#donationModal">
                                                        See Detail <i class="bi bi-primery"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jane Doe</td>

                                                <td>
                                                    <a href="#" onclick="approveRequest(1)" class="me-2">
                                                        <i class="bi bi-check"></i>
                                                        <!-- Use Bootstrap Icons for approval -->
                                                    </a>
                                                    <a href="#" onclick="rejectRequest(1)" class="me-2">
                                                        <i class="bi bi-trash"></i>
                                                        <!-- Use Bootstrap Icons for rejection -->
                                                    </a>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#donationModal">
                                                        See Detail <i class="bi bi-primery"></i>
                                                    </button>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <!-- COntact Message -->

                                    <div class="container mt-5">
                                        <h2 class="card-title">Contact</h2>

                                        <table class="table table-bordered mt-4">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.No.</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Sample data; replace with dynamic data from your backend -->
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>John Doe</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#ContactModal">
                                                            See Massage <i class="bi bi-primery"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jane Doe</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#ContactModal">
                                                            See Massage <i class="bi bi-primery"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- volenteer Modal -->
            <div class="modal fade" id="volenteerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Donation Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <img id="zoomImage" src="assets/img/news-1.jpg" alt=""
                                    style="max-width: 275px; max-height: 275px; ">
                            </div>
                            <p><strong>Name:</strong> John Doe</p>
                            <p><strong>Email:</strong> john@example.com</p>
                            <p><strong>Gender:</strong> Male</p>
                            <p><strong>Address:</strong> xyz</p>
                            <p><strong>Phone:</strong> 7894561237</p>
                            <p><strong>Date Of Birth:</strong> 11-08-2001</p>
                            <p><strong>Occupation:</strong> Student</p>
                            <p><strong>ID Proof:</strong> Aadhar</p>
                            <div>
                                <img id="zoomImage" src="assets/img/card.jpg" alt=""
                                    style="max-width: 275px; max-height: 275px; ">
                            </div>

                            <p><strong>Hobbies:</strong> Football</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- donation Modal -->
            <div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Donation Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Donation Type:</strong> Food</p>
                            <p><strong>Name:</strong> John Doe</p>
                            <p><strong>Email:</strong> john@example.com</p>
                            <p><strong>Address:</strong> xyz</p>
                            <p><strong>Phone:</strong> 7894561237</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>




            <!--contact Modal -->
            <div class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Massage</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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


                        <h5 class="card-title">Today Drive</h5>
                        <div class="row">
                            <div class="col-12">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-bs-toggle="list" href="#list-home" role="tab"
                                        aria-controls="list-home">SAGAR
                                        ROAD</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-bs-toggle="list" href="#list-profile" role="tab"
                                        aria-controls="list-profile">PAWANPURI</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list"
                                        data-bs-toggle="list" href="#list-messages" role="tab"
                                        aria-controls="list-messages">JAILROAD</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list"
                                        data-bs-toggle="list" href="#list-settings" role="tab"
                                        aria-controls="list-settings">MP
                                        COLONY</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- first location  -->
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel"
                                        aria-labelledby="list-home-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Yash</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                                <tr>
                                                    <td>Pawan</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis Lorem ipsum dolor sit amet.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- secound location  -->
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel"
                                        aria-labelledby="list-profile-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Dheeraj</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis Lorem ipsum dolor sit amet.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- third location  -->
                                    <div class="tab-pane fade" id="list-messages" role="tabpanel"
                                        aria-labelledby="list-messages-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Neeraj</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                                <tr>
                                                    <td>Suraj</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                                <tr>
                                                    <td>Seema</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- fourth location -->
                                    <div class="tab-pane fade" id="list-settings" role="tabpanel"
                                        aria-labelledby="list-settings-list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ashish</td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Eveniet,
                                                        perferendis.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


    </section>

</main><!-- End #main -->

<?php include'includes/footer.php'?>