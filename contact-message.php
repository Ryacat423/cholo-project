<?php
$page = 'other_pages';
include('assets/php/header.php');
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$fullname = $firstname . ' ' . $lastname;
$email = $_POST['email'];
$message = $_POST['message'];

if(isset($_POST['save'])){
    echo "<h1 class='text-center h3 mt-5'>Thank you $fullname!</h1>";
    echo "<p class='h6 text-center'>Your Message: </p>";
    echo "<p class='lead text-center'>$message</p>";
    echo "<p class='lead text-center mb-5'>We will get in touch with you at your email: $email</p>";
}else {
    echo "<h1 class='text-center display-6 m-5'>Oooops :0 Go Back!! Click <a href='appointment.php'>Here</a></h1>";
}


include_once('assets/php/footer.php');
?>
