<?php
session_start();
include("config/dbconfig.php");

$error_message = ""; // Initialize error message variable used to store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {   //The code checks if the request method is POST
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetching user data from database based on email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verifying password
    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        $_SESSION['id'] = $user['id']; // Storing user id in session
        $_SESSION['firstname'] = $user['firstname']; // Storing first name in session
        $_SESSION['lastname'] = $user['lastname']; // Storing last name in session
        $_SESSION['email'] = $user['email']; // Storing email in session

        // Redirect to member page or any other authenticated page
        header("Location: member.php");
        exit();
    } else {
        // Invalid email or password
        $error_message = "Invalid email or password.";
    }
}

if (isset($_SESSION['id'])) {
    $logout_link = '<a href="logout.php">Logout</a>';
} else {
    $logout_link = '<a href="registration.php">Register</a>';
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
    <link rel="stylesheet" href="css/styles.css">
    <!-- Title of the webpage -->
    <title>IT Company || Home Page</title>
</head>

<body>
    <?php include "templates/header.php" ?>
    <!-- Container for the main content -->
    <div class="container">
        <!-- Hero section -->
        <div class="hero">
            <!-- Content within the hero section -->
            <div class="content">
                <!-- Main heading -->
                <h1 class="heading-primary">
                    We are here to help you build your dream project
                </h1>
                <!-- Description -->
                <p>
                    Are you ready to bring your website ideas to life? Look no further than CodeCraft – your ultimate destination for building stunning websites with ease, creativity, and precision. Whether you're a seasoned developer or just starting out, our intuitive platform empowers you to create beautiful, functional websites without the hassle of complex coding.
                </p>
                <!-- Call to action button -->
                <a href="contact.php" class="btn">contact now</a>
            </div>
            <!-- Image within the hero section -->
            <div class="hero-img">
                <img src="img/hero.jpg" alt="Hero Image">
            </div>
        </div>
    </div>
    <!-- If the user is not logged in, display the login form -->
    <?php if (!isset($_SESSION['firstname'])) : ?>
        <!-- Login container -->
        <div class="login-container">
            <h2 class="login-heading">Login Form</h2>

            <?php if (!empty($error_message)) : ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label class="login-label" for="email">Email:</label>
                <input class="login-input" type="email" id="email" name="email">

                <label class="login-label" for="password">Password:</label>
                <input class="login-input" type="password" id="password" name="password">

                <input class="login-submit" type="submit" name="login" value="Login">
                <p><?php echo $logout_link; ?></p>
            </form>
        </div>
        <!-- If the user is logged in, display logout link -->
    <?php else : ?>
        <!-- Define logout link -->
        <?php
        $logout_link = '<a href="logout.php">Logout</a>';
        ?>
    <?php endif; ?>
    <!-- Including the footer template -->
    <?php include "templates/footer.php" ?>
</body>

</html>