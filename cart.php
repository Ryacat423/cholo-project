<?php
    $title = "Shopping Cart";
    $page = "shop";
    include_once('assets/php/header.php');

    if (isset($_POST['update_quantity'])) {
        $item = $_POST['item'];
        $quantity = $_POST['quantity'];

        updateCartQuantity($item, $quantity);
    }    
    if (isset($_POST['delete_item'])) {
        $csvFilePath = 'assets/csv/cart.csv';
        $itemToDelete = $_POST['item_to_delete'];

        $csvData = [];
        if (($fileHandle = fopen($csvFilePath, 'r')) !== false) {
            while (($row = fgetcsv($fileHandle)) !== false) {
                $csvData[] = $row;
            }
            fclose($fileHandle);
        }

        $updatedCsvData = array_filter($csvData, function($row) use ($itemToDelete) {
            return $row[0] !== $itemToDelete;
        });

        if (($fileHandle = fopen($csvFilePath, 'w')) !== false) {
            foreach ($updatedCsvData as $row) {
                fputcsv($fileHandle, $row);
            }
            fclose($fileHandle);
        } else {
            die('Failed to open CSV file for writing.');
        }

    }
    
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

            if ($sectionTitle == 'My Cart') {
                $currentPage = 'MY CART';
                sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass);
                break;
            }
        }
        fclose($file);
    } else {
        echo "Error: Unable to open CSV file.";
    }


?>


<div class="container mt-5">
    <?php cartList(); ?>
</div>

<?php
include_once('assets/php/footer.php');
?>
