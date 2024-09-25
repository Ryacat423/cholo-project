<?php
    $title = "Services";
    $page = 'services';
    $current = 'About Us';
    
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

            if ($sectionTitle == 'Services') {
                $currentPage = 'SERVICES';
                sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass);
                break;
            }
        }
        fclose($file);
    } else {
        echo "Error: Unable to open CSV file.";
    }

    $img = $_POST['img'];
    $serviceName = $_POST['serviceName'];
    $shortdescription = $_POST['shortdescription'];
    $details1 = $_POST['details1'];
    $details2 = $_POST['details2'];
    $details3 = $_POST['details3'];
    $fulldescription = $_POST['fulldescription'];

    serviceDetails($img, $serviceName, $shortdescription, $details1, $details2, $details3, $fulldescription);
?>

<?php
    include_once('assets/php/footer.php');
?>
