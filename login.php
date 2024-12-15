<?php
session_start();
include('includes/conn.php'); // Include the database connection

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize error message variable
$error = '';

if (isset($_POST['submit'])) {
  $phone = trim($_POST['phone']); // Remove any whitespace
  $password = trim($_POST['password']); // Trim password input

  // Validate phone number and password
  if (empty($phone) && empty($password)) {
    $error = 'Phone number and password are required.';
  } elseif (empty($phone)) {
    $error = 'Phone number is required.';
  } elseif (empty($password)) {
    $error = 'Password is required.';
  } elseif (!preg_match('/^[0-9]{10}$/', $phone)) { // Assuming phone number should be 10 digits
    $error = 'Invalid phone number format. It should be 10 digits.';
  } else {
    // Query the database to check if the phone number exists
    $select = mysqli_query($con, "SELECT * FROM users WHERE phone_number='$phone'");

    if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $hashedPassword = md5($password); // Hash the entered password for comparison

      // Check if the password matches
      if ($row['password'] === $hashedPassword) {
        $_SESSION['user_id'] = $row['id'];

        // Check the usertype and redirect accordingly
        if ($row['usertype'] === 'doctor') {
          header('location:doctor-dashboard.php');
          exit();
        } elseif ($row['usertype'] === 'patient') {
          header('location:patient-dashboard.php');
          exit();
        } else {
          $error = 'Unauthorized'; // Updated error message
        }
      } else {
        $error = 'Password is wrong'; // Password is incorrect
      }
    } else {
      $error = 'Number is not registered'; // Phone number is not found
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nepal Hospital - Patient Login</title>

  <!-- Meta -->
  <meta name="description" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="Website">
  <link rel="shortcut icon" href="assets/images/favicon.svg">

  <!-- CSS Files -->
  <link rel="stylesheet" href="plugins/fonts/remix/remixicon.css">
  <link rel="stylesheet" href="css/main.min.css">

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
          <h4 class="mb-4">Patient Login</h4>

          <!-- Display error message -->
          <?php if (!empty($error)) : ?>
            <div class="alert alert-danger">
              <?= $error; ?>
            </div>
          <?php endif; ?>

          <div class="mb-3">
            <label class="form-label" for="phone">Your Phone Number<span class="text-danger">*</span></label>
            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
          </div>

          <div class="mb-2">
            <label class="form-label" for="password">Your Password <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
              <button class="btn btn-outline-secondary eye-icon" type="button" onclick="togglePassword()">
                <i id="eye-icon" class="ri-eye-line text-primary"></i>
              </button>
            </div>
          </div>

          <div class="d-flex justify-content-end mb-3">
            <a href="forgot-password.html" class="text-decoration-underline">Forgot password?</a>
          </div>

          <div class="mb-3 d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn btn-secondary">Not registered? Signup</a>
          </div>
        </div>
      </form>

    </div>
    <!-- Auth wrapper ends -->

  </div>
  <!-- Container ends -->

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
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