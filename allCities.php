<?php

$city_list = file_get_contents("city.list.json") or exit('Не удалось получить данные');
$cityArr = json_decode($city_list, true) or exit('Ошибка декодирования json');
$city = [];
foreach ($cityArr as $cities) {
    if (($cities['country'] === 'RU') && ($cities['name'] !== '-') && ($cities['name'] !== '')) {
    $city[] = $cities['name'] . '<br>'; 

  }
}

sort($city);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>hw4</title>
</head>
<body>
  <form action="index.php">
    <button type="confirm">Назад</button>
  </form>  
  <?php
      foreach ($city as $value) {
          echo $value;
      }
  ?>
</body>
</html>