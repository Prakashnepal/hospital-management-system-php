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

 <!-- Sidebar wrapper starts -->
 <nav id="sidebar" class="sidebar-wrapper">

   <!-- Sidebar profile starts -->
   <div class="sidebar-profile">
     <img src="assets/images/user6.png" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
     <div class="m-0">
       <h5 class="mb-1 profile-name text-nowrap text-truncate"><?= $userData['fullname'] ?></h5>
       <p class="m-0 small profile-name text-nowrap text-truncate"><?= $userData['usertype'] ?></p>
     </div>
   </div>
   <!-- Sidebar profile ends -->

   <!-- Sidebar menu starts -->
   <div class="sidebarMenuScroll">
     <ul class="sidebar-menu">
       <li>
         <a href="index.html">
           <i class="ri-home-6-line"></i>
           <span class="menu-text">Hospital Dashboard</span>
         </a>
       </li>

       <li class="treeview active current-page">
         <a href="#!">
           <i class="ri-stethoscope-line"></i>
           <span class="menu-text">Doctors </span>
         </a>
         <ul class="treeview-menu">
           <li>
             <a href="doctor-dashboard.php">Doctors Dashboard</a>
           </li>
           <li>
             <a href="doctor-profile.php">Doctors Profile</a>
           </li>
           <li>
             <a href="doctor-detail.php">Doctors Details</a>
           </li>

           <li>
             <a href="edit-doctor.php">Edit Doctor</a>
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




       <li>
         <a href="settings.html">
           <i class="ri-settings-5-line"></i>
           <span class="menu-text">Account Settings</span>
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