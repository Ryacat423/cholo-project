<?php 
    include_once('library.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
</head>
<body>

<header class="shadow">
    <?php
    $cartItemCount = getCartItemCount();
    ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:white;">
        <div class="container-fluid">
            <div class="d-flex justify-content-center align-items-center align-items-lg-start">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand text-center text-lg-start" href="index.php">
                    <img src="assets/imgs/logo.jpg" alt="logo" width="35%">
                </a>
                <a class="nav-link cart-icon d-lg-none me-4 flex-fill" href="myAppointments.php" style="font-size: 25px;">
                    <i class="bi-card-checklist"></i>
                    <span class="badge rounded-pill bg-primary cart-badge2"><?= getAppointmentsCount() ?></span>
                </a>
                <a class="nav-link cart-icon d-lg-none me-2 flex-fill" href="cart.php" style="font-size: 25px;">
                    <i class="bi bi-basket2"></i>
                    <span class="badge rounded-pill bg-primary cart-badge2"><?= $cartItemCount ?></span>
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                <ul class="navbar-nav navbar-content mb-2 mb-lg-0 text-start">
                    <li class="nav-item"><a class="nav-link <?php echo $page == 'home' ? 'active-link' : ''; ?>" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $page == 'services' ? 'active-link' : ''; ?>" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $page == 'shop' ? 'active-link' : ''; ?>" href="shop.php">Shop</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo $page == 'other_pages' ? 'active-link' : ''; ?>" href="#" id="navbarDropdownPages" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownPages">
                            <li><a class="dropdown-item" href="about.php"><i class="bi bi-info-circle"></i> Mission/Vision</a></li>
                            <li><a class="dropdown-item" href="contacts.php"><i class="bi bi-telephone"></i> Contacts</a></li>
                            <li><a class="dropdown-item" href="gallery.php"><i class="bi bi-images"></i> Gallery</a></li>
                            <li><a class="dropdown-item" href="team.php"><i class="bi bi-people"></i> Our Team</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="branches.php"><i class="bi bi-geo-alt"></i> Other Branches</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto align-items-center" style="font-size: 23px;">
                    <li class="nav-item text-start d-none d-lg-block me-3" >
                        <a class="nav-link cart-icon" href="myAppointments.php">
                            <i class="bi-card-checklist" data-bs-toggle="tooltip" data-bs-placement="bottom" title="My Appointments"></i>
                            <span class="badge rounded-pill bg-primary cart-badge"><?= getAppointmentsCount() ?></span>
                        </a>
                    </li>
                    <li class="nav-item text-start d-none d-lg-block" >
                        <a class="nav-link cart-icon" href="cart.php">
                            <i class="bi bi-basket2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cart"></i>
                            <span class="badge rounded-pill bg-primary cart-badge"><?= $cartItemCount ?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php echo $page != 'home' ? '</header>' : ''; ?>