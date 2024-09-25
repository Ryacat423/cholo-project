<?php
    $title = "Appointment";
    $page = 'services';
    include('assets/php/header.php');

    if (isset($_POST["submit"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            echo "Error: File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "Error: Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            echo "Error: Sorry, your file is too large.";
            $uploadOk = 0;
        }

        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Error: Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Error: Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                echo '<div style="text-align: center; margin-top: 50px;">';
                echo '<i class="fas fa-check-circle" style="color: green; font-size: 48px;"></i>';
                echo '<p style="font-size: 24px; margin-top: 20px;">Your appointment request has been successfully submitted.</p>';
                echo '<p style="font-size: 18px;">Thank you for choosing us. We will review your request and get back to you shortly.</p>';
                echo '<a href="appointment.php" class="btn btn-success mb-5">Go Back</a>';
                echo '</div>';


                $fullName = htmlspecialchars($_POST['fullName']);
                $phone = htmlspecialchars($_POST['phone']);
                $email = htmlspecialchars($_POST['email']);
                $day = htmlspecialchars($_POST['day']);
                $time = htmlspecialchars($_POST['time']);
                $service = htmlspecialchars($_POST['service']);
                $message = htmlspecialchars($_POST['message']);
                $image = $target_file;


                $file = fopen('assets/csv/appointment.csv', 'a');
                if ($file) {

                    fputcsv($file, array($fullName, $phone, $email, $day, $time, $service, $message, $image));
                    fclose($file);
                } else {
                    echo "Error: Unable to open or create appointment.csv.";
                }
            } else {
                echo "Error: Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Error: Form was not submitted.";
    }
    include_once('assets/php/footer.php');
?>