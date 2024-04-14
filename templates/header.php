<?php if (isset($_SESSION['firstname'])) {
  // If set, user is logged in, provide logout link
  // Check if session variable 'firstname' is set
      // If set, user is logged in, provide logout link
      $logout_link = '<a href="logout.php">Logout</a>';
  } else {
      // If not set, user is not logged in, provide register link
      $logout_link = '';
  }
  ?>
  
<header>
      <div class="main-nav">
        <a href="index.html" class="logo">LightCode.</a>

        <ul>
        <li><?php echo $logout_link; ?></li>
          <li><a href="index.php">home</a></li>
          <li><a href="member.php">Members only</a></li>
          <li><a href="registration.php">Register</a></li>
        </ul>
      </div>
    </header>
