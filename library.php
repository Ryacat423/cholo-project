<?php

    function carousel($background, $welcome, $slogan, $feature, $button, $isFirstItem, $link){
        $activeClass = $isFirstItem ? ' active' : '';

        echo "
        <div class='carousel-item$activeClass' data-bs-interval='8000'>
            <div class='overlay-image' style='background-image: url(./assets/imgs/$background);'></div>
            <div class='container brand-container center'>
                <span class='badge bg-light' style='font-size: 20px; color: #5D7C48;'>$welcome<br>
                    <span style='font-size: 15px;'>$slogan</span></span>
                <h1 class='display-2'>$feature</h1>
                <a href='$link' class='btn btn-light btn-lg mt-5'><i class='bi bi-calendar me-3'></i>$button</a>
            </div>
        </div>";
    }

    function testimonial($name, $testimonial, $picture, $isFirstItem) {
        $activeClass = $isFirstItem ? ' active' : '';
        echo "
        <div class='carousel-item$activeClass'>
            <div class='row justify-content-center'>
                <div class='col-lg-10 text-center'>
                    <div class='testimonial-item'>
                    <img src='$picture' alt='Profile Picture' width='100vh' class='rounded-circle img-fluid shadow mb-3'>
                    <p class='mb-0'>'$testimonial'</p>
                    <h5 class='mt-3'>$name</h5>
                    </div>
                </div>
            </div>
        </div>
        ";
    }

    function sectionHeader($sectionTitle, $link, $currentPage, $backgroundImage, $uniqueClass) {
        echo "
        <section class='section-header $uniqueClass' style='background-image: url($backgroundImage);'>
            <div class='overlay'>
                <div class='container mt-5'>
                    <h1 class='section-title'>$sectionTitle</h1>
                    <p class='section-subtitle'>
                        <a href='index.php' class='text-light'>HOME</a> · <a href='$link' class='text-light'>$currentPage</a>
                    </p>
                </div>
            </div>
        </section>";
    }

    function previewBox($icon, $preview, $description){
        $icon = $icon;
        $preview = $preview;
        $description = $description;

        echo 
        "
        <div class='col-md-4'>
            <div class='preview-box text-center p-4 shadow'>
                <i class='$icon' style='font-size: 40px;'></i>
                <h3>$preview</h3>
                <p>$description</p>
            </div>
        </div>";
    }

    function information($icon, $type, $information){
        $icon = $icon;
        $type = $type;
        $information = $information;

        echo
        "<div class='border shadow mb-4 p-4 rounded icon-box'>
            <div class='d-flex'>
                <div><i class='$icon'></i></div>
                <span class='align-content-center'>
                    $type <br>
                    $information
                </span>
            </div>
        </div>";
    }

    function itemCard($img, $item, $price, $category, $shortdescription, $detaileddescription, $additionalinformation) {
        $productName = $item;
        $productImage = "<img src='./assets/imgs/products/$img' class='card-img-top' alt='Product Image'>";
        $productPrice = "₱$price";
    
        echo "
        <div class='col-md-4 mb-4 product-item' data-category='$category'>
            <form method='POST' action='product-details.php' class='text-decoration-none'>
                <div class='card item-card' style='cursor: pointer;' onclick='this.parentNode.submit();'>
                    $productImage
                    <div class='card-body item-card-body'>
                        <h6 class='card-title item-card-title'>$productName</h6>
                        <p class='item-card-price'>$productPrice</p>
                        <div class='item-card-rating'>
                            <i class='bi bi-star-fill'></i>
                            <i class='bi bi-star-fill'></i>
                            <i class='bi bi-star-fill'></i>
                            <i class='bi bi-star-fill'></i>
                            <i class='bi bi-star'></i>
                        </div>
                        <input type='hidden' name='item' value='$item'>
                        <input type='hidden' name='price' value='$price'>
                        <input type='hidden' name='img' value='$img'>
                        <input type='hidden' name='category' value='$category'>
                        <input type='hidden' name='shortdescription' value='$shortdescription'>
                        <input type='hidden' name='detaileddescription' value='$detaileddescription'>
                        <input type='hidden' name='additionalinformation' value='$additionalinformation'>
                    </div>
                </div>
            </form>
        </div>";
    }
    
    function bestSeller($img, $item, $price, $category, $shortdescription, $detaileddescription, $additionalinformation) {
        echo "
            <form method='POST' action='product-details.php' class='text-decoration-none'>
                <div class='card mb-3 best-seller-card' style='border:none;' onclick='this.parentNode.submit();'>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-md-4'>
                                <img src='./assets/imgs/products/$img' width='100%' style='height:6rem;'>
                            </div>
                            <div class='col-md-8'>
                                <h4 class='mt-3'>$item</h4>
                                <div class='item-card-rating'>
                                    <i class='bi bi-star-fill'></i>
                                    <i class='bi bi-star-fill'></i>
                                    <i class='bi bi-star-fill'></i>
                                    <i class='bi bi-star-fill'></i>
                                    <i class='bi bi-star'></i>
                                </div>
                            </div>
                        </div>
                        <input type='hidden' name='item' value='$item'>
                        <input type='hidden' name='price' value='$price'>
                        <input type='hidden' name='img' value='$img'>
                        <input type='hidden' name='category' value='$category'>
                        <input type='hidden' name='shortdescription' value='$shortdescription'>
                        <input type='hidden' name='detaileddescription' value='$detaileddescription'>
                        <input type='hidden' name='additionalinformation' value='$additionalinformation'>
                    </div>
                </div>
            </form>";
    }

    function itemDetails($img, $item, $price, $category, $shortdescription, $detaileddescription, $additionalinformation) {
        echo "
        <div class='container mt-5'>
            <div class='row'>
                <div class='col-lg-6'>
                    <img src='./assets/imgs/products/$img' class='product-image' alt='Product Image' width='100%'>
                </div>
                <div class='col-lg-6'>
                    <div class='product-details'>
                        <h1 class='product-title'>$item</h1>
                        <div class='product-rating'>
                            <i class='bi bi-star-fill'></i>
                            <i class='bi bi-star-fill'></i>
                            <i class='bi bi-star-fill'></i>
                            <i class='bi bi-star-fill'></i>
                            <i class='bi bi-star'></i>
                        </div>
                        <p class='product-price'>₱$price</p>
                        <p class='product-description'>
                            $shortdescription
                        </p>
                        <hr>
                        <div class='product-meta'>
                            <p><strong>Categories:</strong> $category</p>
                        </div>
                        <hr>
                        <div class='d-flex align-items-center'>
                            <form action='shop.php' method='POST' class='d-flex align-items-center'>
                                <input type='number' class='form-control product-quantity' value='1' min='1' name='quantity'>
                                <input type='hidden' name='item' value='$item'>
                                <input type='hidden' name='price' value='$price'>
                                <input type='hidden' name='img' value='$img'>
                                <input type='submit' name='add_to_cart' value='Add to Cart' class='btn product-button'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class='d-flex justify-content-center mt-5'>
                <ul class='nav product-nav nav-tabs' id='myTab' role='tablist'>
                    <li class='nav-item' role='presentation'>
                        <button class='nav-link active product-nav-link' id='description-tab' data-bs-toggle='tab' data-bs-target='#description' type='button' role='tab' aria-controls='description' aria-selected='true'>Description</button>
                    </li>
                    <li class='nav-item' role='presentation'>
                        <button class='nav-link product-nav-link' id='additional-info-tab' data-bs-toggle='tab' data-bs-target='#additional-info' type='button' role='tab' aria-controls='additional-info' aria-selected='false'>Additional Information</button>
                    </li>
                </ul>
            </div>
            <div class='d-flex justify-content-center mt-3'>
                <div class='tab-content' id='myTabContent'>
                    <div class='tab-pane fade show active p-3' id='description' role='tabpanel' aria-labelledby='description-tab'>
                        <p>$detaileddescription</p>
                    </div>
                    <div class='tab-pane fade p-3' id='additional-info' role='tabpanel' aria-labelledby='additional-info-tab'>
                        <p>$additionalinformation</p>
                    </div>
                </div>
            </div>
        </div>";
    }
    
    function addToCart($item, $price, $img, $quantity) {
        $file = fopen("assets/csv/cart.csv", "a");
        $data = array($item, $price, $img, $quantity); 
    
        if (fputcsv($file, $data)) {
            fclose($file);
            return true;
        } else {
            fclose($file);
            return false;
        }
    }
    
    function getCartItemCount() {
        $file = fopen("assets/csv/cart.csv", "r");
        $items = [];
        while (($data = fgetcsv($file)) !== FALSE) {
            $items[$data[0]] = true;  // Use the item name as the key to ensure uniqueness
        }
        fclose($file);
        return count($items);
    }

    function getAppointmentsCount() {
        $file = fopen("assets/csv/appointment.csv", "r");
        $rowCount = 0;
    
        while (($data = fgetcsv($file)) !== FALSE) {
            $rowCount++;
        }
    
        fclose($file);
        return $rowCount;
    }
    
    function updateCartQuantity($item, $quantity) {
        $file = fopen("assets/csv/cart.csv", "r");
        $tempFile = fopen("assets/csv/cart_temp.csv", "w");
    
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($data[0] == $item) {
                $data[3] = $quantity;
            }
            fputcsv($tempFile, $data);
        }
    
        fclose($file);
        fclose($tempFile);

        rename("assets/csv/cart_temp.csv", "assets/csv/cart.csv");
    }
    
    function cartList() {
        $file = fopen("assets/csv/cart.csv", "r");
        $totalPrice = 0;
    
        echo "<div class='container mt-5'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='list-group'>";
    
        while (($data = fgetcsv($file)) !== FALSE) {
            $img = $data[2];
            $item = $data[0];
            $price = $data[1];
            $quantity = $data[3];
            $totalItemPrice = str_replace('₱', '', $price) * $quantity;
            $totalPrice += $totalItemPrice;
    
            echo "
            <div class='list-group-item cart-item p-3' style='border:none;'>
                <div class='row'>
                    <div class='col-3 col-md-2'>
                        <img src='./assets/imgs/products/$img' class='img-fluid' alt='Product Image' style='height: 8rem;'>
                    </div>
                    <div class='col-6 col-md-4 cart-item-details'>
                        <h6 class='mt-2' style='font-size:1.5rem;'>$item</h6>
                        <p style='color:green;'>₱$price</p>
                    </div>
                    <div class='col-3 col-md-2 cart-item-controls'>
                        <form action='cart.php' method='POST'>
                            <div class='d-flex align-items-center mt-4'>
                                <input type='number' name='quantity' value='$quantity' min='1' class='form-control me-2'>
                                <input type='hidden' name='item' value='$item'>
                                <input type='submit' name='update_quantity' value='Update' class='btn btn-secondary'>
                            </div>
                        </form>
                    </div>
                    <div class='col-12 col-md-4 cart-item-total text-end'>
                        <form action='cart.php' method='POST'>
                            <input type='hidden' name='item_to_delete' value='$item'>
                            <button type='submit' name='delete_item' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></button>
                        </form>
                        <h6>₱$totalItemPrice</h6>
                    </div>
                </div>
                <hr>
            </div>";
        }
    
        echo "      </div>
                    <div class='cart-summary mt-4 p-4 bg-light rounded'>
                        <h3>Cart Summary</h3>
                        <div class='d-flex justify-content-between'>
                            <p>Subtotal:</p>
                            <p>₱$totalPrice</p>
                        </div>
                        <div class='d-flex justify-content-between'>
                            <p>Shipping:</p>
                            <p>₱50</p>
                        </div>
                        <div class='d-flex justify-content-between'>
                            <h5>Total:</h5>
                            <h5>₱" . ($totalPrice + 50) . "</h5>
                        </div>
                        <div class='d-flex justify-content-between mt-3'>
                            <a href='shop.php' class='btn btn-secondary'>Continue Shopping</a>
                            <button class='btn btn-primary'>Proceed to Checkout</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>";
    
        fclose($file);
    }    
    
    function showModal($modalMessage) {
        echo "
        <div class='modal fade show' id='cartModal' tabindex='-1' aria-labelledby='cartModalLabel' aria-hidden='true' style='display:block;'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='cartModalLabel'>Notification</h5>
                    </div>
                    <div class='modal-body'>
                        $modalMessage
                    </div>
                    <div class='modal-footer'>
                        <form method='post'>
                            <button type='submit' class='btn btn-secondary'>Close</button>
                            <a href='cart.php' class='btn btn-primary'>View Cart</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
    }

    function serviceCard($icon, $img, $serviceName, $shortdescription, $details1, $details2, $details3, $fulldescription) {
        echo "
        <div class='col-md-3 mb-5'>
            <div class='card-service mx-auto' style='max-width: 300px;'>
                <div class='card-body'>
                    <div class='icon-card'>
                        <i class='$icon'></i>
                    </div>
                    <h5 class='card-title'>$serviceName</h5>
                    <p class='card-text'>$shortdescription</p>
                    <form method='POST' action='service-details.php'>
                        <input type='hidden' name='img' value='$img'>
                        <input type='hidden' name='serviceName' value='$serviceName'>
                        <input type='hidden' name='shortdescription' value='$shortdescription'>
                        <input type='hidden' name='details1' value='$details1'>
                        <input type='hidden' name='details2' value='$details2'>
                        <input type='hidden' name='details3' value='$details3'>
                        <input type='hidden' name='fulldescription' value='$fulldescription'>
                        <button type='submit' class='btn btn-link card-link'>
                            <i class='fas fa-paw icon-card'></i> VIEW DETAILS
                        </button>
                    </form>
                </div>
            </div>
        </div>";
    }
    
    function serviceDetails($img, $serviceName, $shortdescription, $details1, $details2, $details3, $fulldescription) {
        echo "
        <div class='service-content container' style='padding: 2rem 1rem'>
            <div class='row mb-4'>
                <div class='col-md-6'>
                    <img src='./assets/imgs/servicecard/$img' alt='Service Image' class='img-fluid rounded'>
                </div>
                <div class='col-md-6'>
                    <h2>$serviceName</h2>
                    <p>$shortdescription</p>
                    <ul>
                        <li><i class='fas fa-check-circle'></i> $details1</li>
                        <li><i class='fas fa-check-circle'></i> $details2</li>
                        <li><i class='fas fa-check-circle'></i> $details3</li>
                    </ul>
                    <div class='d-grid'>
                        <a href='appointment.php' class='btn btn-success'>Make an Appointment</a>
                    </div>
                </div>
            </div>

            <div class='row'>
                <div class='col-12'>
                    <nav>
                        <div class='nav nav-tabs' id='nav-tab' role='tablist'>
                            <button class='nav-link active' id='nav-description-tab' data-bs-toggle='tab' data-bs-target='#nav-description' type='button' role='tab' aria-controls='nav-description' aria-selected='true'>Description</button>
                        </div>
                    </nav>
                    <div class='tab-content p-3' id='nav-tabContent'>
                        <div class='tab-pane fade show active' id='nav-description' role='tabpanel' aria-labelledby='nav-description-tab'>
                            <p>$fulldescription</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }

    function statement($type, $statement){
        $type = $type;
        $statement = $statement;

        echo "
        
        <div class='container mb-5 p-1'>
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <span class='badge bg-light shadow mb-5 mt-5' style='font-size: 25px; color: #5D7C48;'>$type</span>
                    <p class='lead text-center'>$statement</p>
                </div>
            </div>
        </div>
        ";
    }

    function footerCol3($number, $address){
        echo "
        <div class='col-md-3 mb-4'>
            <div class='d-flex align-items-center mb-3'>
                <img src='assets/imgs/logo-light.png' alt='PawsCare Logo' class='me-2' width='60%'>
            </div>
            <div class='d-flex mb-3'>
                <div class='me-3'>
                    <i class='bi bi-telephone-fill display-5 text-lime'></i>
                </div>
                <div class='d-flex flex-column'>
                    <p class='mb-1 fw-bold fs-5'>$number</p>
                    <p class='mb-0'>Got Questions? Call us! Available 24/7!</p>
                </div>
            </div>
            <h5 class='fw-bold'>Our Address</h5>
            <p>$address</p>
            <div>
                <a href='#' class='text-white me-2'><i class='bi bi-twitter'></i></a>
                <a href='#' class='text-white me-2'><i class='bi bi-facebook'></i></a>
                <a href='#' class='text-white me-2'><i class='bi bi-linkedin'></i></a>
                <a href='#' class='text-white'><i class='bi bi-instagram'></i></a>
            </div>
        </div>
        ";
    }

    function footerCol3_2($access1, $access2, $access3, $access4, $access5, $access6){
        echo "
        <div class='col-md-3'>
            <h5 class='fw-bold text-lime'>Quick Access</h5>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-6'>
                        <ul class='list-unstyled'>
                            <li><a href='services.php' class='text-white'>$access1</a></li>
                            <li><a href='shop.php' class='text-white'>$access2</a></li>
                            <li><a href='about.php' class='text-white'>$access3</a></li>

                        </ul>
                    </div>
                    <div class='col-md-6'>
                        <ul class='list-unstyled'>
                            <li><a href='contact.php' class='text-white'>$access4</a></li>
                            <li><a href='gallery.php' class='text-white'>$access5</a></li>
                            <li><a href='#testimonialSlider' class='text-white'>$access6</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        ";
    }

    function footerGallery($photo1, $photo2, $photo3, $photo4, $photo5, $photo6){
        echo "
        
        <div class='col-md-3'>
            <h5 class='fw-bold text-lime mb-4'>Gallery</h5>
            <div class='row g-2 mb-4 gallery'>
                <div class='col-4'>
                    <img src='assets/imgs/gallery/$photo1' class='img-fluid' alt='Gallery Image 1'>
                </div>
                <div class='col-4'>
                    <img src='assets/imgs/gallery/$photo2' class='img-fluid' alt='Gallery Image 2'>
                </div>
                <div class='col-4'>
                    <img src='assets/imgs/gallery/$photo3' class='img-fluid' alt='Gallery Image 3'>
                </div>
                <div class='col-4'>
                    <img src='assets/imgs/gallery/$photo4' class='img-fluid' alt='Gallery Image 4'>
                </div>
                <div class='col-4'>
                    <img src='assets/imgs/gallery/$photo5' class='img-fluid' alt='Gallery Image 5'>
                </div>
                <div class='col-4'>
                    <img src='assets/imgs/gallery/$photo6' class='img-fluid' alt='Gallery Image 6'>
                </div>
            </div>
        </div>
        ";
    }

    function whyUsCard($img, $tag, $description, $link) {
        echo"
        <div class='col-md-4 mb-4'>
            <div class='card card-why item-card'>
                <img src='assets/imgs/$img' class='card-img-top img-fluid'>
                <div class='card-title-container'>
                    <a href='$link' class='card-title-learn ms-3'>$tag</a>
                </div>
                <div class='card-body card-body-why'>
                    <p class='card-text'>$description</p>
                    <a href='$link' class='learn-more'>Learn More</a>
                </div>
            </div>
        </div>
        ";
    }

    function myAppointment($id, $name, $contact, $email, $date, $time, $service, $message, $img) {
        $standardTime = militaryToStandardTime($time);
        echo "
        <div class='container appointment-container mb-2'>
            <div class='myAppointment-list'>
                <div class='myAppointment-item'>
                    <div class='row'>
                        <div class='col-md-8 myAppointment-details'>
                            <h5>$service</h5>
                            <p>Date: $date | Time: $standardTime</p>
                            <p><u>$message</u></p>
                        </div>
                        <div class='col-md-4 myAppointment-actions'>
                            <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#appointmentModal$id'>View Details</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmCancelModal$id'>Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class='modal custom-modal' id='appointmentModal$id'>
            <div class='modal-dialog modal-fullscreen'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Appointment Details</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <div class='info-section'>
                            <h5>Name:</h5>
                            <p class='lead'>$name</p>
                        </div>
                        <div class='info-section'>
                            <h5>Contact Number:</h5>
                            <p class='lead'>$contact</p>
                        </div>
                        <div class='info-section'>
                            <h5>Email:</h5>
                            <p class='lead'>$email</p>
                        </div>
                        <div class='info-section'>
                            <h5>Requested Service:</h5>
                            <p class='lead'>$service</p>
                        </div>
                        <div class='info-section'>
                            <h5>Date:</h5>
                            <p class='lead'>$date</p>
                        </div>
                        <div class='info-section'>
                            <h5>Preferred Time:</h5>
                            <p class='lead'>$standardTime</p>
                        </div>
                        <div class='info-section'>
                            <h5>Message:</h5>
                            <p class='lead'>$message</p>
                        </div>
                        <div class='info-section'>
                            <h5>Attachments:</h5>
                            <p class='lead'>$img</p>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Confirmation Modal for Cancel -->
        <div class='modal' id='confirmCancelModal$id'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Confirm Cancellation</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <p>Are you sure you want to cancel this appointment?</p>
                    </div>
                    <div class='modal-footer'>
                        <form method='post' action='myAppointments.php'>
                            <input type='hidden' name='appointment_id' value='$id'>
                            <button type='submit' name='confirm_cancel_appointment' class='btn btn-danger'>Yes, Cancel Appointment</button>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No, Keep Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
    }    

    function militaryToStandardTime($militaryTime) {
        $hours = substr($militaryTime, 0, 2);
        $minutes = substr($militaryTime, 2);

        $suffix = ($hours >= 12) ? 'PM' : 'AM';
        $hours = ($hours % 12) ?: 12;

        $formattedHours = str_pad($hours, 2, '0', STR_PAD_LEFT);
        $formattedMinutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);

        return $formattedHours . $formattedMinutes . ' ' . $suffix;
    }

    function galleryCategory($img, $category) {
        
        echo "
        <div class='gallery-item mt-5'>
            <img src='assets/imgs/gallery/$img' alt='$category'>
            <div class='img-title'>$category</div>
        </div>
        ";
        
    }
    
    function team($name, $job, $img) {
        echo "
        <div class='team-member'>
            <img src='./assets/imgs/team/$img' alt='Team Member 1'>
            <h3>$name</h3>
            <p>$job</p>
        </div>
        ";
    }

    function identifier ($content) {
        echo "
        <span class='badge bg-light shadow' style='font-size: 25px; color: #5D7C48;'>$content</span>
        ";
    }

    function img ($img) {
        echo "
            <div class='gallery-item'>
                <img src='./assets/imgs/gallery/$img' alt='gallery photo' width='100rem'>
            </div>   
        ";
    }

    function branches ($branches, $contact) {
        echo "
        <div class='card mb-3 item-card' style='border: none;'>
            <div class='card-body'>
                <h4 class='text-start'>$branches</h4>
                <h3 class='text-start'>$contact</h3>
            </div>
        </div>";
    }
?> 