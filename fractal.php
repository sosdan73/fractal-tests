<!-- Head and Header + fractals DB -->
<?php
  include './inc/header.php';
  include './inc/fractalsData.php';

  $id = $_GET['id'];
  $fractal = $fractals[$id];
?>

<h1 class="display-3 text-center my-5 fw-bold"><?php echo $fractal['name']; ?></h1>
<div class="container-fluid px-5">
  <div class="d-grid">
    <div class="row row-cols-2 justify-content-center">
      <div class="card col">
        <img src="./assets/<?php echo $id; ?>.png" class="card-img-top" alt="">
        <div class="card-body">
          <p class="card-text text-justify"><?php echo $fractal['description']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-4">
    <a href="./fractals.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left"></i>Вернуться ко всем фракталам</a>
  </div>
</div>

<!-- Footer -->
<?php include './inc/footer.php'; ?>
