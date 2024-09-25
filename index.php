<?php
    $title = "Home";
    $page = 'home';
    $current = 'About Us';
    include_once('assets/php/header.php');
?>  

    <div id='carouselBanner' class='carousel slide carousel-fade' data-bs-ride='carousel'>
        <div class='carousel-indicators'>
            <button type='button' data-bs-target='#carouselBanner' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
            <button type='button' data-bs-target='#carouselBanner' data-bs-slide-to='1' aria-label='Slide 2'></button>
            <button type='button' data-bs-target='#carouselBanner' data-bs-slide-to='2' aria-label='Slide 3'></button>
        </div>

        <div class='carousel-inner'>
        <?php
            $file = fopen('assets/csv/carousel.csv', 'r');
            $isFirstItem = true;

            if (($headers = fgetcsv($file, 1000, ",")) !== FALSE) {
                while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $row = array_combine($headers, $data);

                    $welcome = $row['welcome'];
                    $slogan = $row['slogan'];
                    $feature = $row['feature'];
                    $button = $row['button'];
                    $background = $row['background'];
                    $link = $row['link'];

                    carousel($background, $welcome, $slogan, $feature, $button, $isFirstItem, $link);
                    $isFirstItem = false;
                }
            }
            fclose($file);
        ?>

        </div>

        <button class='carousel-control-prev' type='button' data-bs-target='#carouselBanner' data-bs-slide='prev'>
            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
            <span class='visually-hidden'>Previous</span>
        </button>
        <button class='carousel-control-next' type='button' data-bs-target='#carouselBanner' data-bs-slide='next'>
            <span class='carousel-control-next-icon' aria-hidden='true'></span>
            <span class='visually-hidden'>Next</span>
        </button>
    </div>
</header>

<section>
    <div class="container preview-boxes">
        <div class="row">
            <?php
                $file = fopen('assets/csv/preview-box.csv', 'r');
                while(($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $icon = $data[0];
                    $preview = $data[1];
                    $description = $data[2];
                    previewBox($icon, $preview, $description);
                }
                fclose($file);
            ?>
        </div>
    </div>
</section>


<section class="service-section">
    <div class="container-fluid services-container">
        <div class="text-center">
            <?php identifier("SERVICES");?>
            <h1 class='mt-5'>What We Can Offer</h1>
            <p class="lead">Nose to Tail Veterinary Clinic offers a full range of veterinary care services<br>to ensure the health and wellbeing of your pets </p>
        </div>
    </div>
    
    <div class="container mt-5 service-container">
        <div class="row p-4">

            <?php
                $file = fopen('assets/csv/offeredservice.csv', 'r');
                
                while(($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $img = $data[0];
                    $tag = $data[1];
                    $description = $data[2];
                    $link = $data[3];

                    whyUsCard($img, $tag, $description, $link);
                }
                fclose($file);
            ?>
            
        </div>
    </div>
</section>
 
<section>
    <div class="text-center mb-3 mt-5">
        <?php identifier("TESTIMONIALS");?>
    </div>

    <div class="container-fluid mb-5">
        <div id="testimonialSlider" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <?php
                    $isFirstItem = true;
                    $reviews = [];

                    if (($file = fopen("assets/csv/testimonials.csv", "r")) !== FALSE) {
                        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                            $reviews[] = $data;
                        }
                        fclose($file);
                    }

                    $totalReviews = count($reviews);
                    $startIndex = max(0, $totalReviews - 3);

                    for ($i = $startIndex; $i < $totalReviews; $i++) {
                        $name = $reviews[$i][0];
                        $testimonial = $reviews[$i][1];
                        $picture = $reviews[$i][2];

                        testimonial($name, $testimonial, $picture, $isFirstItem);
                        $isFirstItem = false;
                    }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    
    <div class="container mt-5 p-3">
        <h2>Leave a Review!</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="testimonial" class="form-label">Your Review:</label>
                <textarea class="form-control" id="testimonial" name="testimonial" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="fileToUpload" class="form-label">Upload Your Image:</label>
                <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</section>

<?php
    include('assets/php/footer.php');
?>