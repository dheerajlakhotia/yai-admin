<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'index') echo 'active'; ?>" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <?php
          $role = $_SESSION['role_id'];
         ?>

        <?php if($role == '1'): ?>
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'users-profile') echo 'active'; ?>collapsed"
                href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'about') echo 'active'; ?> collapsed" href="about.php">
                <i class="bi bi-info-circle"></i>
                <span>About</span>
            </a>
        </li><!-- End about Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'activity') echo 'active'; ?> collapsed" href="activity.php">
                <i class="bi bi-activity"></i>
                <span>Activity</span>
            </a>
        </li><!-- End activity Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'volenteer') echo 'active'; ?> collapsed" href="volenteer.php">
                <i class="bi bi-people-fill"></i>
                <span>Volenteer</span>
            </a>
        </li><!-- End volenteer Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'Testimonial') echo 'active'; ?> collapsed"
                href="testimonial.php">
                <i class="bi bi-yelp"></i>
                <span>Testimonial</span>
            </a>
        </li><!-- End volenteer Page Nav -->


        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'donation') echo 'active'; ?> collapsed" href="donation.php">
                <i class="bi bi-wallet"></i>
                <span>Donation</span>
            </a>
        </li><!-- End donation Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'gallery') echo 'active'; ?> collapsed" href="gallery.php">
                <i class="bi bi-image"></i>
                <span>Gallery</span>
            </a>
        </li><!-- End gallery Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'event') echo 'active'; ?> collapsed" href="event.php">
                <i class="bi bi-calendar4-event"></i>
                <span>Event</span>
            </a>
        </li><!-- End event Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'location') echo 'active'; ?> collapsed" href="location.php">
                <i class="bi bi-geo-fill"></i>
                <span>Location</span>
            </a>
        </li><!-- End location Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'contact') echo 'active'; ?> collapsed" href="contact.php">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'faq') echo 'active'; ?> collapsed" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>

            </a>
        </li><!-- End F.A.Q Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'terms-conditions') echo 'active'; ?> collapsed"
                href="terms-conditions.php">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Terms and Condition</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'settings') echo 'active'; ?> collapsed" href="settings.php">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li><!-- End setting Page Nav -->


        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'logout') echo 'active'; ?> collapsed" href="logout.php">
                <i class="bi bi-power"></i>
                <span>Logout</span>
            </a>
        </li><!-- End logout Page Nav -->


        <?php endif; ?>

        <?php if($role == '2' || $role == '5'): ?>
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'users-profile') echo 'active'; ?>collapsed"
                href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'activity') echo 'active'; ?> collapsed" href="activity.php">
                <i class="bi bi-activity"></i>
                <span>Activity</span>
            </a>
        </li><!-- End activity Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'volenteer') echo 'active'; ?> collapsed" href="volenteer.php">
                <i class="bi bi-people-fill"></i>
                <span>Volenteer</span>
            </a>
        </li><!-- End volenteer Page Nav -->


        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'donation') echo 'active'; ?> collapsed" href="donation.php">
                <i class="bi bi-wallet"></i>
                <span>Donation</span>
            </a>
        </li><!-- End donation Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'gallery') echo 'active'; ?> collapsed" href="gallery.php">
                <i class="bi bi-image"></i>
                <span>Gallery</span>
            </a>
        </li><!-- End gallery Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'event') echo 'active'; ?> collapsed" href="event.php">
                <i class="bi bi-calendar4-event"></i>
                <span>Event</span>
            </a>
        </li><!-- End event Page Nav -->



        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'contact') echo 'active'; ?> collapsed" href="contact.php">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'faq') echo 'active'; ?> collapsed" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'terms-conditions') echo 'active'; ?> collapsed"
                href="terms-conditions.php">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Terms and Condition</span>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'logout') echo 'active'; ?> collapsed" href="logout.php">
                <i class="bi bi-power"></i>
                <span>Logout</span>
            </a>
        </li><!-- End logout Page Nav -->


        <?php endif; ?>


        <?php if($role == '3' || $role == '4'): ?>
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'users-profile') echo 'active'; ?>collapsed"
                href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->



        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'activity') echo 'active'; ?> collapsed" href="activity.php">
                <i class="bi bi-activity"></i>
                <span>Activity</span>
            </a>
        </li><!-- End activity Page Nav -->





        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'contact') echo 'active'; ?> collapsed" href="contact.php">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'faq') echo 'active'; ?> collapsed" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'terms-conditions') echo 'active'; ?> collapsed"
                href="terms-conditions.php">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Terms and Condition</span>
            </a>
        </li>




        <li class="nav-item">
            <a class="nav-link <?php if($active_page == 'logout') echo 'active'; ?> collapsed" href="logout.php">
                <i class="bi bi-power"></i>
                <span>Logout</span>
            </a>
        </li><!-- End logout Page Nav -->


        <?php endif; ?>


    </ul>




</aside><!-- End Sidebar-->