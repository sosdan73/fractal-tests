<?php
  function setupTestVariables() {
    if (!$_SESSION['testStarted']) {
      $_SESSION['testStarted'] = TRUE;
      $_SESSION['questionNumber'] = 1;
      $_SESSION['points'] = 0;
    }
    header('Location: test.php');
  }
  if (isset($_POST['start'])) {
    setupTestVariables();
  }
?>
<div class="container-fluid">
  <h1 class="display-1 my-5 text-center fw-bold">Узнай, какой ты фрактал</h1>
  <form method="POST" class="d-grid col-4 mx-auto">
    <button type="submit" name="start" class="btn btn-outline-dark btn-lg py-3">
      <?php echo $_SESSION['testStarted'] ? 'Продолжить' : 'Начать' ?> тестирование
    </button>
  </form>
</div>