<?php

$link = 'http://api.openweathermap.org/data/2.5/weather';
$appid = 'f2b6f0a80a0e8389cba540f68fef18a8';
$city_list = file_get_contents("city.list.json") or exit('Не удалось получить данные');
$cityArr = json_decode($city_list, true) or exit('Ошибка декодирования json');
$city = [];

foreach ($cityArr as $cities) {
    (!empty($cities['name'])) ? $city[] = $cities['name'] : 'Не удалось получить название города';
}

if (isset($_GET['cityname'])) {
    $cityname = mb_convert_case($_GET['cityname'], MB_CASE_TITLE);

    if (!in_array($cityname, $city)) {
        echo 'Ошибка - неправильное название города.';
    } else {    
        $weather = file_get_contents("$link?q=$cityname&appid=$appid") or exit('Не удалось получить данные');
        $weatherArr = json_decode($weather, true) or exit('Ошибка декодирования json');
        $cityId = $weatherArr['id']; 
        $country = $weatherArr['sys']['country'];
        $sky = $weatherArr['weather']['0']['description'];
        $humidity = $weatherArr['main']['humidity'];
        $temp = $weatherArr['main']['temp'];
        $pressure = $weatherArr['main']['pressure'];
        $needPressure = round($pressure * 0.75);
        $temp1 = $temp - 273;
        $needTemp = round($temp1) . ' C&deg';
        if ($needTemp > 0) {
            $needTemp = str_pad($needTemp, strlen($needTemp) + 1, '+', STR_PAD_LEFT);
        } elseif ($needTemp < 0) {
            $needTemp = str_pad($needTemp, strlen($needTemp) + 1, '-', STR_PAD_LEFT);
        }      
    } 
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>hw4</title>
</head>
<body>
  <form action="index.php">
    <input type="text" placeholder="Введите город" value="" name="cityname" required>
    <button type="confirm">Поcмотреть погоду</button>
    <?php
        foreach ($cityArr as $cities) {
            (!empty($cities['id'])) ? $id = $cities['id'] : 'Не удалось получить id города';
            
            if ($id === $cityId) {
                echo "<pre>";
                echo 'Город: ' . $cityname . ', ' . $country . '<br>';
                echo 'Погодные условия: ' . $needTemp . ' ' . $sky . '<br>';
                echo 'Давление: ' . $needPressure . ' мм.рт.ст' . '<br>';
                echo 'Влажность: ' . $humidity . '%';
            }
        }
    ?>
  </form>

  <form action="allCities.php">
    <button type="confirm">Список городов России</button>
  </form>
</body>
</html>