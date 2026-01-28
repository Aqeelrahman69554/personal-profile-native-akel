<?php

include "connection.php";

$home = mysqli_query($conn, "SELECT * FROM home LIMIT 1");
$homeData = mysqli_fetch_assoc($home);


// about
$about = mysqli_query($conn, "SELECT * FROM about LIMIT 1");
$aboutData = mysqli_fetch_assoc($about);
$qaboutItems = mysqli_query($conn, "SELECT * FROM about WHERE id != 1");

// resume
$resum = mysqli_query($conn, "SELECT * FROM resum LIMIT 1");
$resumData = mysqli_fetch_assoc($resum);
$qresumItems = mysqli_query($conn, "SELECT * FROM resum WHERE id != 1");




// skill
$skills = mysqli_query($conn, "SELECT * FROM skills LIMIT 1");
$skillsData = mysqli_fetch_assoc($skills);
$skillsTitles = array_map('trim', explode(',', $skillsData['skillTitle']));
$percentages = array_map('trim', explode(',', $skillsData['percentage']));
$total = min(count($skillsTitles), count($percentages));


$icons = array_map('trim', explode(',', $skillsData['icon']));
$iconNumbers = array_map('trim', explode(',', $skillsData['iconNumber']));
$iconDescriptions = array_map('trim', explode(',', $skillsData['iconDescription']));

$totalStats = min(
    count($icons),
    count($iconNumbers),
    count($iconDescriptions)
);


// portofolio
$porto = mysqli_query($conn, "SELECT * FROM portofolio LIMIT 1");
$portoData = mysqli_fetch_assoc($porto);
$qPortfolioItems = mysqli_query($conn, "SELECT * FROM portofolio WHERE id != 1");



// service
$service = mysqli_query($conn, "SELECT * FROM services LIMIT 1");
$serviceData = mysqli_fetch_assoc($service);
$qserviceItems = mysqli_query($conn, "SELECT * FROM services WHERE id != 1");



// contact
$contact = mysqli_query($conn, "SELECT * FROM contact LIMIT 1");
$contactData = mysqli_fetch_assoc($contact);
$qcontactQuery = mysqli_query($conn, "SELECT * FROM contact WHERE id != 1 LIMIT 1");
$qcontactItems = mysqli_fetch_assoc($qcontactQuery);

// form
session_start();
$form = mysqli_query($conn, "SELECT * FROM form LIMIT 1");
$formData = mysqli_fetch_assoc($form);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    mysqli_query($conn, "INSERT INTO form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')");
    $_SESSION['success'] = true;
    header("Location: index.php#contact");
    exit;
}

// footer
$footer = mysqli_query($conn, "SELECT * FROM footer LIMIT 1");
$footerData = mysqli_fetch_assoc($footer);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - iPortfolio Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="template/user/assets/img/favicon.png" rel="icon">
    <link href="template/user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="template/user/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/user/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="template/user/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="template/user/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="template/user/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- link fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Main CSS File -->
    <link href="template/user/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <?php include "user/components/header.php" ?>

    <main class="main">

        <?php include "user/pages/home.php" ?>

        <!-- About Section -->
        <?php include "user/pages/about.php"; ?>

        <!-- Stats Section -->
        <?php include "user/pages/stat_skill.php" ?>

        <!-- Resume Section -->
        <?php include "user/pages/resume.php" ?>



        <!-- Portfolio Section -->
        <?php include "user/pages/portofolio.php" ?>
        <!-- Services Section -->
        <?php include "user/pages/services_testimonial.php" ?>

        <!-- Testimonials Section -->


        <!-- Contact Section -->
        <?php include "user/pages/contact.php" ?>

    </main>

    <!-- pemganggilan footer -->
    <?php include "user/components/footer.php" ?>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="template/user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="template/user/assets/vendor/php-email-form/validate.js"></script>
    <script src="template/user/assets/vendor/aos/aos.js"></script>
    <script src="template/user/assets/vendor/typed.js/typed.umd.js"></script>
    <script src="template/user/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="template/user/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="template/user/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="template/user/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="template/user/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="template/user/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="template/user/assets/js/main.js"></script>

</body>

</html>