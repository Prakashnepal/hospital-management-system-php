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
      <li class="active current-page">
        <a href="#">
          <i class="ri-heart-pulse-line"></i>
          <span class="menu-text"> Dashboard</span>
        </a>
      </li>
      <li class="">
        <a href="#">
          <i class="ri-stethoscope-line"></i>
          <span class="menu-text">Doctors</span>
        </a>

      </li>

      <li class="treeview">
        <a href="#!">
          <i class="ri-dossier-line"></i>
          <span class="menu-text">Appointments</span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="book-appointment.html">Book Appointment</a>
          </li>
          <li>
            <a href="appointments-list.html">Appointments List</a>
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
            <a href="available-rooms.html">Available Rooms</a>
          </li>
          <li>
            <a href="book-room.html">Book Room</a>
          </li>
        </ul>
      </li>
      <li class="">
        <a href="#!">
          <i class="ri-car-washing-line"></i>
          <span class="menu-text">Ambulance</span>
        </a>

      </li>
      <li class="">
        <a href="#!">
          <i class="ri-secure-payment-line"></i>
          <span class="menu-text">Accounts Payment</span>
        </a>

      </li>
      <li>
        <a href="settings.html">
          <i class="ri-settings-5-line"></i>
          <span class="menu-text">Account Settings</span>
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
    </ul>
  </div>
  <!-- Sidebar menu ends -->

  <!-- Sidebar contact starts -->
  <div class="sidebar-contact">
    <p class="fw-light mb-1 text-nowrap text-truncate">Emergency Contact</p>
    <h5 class="m-0 lh-1 text-nowrap text-truncate">9868074920</h5>
    <i class="ri-phone-line"></i>
  </div>
  <!-- Sidebar contact ends -->

</nav>