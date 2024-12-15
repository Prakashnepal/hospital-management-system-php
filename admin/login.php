<?php
session_start();
include('includes/conn.php'); // Get configuration file

if (isset($_POST['admin_login'])) {
  $ad_email = $_POST['ad_email'];
  $ad_pwd = sha1(md5($_POST['ad_pwd'])); // Double encrypt to increase security

  // Check if the email exists in the database
  $stmt = $mysqli->prepare("SELECT ad_pwd, ad_id FROM admins WHERE ad_email = ?");
  $stmt->bind_param('s', $ad_email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    // Email exists, now validate the password
    $stmt->bind_result($stored_pwd, $ad_id);
    $stmt->fetch();

    if ($ad_pwd === $stored_pwd) {
      // Password matches, login successful
      $_SESSION['ad_id'] = $ad_id; // Assign session to admin id
      header("Location: dashboard.php");
      exit();
    } else {
      // Password is incorrect
      $error = "Incorrect password. Please try again.";
    }
  } else {
    // Email does not exist
    $error = "Email is not valid.";
  }

  $stmt->close();
}

if (isset($error)) {
  // Show the error on the login page
  echo "<div class='alert alert-danger'>$error</div>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nepal Hospital - Admin Login</title>

  <!-- Meta -->
  <meta name="description" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="Website">
  <link rel="shortcut icon" href="assets/images/favicon.svg">

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/fonts/remix/remixicon.css">
  <link rel="stylesheet" href="assets/css/main.min.css">

  <style>
    /* Optional CSS for the eye icon */
    .eye-icon {
      cursor: pointer;
    }
  </style>
</head>

<body class="login-bg">

  <!-- Container starts -->
  <div class="container">

    <!-- Auth wrapper starts -->
    <div class="auth-wrapper">

      <!-- Form starts -->
      <form action="" method="POST">
        <div class="auth-box">
          <h4 class="mb-4">Doctor Login</h4>

          <!-- Display error message -->
          <?php if (!empty($error)) : ?>
            <div class="alert alert-danger">
              <?= $error; ?>
            </div>
          <?php endif; ?>

          <div class="mb-3">
            <label class="form-label" for="phone">Your Email<span class="text-danger">*</span></label>
            <input type="email" id="ad_email" name="ad_email" class="form-control" placeholder="Enter your email">
          </div>

          <div class="mb-2">
            <label class="form-label" for="password">Your Password <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="password" id="ad_password" name="ad_password" class="form-control" placeholder="Enter your password">
              <button class="btn btn-outline-secondary eye-icon" type="button" onclick="togglePassword()">
                <i id="eye-icon" class="ri-eye-line text-primary"></i>
              </button>
            </div>
          </div>

          <div class="d-flex justify-content-end mb-3">
            <a href="forgot-password.html" class="text-decoration-underline">Forgot password?</a>
          </div>

          <div class="mb-3 d-grid gap-2">
            <button type="submit" name="admin_login" class="btn btn-primary">Login</button>
            <a href="../register.php" class="btn btn-secondary">Not registered? Signup</a>
          </div>
        </div>
      </form>

    </div>
    <!-- Auth wrapper ends -->

  </div>
  <!-- Container ends -->

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('ad_password');
      const eyeIcon = document.getElementById('eye-icon');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('ri-eye-line'); // Change icon to open eye
        eyeIcon.classList.add('ri-eye-close-line'); // Change to closed eye icon
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('ri-eye-close-line'); // Change icon to closed eye
        eyeIcon.classList.add('ri-eye-line'); // Change back to open eye icon
      }
    }
  </script>

</body>

</html>