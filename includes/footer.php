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
<script>
document.getElementById('edit-icon').addEventListener('click', function() {
    document.getElementById('image-input').click();
});

function submitForm() {
    document.querySelector('form').submit();
}
</script>

<script>
document.getElementById('image').addEventListener('change', function() {
    var files = this.files;
    var previewContainer = document.getElementById('image-preview-container');
    previewContainer.innerHTML = ''; // Clear previous previews

    if (files.length > 5) {
        alert("You can upload maximum 5 images.");
        this.value = ''; // Clear selected files
        return;
    }

    for (var i = 0; i < files.length; i++) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '200px';
            img.style.marginRight = '5px';
            img.style.marginBottom = '5px';
            previewContainer.appendChild(img);

            var removeIcon = document.createElement('i');
            removeIcon.className = 'bi bi-x-circle-fill remove-icon';
            removeIcon.addEventListener('click', function() {
                previewContainer.removeChild(img);
                previewContainer.removeChild(removeIcon);
                document.getElementById('image').value = ''; // Clear selected file
            });
            previewContainer.appendChild(removeIcon);
        }
        reader.readAsDataURL(files[i]);
    }
});

document.getElementById('activity-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var description = document.getElementById('description').value;
    var imageFiles = document.getElementById('image').files;

    // Here you can send the description and imageFiles to the server using AJAX or any other method.
    // For demonstration, I'm just logging the values to the console.
    console.log("Description:", description);
    console.log("Image Files:", imageFiles);
});
</script>

<script>
function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('preview');
    var imagePreview = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            imagePreview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function deleteImage() {
    var preview = document.getElementById('preview');
    var imagePreview = document.getElementById('imagePreview');
    var inputImage = document.getElementById('exampleInputImage');

    preview.src = '';
    inputImage.value = '';
    imagePreview.style.display = 'none';
}
</script>

<script>
function previewIdProof(event) {
    var input = event.target;
    var preview = document.getElementById('idProofPreviewImg');
    var previewDiv = document.getElementById('idProofPreview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            previewDiv.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script>
function openFileUpload() {
    // Trigger the click event of the hidden file input element
    document.getElementById('fileUpload').click();
}

// Handle file selection
document.getElementById('fileUpload').addEventListener('change', function(event) {
    var files = event.target.files;
    var selectedFilesDiv = document.getElementById('selectedFiles');

    // Clear previous selection
    selectedFilesDiv.innerHTML = '';

    // Display selected file names
    for (var i = 0; i < files.length; i++) {
        var fileName = files[i].name;
        var fileListItem = document.createElement('p');
        fileListItem.textContent = fileName;
        selectedFilesDiv.appendChild(fileListItem);
    }
});
</script>


<script>
const galleryElement = document.getElementById('gallery');

// Delete all images from the gallery
document.getElementById('deleteAllBtn').addEventListener('click', function() {
    galleryElement.innerHTML = '';
    // Call a function to handle backend delete operation here (using AJAX or form submission)
});

// Delete selected images from the gallery
document.getElementById('deleteSelectedBtn').addEventListener('click', function() {
    const selectedImages = galleryElement.querySelectorAll('img');
    selectedImages.forEach(image => {
        image.remove(); // Remove the image
    });
    // Call a function to handle backend delete operation for selected images here (using AJAX or form submission)
});
</script>

</body>

</html>