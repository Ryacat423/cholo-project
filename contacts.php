<?php
    $title = "Contact";
    $page = 'other_pages';
    $subtext = "contact us";
    $current = 'Contacts';
    $section = 'Contact Us';
    
    include_once('assets/php/header.php');
    
    $file = fopen('assets/csv/sections.csv', 'r');

    if ($file !== FALSE) {
        $headers = fgetcsv($file, 1000, ","); 

        $sectionTitleIndex = array_search('sectionTitle', $headers);
        $linkIndex = array_search('link', $headers);
        $backgroundImageIndex = array_search('backgroundImage', $headers);
        $uniqueClassIndex = array_search('uniqueClass', $headers);

        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {

            $sectionTitle = $data[$sectionTitleIndex];
            $link = $data[$linkIndex];
            $backgroundImage = './assets/imgs/services/' . $data[$backgroundImageIndex];
            $uniqueClass = $data[$uniqueClassIndex];

            if ($sectionTitle == 'Contact Us') {
                $currentPage = 'CONTACT US';
                sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass);
                break;
            }
        }
        fclose($file);
    } else {
        echo "Error: Unable to open CSV file.";
    }
?>

<div class="container contact-container py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-4"><?php identifier("CONTACT INFORMATION");?></div>
            <div class="d-flex flex-column">
                <?php
                    $file = fopen('assets/csv/information.csv', 'r');
                    while(($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $icon = $data[0];
                        $type = $data[1];
                        $information = $data[2];
                        information($icon, $type, $information);
                    }
                    fclose($file);
                ?>
            </div>
        </div>

        <div class="col-lg-8 p-2">
            <div class="container rounded px-5 py-1 ms-5" style="background-color: #F2F2F2;">
                <span class="display-6">Contact Us!</span>
                <p class="lead">Feel free to contact us by filling up the form below:</p>
                <form action="contact-message.php" method="POST">
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstName">First Name:</label>
                                <input type="text" class="form-control" placeholder="Enter First Name" name="firstname">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="message">Message:</label>
                                <textarea name="message" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 d-grid">
                        <input type="submit" name="save" value="SAVE" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container mt-5 p-3">
    <h2>Leave a Review!</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="testimonial" class="form-label">Your Review:</label>
            <textarea class="form-control" id="testimonial" name="testimonial" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="fileToUpload" class="form-label">Upload Your Image:</label>
            <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
<?php
    include_once('assets/php/footer.php');
?>
