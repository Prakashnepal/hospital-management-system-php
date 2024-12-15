<?php
session_start();
include('includes/header.php');
include('includes/checklogin.php');
check_login();
$aid = $_SESSION['ad_id'];
?>

<body>

  <!-- Loading starts -->
  <div id="loading-wrapper">
    <div class='spin-wrapper'>
      <div class='spin'>
        <div class='inner'></div>
      </div>
      <div class='spin'>
        <div class='inner'></div>
      </div>
      <div class='spin'>
        <div class='inner'></div>
      </div>
      <div class='spin'>
        <div class='inner'></div>
      </div>
      <div class='spin'>
        <div class='inner'></div>
      </div>
      <div class='spin'>
        <div class='inner'></div>
      </div>
    </div>
  </div>
  <!-- Loading ends -->

  <!-- Page wrapper starts -->
  <div class="page-wrapper">

    <!-- App header starts -->
    <?php include('includes/top-header.php') ?>
    <!-- App header ends -->

    <!-- Main container starts -->
    <div class="main-container">

      <!-- Sidebar wrapper starts -->
      <nav id="sidebar" class="sidebar-wrapper">

        <!-- Sidebar profile starts -->
        <div class="sidebar-profile">
          <img src="assets/images/user6.png" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
          <div class="m-0">
            <h5 class="mb-1 profile-name text-nowrap text-truncate">Nick Gonzalez</h5>
            <p class="m-0 small profile-name text-nowrap text-truncate">Dept Admin</p>
          </div>
        </div>
        <!-- Sidebar profile ends -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
          <ul class="sidebar-menu">
            <li class="active current-page">
              <a href="index.html">
                <i class="ri-home-6-line"></i>
                <span class="menu-text">Hospital Dashboard</span>
              </a>
            </li>
            <li>
              <a href="dashboard2.html">
                <i class="ri-home-smile-2-line"></i>
                <span class="menu-text">Medical Dashboard</span>
              </a>
            </li>
            <li>
              <a href="dashboard3.html">
                <i class="ri-home-5-line"></i>
                <span class="menu-text">Dentist Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-stethoscope-line"></i>
                <span class="menu-text">Doctors</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="doctor-dashboard.html">Doctors Dashboard</a>
                </li>
                <li>
                  <a href="doctors-list.html">Doctors List</a>
                </li>
                <li>
                  <a href="doctors-cards.html">Doctors Cards</a>
                </li>
                <li>
                  <a href="doctors-profile.html">Doctors Profile</a>
                </li>
                <li>
                  <a href="add-doctors.html">Add Doctor</a>
                </li>
                <li>
                  <a href="edit-doctors.html">Edit Doctor</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-heart-pulse-line"></i>
                <span class="menu-text">Patients</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="patient-dashboard.html">Patients Dashboard</a>
                </li>
                <li>
                  <a href="patients-list.html">Patients List</a>
                </li>
                <li>
                  <a href="add-patient.html">Add Patient</a>
                </li>
                <li>
                  <a href="edit-patient.html">Edit Patient Details</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-nurse-line"></i>
                <span class="menu-text">Staff</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="staff.html">Staff List</a>
                </li>
                <li>
                  <a href="add-staff.html">Add Staff</a>
                </li>
                <li>
                  <a href="edit-staff.html">Edit Staff Details</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-dossier-line"></i>
                <span class="menu-text">Appointments</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="appointments.html">Appointments</a>
                </li>
                <li>
                  <a href="appointments-list.html">Appointments List</a>
                </li>
                <li>
                  <a href="book-appointment.html">Book Appointment</a>
                </li>
                <li>
                  <a href="edit-appointment.html">Edit Appointment</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-building-2-line"></i>
                <span class="menu-text">Departments</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="departments-list.html">Departments List</a>
                </li>
                <li>
                  <a href="add-department.html">Add Department</a>
                </li>
                <li>
                  <a href="edit-department.html">Edit Department</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-secure-payment-line"></i>
                <span class="menu-text">Accounts</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="income.html">Income</a>
                </li>
                <li>
                  <a href="payments.html">Payments</a>
                </li>
                <li>
                  <a href="invoices.html">Invoices</a>
                </li>
                <li>
                  <a href="invoice-details.html">Invoice Details</a>
                </li>
                <li>
                  <a href="create-invoice.html">Create Invoice</a>
                </li>
                <li>
                  <a href="expenses.html">Expenses</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-group-2-line"></i>
                <span class="menu-text">Human Resources</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="hr-approvals.html">HR Approvals</a>
                </li>
                <li>
                  <a href="staff-attendance.html">Attendance</a>
                </li>
                <li>
                  <a href="staff-leaves.html">Staff Leaves</a>
                </li>
                <li>
                  <a href="staff-holidays.html">Holidays</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-money-dollar-circle-line"></i>
                <span class="menu-text">Salaries</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="salaries.html">Salary List</a>
                </li>
                <li>
                  <a href="payslip.html">Payslip</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-hotel-bed-line"></i>
                <span class="menu-text">Rooms</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="room-statistics.html">Statistics</a>
                </li>
                <li>
                  <a href="rooms-allotted.html">Rooms Allotted</a>
                </li>
                <li>
                  <a href="rooms-by-dept.html">Rooms By Department</a>
                </li>
                <li>
                  <a href="available-rooms.html">Available Rooms</a>
                </li>
                <li>
                  <a href="book-room.html">Book Room</a>
                </li>
                <li>
                  <a href="add-room.html">Add Room</a>
                </li>
                <li>
                  <a href="edit-room.html">Edit Room</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-car-washing-line"></i>
                <span class="menu-text">Ambulance</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="ambulance-list.html">Ambulance List</a>
                </li>
                <li>
                  <a href="add-ambulance.html">Add Ambulance</a>
                </li>
                <li>
                  <a href="edit-ambulance.html">Edit Ambulance</a>
                </li>
                <li>
                  <a href="ambulance-call-list.html">Ambulance Call List</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="events.html">
                <i class="ri-calendar-line"></i>
                <span class="menu-text">Event Management</span>
              </a>
            </li>
            <li>
              <a href="gallery.html">
                <i class="ri-tent-line"></i>
                <span class="menu-text">Gallery</span>
              </a>
            </li>
            <li>
              <a href="news.html">
                <i class="ri-news-line"></i>
                <span class="menu-text">News & Updates</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-color-filter-line"></i>
                <span class="menu-text">UI Elements</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="alerts.html">Alerts</a>
                </li>
                <li>
                  <a href="avatars.html">Avatars</a>
                </li>
                <li>
                  <a href="badges.html">Badges</a>
                </li>
                <li>
                  <a href="buttons.html">Buttons</a>
                </li>
                <li>
                  <a href="button-groups.html">Button Groups</a>
                </li>
                <li>
                  <a href="cards.html">Cards</a>
                </li>
                <li>
                  <a href="advanced-cards.html">Advanced Cards</a>
                </li>
                <li>
                  <a href="dropdowns.html">Dropdowns</a>
                </li>
                <li>
                  <a href="list-items.html">List Items</a>
                </li>
                <li>
                  <a href="progress.html">Progress Bars</a>
                </li>
                <li>
                  <a href="placeholders.html">Placeholders</a>
                </li>
                <li>
                  <a href="spinners.html">Spinners</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-notification-badge-line"></i>
                <span class="menu-text">Jquery Components</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="accordions.html">Accordions</a>
                </li>
                <li>
                  <a href="carousel.html">Carousel</a>
                </li>
                <li>
                  <a href="modals.html">Modals</a>
                </li>
                <li>
                  <a href="popovers.html">Popovers</a>
                </li>
                <li>
                  <a href="tabs.html">Tabs</a>
                </li>
                <li>
                  <a href="tooltips.html">Tooltips</a>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-terminal-window-line"></i>
                <span class="menu-text">Forms</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="form-inputs.html">Form Inputs</a>
                </li>
                <li>
                  <a href="form-checkbox-radio.html">Checkbox &amp; Radio</a>
                </li>
                <li>
                  <a href="form-file-input.html">File Input</a>
                </li>
                <li>
                  <a href="form-validations.html">Validations</a>
                </li>
                <li>
                  <a href="date-time-pickers.html">Date Time Pickers</a>
                </li>
                <li>
                  <a href="form-masks.html">Input Masks</a>
                </li>
                <li>
                  <a href="form-tags.html">Input Tags</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="tables.html">
                <i class="ri-table-line"></i>
                <span class="menu-text">Tables</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-bar-chart-line"></i>
                <span class="menu-text">Graphs</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="apex.html">Apex Graphs</a>
                </li>
                <li>
                  <a href="morris.html">Morris Graphs</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="maps.html">
                <i class="ri-road-map-line"></i>
                <span class="menu-text">Vector Maps</span>
              </a>
            </li>
            <li>
              <a href="icons.html">
                <i class="ri-send-plane-2-line"></i>
                <span class="menu-text">Icons</span>
              </a>
            </li>
            <li>
              <a href="settings.html">
                <i class="ri-settings-5-line"></i>
                <span class="menu-text">Account Settings</span>
              </a>
            </li>
            <li>
              <a href="typography.html">
                <i class="ri-font-size"></i>
                <span class="menu-text">Typography</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-login-circle-line"></i>
                <span class="menu-text">Login/Signup</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="login.html">Login</a>
                </li>
                <li>
                  <a href="signup.html">Signup</a>
                </li>
                <li>
                  <a href="forgot-password.html">Forgot Password</a>
                </li>
                <li>
                  <a href="reset-password.html">Reset Password</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="page-not-found.html">
                <i class="ri-alert-line"></i>
                <span class="menu-text">Page Not Found</span>
              </a>
            </li>
            <li>
              <a href="maintenance.html">
                <i class="ri-auction-line"></i>
                <span class="menu-text">Maintenance</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#!">
                <i class="ri-dropdown-list"></i>
                <span class="menu-text">Menu Level</span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#!">Level One Link</a>
                </li>
                <li>
                  <a href="#!">
                    Level One Menu
                    <i class="ri-arrow-right-s-line"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#!">Level Two Link</a>
                    </li>
                    <li>
                      <a href="#!">Level Two Menu
                        <i class="ri-arrow-right-s-line"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li>
                          <a href="#!">Level Three Link</a>
                        </li>
                        <li>
                          <a href="#!">Level Three Link</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#!">Level One Link</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="default.html">
                <i class="ri-send-plane-line"></i>
                <span class="menu-text">External Link</span>
              </a>
            </li>
            <li>
              <a href="#!">
                <i class="ri-exchange-line"></i>
                <span class="menu-text">Chip</span>
                <span class="badge bg-primary ms-auto">6</span>
              </a>
            </li>
            <li>
              <a href="#!">
                <i class="ri-ticket-line"></i>
                <span class="menu-text">Badge</span>
                <span class="badge border border-primary text-primary ms-auto">Chip</span>
              </a>
            </li>
            <li>
              <a href="#!" class="disabled">
                <i class="ri-magic-line"></i>
                <span class="menu-text">Disabled Link</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar contact starts -->
        <div class="sidebar-contact">
          <p class="fw-light mb-1 text-nowrap text-truncate">Emergency Contact</p>
          <h5 class="m-0 lh-1 text-nowrap text-truncate">0987654321</h5>
          <i class="ri-phone-line"></i>
        </div>
        <!-- Sidebar contact ends -->

      </nav>
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
              Dashboard
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
            <div class="col-xxl-12 col-sm-12">
              <div class="card mb-3 bg-2">
                <div class="card-body">
                  <div class="py-4 px-3 text-white">
                    <h6>Good Morning,</h6>
                    <h2>Dr. Patrick Kim</h2>
                    <h5>Your schedule today.</h5>
                    <div class="mt-4 d-flex gap-3">
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-arctic rounded-3 me-3">
                          <i class="ri-surgical-mask-line fs-4"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <h2 class="m-0 lh-1">9</h2>
                          <p class="m-0">Patients</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-lime rounded-3 me-3">
                          <i class="ri-lungs-line fs-4"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <h2 class="m-0 lh-1">3</h2>
                          <p class="m-0">Surgeries</p>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="icon-box lg bg-peach rounded-3 me-3">
                          <i class="ri-walk-line fs-4"></i>
                        </div>
                        <div class="d-flex flex-column">
                          <h2 class="m-0 lh-1">2</h2>
                          <p class="m-0">Discharges</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="p-2 border border-success rounded-circle me-3">
                      <div class="icon-box md bg-success-subtle rounded-5">
                        <i class="ri-surgical-mask-line fs-4 text-success"></i>
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                      <h2 class="lh-1">890</h2>
                      <p class="m-0">New Patients</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-1">
                    <a class="text-success" href="javascript:void(0);">
                      <span>View All</span>
                      <i class="ri-arrow-right-line text-success ms-1"></i>
                    </a>
                    <div class="text-end">
                      <p class="mb-0 text-success">+40%</p>
                      <span class="badge bg-success-subtle text-success small">this month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="p-2 border border-primary rounded-circle me-3">
                      <div class="icon-box md bg-primary-subtle rounded-5">
                        <i class="ri-lungs-line fs-4 text-primary"></i>
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                      <h2 class="lh-1">360</h2>
                      <p class="m-0">OPD Patients</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-1">
                    <a class="text-primary" href="javascript:void(0);">
                      <span>View All</span>
                      <i class="ri-arrow-right-line ms-1"></i>
                    </a>
                    <div class="text-end">
                      <p class="mb-0 text-primary">+30%</p>
                      <span class="badge bg-primary-subtle text-primary small">this month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="p-2 border border-danger rounded-circle me-3">
                      <div class="icon-box md bg-danger-subtle rounded-5">
                        <i class="ri-microscope-line fs-4 text-danger"></i>
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                      <h2 class="lh-1">980</h2>
                      <p class="m-0">Lab tests</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-1">
                    <a class="text-danger" href="javascript:void(0);">
                      <span>View All</span>
                      <i class="ri-arrow-right-line ms-1"></i>
                    </a>
                    <div class="text-end">
                      <p class="mb-0 text-danger">+60%</p>
                      <span class="badge bg-danger-subtle text-danger small">this month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="p-2 border border-warning rounded-circle me-3">
                      <div class="icon-box md bg-warning-subtle rounded-5">
                        <i class="ri-money-dollar-circle-line fs-4 text-warning"></i>
                      </div>
                    </div>
                    <div class="d-flex flex-column">
                      <h2 class="lh-1">$98000</h2>
                      <p class="m-0">Total Earnings</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-end justify-content-between mt-1">
                    <a class="text-warning" href="javascript:void(0);">
                      <span>View All</span>
                      <i class="ri-arrow-right-line ms-1"></i>
                    </a>
                    <div class="text-end">
                      <p class="mb-0 text-warning">+20%</p>
                      <span class="badge bg-warning-subtle text-warning small">this month</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xl-2 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center">
                    <div class="icon-box md rounded-5 bg-primary mb-3">
                      <i class="ri-verified-badge-line fs-4 lh-1"></i>
                    </div>
                    <h6>Appointments</h6>
                    <h2 class="text-primary m-0">639</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center">
                    <div class="icon-box md rounded-5 bg-primary mb-3">
                      <i class="ri-stethoscope-line fs-4 lh-1"></i>
                    </div>
                    <h6>Doctors</h6>
                    <h2 class="text-primary m-0">83</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center">
                    <div class="icon-box md rounded-5 bg-primary mb-3">
                      <i class="ri-psychotherapy-line fs-4 lh-1"></i>
                    </div>
                    <h6>Staff</h6>
                    <h2 class="text-primary m-0">296</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center">
                    <div class="icon-box md rounded-5 bg-primary mb-3">
                      <i class="ri-lungs-line fs-4 lh-1"></i>
                    </div>
                    <h6>Operations</h6>
                    <h2 class="text-primary m-0">49</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center">
                    <div class="icon-box md rounded-5 bg-primary mb-3">
                      <i class="ri-hotel-bed-line fs-4 lh-1"></i>
                    </div>
                    <h6>Admitted</h6>
                    <h2 class="text-primary m-0">372</h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center">
                    <div class="icon-box md rounded-5 bg-primary mb-3">
                      <i class="ri-walk-line fs-4 lh-1"></i>
                    </div>
                    <h6>Discharged</h6>
                    <h2 class="text-primary m-0">253</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row ends -->

          <!-- Row starts -->
          <div class="row gx-3">
            <div class="col-xxl-12 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Available Beds</h5>
                </div>
                <div class="card-body">
                  <div id="availableBeds"></div>
                </div>
              </div>
            </div>
            <div class="col-xxl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Patients</h5>
                </div>
                <div class="card-body">
                  <div id="patients"></div>
                </div>
              </div>
            </div>
            <div class="col-xxl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Treatment Type</h5>
                </div>
                <div class="card-body">
                  <div id="treatment"></div>
                </div>
              </div>
            </div>
            <div class="col-xxl-6 col-sm-12">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Hospital Earnings</h5>
                </div>
                <div class="card-body">

                  <!-- Row start -->
                  <div class="row g-3">
                    <div class="col-sm-6 col-12">
                      <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                        <div class="me-2">
                          <div id="sparkline1"></div>
                        </div>
                        <div class="m-0">
                          <div class="d-flex align-items-center">
                            <h4 class="m-0 fw-bold">$4900</h4>
                            <div class="ms-2 text-primary d-flex">
                              <small>20%</small> <i class="ri-arrow-right-up-line ms-1 fw-bold"></i>
                            </div>
                          </div>
                          <small>Online Consultation</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                        <div class="me-2">
                          <div id="sparkline2"></div>
                        </div>
                        <div class="m-0">
                          <div class="d-flex align-items-center">
                            <div class="fs-4 fw-bold">$750</div>
                            <div class="ms-2 text-danger d-flex">
                              <small>26%</small> <i class="ri-arrow-right-down-line ms-1 fw-bold"></i>
                            </div>
                          </div>
                          <small class="text-dark">Overall Purchases</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                        <div class="me-2">
                          <div id="sparkline3"></div>
                        </div>
                        <div class="m-0">
                          <div class="d-flex align-items-center">
                            <div class="fs-4 fw-bold">$560</div>
                            <div class="ms-2 text-primary d-flex">
                              <small>28%</small> <i class="ri-arrow-right-up-line ms-1 fw-bold"></i>
                            </div>
                          </div>
                          <small class="text-dark">Pending Invoices</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                        <div class="me-2">
                          <div id="sparkline4"></div>
                        </div>
                        <div class="m-0">
                          <div class="d-flex align-items-center">
                            <div class="fs-4 fw-bold">$390</div>
                            <div class="ms-2 text-primary d-flex">
                              <small>30%</small> <i class="ri-arrow-right-up-line ms-1 fw-bold"></i>
                            </div>
                          </div>
                          <small class="text-dark">Monthly Billing</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row ends -->

                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Insurance Claims</h5>
                </div>
                <div class="card-body">
                  <div id="claims"></div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-sm-6">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="card-title">Patients by Gender</h5>
                </div>
                <div class="card-body">
                  <div class="auto-align-graph">
                    <div id="genderAge"></div>
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