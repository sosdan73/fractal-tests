<?php
  function setupTestVariables() {
    if (!$_SESSION['test2Started']) {
      $_SESSION['test2Started'] = TRUE;
      $_SESSION['flag'] = TRUE;
      $_SESSION['questionNumber2'] = 1;
    }
    header('Location: test2.php');
  }
  if (isset($_POST['start'])) {
    setupTestVariables();
  }
?>
<div class="container">
  <h1 class="display-2 my-5 text-center fw-bold">Соревнование с искусственным интеллектом</h1>
  <h3 class="my-5 text-center">В данном тесте вам будет предложен ряд картинок. Вашей задачей будет угадать, к какому типу фракталов данная картинка относится. Сложности вам добавит искусстенный интеллект, который будет угадывать категорию фрактала параллельно с вами</h3>
  <form method="POST" class="d-grid col-4 mx-auto">
    <button type="submit" name="start" class="btn btn-outline-dark btn-lg py-3">
      <?php echo $_SESSION['test2Started'] ? 'Продолжить' : 'Начать' ?> соревнование
    </button>
  </form>
</div>