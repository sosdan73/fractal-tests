<!-- Head and Header -->
<?php include './inc/header.php'; ?>

<?php 
  session_start();
  if ($_SESSION['testFinished']) {
    header('Location: test1.php');
  };

  // Данные
  $questions = [
    [
      'question' => '1) Чем займешься в свободное время?',
      'answers' => [
        'Конечно поем, потом еще раз поем, (на всякий случай, а то вдруг проголодаюсь пока буду мыть посуду)',
        'Пойду на улицу кормить голубей и атаковать подозрительными взглядами прохожих, чтобы они быстрее проходили мимо мусорного бака, в котором я сижу',
        'Займусь самообразованием, буду читать книжки про жилкование на листьях представителей семейства алоэ',
        'Посмотрю свой любимый турецкий сериал и лягу спать'
      ],
      'values' => [
        3,
        2,
        1,
        0
      ]
    ],
    [
      'question' => '2) Как ты ведешь себя в компании незнакомых людей?',
      'answers' => [
        'Притворюсь мертвым, меня так учили на уроках ОБЖ в школе (это же также работает, как с медведями?)',
        'Расскажу анекдот про новых русских, им 100% понравится, чем я хуже стендаперов на ТНТ? ',
        'Главное не смотреть им в глаза и не делать резких движений (нужно помнить, что они боятся тебя больше, чем ты их)',
        'Постараюсь вести себя как адекватный человек'
      ],
      'values' => [
        2,
        3,
        1,
        0
      ]
    ],
    [
      'question' => '3) Ты в музее современного искусства. Что ты планируешь делать?',
      'answers' => [
        'Так, где тут кормят?',
        'Зайду в сувенирный магазин и скуплю все носки с Ван Гогом, чтобы все видели, что я самый модный в Чебоксарах',
        'С умным видом, поглаживая подбородок, буду смотреть на огнетушитель и план эвакуации, изображая глубокое понимание концепции',
        'Пойду домой'
      ],
      'values' => [
        3,
        2,
        1,
        0
      ]
    ],
    [
      'question' => '4) У тебя осталась 1000 рублей, до зарплаты еще неделя. Как ты ее потратишь?',
      'answers' => [
        'Бог дал – бог взял, а мне пожалуйста биг тейсти с двойным сыром, макфлурри с карамелью, еще картошечку по-деревенски и большую колу',
        'Накуплю гречки и туалетной бумаги, сядем с котом на жесткую дозарплатную диету',
        'Куплю новозеландский доллар, спрячу в чулок или под матрас',
        'Постараюсь грамотно распределить расходы и дожить до конца недели'
      ],
      'values' => [
        3,
        2,
        1,
        0
      ]
    ],
    [
      'question' => '5) Какой принцип из ниже описанных соответствует твоей идеологии?',
      'answers' => [
        'Всегда говори да',
        'Если жизнь дала тебе лимоны, выдави их себе в глаза',
        'Делу время, а потехе вся жизнь',
        'Подумай прежде чем подумать'
      ],
      'values' => [
        0,
        1,
        2,
        3
      ]
    ]
  ];
  $question = $questions[$_SESSION['questionNumber'] - 1];

  function nextPage() {
    // Переход на страницу результатов или следующий вопрос
    if ($_SESSION['questionNumber'] == 5) {
      $_SESSION['testFinished'] = true;
      header('Location: test1.php');
    } else {
      $_SESSION['questionNumber']++;
      header('Location: test.php');
    }
  }

  // Срабатывает при нажатии на один из ответов
  if (isset($_POST['answered1'])) {
    // Добавление очков к нынешнему состоянию
    $_SESSION['points'] = $_SESSION['points'] + $question['values'][0];
    nextPage();
  } elseif (isset($_POST['answered2'])) {
    // Добавление очков к нынешнему состоянию
    $_SESSION['points'] = $_SESSION['points'] + $question['values'][1];
    nextPage();
  } elseif (isset($_POST['answered3'])) {
    // Добавление очков к нынешнему состоянию
    $_SESSION['points'] = $_SESSION['points'] + $question['values'][2];
    nextPage();
  } elseif (isset($_POST['answered4'])) {
    // Добавление очков к нынешнему состоянию
    $_SESSION['points'] = $_SESSION['points'] + $question['values'][3];
    nextPage();
  }
?>

<div class="container">
  <div class="card w-75 mx-auto mt-5">
    <div class="card-body text-center display-5 lh-base">
      <?php echo $question['question']; ?>
    </div>
  </div>
  <form method="POST">
    <ul class="list-group w-75 mx-auto mt-5">
      <button type="submit" name="answered1" class="list-group-item"><?php echo $question['answers'][0];?></button>
      <button type="submit" name="answered2" class="list-group-item"><?php echo $question['answers'][1];?></button>
      <button type="submit" name="answered3" class="list-group-item"><?php echo $question['answers'][2];?></button>
      <button type="submit" name="answered4" class="list-group-item"><?php echo $question['answers'][3];?></button>
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
