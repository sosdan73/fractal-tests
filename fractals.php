<!-- Head and Header + fractals DB -->
<?php
  include './inc/header.php';
  include './inc/fractalsData.php';
?>

<h1 class="display-2 text-center my-5 fw-bold">Фракталы</h1>
<div class="container-fluid px-5">
  <div class="">
    <div class="row justify-content-evenly align-items-center">
      <?php
        $i = 0;
        foreach ($fractals as $key => $fractal) :
      ?>
        <div class="col-md-4 my-4">
          <div class="card w-100">
            <img src="./assets/<?php echo $key; ?>.png" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title text-center mb-3"><?php echo $fractal['name']; ?></h5>
              <div class="grid mx-4 mx-sm-0">
                <div class="row justify-content-center row-cols-sm-2">
                  <a href="./fractal.php?id=<?php echo $key;?>" class="btn btn-dark col">Подробнее</a>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      <?php
        $i++;
        if (($i % 2) == 0) {
          echo '<div class="w-100"></div>';
        }
        endforeach;
      ?>
    </div>
  </div>
</div>

<!-- Footer -->
<?php include './inc/footer.php'; ?>
