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
  // Fetch additional data from the patient table
  $stmt = $con->prepare("SELECT * FROM patient WHERE user_id = ?");
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $patientResult = $stmt->get_result();
  $patientData = $patientResult->fetch_assoc();
} else {
  // Redirect to login page if no user data found
  header("Location: login.php");
  exit();
}

// Close the statement
$stmt->close();

// Display the fetched data
// if ($patientData) { // Check if any data was fetched
//   echo "Phone Number: " . $patientData['phone_number'] . "<br>";
//   echo "Full Name: " . $patientData['fullname'] . "<br>";
//   echo "Full Name: " . $patientData['usertype'] . "<br>";
//   echo "Address: " . $patientData['address'] . "<br>";
//   echo "Date of Birth: " . $patientData['date_of_birth'] . "<br>";
// } else {
//   echo "No patient data found for this user.";
// }
?>



<?php include('includes/header.php') ?>

<body>

  <!-- Page wrapper starts -->
  <div class="page-wrapper">

    <!-- App header starts -->
    <?php include('includes/navbar.php') ?>
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
              Patients Dashboard
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
          <div class="row gx-3">
            <div class="col-sm-12">
              <div class="card mb-3">
                <div class="card-body">

                  <div class="d-flex ">
                    <!-- Stats starts -->
                    <div class="d-flex align-items-center flex-wrap gap-4">
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-primary rounded-5 me-2">
                          <i class="ri-account-circle-line fs-3"></i>
                        </div>
                        <div>
                          <h4 class="mb-1"><?= $userData['fullname'] ?></h4>
                          <p class="m-0">Patient Name</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-primary rounded-5 me-2">
                          <i class="ri-women-line fs-3"></i>
                        </div>
                        <div>
                          <h4 class="mb-1"><?= $patientData['gender'] ?></h4>
                          <p class="m-0">Gender</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-primary rounded-5 me-2">
                          <i class="ri-arrow-right-up-line fs-3"></i>
                        </div>
                        <div>
                          <h4 class="mb-1"><?= $patientData['age'] ?></h4>
                          <p class="m-0">Patient Age</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-primary rounded-5 me-2">
                          <i class="ri-contrast-drop-2-line fs-3"></i>
                        </div>
                        <div>
                          <h4 class="mb-1"><?= $patientData['blood_group'] ?></h4>
                          <p class="m-0">Blood Type</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-secondary rounded-5 me-2">
                          <i class="ri-stethoscope-line fs-3 text-body"></i>
                        </div>
                        <div>
                          <h4 class="mb-1">Dr. David</h4>
                          <p class="m-0">Consulting Doctor</p>
                        </div>
                      </div>
                    </div>
                    <!-- Stats ends -->

                    <img src="assets/images/patient4.png" class="img-7x rounded-circle ms-auto"
                      alt="Patient Admin Template">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="text-center">
                    <div class="icon-box md bg-danger rounded-5 m-auto">
                      <i class="ri-capsule-line fs-3"></i>
                    </div>
                    <div class="mt-3">
                      <h5>BP Levels</h5>
                      <p class="m-0 opacity-50">Recent five visits</p>
                    </div>
                  </div>
                  <div id="bpLevels"></div>
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>24/04/2024</div>
                      <div>140</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>16/04/2024</div>
                      <div>190</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>10/04/2024</div>
                      <div>230</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="text-center">
                    <div class="icon-box md bg-info rounded-5 m-auto">
                      <i class="ri-contrast-drop-2-line fs-3"></i>
                    </div>
                    <div class="mt-3">
                      <h5>Sugar Levels</h5>
                      <p class="m-0 opacity-50">Recent five visits</p>
                    </div>
                  </div>
                  <div id="sugarLevels"></div>
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>24/04/2024</div>
                      <div>140</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>16/04/2024</div>
                      <div>190</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>10/04/2024</div>
                      <div>230</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="text-center">
                    <div class="icon-box md bg-success rounded-5 m-auto">
                      <i class="ri-heart-pulse-line fs-3"></i>
                    </div>
                    <div class="mt-3">
                      <h5>Heart Rate</h5>
                      <p class="m-0 opacity-50">Recent five visits</p>
                    </div>
                  </div>
                  <div id="heartRate"></div>
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>24/04/2024</div>
                      <div>110</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>16/04/2024</div>
                      <div>120</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>10/04/2024</div>
                      <div>100</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="text-center">
                    <div class="icon-box md bg-warning rounded-5 m-auto">
                      <i class="ri-flask-line fs-3"></i>
                    </div>
                    <div class="mt-3">
                      <h5>Clolesterol</h5>
                      <p class="m-0 opacity-50">Recent five visits</p>
                    </div>
                  </div>
                  <div id="clolesterolLevels"></div>
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>24/04/2024</div>
                      <div>180</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>16/04/2024</div>
                      <div>220</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <div>10/04/2024</div>
                      <div>230</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Health Insurance Claims</h5>
                </div>
                <div class="card-body">
                  <div id="insuranceClaims"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">My Medical Expenses</h5>
                </div>
                <div class="card-body">
                  <div id="medicalExpenses"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Doctor Visits</h5>
                </div>
                <div class="card-body">
                  <div class="table-outer">
                    <div class="table-responsive">
                      <table class="table align-middle truncate m-0">
                        <thead>
                          <tr>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Department</th>
                            <th>Reports</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img src="assets/images/user1.png" class="img-3x rounded-2" alt="Medical Dashboard"> Dr.
                              Hector
                            </td>
                            <td>20/05/2024</td>
                            <td>
                              Dentist
                            </td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#viewReportsModal1">
                                  View Reports
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                  data-bs-title="Download Report">
                                  <i class="ri-file-download-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/user5.png" class="img-3x rounded-2" alt="Medical Dashboard"> Dr.
                              Mitchel
                            </td>
                            <td>20/05/2024</td>
                            <td>
                              Urologist
                            </td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#viewReportsModal1">
                                  View Reports
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                  data-bs-title="Download Report">
                                  <i class="ri-file-download-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="assets/images/user3.png" class="img-3x rounded-2" alt="Medical Dashboard"> Dr.
                              Fermin
                            </td>
                            <td>18/03/2024</td>
                            <td>
                              Surgeon
                            </td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                  data-bs-target="#viewReportsModal1">
                                  View Reports
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                  data-bs-title="Download Report">
                                  <i class="ri-file-download-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Reports</h5>
                </div>
                <div class="card-body">
                  <div class="table-outer">
                    <div class="table-responsive">
                      <table class="table align-middle truncate m-0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>File</th>
                            <th>Reports Link</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>
                              <div class="icon-box md bg-primary rounded-2">
                                <i class="ri-file-excel-2-line"></i>
                              </div>
                            </td>
                            <td>
                              <a href="#!" class="link-primary text-truncate">Reports 1 clinical
                                documentation</a>
                            </td>
                            <td>May-28, 2024</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                  data-bs-title="Download Report">
                                  <i class="ri-file-download-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>
                              <div class="icon-box md bg-primary rounded-2">
                                <i class="ri-file-excel-2-line"></i>
                              </div>
                            </td>
                            <td>
                              <a href="#!" class="link-primary text-truncate">Reports 2 random files
                                documentation</a>
                            </td>
                            <td>Mar-20, 2024</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                  data-bs-title="Download Report">
                                  <i class="ri-file-download-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>
                              <div class="icon-box md bg-primary rounded-2">
                                <i class="ri-file-excel-2-line"></i>
                              </div>
                            </td>
                            <td>
                              <a href="#!" class="link-primary text-truncate">Reports 3 glucose level
                                complete report</a>
                            </td>
                            <td>Feb-18, 2024</td>
                            <td>
                              <div class="d-inline-flex gap-1">
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delRow">
                                  <i class="ri-delete-bin-line"></i>
                                </button>
                                <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                  data-bs-title="Download Report">
                                  <i class="ri-file-download-line"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Health Activity</h5>
                </div>
                <div class="card-body">
                  <div class="scroll350">
                    <div id="healthActivity"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Pharmacy</h5>
                </div>
                <div class="card-body">
                  <div class="scroll350">
                    <div class="text-center">
                      <img class="img-fluid mb-3" src="assets/images/reports.svg" style="width: 180px;"
                        alt="Hospital Admin Templates">
                      <h2>$980</h2>
                      <span class="d-block mb-1">Average Spending</span>
                      <span class="d-block mb-2"><b>+20%</b> vs last month</span>
                      <p class="m-0 opacity-75">You can choose from over 1600 admin dashboard templates on Bootstrap
                        Gallery.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Timeline</h5>
                </div>
                <div class="card-body">

                  <!-- Activity starts -->
                  <div class="scroll350">
                    <div class="activity-feed">
                      <div class="feed-item">
                        <span class="feed-date pb-1" data-bs-toggle="tooltip" data-bs-title="Today 05:32:35">An
                          Hour Ago</span>
                        <div class="mb-1">
                          <a href="#" class="text-primary">Dr. Janie Mcdonald</a> - sent a new prescription.
                        </div>
                        <div class="mb-1">Medecine Name - <a href="#" class="text-danger">Amocvmillin</a></div>
                        <a href="#!" class="text-dark">Payment Link <i class="ri-arrow-right-up-line"></i> </a>
                      </div>
                      <div class="feed-item">
                        <span class="feed-date pb-1" data-bs-toggle="tooltip" data-bs-title="Today 05:32:35">An
                          Hour Ago</span>
                        <div class="mb-1">
                          <a href="#" class="text-primary">Dr. Hector Banks</a> - uploaded a report.
                        </div>
                        <div class="mb-1">Report Name - <a href="#" class="text-danger">Lisymorpril</a></div>
                        <a href="#!" class="text-dark">Payment Link <i class="ri-arrow-right-up-line"></i> </a>
                      </div>
                      <div class="feed-item">
                        <span class="feed-date pb-1" data-bs-toggle="tooltip" data-bs-title="Today 05:32:35">An
                          Hour Ago</span>
                        <div class="mb-1">
                          <a href="#" class="text-primary">Dr. Deena Cooley</a> - sent medecine details.
                        </div>
                        <div class="mb-1">Medecine Name - <a href="#" class="text-danger">Predeymsone</a></div>
                        <a href="#!" class="text-dark">Payment Link <i class="ri-arrow-right-up-line"></i> </a>
                      </div>
                      <div class="feed-item">
                        <span class="feed-date pb-1" data-bs-toggle="tooltip" data-bs-title="Today 05:32:35">An
                          Hour Ago</span>
                        <div class="mb-1">
                          <a href="#" class="text-primary">Dr. Mitchel Alvarez</a> - added import files.
                        </div>
                        <div class="mb-1">File Name - <a href="#" class="text-danger">Naverreone</a></div>
                        <a href="#!" class="text-dark">Payment Link <i class="ri-arrow-right-up-line"></i> </a>
                      </div>
                      <div class="feed-item">
                        <span class="feed-date pb-1" data-bs-toggle="tooltip" data-bs-title="Today 05:32:35">An
                          Hour Ago</span>
                        <div class="mb-1">
                          <a href="#" class="text-primary">Dr. Owen Scott</a> - reviewed your file.
                        </div>
                        <div class="mb-1">File Name - <a href="#" class="text-danger">Gabateyntin</a></div>
                        <a href="#!" class="text-dark">Payment Link <i class="ri-arrow-right-up-line"></i> </a>
                      </div>
                    </div>
                  </div>
                  <!-- Activity ends -->

                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Modal Delete Row -->
          <div class="modal fade" id="delRow" tabindex="-1" aria-labelledby="delRowLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="delRowLabel">
                    Confirm
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Are you sure you want to delete this report?
                </div>
                <div class="modal-footer">
                  <div class="d-flex justify-content-end gap-2">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">No</button>
                    <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Yes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal View All Reports -->
          <div class="modal fade" id="viewReportsModal1" tabindex="-1" aria-labelledby="viewReportsModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewReportsModalLabel1">
                    View Reports
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <!-- Row starts -->
                  <div class="row g-3">
                    <div class="col-sm-2">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
                        data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">Clinical Report</h6>
                        <p class="m-0 small">10/05/2024</p>
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
                        data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">Dentist Report</h6>
                        <p class="m-0 small">20/06/2024</p>
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
                        data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">Glucose Report</h6>
                        <p class="m-0 small">30/06/2024</p>
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
                        data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">X-ray Report</h6>
                        <p class="m-0 small">26/08/2024</p>
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
                        data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">Ultrasound Report</h6>
                        <p class="m-0 small">21/08/2024</p>
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
                        data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">Hypothermia Report</h6>
                        <p class="m-0 small">15/04/2024</p>
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
                        data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">Discharge Report</h6>
                        <p class="m-0 small">22/07/2024</p>
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center"
                        data-bs-target="#viewReportsModal2" data-bs-toggle="modal">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">Diabetes Report</h6>
                        <p class="m-0 small">17/05/2024</p>
                      </a>
                    </div>
                  </div>
                  <!-- Row ends -->

                </div>
              </div>
            </div>
          </div>

          <!-- Modal View Single Report -->
          <div class="modal fade" id="viewReportsModal2" tabindex="-1" aria-labelledby="viewReportsModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewReportsModalLabel2">
                    <div class="d-flex align-items-center">
                      <a href="#!" class="btn btn-sm btn-outline-primary me-2" data-bs-target="#viewReportsModal1"
                        data-bs-toggle="modal">
                        <i class="ri-arrow-left-wide-fill"></i>
                      </a>
                      Clinical Report
                    </div>
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <!-- Row starts -->
                  <div class="row g-3">
                    <div class="col-sm-12">
                      <a href="#" class="d-flex flex-column bg-light p-2 rounded-2 text-center">
                        <img src="assets/images/report.svg" class="img-fluid rounded-2" alt="Medical Dashboards">
                        <h6 class="mt-3 mb-1 text-truncate">Clinical Report</h6>
                        <p class="m-0 small">10/05/2024</p>
                      </a>
                    </div>
                  </div>
                  <!-- Row ends -->

                </div>
              </div>
            </div>
          </div>

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

  <!-- Apex js -->
  <script src="assets/vendor/apex/apexcharts.min.js"></script>
  <script src="assets/vendor/apex/custom/patients/sparklines.js"></script>
  <script src="assets/vendor/apex/custom/patients/insuranceClaims.js"></script>
  <script src="assets/vendor/apex/custom/patients/medicalExpenses.js"></script>
  <script src="assets/vendor/apex/custom/patients/healthActivity.js"></script>

  <!-- Custom JS files -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/patient-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Oct 2024 04:33:42 GMT -->

</html>