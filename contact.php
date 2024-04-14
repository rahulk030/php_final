<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields
    $errors = [];
    $fullname = trim($_POST["fullname"]); // Trim whitespace from fullname
    $email = trim($_POST["email"]); // Trim whitespace from email
    $message = trim($_POST["message"]); // Trim whitespace from message

    // Validate Full Name
    if (empty($fullname)) {
        $errors[] = "Full Name is required";
    }

    // Validate Email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate Message
    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // If no errors, insert into database
    if (empty($errors)) {
        try {
            // Database connection
            $servername = "localhost:3308";
            $dbname = "accounts";
            $username = "root";
            $password = "";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Insert into database
            $sql = "INSERT INTO contact (fullname, email, message) VALUES (:fullname, :email, :message)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            echo "New record created successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
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
    <title>IT Company || Contact Page</title>
</head>

<body>
    <?php include "templates/header.php" ?>
    <!-- Container for main content -->
    <div class="container">
        <div class="description">
            <!-- Heading for contact section -->
            <h2 class="heading-secondary">
                Contact us
            </h2>
            <!-- Description text -->
            <p>Feel Free to interact with our team</p>
        </div>
        <!-- Contact form section -->
        <div class="contact-container">
            <!-- Heading for contact form -->
            <h2 class="contact-heading">Contact Us</h2>
            <!-- Contact form -->
            <form class="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- Input field for full name -->
                <label class="contact-label" for="fullname">Full Name:</label><br>
                <input class="contact-input" type="text" id="fullname" name="fullname"><br><br>

                <!-- Input field for email -->
                <label class="contact-label" for="email">Email:</label><br>
                <input class="contact-input" type="email" id="email" name="email"><br><br>

                <!-- Input field for message -->
                <label class="contact-label" for="message">Message:</label><br>
                <textarea class="contact-input" id="message" name="message"></textarea><br><br>

                <!-- Submit button for the form -->
                <input class="contact-input" type="submit" value="Submit">
            </form>
        </div>
    </div>
    <?php include "templates/footer.php" ?>
</body>

</html>