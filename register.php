<?php
session_start();
ob_start(); // Start output buffering
include('includes/navbar.php');
include("includes/conn.php");

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['register'])) {
  $fullname = $_POST['fullname'];
  $password = md5($_POST['password']);
  $phone = $_POST['phone']; // Assuming this is the phone number
  $usertype = $_POST['usertype']; // Added usertype field
  $status = 1;

  // Updated query to check for existing users based on phone number
  $select = mysqli_query($con, "SELECT * FROM users WHERE phone_number='$phone' AND password='$password'") or die('query failed');

  if (mysqli_num_rows($select) > 0) {
    $message[] = 'User Already Exists';
  } else {
    // Updated the insert query to include usertype and use phone_number
    $query = mysqli_query($con, "INSERT INTO users(fullName, password, phone_number, usertype) VALUES('$fullname', '$password', '$phone', '$usertype')") or die('query failed');
    if ($query) {
      $message[] = "Registered Successfully !!";
      header('location:login.php');
    } else {
      $message[] = "Registration Failed !!";
    }
  }

  // This line can remain or be commented out if not needed
  echo "<script>alert('Registration successful. Now You can login');</script>";
}

ob_end_flush(); // Flush the output buffer and send output
?>





<section class="appoinment section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-3">
          <form id="#" class="appoinment-form" method="post" action="">
            <div class="row d-flex">
              <div class="col-lg-6 mr-3">
                <h3 class="mb-2 title-color" style="padding-bottom: 2rem;">Create Your Account</h3>

                <!-- Phone Number Input -->
                <div class="form-group">
                  <label for="phone">Phone Number *</label>
                  <input name="phone" id="phone" type="text" class="form-control" placeholder="Enter your phone number" oninput="validatePhone()" value="<?= isset($_SESSION['insert']['phone']['value']) ? $_SESSION['insert']['phone']['value'] : ''; ?>">
                  <span>
                    <small class="text-danger">
                      <?= isset($_SESSION['insert']['phone']['error']) ? $_SESSION['insert']['phone']['error'] : ''; ?>
                    </small>
                  </span>
                </div>

                <!-- Password Input -->
                <div class="form-group" style="position: relative;">
                  <label for="sms-code">SMS Verification Code *</label>
                  <input name="sms-code" id="sms-code" type="text" class="form-control" placeholder="6 digits" style="padding-right: 80px;">
                  <button id="send-button" type="button" class="btn btn-main" style="position: absolute; right: 10px; top: 68%; transform: translateY(-50%);" disabled onclick="sendSms()">Send</button>
                </div>

                <div class="form-group">
                  <label for="password">Password *</label>
                  <input name="password" id="password" type="password" class="form-control" placeholder="Minimum 6 characters with a number and a letter" value="<?= isset($_SESSION['insert']['password']['value']) ? $_SESSION['insert']['password']['value'] : ''; ?>">
                  <span>
                    <small class="text-danger">
                      <?= isset($_SESSION['insert']['password']['error']) ? $_SESSION['insert']['password']['error'] : ''; ?>
                    </small>
                  </span>
                </div>
              </div>

              <div class="col-lg-5">
                <p class="mb-2 title-color" style="margin-left: 9rem; padding-bottom:1rem;">Already a member? <a href="login-panel.php" style="color: red;">Login</a> here.</p>

                <!-- Full Name Input -->
                <div class="form-group">
                  <label for="fullname">Full Name *</label>
                  <input name="fullname" id="fullname" type="text" class="form-control" placeholder="First Last" value="<?= isset($_SESSION['insert']['fullname']['value']) ? $_SESSION['insert']['fullname']['value'] : ''; ?>">
                  <span>
                    <small class="text-danger">
                      <?= isset($_SESSION['insert']['fullname']['error']) ? $_SESSION['insert']['fullname']['error'] : ''; ?>
                    </small>
                  </span>
                </div>
                <input type="hidden" name="usertype" value="patient">
                <!-- Submit Button -->
                <div class="form-group" style="padding-top: 1.5rem;">
                  <button type="submit" class="btn btn-main text-center" name="register" style="width: 100%;">Sign Up</button>
                  <p>By clicking "SIGN UP" I agree to the <a href="#" style="color: red;">Terms of Use</a> and <a href="#" style="color: red;">Privacy Policy</a>.</p>
                </div>

                <!-- Social Login Options -->
                <div class="form-group d-flex">
                  <a class="btn btn-main mr-2" href="#"> <i class="icofont-facebook icofont-2x"></i> Facebook</a>
                  <a class="btn btn-main" href="#"><i class="icofont-google-plus icofont-2x"></i> Google</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function validatePhone() {
    const phoneInput = document.getElementById('phone').value;
    const sendButton = document.getElementById('send-button');
    const phonePattern = /^\d{10}$/;

    if (phonePattern.test(phoneInput)) {
      sendButton.disabled = false;
    } else {
      sendButton.disabled = true;
    }
  }

  function sendSms() {
    const sendButton = document.getElementById('send-button');
    sendButton.innerHTML = 'Resend';
    alert("SMS sent!");
  }
</script>
<?php include('includes/footer.php') ?>