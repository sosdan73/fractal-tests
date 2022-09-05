<!-- Head and Header -->
<?php include './inc/header.php'; ?>

<?php 
  session_start();
  // session_unset();
  if ($_SESSION['test2Finished']) {
    include './inc/test/results2.php';
  } else {
    include './inc/test/goToTest2.php';
  }
?>

<!-- Footer -->
<?php include './inc/footer.php'; ?>