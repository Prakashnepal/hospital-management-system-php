<?php include('includes/header.php') ?>
<?php
session_start();
include('includes/conn.php');
if (!isset($_SESSION['user_id'])) {
  header("location:login.php");
  exit();
}
?>

<?php
if (isset($_REQUEST['submit'])) {
  $age = $_REQUEST['age'];
  $email = $_REQUEST['email'];
  $phone_number = $_REQUEST['phone_number'];
  $qualification = $_REQUEST['qualification'];
  $specialization = $_REQUEST['specialization'];
  mysqli_query($conn, "insert into doctors(age,email,phone_number,qualification,specialization)value('$age','$email','$phone_number','$qualification','$specialization')");
}


?>

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
                        <form method="POST" action="">
                          <input type="hidden" name="user_id" value="<?= $userData['user_id'] ?>">
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
                                  <input type="text" class="form-control" id="a2" name="age" value="<?= $doctorData['age'] ?>">
                                </div>
                              </div>
                            </div>


                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="selectGender1">Gender<span class="text-danger">*</span></label>
                                <div class="m-0">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="selectGender1" value="male"
                                      <?php if ($doctorData["gender"] == 'male') {
                                        echo "checked";
                                      } ?>>
                                    <label class="form-check-label" for="selectGender1">Male</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="selectGender2" value="female"
                                      <?php if ($doctorData["gender"] == 'female') {
                                        echo "checked";
                                      } ?>>
                                    <label class="form-check-label" for="selectGender2">Female</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="selectGender3" value="other"
                                      <?php if ($doctorData["gender"] == 'other') {
                                        echo "checked";
                                      } ?>>
                                    <label class="form-check-label" for="selectGender3">Other</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a4">Create ID <span class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-secure-payment-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a4" value="#45489">
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
                                  <input type="email" class="form-control" id="a5" name="email" value="<?= $doctorData['email'] ?>">
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
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a7">Marital Status</label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-vip-crown-2-line"></i>
                                  </span>
                                  <select class="form-select" id="a7" name="marital_status">
                                    <option value="Select Marital Status">Select Marital Status</option>
                                    <option value="Married" <?php
                                                            if ($doctorData['marital_status'] == 'Married') {
                                                              echo 'selected';
                                                            }
                                                            ?>>Married</option>
                                    <option value="Singal" <?php
                                                            if ($doctorData['marital_status'] == 'Singal') {
                                                              echo 'selected';
                                                            }
                                                            ?>>Singal</option>
                                  </select>
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
                                  <input type="text" class="form-control" id="a8" name="qualification" value="<?= $doctorData['qualification'] ?>">
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
                                  <input type="text" class="form-control" id="a8" name="specialization" value="<?= $doctorData['specialization'] ?>">

                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a10">Blood Group<span
                                    class="text-danger">*</span></label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-drop-line"></i>
                                  </span>
                                  <select class="form-select" id="a10" name="blood_group">
                                    <option value="0">O+</option>
                                    <option value="1">A+</option>
                                    <option value="2">A-</option>
                                    <option value="3">B+</option>
                                    <option value="4">B-</option>
                                    <option value="5">O+</option>
                                    <option value="6">O-</option>
                                    <option value="7">AB+</option>
                                    <option value="8">AB-</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a11">Address</label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-projector-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a11" name="address" value="<?= $doctorData['address'] ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a12">Country</label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-flag-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a11" name="country" value="<?= $doctorData['country'] ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a13">State</label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-instance-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a11" name="state" value="<?= $doctorData['state'] ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a14">City</label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-scan-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a11" name="city" value="<?= $doctorData['city'] ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="a15">Postal Code</label>
                                <div class="input-group">
                                  <span class="input-group-text">
                                    <i class="ri-qr-scan-line"></i>
                                  </span>
                                  <input type="text" class="form-control" id="a11" name="postal_code" value="<?= $doctorData['postal_code'] ?>">
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="tab-pane " id="twoA" role="tabpanel">

                            <!-- Row starts -->
                            <div class="row gx-3">
                              <div class="col-sm-2">
                                <div class="mb-3">
                                  <img src="assets/images/user3.png" class="img-fluid rounded-2" alt="Medical Dashboard">
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div id="dropzone" class="mb-3 dropzone dz-clickable">
                                  <!-- <form action="https://buybootstrap.com/upload" class="dropzone dz-clickable" id="demo-upload"> -->
                                  <div class="dz-message">
                                    <button type="button" class="dz-button">
                                      Upload new photo.</button>
                                  </div>
                                  <!-- </form> -->
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div id="fullEditor">
                                  <p name="about"><?= $doctorData['about'] ?></p>
                                </div>
                              </div>
                            </div>
                            <!-- Row ends -->

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