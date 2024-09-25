<?php
$title = "Shop";
$page = 'shop';
$section = "Shop";
$current = 'About Us';
$subtext = "Shop Now";

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

        if ($sectionTitle == 'Shop') {
            $currentPage = 'SHOP';
            sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass);
            break;
        }
    }
    fclose($file);
} else {
    echo "Error: Unable to open CSV file.";
}

$item = $_POST['item'];
$price = $_POST['price'];
$img = $_POST['img'];
$category = $_POST['category'];
$shortdescription = $_POST['shortdescription'];
$detaileddescription = $_POST['detaileddescription'];
$additionalinformation = $_POST['additionalinformation'];

itemDetails($img, $item, $price, $category, $shortdescription, $detaileddescription, $additionalinformation);

include_once('assets/php/footer.php');
?>