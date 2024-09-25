<?php
$title = "Services";
$page = 'services';
$current = 'About Us';  

include_once('assets/php/header.php');

?>

<?php 

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

?>
<div class="container-fluid offered-section">
    <div class="text-center mb-5 mt-5"><?php identifier("OFFERED SERVICES");?></div>

    <div class="container-fluid" style="background-color: #f6f7f6; padding: 20px;">
        <div class="row">
            <?php 

                $file = fopen('assets/csv/service.csv', 'r');

                while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $icon = $data[0];
                    $img = $data[1];
                    $serviceName = $data[2];
                    $shortdescription = $data[3];
                    $details1 = $data[4];
                    $details2 = $data[5];
                    $details3 = $data[6];
                    $fulldescription = $data[7];

                    serviceCard ($icon, $img, $serviceName, $shortdescription, $details1, $details2, $details3, $fulldescription);

                }

                fclose($file);
            ?>
        </div>
    </div>
</div>

<?php
include_once('assets/php/footer.php');
?>
