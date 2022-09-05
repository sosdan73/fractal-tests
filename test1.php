<!-- Head and Header -->
<?php include './inc/header.php'; ?>

<?php 
  session_start();

  if ($_SESSION['testFinished']) {
    include './inc/test/results.php';
  } else {
    include './inc/test/goToTest.php';
  }
?>

<!-- Footer -->
<?php include './inc/footer.php'; ?>