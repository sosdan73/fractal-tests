<?php
  // Данные для ответа
  // $answers = [
  //   'Gilbert' => [
  //     'name' => 'кривая Гильберта',
  //     'description' => 'Ты изворотливый, как кривая Гильберта. Ты приспосабливаешься к любым условиям. Тебя боятся все соседи и работники ЖКХ. Своей аурой ты распугал(а) всех кошек на районе. Когда ты возвращаешься с работы, тучи сгущаются и играет зловещая музыка как в Твин Пиксе у Девида Линча. В свою квартиру ты заходишь через окно, предварительно забравшись по дереву. По паспорту ты Тот-Кого-Нельзя-Называть. Дети из соседнего подъезда приносят тебе в жертву отловленных на подоконнике мух, в надежде никогда тебя не увидеть. Власти Америки уверены, что ты убил(а) Кеннеди.'
  //   ],
  //   'Newton' => [
  //     'name' => 'бассейны Ньютона',
  //     'description' => 'Ты бездонный(ая), как бассейны Ньютона. В тебя помещается Макдональдс и близлежащая парковка торгового центра. Еда это твоя работа и хобби, ты ешь во сне и в душе. Охранники всех магазинов в округе боятся отобрать у тебя курицу гриль когда ты заходишь в здание. Ты посвящаешь в рыцари шампуром от шашлыка. В твоей власти альянс шаурменов из лучших шавушных Москвы. Помимо этого ты владеешь мастерством рассказа своих похождений за едой с набитым ртом так, чтобы ни одна крошка из твоего рта не проломила череп твоего собеседника. Тебя все любят, потому что ты смешно икаешь.'
  //   ],
  //   'Romanesco' => [
  //     'name' => 'Романеско',
  //     'description' => 'Ты – Романеско. Несмотря на красивое название, ты не капуста, твоя жизнь это краеугольный камень в философии Сократа. Ты настолько неприметная и скучная, что на тусовке тебя путают с гардеробщицей и просят быстрее принести вон ту фиолетовую куртку от The North Face, тыкая тебе в бокал с безалкогольным мохито номерками от вешалок. В общем, ты овощ, в жизни которого нашла свое место затяжная депрессия. Пора что-то менять.'
  //   ]
  // ];
  $answers = [
    'Gilbert' => [
      'name' => 'кривая Гильберта',
      'description' => 'Ты изворотливый (в хорошем смысле этого слова), как кривая Гильберта, от чего легко приспосабливаешься к любым условиям. У тебя нет врагов, поскольку они опасались бы твой могучей хитрости. Не исключено, что у тебя большой потенциал к гимнастике (если ты еще не пробовал(-а), то обязательно стоит!). В свою квартиру ты заходишь через окно, предварительно забравшись по дереву. У тебя одинаково хорошо развиты оба полушария мозга (мозг ведь чем-то похож на кривую Гильберта, – тут ничего удивительного)'
    ],
    'Newton' => [
      'name' => 'бассейны Ньютона',
      'description' => 'Твой внутренний мир так же глубок, как бассейны Ньютона. У тебя большое количество близких тебе людей. Ты любишь поесть, ведь еда – это всегда хорошо. В качестве шутки ты посвящаешь своих друзей, коих у тебя много, в рыцари шампуром от шашлыка. Помимо этого ты владеешь мастерством рассказа своих похождений за едой. Тебя все любят, потому что ты смешно икаешь.'
    ],
    'Romanesco' => [
      'name' => 'Романеско',
      'description' => 'Ты – Романеско. Несмотря на красивое название, ты не капуста, твоя жизнь – это краеугольный камень в философии Сократа. Ты настолько разумен и рационален, что при желании можешь создать свое фрактальное государство и управлять им, подняв показатели экономики и счастья жителей на высочайший уровень. У тебя хорошие взаимоотношения с природой: ты наверняка любишь гулять по парку, а птички подпевают твоим серенадам. А еще ты точно добряк.'
    ]
  ];
  if ($_SESSION['points'] > 10) {
    $answer = 'Newton';
  } elseif ($_SESSION['points'] > 5) {
    $answer = 'Gilbert';
  } else {
    $answer = 'Romanesco';
  }

  if (isset($_POST['restart'])) {
    $_SESSION['testStarted'] = FALSE;
    $_SESSION['testFinished'] = FALSE;
    $_SESSION['questionNumber'] = 1;
    $_SESSION['points'] = 0;
    header('Location: test1.php');
  }
?>
<div class="container-fluid">
  <h1 class="display-1 my-4 text-center fw-bold">Поздравляем! Ты –</h1>
  <div class="d-grid">
    <div class="row">
      <div class="card col-6 offset-3">
        <div class="card-img-top position-relative">
          <img src="./assets/<?php echo $answer;?>.png" class="img-fluid" alt="...">
          <div class="cover w-100 h-100 d-grid">
            <p id="header" class="text-center text-white display-4 align-self-end fw-bolder"><?php echo $answers[$answer]['name']; ?></p>
            <p id="description" class="text-justify text-white align-self-center mx-3 fs-5 text-hidden"><?php echo $answers[$answer]['description'] ?></p>
          </div>
        </div>
      </div>
      <form class=" col-6 offset-3 mt-4 mb-5" method="POST">
        <div class="d-grid">
          <div class="row">
            <button type="button" id="btn-description" class="btn btn-outline-dark btn-lg mb-4 py-3 col-12 col-md-5">Показать описание</button>
            <button name="restart" type="submit" class="btn btn-outline-dark btn-lg mb-4 py-3 col-12 offset-md-1 col-md-6">Стереть мои результаты</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  const btnDescription = document.getElementById('btn-description');
  const description = document.getElementById('description');
  let descriptionIsShown = false;
  let clickable = true;

  btnDescription.onclick = () => {
    if (clickable) {
      clickable = false;
      setTimeout(() => {
        clickable = true;
      }, 400);
      if (descriptionIsShown) {
        btnDescription.innerText = 'Показать описание';
        description.classList.add('text-hidden');
      } else {
        btnDescription.innerText = 'Скрыть описание';
        description.classList.remove('text-hidden');
      }
      descriptionIsShown = !descriptionIsShown;
    }
  }
</script>
<style>
  .cover {
    position: absolute;
    top: 0;
    background-color: rgba(0, 0, 0, 60%);
    grid-template-rows: 1fr 2fr;
  }
  #description {
    transition: opacity 0.4s ease-in-out;
    opacity: 1;
    overflow-y: auto;
  }
  .text-hidden {
    opacity: 0 !important;
  }
  #header {
    text-transform: uppercase;
  }
</style>