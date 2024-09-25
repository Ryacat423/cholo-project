<?php
$title = "Shop";
$page = 'shop';
$section = "Shop";
$current = 'About Us';
$subtext = "Shop Now";

include_once('assets/php/header.php');

$showModal = false;
$modalMessage = '';

if (isset($_POST['add_to_cart'])) {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $quantity = $_POST['quantity'];

    if (addToCart($item, $price, $img, $quantity)) {
        $modalMessage = "Item added to cart!";
        $showModal = true;
    } else {
        $modalMessage = "Failed to add item to cart.";
        $showModal = true;
    }
}

if (isset($_POST['update_quantity'])) {
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];

    updateCartQuantity($item, $quantity);
    header("Location: cart.php");
    exit();
}

$cartItemCount = getCartItemCount();
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
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 order-lg-1 order-sm-1 order-md-1 mb-4">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <form class="d-flex align-items-center w-100">
                        <input type="text" class="form-control form-control-sm me-2" placeholder="Search products..." style="height:2.8rem; border:none;">
                        <button class="btn btn-md btn-success" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 order-lg-2 order-sm-2 order-md-2 mb-4">
            <?php identifier("CATEGORIES");?>

            <ul class='list-unstyled mt-5' style='cursor: pointer;'>
                <li data-category='dog' onclick="filterItems('Dog')"><i class='fa-solid fa-paw me-3'></i>Dog Food</li>
                <li data-category='cat' onclick="filterItems('Cat')"><i class='fa-solid fa-paw me-3'></i>Cat Food</li>
                <li data-category='care' onclick="filterItems('Care')"><i class='fa-solid fa-paw me-3'></i>Care</li>
            </ul>

            <div class="mb-5 mt-4"><?php identifier("BEST SELLER");?></div>
            <?php 
                $file = fopen('assets/csv/bestseller.csv', 'r');

                while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $item = $data[0];
                    $price = $data[1];
                    $img = $data[2];
                    $category = $data[3];
                    $shortdescription = $data[4];
                    $detaileddescription = $data[5];
                    $additionalinformation = $data[6];
                    bestSeller($img, $item, $price, $category, $shortdescription, $detaileddescription, $additionalinformation);
                }
                fclose($file);
            ?>

        </div>

        <div class="col-lg-8 order-lg-3 order-sm-3 order-md-3">
            <div class="row">
                <?php 
                $file = fopen('assets/csv/products.csv', 'r');

                while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $item = $data[0];
                    $price = $data[1];
                    $img = $data[2];
                    $category = $data[3];
                    $shortdescription = $data[4];
                    $detaileddescription = $data[5];
                    $additionalinformation = $data[6];

                    
                    itemCard($img, $item, $price, $category, $shortdescription, $detaileddescription, $additionalinformation);
                }
                fclose($file);
                ?>
            </div>
        </div>

    </div>
</div>

<?php 
if ($showModal) {
    showModal($modalMessage);
}
?>

<?php
include_once('assets/php/footer.php');
?>
