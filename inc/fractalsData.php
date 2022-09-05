<?php
// Данные о фракталах
$fractals = [
  'Newton' => [
    'id' => 0,
    'name' => 'Бассейны Ньютона',
    'description' => 'Бассейны Ньютона, фракталы Ньютона — разновидность алгебраических фракталов.

    Области с фрактальными границами появляются при приближенном нахождении корней нелинейного уравнения алгоритмом Ньютона на комплексной плоскости (для функции действительной переменной метод Ньютона часто называют методом касательных, который, в данном случае, обобщается для комплексной плоскости).
    
    Изучение этого предмета математики заинтересовало Артура Кэли ещё в 1879 году, однако завершить исследование смогли лишь в 70-х годах двадцатого столетия с появлением вычислительной техники. Оказалось, что на пересечениях областей (их принято называть областями притяжения) образуются так называемые фракталы — бесконечные самоподобные геометрические фигуры.
    
    Ввиду того, что Ньютон применял свой метод исключительно к многочленам, фракталы, образованные в результате такого применения, обрели название фракталов Ньютона или бассейнов Ньютона.'
  ],
  'Menger' => [
    'id' => 1,
    'name' => 'Губка Менгера',
    'description' => 'Губка Менгера - один из самых известных и популярных трехмерных фракталов. Ее автором является математик Карл Менгер (Karl Menger, 1902-1985).

    Итеративный алгоритм построения губки Менгера достаточно простой: исходный куб со стороной 1 делится плоскостями, параллельными его граням, на 27 равных кубов. Из него удаляются один центральный куб и 6 прилежащих к нему по граням кубов. Получается множество, состоящее из 20 оставшихся меньших кубов. Поступая так же с каждым из этих кубов, получим множество, состоящее уже из 400 меньших кубов. Продолжая этот процесс бесконечно, получим губку Менгера.'
  ],
  'Koch' => [
    'id' => 2,
    'name' => 'Снежинка Коха',
    'description' => 'Оригинальная совершенная геометрия снежинок обусловлена сложными физическими процессами, лежащими в основе их образования. В результате происходит последовательное повторение, пошаговое воспроизведение, копирование и масштабирование одной и той же простой геометрической формы, и из кристалликов льда образуются удивительные по красоте конструкции, складывающиеся в причудливые узоры.

    Наиболее известной из таких линий является "снежинка Коха" - один из первых, исследованных учеными фракталов. Снежинка Коха является классическим примером непрерывной линии, к которой нельзя провести касательную ни в одной точке. Она обладает целым рядом удивительных свойств, и впервые была описана в статье шведского математика Хельге фон Коха (Niels Fabian Helge von Koch) в 1904 году.'
  ],
  'Gilbert' => [
    'id' => 3,
    'name' => 'Кривая Гильберта',
    'description' => 'Кривые Гильберта названы в честь немецкого математика Давида Гильберта. Впервые они были описаны в 1891 году.

    Кривая Гильберта — это непрерывная кривая, заполняющая пространство. 
    
    Самый простой способ понять, как строится кривая Гильберта, следующий. Представьте, что у вас есть длинный кусок веревки и вы хотите расположить веревку на плоской сетке с квадратными ячейками. Ваша цель состоит в том, чтобы веревка пересекала стороны каждого квадрата сетки ровно один раз.
    Не разрешается, чтобы веревка пересекала саму себя. Основной элемент раскладки - П-образный элемент.
    
    Данные кривые иногда используются в обработке изображений. При преобразовании изображения в оттенки серого через сглаживание черного и белого значения, превосходящие критические, могут быть перенесены с помощью использования гильбертовой кривой так, что на рисунке крайности будут менее очевидными для глаз.'
  ],
  'Mandelbrot' => [
    'id' => 4,
    'name' => 'Множество Мандельброта',
    'description' => 'В математике множество Мандельброта — это фрактал, определённый как множество точек на комплексной плоскости, для которых итеративная последовательность не уходит в бесконечность.

    Визуально, внутри множества Мандельброта можно выделить бесконечное количество элементарных фигур, причём самая большая в центре представляет собой кардиоиду. Также есть набор овалов, касающихся кардиоиды, размер которых постепенно уменьшается, стремясь к нулю. Каждый из этих овалов имеет свой набор меньших овалов, диаметр которых также стремится к нулю и т.д. Этот процесс продолжается бесконечно, образуя фрактал. Также важно, что эти процессы ветвления фигур не исчерпывают полностью множество Мандельброта: если рассмотреть с увеличением дополнительные «ветки», то в них можно увидеть свои кардиоиды и круги, не связанные с главной фигурой. Самая большая фигура (видимая при рассматривании основного множества) из них находится в области от −1,78 до −1,75 на отрицательной оси действительных значений.'
  ]
]
?>