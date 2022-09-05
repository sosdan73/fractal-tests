<?php
  if (isset($_POST['restart'])) {
    $_SESSION['test2Started'] = FALSE;
    $_SESSION['test2Finished'] = FALSE;
    $_SESSION['test2answers'] = NULL;
    header('Location: test2main.php');
  }
  function getFractalName($fractal) {
    if ($fractal == 'koch') {
      return 'Снежинка Коха';
    } elseif ($fractal == 'mandelbrot') {
      return 'Множество Мандельброта';
    } else {
      return 'Губка Менгера';
    }
  }
  $points = [0, 0];
  $result = '';
  foreach ($_SESSION['test2answers'] as $answer) {
    if ($answer['answer'] == $answer['prediction']) {
      $points[0]++;
    }
    if ($answer['answer'] == $answer['userAnswer']) {
      $points[1]++;
    }
  }
  if ($points[0] > $points[1]) {
    $result = 'Увы, ИИ вас обошел. Счет: ' . "$points[0]" . ":" . "$points[1]";
  } elseif ($points[0] < $points[1]) {
    $result = 'Вы обошли искусственный интеллект! Счет: ' . "$points[0]" . ":" . "$points[1]";
  } else {
    $result = 'Ого, да у вас ничья! Счет: ' . "$points[0]" . ":" . "$points[1]";
  }
?>
<div class="container">
  <h1 class="display-2 my-4 text-center fw-bold">Результаты</h1>
  <h3 class="my-5 text-center"><?php echo $result; ?></h3>
  <table class="table text-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Картинка</th>
      <th scope="col">Правильный ответ</th>
      <th scope="col">Ваш ответ</th>
      <th scope="col">Ответ ИИ</th>
    </tr>
  </thead>
  <tbody class="align-middle">
    <?php foreach ($_SESSION['test2answers'] as $index => $answers) : ?>
      <tr class="table-<?php echo $answers['answer'] == $answers['userAnswer'] ? 'success' : 'danger'; ?>">
        <th scope="row"><?php echo $index + 1; ?></th>
        <td>
          <img class="img-fluid" src="./assets/test2/<?php echo $answers['answer']; ?>/<?php echo $answers['answer']; ?><?php echo $answers['number']; ?>.png" alt="">
        </td>
        <td><?php echo getFractalName($answers['answer']); ?></td>
        <td><?php echo getFractalName($answers['userAnswer']); ?></td>
        <td><?php echo getFractalName($answers['prediction']); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  <!-- <div class="d-grid my-5">
    <div class="row">
      <div class="card col-8 offset-2 col-md-6 offset-md-3">
        <div class="card-body">
          <h2 class="text-center"></h2>
        </div>
      </div> -->
      <form class="my-5" method="POST">
        <button name="restart" type="submit" class="btn btn-outline-dark btn-lg mb-4 py-3 mx-auto d-block">Попробовать снова</button>
      </form>
    <!-- </div>
  </div> -->
</div>
