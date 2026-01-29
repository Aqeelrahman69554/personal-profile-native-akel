<?php

session_start();
if (!isset($_SESSION['login'])) {
  header("Location: Pages/login/index.php");
  exit;
}

include "../connection.php";

// logic halaman default
$fitur = $_GET['fitur'] ?? 'dashboard';

?>

<!DOCTYPE html>
<html lang="en">

<?php include "partials/script.php" ?>

<body>
  <div class="wrapper">

    <!-- include sidebar php -->
    <?php include "components/sidebar.php" ?>

    <div class="main-panel">

      <!-- section header -->
      <?php include "components/header.php" ?>

      <!-- logic halaman pararel -->
      <?php
      switch ($fitur) {
        case 'dashboard':
          include "pages/dashboard.php";  //dashboard khusus
          break;

        case 'home':
          include "pages/home/index.php";
          break;
        case 'home-update':
          include "pages/home/edit.php";
          break;
        case 'home-delete':
          include "pages/home/delete.php";
          break;

        // about
        case 'about-update';
          include "pages/about/edit.php";
          break;
        case 'about-delete';
          include "pages/about/delete.php";
          break;

        // resume
        case 'resume':
          include "pages/resume/index.php";
          break;
        case 'resume-update':
          include "pages/resume/edit.php";
          break;
        case 'resume-delete':
          include "pages/resume/delete.php";
          break;

        // skill
        case 'skill':
          include "pages/stats_skills/index.php";
          break;
        case 'skill-update':
          include "pages/stats_skills/edit.php";
          break;
        case 'skill-delete':
          include "pages/stats_skills/delete.php";
          break;

        // portofolio
        case 'portofolio':
          include "pages/portofolio/index.php";
          break;
        case 'portofolio-update':
          include "pages/portofolio/edit.php";
          break;
        case 'portofolio-delete':
          include "pages/portofolio/delete.php";
          break;

        // services
        case 'service':
          include "pages/service/index.php";
          break;
        case 'service-update':
          include "pages/service/edit.php";
          break;
        case 'service-delete':
          include "pages/service/delete.php";
          break;
        // contact
        case 'contact':
          include "pages/contact/index.php";
          break;
        case 'contact-update':
          include "pages/contact/edit.php";
          break;
        case 'contact-delete':
          include "pages/contact/delete.php";
          break;

        // default
        default:
          $path = "pages/$fitur/index.php";
          if (file_exists($path)) {
            include $path;
          } else {
            echo "<h3>Halaman tidak ditemukan</h3>";
            break;
          }
      }

      ?>

      <!-- footer -->
      <?php include "components/footer.php" ?>
    </div>


  </div>

</body>

</html>