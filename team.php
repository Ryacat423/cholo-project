<?php
    $title = "Team";
    $page = 'other_pages';
    $subtext = "Meet our team";
    $current = 'Our Team';
    $section = 'Team';
    
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
    
            if ($sectionTitle == 'Our Team') {
                $currentPage = 'OUR TEAM';
                sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass);
                break;
            }
        }
        fclose($file);
    } else {
        echo "Error: Unable to open CSV file.";
    }
?>

<section id="team" class="team-section">
    <div class="text-center mb-5"><?php identifier("OUR TEAM");?></div>
    <div class="team-grid">
        <?php 
            $file = fopen('assets/csv/team.csv', 'r');

            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $name = $data[0];
                $job = $data[1];
                $img = $data[2];
                team($name, $job, $img);
            }
            fclose($file);
        ?>
    </div>
</section>
<?php
    include_once('assets/php/footer.php')
?>
