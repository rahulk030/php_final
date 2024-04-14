<?php
// Start the session to access session variables
session_start();

// Check if user is not logged in
if (!isset($_SESSION['id'])) {
  // If not logged in, redirect to login page
  header("Location: index.php");
  exit(); // Stop further execution of the script
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags for character set, viewport, and compatibility -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Including Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Including custom CSS -->
  <link rel="stylesheet" href=css/styles.css">
  <!-- Title of the webpage -->
  <title>IT Company || Services Page</title>
</head>

<body>
  <?php include "templates/header.php" ?>
  <!-- Container for the welcome message and user information -->
  <div class="welcome-container">
    <!-- Welcome heading -->
    <div class="welcome-heading">
      <!-- Displaying the user's full name -->
      Welcome, <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>!
    </div>
    <!-- Information about the user -->
    <div class="welcome-info">
      <!-- Displaying the user's email -->
      Your email: <?php echo $_SESSION['email']; ?>
    </div>
  </div>
  <!-- Main container for the content -->
  <div class="container">
    <!-- Description section -->
    <div class="description">
      <!-- Secondary heading -->
      <h2 class="heading-secondary">
        Services that we provide
      </h2>
      <!-- Description of services -->
      <p>
        At the forefront of innovation, we offer a suite of services designed to propel your business into the future. Our team of experts specializes in delivering cutting-edge solutions that blend creativity with functionality. Whether it's developing a dynamic web presence or crafting bespoke software, we empower your brand to excel in a digital-first world.
      </p>
    </div>
    <!-- Cards section for displaying services -->
    <div class="cards">
      <!-- Card 1: Marketing -->
      <div class="card">
        <!-- Icon for Marketing -->
        <div class="icon">
          <img src="img/img-1.png" alt="Image 1">
        </div>
        <!-- Heading for Marketing -->
        <h3 class="heading-tertiary">Marketing</h3>
        <!-- Description of Marketing -->
        <p>
          Excellence Elevate your brand with our comprehensive marketing strategies that ensure maximum visibility and engagement
        </p>
      </div>
      <!-- Card 2: App Development -->
      <div class="card">
        <!-- Icon for App Development -->
        <div class="icon">
          <img src="img/img-2.png" alt="Image 2">
        </div>
        <!-- Heading for App Development -->
        <h3 class="heading-tertiary">App Development</h3>
        <!-- Description of App Development -->
        <p>
          Transform your ideas into reality with our cutting-edge app development services tailored to meet your business needs
        </p>
      </div>
      <!-- Card 3: Error Fixing -->
      <div class="card">
        <!-- Icon for Error Fixing -->
        <div class="icon">
          <img src="img/img-3.png" alt="Image 3">
        </div>
        <!-- Heading for Error Fixing -->
        <h3 class="heading-tertiary">Error Fixing</h3>
        <!-- Description of Error Fixing -->
        <p>
          Our dedicated team provides swift and effective solutions to enhance your system’s performance and reliability.
        </p>
      </div>
      <!-- Card 4: Design -->
      <div class="card">
        <!-- Icon for Design -->
        <div class="icon">
          <img src="img/img-4.png" alt="Image 4">
        </div>
        <!-- Heading for Design -->
        <h3 class="heading-tertiary">Design</h3>
        <!-- Description of Design -->
        <p>
          Professionally design your website
        </p>
      </div>
      <!-- Card 5: Development -->
      <div class="card">
        <!-- Icon for Development -->
        <div class="icon">
          <img src="img/img-5.png" alt="Image 5">
        </div>
        <!-- Heading for Development -->
        <h3 class="heading-tertiary">Development</h3>
        <!-- Description of Development -->
        <p>
          Drive business growth with our state-of-the-art development techniques that guarantee scalability and innovation.
        </p>
      </div>
      <!-- Card 6: SEO -->
      <div class="card">
        <!-- Icon for SEO -->
        <div class="icon">
          <img src="img/img-6.png" alt="Image 6">
        </div>
        <!-- Heading for SEO -->
        <h3 class="heading-tertiary">SEO</h3>
        <!-- Description of SEO -->
        <p>
          Optimization Boost your online presence with our expert SEO services designed to increase traffic and improve search engine rankings.
        </p>
      </div>
    </div>
  </div>
  <!-- Including the footer template -->
  <?php include "templates/footer.php" ?>
</body>

</html>
