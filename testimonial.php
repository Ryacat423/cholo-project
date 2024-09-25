<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Testimonials</title>
</head>
<body>
<div class="container mt-5">
    <h2>Testimonials</h2>
    <div class="row">
        <?php
        if (($file = fopen("assets/csv/testimonials.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $isFirstItem = true;
                $name = $data[0];
                $testimonial = $data[1];
                $picture = $data[2];

                testimonial($name, $testimonial, $picture, $isFirstItem);
                $isFirstItem = false;
            }
            fclose($file);
        }
        ?>
    </div>
</div>
</body>
</html>
