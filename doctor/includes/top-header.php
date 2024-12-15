<?php
session_start();
include('includes/conn.php'); // Include the database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php"); // Redirect to login page if not logged in
  exit();
}

// Fetch user data based on user ID from the users table
$userId = $_SESSION['user_id'];

$stmt = $con->prepare("SELECT phone_number, fullname, usertype FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$userResult = $stmt->get_result();
$userData = $userResult->fetch_assoc();

// Check if the user data was found
if ($userData) {
  // Fetch additional data from the doctor table
  $stmt = $con->prepare("SELECT * FROM doctors WHERE doctor_id = ?");
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $doctorResult = $stmt->get_result();
  $doctorData = $doctorResult->fetch_assoc();
} else {
  // Redirect to login page if no user data found
  header("Location: login.php");
  exit();
}

// Close the statement
$stmt->close();


?>
<div class="app-header d-flex align-items-center">

  <!-- Toggle buttons starts -->
  <div class="d-flex">
    <button class="toggle-sidebar">
      <i class="ri-menu-line"></i>
    </button>
    <button class="pin-sidebar">
      <i class="ri-menu-line"></i>
    </button>
  </div>
  <!-- Toggle buttons ends -->

  <!-- App brand starts -->
  <div class="app-brand ms-3">
    <a href="index.html" class="d-lg-block d-none">
      <img src="assets/images/logo.svg" class="logo" alt="Medicare Admin Template">
    </a>
    <a href="index.html" class="d-lg-none d-md-block">
      <img src="assets/images/logo-sm.svg" class="logo" alt="Medicare Admin Template">
    </a>
  </div>
  <!-- App brand ends -->

  <!-- App header actions starts -->
  <div class="header-actions">

    <!-- Search container starts -->
    <div class="search-container d-lg-block d-none mx-3">
      <input type="text" class="form-control" id="searchId" placeholder="Search">
      <i class="ri-search-line"></i>
    </div>
    <!-- Search container ends -->

    <!-- Header actions starts -->
    <div class="d-lg-flex d-none gap-2">



      <!-- Notifications dropdown starts -->

      <!-- Notifications dropdown ends -->

      <!-- Notifications dropdown starts -->
      <div class="dropdown">
        <a class="dropdown-toggle header-icon" href="#!" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="ri-alarm-warning-line"></i>
          <span class="count-label success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-300">
          <h5 class="fw-semibold px-3 py-2 text-primary">Alerts</h5>

          <!-- Scroll starts -->
          <div class="scroll300">

            <!-- Alert list starts -->
            <div class="p-3">
              <div class="d-flex py-2">
                <div class="icon-box md bg-info rounded-circle me-3">
                  <span class="fw-bold fs-6 text-white">DS</span>
                </div>
                <div class="m-0">
                  <h6 class="mb-1 fw-semibold">Douglass Shaw</h6>
                  <p class="mb-1">
                    Appointed as a new President 2014-2025
                  </p>
                  <p class="small m-0 opacity-50">Today, 07:30pm</p>
                </div>
              </div>
              <div class="d-flex py-2">
                <div class="icon-box md bg-danger rounded-circle me-3">
                  <span class="fw-bold fs-6 text-white">WG</span>
                </div>
                <div class="m-0">
                  <h6 class="mb-1 fw-semibold">Willie Garrison</h6>
                  <p class="mb-1">
                    Congratulate, James for new job.
                  </p>
                  <p class="small m-0 opacity-50">Today, 08:00pm</p>
                </div>
              </div>
              <div class="d-flex py-2">
                <div class="icon-box md bg-warning rounded-circle me-3">
                  <span class="fw-bold fs-6 text-white">TJ</span>
                </div>
                <div class="m-0">
                  <h6 class="mb-1 fw-semibold">Terry Jenkins</h6>
                  <p class="mb-1">
                    Lewis added new doctors training schedule.
                  </p>
                  <p class="small m-0 opacity-50">Today, 09:30pm</p>
                </div>
              </div>
            </div>
            <!-- Alert list ends -->

          </div>
          <!-- Scroll ends -->

          <!-- View all button starts -->
          <div class="d-grid m-3">
            <a href="javascript:void(0)" class="btn btn-primary">View all</a>
          </div>
          <!-- View all button ends -->

        </div>
      </div>
      <!-- Notifications dropdown ends -->

      <!-- Messages dropdown starts -->
      <div class="dropdown">
        <a class="dropdown-toggle header-icon" href="#!" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="ri-message-3-line"></i>
          <span class="count-label"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-300">
          <h5 class="fw-semibold px-3 py-2 text-primary">Messages</h5>

          <!-- Scroll starts -->
          <div class="scroll300">

            <!-- Messages list starts -->
            <div class="p-3">
              <div class="d-flex py-2">
                <img src="assets/images/user3.png" class="img-shadow img-3x me-3 rounded-5"
                  alt="Hospital Admin Templates">
                <div class="m-0">
                  <h6 class="mb-1 fw-semibold">Nick Gonzalez</h6>
                  <p class="mb-1">
                    Appointed as a new President 2014-2025
                  </p>
                  <p class="small m-0 opacity-50">Today, 07:30pm</p>
                </div>
              </div>
              <div class="d-flex py-2">
                <img src="assets/images/user1.png" class="img-shadow img-3x me-3 rounded-5"
                  alt="Hospital Admin Templates">
                <div class="m-0">
                  <h6 class="mb-1 fw-semibold">Clyde Fowler</h6>
                  <p class="mb-1">
                    Congratulate, James for new job.
                  </p>
                  <p class="small m-0 opacity-50">Today, 08:00pm</p>
                </div>
              </div>
              <div class="d-flex py-2">
                <img src="assets/images/user4.png" class="img-shadow img-3x me-3 rounded-5"
                  alt="Hospital Admin Templates">
                <div class="m-0">
                  <h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
                  <p class="mb-1">
                    Lewis added new doctors training schedule.
                  </p>
                  <p class="small m-0 opacity-50">Today, 09:30pm</p>
                </div>
              </div>
            </div>
            <!-- Messages list ends -->

          </div>
          <!-- Scroll ends -->

          <!-- View all button starts -->
          <div class="d-grid m-3">
            <a href="javascript:void(0)" class="btn btn-primary">View all</a>
          </div>
          <!-- View all button ends -->

        </div>
      </div>
    </div>
    <!-- Header actions ends -->

    <!-- Header user settings starts -->
    <div class="dropdown ms-2">
      <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <div class="avatar-box">JB<span class="status busy"></span></div>
      </a>
      <div class="dropdown-menu dropdown-menu-end shadow-lg">
        <div class="px-3 py-2">
          <span class="small"><?= $userData['usertype'] ?></span>
          <h6 class="m-0"><?= $userData['fullname'] ?></h6>
        </div>
        <div class="mx-3 my-2 d-grid">
          <a href="login.html" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
    <!-- Header user settings ends -->

  </div>
  <!-- App header actions ends -->

</div>