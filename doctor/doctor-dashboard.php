<?php
session_start();
include('includes/conn.php'); // Include the database connection

// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//   header("Location: login.php");
//   exit();
// }

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

// Display the fetched data
// if ($doctorData) { // Check if any data was fetched
//   echo "Phone Number: " . $doctorData['phone_number'] . "<br>";
//   echo "Full Name: " . $userData['fullname'] . "<br>";
//   echo "Full Name: " . $doctorData['usertype'] . "<br>";
//   echo "Address: " . $doctorData['address'] . "<br>";
//   echo "Date of Birth: " . $doctorData['date_of_birth'] . "<br>";
// } else {
//   echo "No patient data found for this user.";
// }
?>



<?php include('includes/header.php') ?>

<body>

  <!-- Page wrapper starts -->
  <div class="page-wrapper">

    <!-- App header starts -->
    <?php include('includes/top-header.php') ?>
    <!-- App header ends -->

    <!-- Main container starts -->
    <div class="main-container">

      <!-- Sidebar wrapper starts -->
      <?php include('includes/sidebar.php') ?>
      <!-- Sidebar wrapper ends -->

      <!-- App container starts -->
      <div class="app-container">

        <!-- App hero header starts -->
        <div class="app-hero-header d-flex align-items-center">

          <!-- Breadcrumb starts -->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <i class="ri-home-8-line lh-1 pe-3 me-3 border-end"></i>
              <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
              Doctors Dashboard
            </li>
          </ol>
          <!-- Breadcrumb ends -->

          <!-- Sales stats starts -->
          <div class="ms-auto d-lg-flex d-none flex-row">
            <div class="d-flex flex-row gap-1 day-sorting">
              <button class="btn btn-sm btn-primary">Today</button>
              <button class="btn btn-sm">7d</button>
              <button class="btn btn-sm">2w</button>
              <button class="btn btn-sm">1m</button>
              <button class="btn btn-sm">3m</button>
              <button class="btn btn-sm">6m</button>
              <button class="btn btn-sm">1y</button>
            </div>
          </div>
          <!-- Sales stats ends -->

        </div>
        <!-- App Hero header ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Row starts -->
          <div class="row">
            <div class="col-12 mt-4">

              <!-- Row starts -->
              <div class="row gx-3">
                <div class="col-xxl-6 col-sm-12">
                  <div class="card mb-3 bg-1">
                    <div class="card-body mh-230">

                      <!-- Row starts -->
                      <div class="row gx-3">
                        <div class="col-sm-3">
                          <img src="assets/images/doctor.svg" class="img-230 mt-n5" alt="Medical Dashboard">
                        </div>
                        <div class="col-sm-9">
                          <div class="text-white mt-3">
                            <h6>Good Morning,</h6>
                            <h3>Dr. <?= $userData['fullname'] ?></h3>
                            <h6><?= $doctorData['specialization'] ?>,<?= $doctorData['qualification'] ?></h6>
                            <h5>You have total <span class="badge bg-danger">18 appointments</span> today.</h5>
                            <div class="rating-stars">
                              <div class="readonly5"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row ends -->

                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-sm-4">
                  <div class="card mb-3">
                    <div class="card-body mh-230">

                      <!-- Card details start -->
                      <div>
                        <div class="d-flex flex-column align-items-center">
                          <div class="icon-box xl bg-primary-subtle rounded-5 mb-2 no-shadow">
                            <i class="ri-empathize-line fs-1 text-primary"></i>
                          </div>
                          <h1 class="text-primary">3809</h1>
                          <h6>Patients</h6>
                          <span class="badge bg-primary">40% High</span>
                        </div>
                      </div>
                      <!-- Card details end -->

                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-sm-4">
                  <div class="card mb-3">
                    <div class="card-body mh-230">

                      <!-- Card details start -->
                      <div>
                        <div class="d-flex flex-column align-items-center">
                          <div class="icon-box xl bg-danger-subtle rounded-5 mb-2 no-shadow">
                            <i class="ri-lungs-line fs-1 text-danger"></i>
                          </div>
                          <h1 class="text-danger">906</h1>
                          <h6>Surgeries</h6>
                          <span class="badge bg-danger">26% High</span>
                        </div>
                      </div>
                      <!-- Card details end -->

                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-sm-4">
                  <div class="card mb-3">
                    <div class="card-body mh-230">

                      <!-- Card details start -->
                      <div>
                        <div class="d-flex flex-column align-items-center">
                          <div class="icon-box xl bg-success-subtle rounded-5 mb-2 no-shadow">
                            <i class="ri-money-dollar-circle-line fs-1 text-success"></i>
                          </div>
                          <h1 class="text-success">$986K</h1>
                          <h6>Earnings</h6>
                          <span class="badge bg-success">30% High</span>
                        </div>
                      </div>
                      <!-- Card details end -->

                    </div>
                  </div>
                </div>
              </div>
              <!-- Row ends -->

            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xxl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Patients</h5>
                </div>
                <div class="card-body">

                  <div class="card-info bg-light lh-1">
                    20% higher than last year.
                  </div>
                  <div id="patients"></div>

                </div>
              </div>
            </div>
            <div class="col-xxl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Appointments</h5>
                </div>
                <div class="card-body">

                  <div class="card-info bg-light lh-1">
                    33% higher than last year.
                  </div>
                  <div id="appointments"></div>

                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xxl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Patient Reviews</h5>
                </div>
                <div class="card-body">

                  <!-- Reviews starts -->
                  <div class="scroll300">
                    <div class="d-grid gap-4">
                      <div class="d-flex">
                        <img src="assets/images/patient1.png" class="img-4x rounded-2" alt="Medical Admin Template">
                        <div class="ms-3">
                          <h6>Wendi Combs</h6>
                          <p class="mb-2">I had a very good experience here. I got a best psychiatrist and a
                            therapist. They analysed my case very deeply and there medicines helped me a lot.</p>
                          <div class="rating-stars">
                            <div class="readonly5"></div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex">
                        <img src="assets/images/patient2.png" class="img-4x rounded-2" alt="Medical Admin Template">
                        <div class="ms-3">
                          <h6>Nick Morrow</h6>
                          <p class="mb-2">Dr.Jessika listens to you very patiently & gives you sufficient time
                            to say your problems. She diagnosed in no time & i was able to recover quickly, not just
                            diagnosing correctly, she helped me in changing my lifestyle habits.</p>
                          <div class="rating-stars">
                            <div class="readonly5"></div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex">
                        <img src="assets/images/patient3.png" class="img-4x rounded-2" alt="Medical Admin Template">
                        <div class="ms-3">
                          <h6>Carole Dodson</h6>
                          <p class="mb-2">She is very supportive and suggest well. Good surgeon known from past 10
                            years. My mother was a renal transplant patient but in most risky condition she treated
                            her in day care procedure and avoided hospital admission.
                          </p>
                          <div class="rating-stars">
                            <div class="readonly4"></div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex">
                        <img src="assets/images/patient4.png" class="img-4x rounded-2" alt="Medical Admin Template">
                        <div class="ms-3">
                          <h6>Ashley Clay</h6>
                          <p class="mb-2">Jessika is a very good Doctor because I had good experience with hee, she
                            treated my father who is a diabetic patient.
                          </p>
                          <div class="rating-stars">
                            <div class="readonly5"></div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex">
                        <img src="assets/images/patient5.png" class="img-4x rounded-2" alt="Medical Admin Template">
                        <div class="ms-3">
                          <h6>Emmitt Macias</h6>
                          <p class="mb-2">One of the finest doctor’s I ever met. A very good human being more than a
                            doctor.</p>
                          <div class="rating-stars">
                            <div class="readonly4"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Reviews ends -->

                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Patients Type</h5>
                </div>
                <div class="card-body">

                  <div class="scroll300 auto-align-graph">
                    <div id="gender"></div>
                    <div class="mt-3 text-center">
                      <span class="badge bg-primary">15%</span> male patients decreased than last month.
                      <span class="badge bg-danger">30%</span> female patients increase than last month.
                      <span class="badge bg-warning">60%</span> kid patients increase than last month.
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Awards</h5>
                </div>
                <div class="card-body">

                  <div class="scroll300">
                    <div id="carouselAwards" class="carousel carousel-dark slide" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselAwards" data-bs-slide-to="0" class="active"
                          aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselAwards" data-bs-slide-to="1"
                          aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselAwards" data-bs-slide-to="2"
                          aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                          <img src="assets/images/award/award.svg" class="d-block w-100" alt="Medical Templates">
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                          <img src="assets/images/award/award1.svg" class="d-block w-100" alt="Medical Templates">
                        </div>
                        <div class="carousel-item" data-bs-interval="2500">
                          <img src="assets/images/award/award2.svg" class="d-block w-100" alt="Medical Templates">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselAwards"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselAwards"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      </button>
                    </div>

                    <div class="text-center">
                      <h1 class="text-primary">4</h1>
                      Awards received in 2024.
                    </div>

                  </div>

                </div>
              </div>
            </div>
            <div class="col-xxl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Income</h5>
                </div>
                <div class="card-body">

                  <div class="scroll300">
                    <div id="income"></div>
                    <div class="mt-2 text-center">
                      <span class="badge bg-primary">22%</span> income has increase that last year.
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Upcoming Appontments</h5>
                </div>
                <div class="card-body">

                  <div class="scroll300">
                    <div class="d-flex flex-column gap-2">
                      <div class="d-flex flex-column p-3 border rounded-2">
                        <div class="d-flex align-items-center flex-row mb-3">
                          <img src="assets/images/patient.png" class="img-4x rounded-5 me-3" alt="Medical Dashboard">
                          <p class="m-0">Need an appointment urgent.</p>
                        </div>
                        <div class="d-flex gap-2">
                          <a href="appointments-list.html" class="btn btn-primary btn-sm">
                            Accept
                          </a>
                          <button class="btn btn-outline-secondary btn-sm">Decline</button>
                        </div>
                      </div>
                      <div class="d-flex flex-column p-3 border rounded-2">
                        <div class="d-flex align-items-center flex-row mb-3">
                          <img src="assets/images/patient1.png" class="img-4x rounded-5 me-3" alt="Medical Dashboard">
                          <p class="m-0">Need an appointment urgent.</p>
                        </div>
                        <div class="d-flex gap-2">
                          <a href="appointments-list.html" class="btn btn-primary btn-sm">
                            Accept
                          </a>
                          <button class="btn btn-outline-secondary btn-sm">Decline</button>
                        </div>
                      </div>
                      <div class="d-flex flex-column p-3 border rounded-2">
                        <div class="d-flex align-items-center flex-row mb-3">
                          <img src="assets/images/patient2.png" class="img-4x rounded-5 me-3" alt="Medical Dashboard">
                          <p class="m-0">Need an appointment urgent.</p>
                        </div>
                        <div class="d-flex gap-2">
                          <a href="appointments-list.html" class="btn btn-primary btn-sm">
                            Accept
                          </a>
                          <button class="btn btn-outline-secondary btn-sm">Decline</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Surgeries</h5>
                </div>
                <div class="card-body">

                  <div class="scroll300 auto-align-graph">
                    <div id="surgeries"></div>
                    <div class="mt-2 text-center">
                      <span class="badge bg-primary">22%</span> male patients decreased than last month.
                      <span class="badge bg-danger">38%</span> female patients increase than last month.
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
          <!-- Row ends -->

        </div>
        <!-- App body ends -->

        <!-- App footer starts -->
        <div class="app-footer bg-white">
          <span>© Medflex admin 2024</span>
        </div>
        <!-- App footer ends -->

      </div>
      <!-- App container ends -->

    </div>
    <!-- Main container ends -->

  </div>
  <!-- Page wrapper ends -->

  <!-- *************
			************ JavaScript Files *************
		************* -->
  <!-- Required jQuery first, then Bootstrap Bundle JS -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/moment.min.js"></script>

  <!-- *************
			************ Vendor Js Files *************
		************* -->

  <!-- Overlay Scroll JS -->
  <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
  <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

  <!-- Apex Charts -->
  <script src="assets/vendor/apex/apexcharts.min.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/patients.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/appointments.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/gender.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/surgeries.js"></script>
  <script src="assets/vendor/apex/custom/doc-dashboard/income.js"></script>

  <!-- Raty JS -->
  <script src="assets/vendor/rating/raty.js"></script>
  <script src="assets/vendor/rating/raty-custom.js"></script>

  <!-- Custom JS files -->
  <script src="assets/js/custom.js"></script>
</body>


</html>