<?php
$title = "My Appointments";
$page = "services";
include_once('assets/php/header.php');

if (isset($_POST['confirm_cancel_appointment'])) {
    $appointmentIdToCancel = $_POST['appointment_id'];
    $file = fopen('assets/csv/appointment.csv', 'r');
    $tempFile = fopen('assets/csv/temp_appointment.csv', 'w');
    $idCounter = 0;

    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        $idCounter++;
        if ($idCounter != $appointmentIdToCancel) {
            fputcsv($tempFile, $data);
        }
    }

    fclose($file);
    fclose($tempFile);

    rename('assets/csv/temp_appointment.csv', 'assets/csv/appointment.csv');
    

}

$file = fopen('assets/csv/appointment.csv', 'r');
$idCounter = 0;

echo '<div class="text-center"><span class="badge bg-light shadow mt-5 mb-5" style="font-size: 25px; color: #5D7C48;">MY APPOINTMENTS</span></div>';

while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
    $idCounter++;
    $name = htmlspecialchars($data[0]);
    $contact = htmlspecialchars($data[1]);
    $email = htmlspecialchars($data[2]);
    $date = htmlspecialchars($data[3]);
    $time = htmlspecialchars($data[4]);
    $service = strtoupper(htmlspecialchars($data[5]));
    $message = htmlspecialchars($data[6]);
    $img = "<img src='" . htmlspecialchars($data[7]) . "' alt='attached img' width='100vh'>";

    myAppointment($idCounter, $name, $contact, $email, $date, $time, $service, $message, $img);
}

fclose($file);

include_once('assets/php/footer.php');
?>
