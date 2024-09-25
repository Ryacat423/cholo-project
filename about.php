<?php
    $title = "About Us";
    $page = 'other_pages';
    $current = 'About Us';
    $subtext = "About Us";
    $section = 'About Us';
    
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

            if ($sectionTitle == 'About Us') {
                $currentPage = 'ABOUT US';
                sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass);
                break;
            }
        }
        fclose($file);
    } else {
        echo "Error: Unable to open CSV file.";
    }

    $file = fopen('assets/csv/about.csv', 'r');

    while(($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        $type = $data[0];
        $statement = $data[1];
        
        statement($type, $statement);
    }
    fclose($file);



    include_once('assets/php/footer.php');
?>
