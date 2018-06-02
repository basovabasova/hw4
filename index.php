<?php

$appid = 'f2b6f0a80a0e8389cba540f68fef18a8';
$city_list = file_get_contents("city.list.json");
$cityArr = json_decode($city_list, true);
$city = [];
    foreach ($cityArr as $cities) {
        $city[] = $cities['name'];      
    }

if (isset($_GET['cityname'])) {
    $cityname = mb_convert_case($_GET['cityname'], MB_CASE_TITLE);

    if (!in_array($cityname, $city)) {
        echo "Ошибка - неправильное название города.";
    } else {    
        $weather = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$cityname&units=metricru&appid=$appid");
        $weatherArr = json_decode($weather, true);
    
        $country = $weatherArr['sys']['country'];
        $sky = $weatherArr['weather']['0']['description'];
        $humidity = $weatherArr['main']['humidity'];
        $temp = $weatherArr['main']['temp'];
        $pressure = $weatherArr['main']['pressure'];
        $needPressure = round($pressure * 0.75);
        $temp1 = $temp - 273;
        $needTemp = round($temp1) . ' C&deg';
            if ($needTemp > 0) {
                $needTemp = str_pad($needTemp, strlen($needTemp) + 1, "+", STR_PAD_LEFT);
            } elseif ($needTemp < 0) {
                $needTemp = str_pad($needTemp, strlen($needTemp) + 1, "-", STR_PAD_LEFT);
            }

        $cityId = $weatherArr['id'];
   
        foreach ($cityArr as $cities) {
            $id = $cities['id'];        

            if ($id === $cityId) {
                echo "<pre>";
                echo 'Город: ' . $cityname . ', ' . $country . '<br>';
                echo 'Погодные условия: ' . $needTemp . ' ' . $sky . '<br>';
                echo 'Давление: ' . $needPressure . ' мм.рт.ст' . '<br>';
                echo 'Влажность: ' . $humidity . '%';
            }
        }
    }      
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>дз4</title>
</head>
<body>
  <form action="index.php">
    <input type="text" placeholder="Введите город" value="" name="cityname" required>
    <button type="confirm">Поcмотреть погоду</button>
  </form>
</body>
</html>