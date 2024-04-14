<?php
// Starting session to manage user data
session_start();
// Including database configuration file
include("config/dbconfig.php");

// Array to store registration errors
$errors = [];

// Handling registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
  // Retrieving form data
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if any field is empty
  if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
    $errors[] = "All fields are required.";
  }

  // Check if email already exists
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  if ($stmt->rowCount() > 0) {
    $errors[] = "Email already exists.";
  }

  // If no errors, proceed with registration
  if (empty($errors)) {
    // Hashing the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserting user data into database
    $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$firstname, $lastname, $email, $hashed_password]);

    // Redirect to index.php
    header("Location: index.php");
    exit(); // Make sure that subsequent code is not executed after redirection
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Inline CSS for error messages -->
  <style>
    .error {
      color: red;
    }
  </style>
  <title>IT Company || Work Page</title>
</head>

<body>
  <?php include "templates/header.php" ?>
  <!-- Registration Form -->
  <div class="register_container">
    <h2>Registration Form</h2>
    <form method="post" action="registration.php">
      <?php foreach ($errors as $error) : ?>
        <!-- Display error messages -->
        <p class="error"><?php echo $error; ?></p>
      <?php endforeach; ?>
      <!-- Input fields for user registration -->
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname">

      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password">

      <!-- Submit button for registration -->
      <input type="submit" name="register" value="Register">
    </form>
  </div>

  <!-- Section for displaying works -->
  <div class="container">
    <div class="description">
      <!-- Secondary heading for the works section -->
      <h2 class="heading-secondary">
        Some of our works
      </h2>
      <!-- Description text -->
      <p>
        Dive into our world of innovative designs where each pixel tells a story, and every layout is a masterpiece crafted with passion. From vibrant visuals to user-friendly interfaces, our works speak volumes about our dedication to excellence and attention to detail. Explore our projects and let the creativity flow!
      </p>
    </div>

    <!-- Container for displaying work images -->
    <div class="work mb">
      <img src="img/work-1.jpg" alt="Work Image 1">
      <img src="img/work-2.jpg" alt="Work Image 2">
      <img src="img/work-3.jpg" alt="Work Image 3">
      <img src="img/work-4.jpg" alt="Work Image 4">
      <img src="img/work-5.jpg" alt="Work Image 5">
    </div>
  </div>

  <!-- Including footer -->
  <?php include "templates/footer.php" ?>
</body>

</html>