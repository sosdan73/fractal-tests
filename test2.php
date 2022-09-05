<!-- Head and Header -->
<?php
  // ini_set("display_errors", "1");
  // error_reporting(E_ALL);
  ini_set('memory_limit', '-1');
  include './inc/header.php'; 
  require_once __DIR__ . '/vendor/autoload.php';
  use Phpml\Classification\KNearestNeighbors;

  session_start();
  if ($_SESSION['test2Finished']) {
    header('Location: test2main.php');
  };

  // Функция приведения картинки к массиву с индексами цветов
  function imgToInt($ft, $fn) {
    $filename = __DIR__ . "/assets/test2/$ft/$ft"."$fn.png";
    $size = getimagesize($filename);
    $img = imageCreateFromPng($filename);
    $colors = array();
    for ($i = 0; $i < $size[0]; $i++) { 
      for ($j = 0; $j < $size[1]; $j++) {
        $colors[] = imagecolorat($img, $i, $j);
      }
    }
    return $colors;
  }

  // Функция перехода на страницу результатов или следующий вопрос
  function nextPage() {
    if ($_SESSION['questionNumber2'] == 5) {
      $_SESSION['test2Finished'] = true;
      header('Location: test2main.php');
    } else {
      $_SESSION['questionNumber2'] = $_SESSION['questionNumber2'] + 1;
      header('Location: test2.php');
    }
  }

  // Массив с типами фракталов. Нужен для рандомной генерации номера картинки
  $fractalTypes = ['koch', 'mandelbrot', 'menger'];

  // Если открыта первая страница, то происходит обучение модели на картинках
  // Затем выбираются пять рандомных картинок, сохраняются их названия, номера и предположения НС в сессионную переменную
  if ($_SESSION['questionNumber2'] == 1 && 
  $_SESSION['flag']) {
    $_SESSION['flag'] = FALSE;
    $labels = array();
    $samples = array();
    $test2images = ['menger' => array(), 'mandelbrot' => array(), 'koch' => array()];
    foreach ($fractalTypes as $key => $value) {
      for ($i = 0; $i < 15; $i++) { 
        $labels[] = $value;
        $samples[] = imgToInt($value, $i + 1);
      }
      for ($i = 16; $i <= 20; $i ++) { 
        $test2images[$value][] = $i;
      }
    }
    $classifier = new KNearestNeighbors();
    $classifier->train($samples, $labels);

    $answersArray = [[], [], [], [], []];
    for ($i = 0; $i < 5; $i++) { 
      $answersArray[$i]['answer'] = $fractalTypes[rand(0, 2)];
      $rand = rand(0, count($test2images[$answersArray[$i]['answer']]) - 1);
      $answersArray[$i]['number'] = array_splice($test2images[$answersArray[$i]['answer']], $rand, 1)[0];
      $answersArray[$i]['prediction'] = $classifier->predict(imgToInt($answersArray[$i]['answer'], $answersArray[$i]['number']));
    }
    $_SESSION['test2answers'] = $answersArray;
  }
  // print_r($_SESSION['test2answers'][0]);

  // Срабатывает при нажатии на один из ответов
  if (isset($_POST['koch'])) {
    $_SESSION['test2answers'][$_SESSION['questionNumber2'] - 1]['userAnswer'] = 'koch';
    nextPage();
  } elseif (isset($_POST['mandelbrot'])) {
    $_SESSION['test2answers'][$_SESSION['questionNumber2'] - 1]['userAnswer'] = 'mandelbrot';
    nextPage();
  } elseif (isset($_POST['menger'])) {
    $_SESSION['test2answers'][$_SESSION['questionNumber2'] - 1]['userAnswer'] = 'menger';
    nextPage();
  }
  $currentType = $_SESSION['test2answers'][$_SESSION['questionNumber2'] - 1]['answer'];
  $currentNumber = $_SESSION['test2answers'][$_SESSION['questionNumber2'] - 1]['number'];
?>

<div class="container">
  <div class="card w-25 mx-auto mt-5">
    <div class="card-body text-center display-5 lh-base">
      <img src="./assets/test2/<?php echo $currentType . "/" . $currentType . $currentNumber; ?>.png" class="card-img-top" alt="">
    </div>
  </div>
  <form method="POST">
    <ul class="list-group w-50 mx-auto mt-5">
      <button type="submit" name="koch" class="list-group-item">Снежинка Коха</button>
      <button type="submit" name="mandelbrot" class="list-group-item">Множество Мандельброта</button>
      <button type="submit" name="menger" class="list-group-item">Губка Менгера</button>
    </ul>
  </form>
  <script>
    const items = document.querySelectorAll('.list-group-item');
    let clickable = true;
    items.forEach(item => {
      item.onclick = e => {
        if (clickable) {
          clickable = false;
          item.classList.add('active')
        }
      }
    })
  </script>
</div>

<!-- Footer -->
<?php include './inc/footer.php'; ?>
