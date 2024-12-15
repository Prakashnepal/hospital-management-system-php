<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from buybootstrap.com/demos/medflex/medflex-admin-dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Oct 2024 04:32:57 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Gallery - Medical Admin Templates & Dashboards</title>

  <!-- Meta -->
  <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
  <meta property="og:title" content="Admin Templates - Dashboard Templates">
  <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
  <meta property="og:type" content="Website">
  <link rel="shortcut icon" href="assets/images/favicon.svg">

  <!-- *************
		************ CSS Files *************
	************* -->
  <link rel="stylesheet" href="assets/fonts/remix/remixicon.css">
  <link rel="stylesheet" href="assets/css/main.min.css">

  <!-- *************
		************ Vendor Css Files *************
	************ -->

  <!-- Scrollbar CSS -->
  <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">
  <!--Load Sweet Alert Javascript-->

  <script src="assets/js/swal.js"></script>
  <!--Inject SWAL-->
  <?php if (isset($success)) { ?>
    <!--This code for injecting an alert-->
    <script>
      setTimeout(function() {
          swal("Success", "<?php echo $success; ?>", "success");
        },
        100);
    </script>

  <?php } ?>

  <?php if (isset($err)) { ?>
    <!--This code for injecting an alert-->
    <script>
      setTimeout(function() {
          swal("Failed", "<?php echo $err; ?>", "Failed");
        },
        100);
    </script>

  <?php } ?>


</head>