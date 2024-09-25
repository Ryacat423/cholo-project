<?php
    $title = "Gallery";
    $page = 'other_pages';
    $current = 'Gallery';
    $subtext = "Check out gallery";
    $section = 'Gallery';
    
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

            if ($sectionTitle == 'Gallery') {
                $currentPage = 'GALLERY';
                sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass);
                break;
            }
        }
        fclose($file);
    } else {
        echo "Error: Unable to open CSV file.";
    }
?>

<div class="container">
    <div class="gallery">
        <?php 
            $file = fopen('assets/csv/galleryCategory.csv', 'r');

            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $img = $data[0];
                $category = $data[1];
                
                galleryCategory($img, $category);
            }
            fclose($file);
        ?>
    </div>
    <hr>
    <div class="gallery">
        <?php 
            $file = fopen('assets/csv/gallery.csv', 'r');

            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $img = $data[0];
                
                img ($img);
            }
            fclose($file);
        ?>
    </div>
    
</div>


<?php
    include_once('assets/php/footer.php');
?>
