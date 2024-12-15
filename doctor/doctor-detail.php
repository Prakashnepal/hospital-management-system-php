<?php
include('includes/conn.php');
session_start();

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
  $fullname = $_POST['fullname'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $qualification = $_POST['qualification'];
  $specialization = $_POST['specialization'];
  $address = $_POST['address'];

  // Check if doctor_id exists in the session
  $doctor_id = $_POST['doctor_id'] ?? null;

  if ($doctor_id) {
    // Update the doctor's profile
    $query = mysqli_query($con, "UPDATE doctors SET 
            fullname = '$fullname',
            age = '$age',
            email = '$email',
            phone_number = '$phone_number',
            qualification = '$qualification',
            specialization = '$specialization',
            address = '$address'
            WHERE doctor_id = '$doctor_id'");
  } else {
    // Insert a new doctor's profile
    $query = mysqli_query($con, "INSERT INTO doctors(user_id, fullname, age, email, phone_number, qualification, specialization, address) 
            VALUES('$user_id', '$fullname', '$age', '$email', '$phone_number', '$qualification', '$specialization', '$address')");
  }

  if ($query) {
    echo '<script>alert("Doctor profile has been successfully updated!")</script>';
  } else {
    echo '<script>alert("Failed to update doctor profile!")</script>';
  }
}
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
              Edit Doctor Profile
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
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body">

                  <!-- Custom tabs starts -->
                  <div class="custom-tabs-container">

                    <!-- Nav tabs starts -->
                    <ul class="nav nav-tabs" id="customTab2" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA" role="tab"
                          aria-controls="oneA" aria-selected="true"><i class="ri-briefcase-4-line"></i> Personal
                          Details</a>
                      </li>


                    </ul>
                    <!-- Nav tabs ends -->

                    <!-- Tab content starts -->
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="oneA" role="tabpanel">
                        <form method="POST" action="#">
                          <input type="text" name="user_id" value="<?= $userData['user_id'] ?>">
                          <input type="hidden" name="doctor_id" value="<?= $doctorData[''] ?>">

                          <!-- Row starts -->
                          <div class="row gx-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a1">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-account-circle-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a1" name="fullname" value="<?= $userData['fullname'] ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a2">Age <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-flower-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a2" name="age" value="">
                                </div>
                              </div>
                            </div>



                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a5">Email ID <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-mail-open-line"></i>
                                  </span>
                                  <input type="email" class="form-control" id="a5" name="email" value="">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a6">Mobile Number <span
                                    class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-phone-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a6" name="phone_number" value="<?= $userData['phone_number'] ?>">
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="mb-3">
                              <label class="form-label" for="a8">Qualification</label>
                              <div class="input-group">
                                <span class="input-group-text">
                                  <i class="ri-copper-diamond-line"></i>
                                </span>
                                <input type="text" class="form-control" id="a8" name="qualification" value="">
                              </div>
                            </div>
                          </div>
                          <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="mb-3">
                              <label class="form-label" for="a9">Specialization</label>
                              <div class="input-group">
                                <span class="input-group-text">
                                  <i class="ri-nft-line"></i>
                                </span>
                                <input type="text" class="form-control" id="a8" name="specialization" value="">

                              </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="a11">Address</label>
                            <div class="input-group">
                              <span class="input-group-text">
                                <i class="ri-projector-line"></i>
                              </span>
                              <input type="text" class="form-control" id="a11" name="address" value="">
                            </div>
                          </div>

                      </div>


                    </div>

                    <!-- Row ends -->
                    <!-- Card acrions starts -->
                    <div class="d-flex gap-2 justify-content-end mt-4">
                      <a href="doctors-list.html" class="btn btn-outline-secondary">
                        Cancel
                      </a>
                      <button type="submit" href="" class="btn btn-primary">
                        Update Doctor Profile
                      </button>
                    </div>
                    <!-- Card acrions ends -->
                    </form>
                  </div>

                </div>
                <!-- Tab content ends -->

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
  <?php include('includes/footer.php') ?>