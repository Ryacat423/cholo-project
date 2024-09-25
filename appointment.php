<?php
    $title = "Services";
    $page = 'services';
    $section = "Services";
    $current = 'About Us';
    $subtext = "Explore our top-notch services for your beloved pets.";
    
    include_once('assets/php/header.php');
?>


<div class="container pb-5">
    <div class="appointment-container">
        <div class="row">
            <div class="col-md-6" style="text-align: center;">
                <div style="text-align: left; line-height: 1;">
                    <p>Email: info@example.com</p>
                    <p>Phone: +123456789</p>
                    <p>Business Hours:</p>
                    <p>Mon-Fri: 9AM - 5PM</p>
                    <p>Sat-Sun: Closed</p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="assets/imgs/logo.jpg" alt="Logo" width="300rem">
            </div>

        </div>
    <hr>
        <h2>Appointment Request Form</h2>
        <p class='lead mb-5' style='font-size: 1rem;'>For all requests, please fill out the information below.</p>

        <form action="message.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-4">
            <label for="appointmentFullName" class="appointment-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control appointment-form-control" id="appointmentFullName" name="fullName" required>
            </div>
            <div class="col-md-4">
            <label for="appointmentPhone" class="appointment-label">Phone <span class="text-danger">*</span></label>
            <input type="tel" class="form-control appointment-form-control" id="appointmentPhone" name="phone" required>
            </div>
            <div class="col-md-4">
            <label for="appointmentEmail" class="appointment-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control appointment-form-control" id="appointmentEmail" name="email" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="appointmentDay" class="appointment-label">Day <span class="text-danger">*</span></label>
            <input type="date" class="form-control appointment-form-control" id="appointmentDay" name="day" required>
        </div>
        <div class="mb-3">
            <label for="appointmentTime" class="appointment-label">Time <span class="text-danger">*</span></label>
            <input type="time" class="form-control appointment-form-control" id="appointmentTime" name="time" required>
        </div>
        <div class="mb-3">
            <label for="appointmentService" class="appointment-label">Select Service <span class="text-danger">*</span></label>
            <select class="form-select appointment-form-select" id="appointmentService" name="service" required>
            <option value="" selected disabled>Select Service</option>
            <option value="consultation">Consultation</option>
            <option value="checkup">Check Up</option>
            <option value="treatment">Treatment</option>
            <option value="homeService">Home Service</option>
            <option value="grooming">Grooming</option>
            <option value="confinement">Confinement</option>
            <option value="vaccination">Vaccination</option>
            <option value="deworming">Deworming</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="appointmentMessage" class="appointment-label">Message</label>
            <textarea class="form-control appointment-form-control" id="appointmentMessage" name="message" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="appointmentAttachment" class="appointment-label">Attachment</label>
            <input type="file" class="form-control appointment-form-control" id="appointmentAttachment" name="fileToUpload">
        </div>
        <button type="submit" class="btn btn-primary appointment-btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>



<?php
    include_once('assets/php/footer.php');
?>
