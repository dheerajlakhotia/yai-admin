<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>YAI</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="#">Dheeraj</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- JavaScript to handle notification dismissal -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get all close buttons for notification items
    var closeButtons = document.querySelectorAll(".notification-item .btn-close");

    // Loop through close buttons and add click event listener
    closeButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent default button behavior
            var notificationItem = this.closest(
                ".notification-item"); // Find parent notification item
            notificationItem.remove(); // Remove the notification item
        });
    });
});
</script>
</body>

</html>