<?php
    $title = "Branchess";
    $page = 'other_pages';
    $subtext = "Other branches";
    $current = 'Branches';
    $section = 'Branches';
    
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

            if ($sectionTitle == 'Other Branches') {
                $currentPage = 'OTHER BRANCHES';
                sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass);
                break;
            }
        }
        fclose($file);
    } else {
        echo "Error: Unable to open CSV file.";
    }
?>

<div class="text-center mb-3 mt-5">
    <?php identifier("OUR OTHER BRANCHES");?>
</div>

<section class="map-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="map-container shadow">
                    <iframe class="google-map" src="https://www.google.com/maps/d/u/0/embed?mid=1fM52Vr-iaXYoE9XchC8RcS05Q0zcpXU&ehbc=2E312F" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <hr class=' mt-5'>
        <div class="row mt-5">
            <div class="col-md-6">
                <h2 class="text-success display-3 mt-5" style='font-family:lilita one;'>Find Our <br>Other Branches</h2>
                <p class="section-description">Explore our various locations to find the nearest one to you!</p>
            </div>

            <div class="col-md-6">
                <?php 
                    $file = fopen('assets/csv/branches.csv', 'r');

                    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $branch = $data[0];
                        $contact = $data[1];
                        
                        branches ($branch, $contact);
                    }
                    fclose($file);
                ?>
            </div>
        </div>
    </div>
</section>    

<?php
    include_once('assets/php/footer.php');
?>