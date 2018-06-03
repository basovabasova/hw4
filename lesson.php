<?php

$a = "Why did I go to study at such an advanced age?";

echo "<pre>";
var_dump(mb_substr($a, 8, 13)); //подстрока
var_dump(str_pad($a, 52, "@", STR_PAD_BOTH)); //добавляет 
var_dump(str_repeat(mb_substr($a, 8, 14), 3)); 
var_dump(str_shuffle($a)); //перемешивает
var_dump(strrev($a)); // задом наперед

$b = explode(' ', $a); //строка в массив
$c = implode(' ', $b); //массив в строку
print_r($b);
print_r($c);

$d = str_split($c, 15); //строка в массив, кол-во символов 
print_r($d);

$e = "    I go to study    ";
var_dump(trim($e));
var_dump(rtrim($e));
var_dump(ltrim($e));

var_dump(nl2br("Why did I go to' study\n at such an advanced age?"));
$string = "This\r\nis\n\ra\nstring\r";
echo nl2br($string); //Вставляет <br> перед каждым переводом строки

var_dump(mb_strtolower('I go to study')); //вниз
var_dump(mb_strtoupper('I go to study')); //вверх
var_dump(lcfirst('I go to study')); // первую букву вниз
var_dump(ucfirst('i go to study')); //первую букву вверх
var_dump(ucwords('I go to study')); //все первые буквы вверх

var_dump(mb_convert_case('I go to study', MB_CASE_UPPER));
var_dump(mb_convert_case('I go to study', MB_CASE_LOWER));
var_dump(mb_convert_case('I go to study', MB_CASE_TITLE));

$text = "Это символ евро - '€'.";

echo 'Исходная строка        : ', $text, PHP_EOL;
echo 'С добавлением TRANSLIT : ', iconv("UTF-8", "ISO-8859-1//TRANSLIT", $text), PHP_EOL;
echo 'С добавлением IGNORE   : ', iconv("UTF-8", "ISO-8859-1//IGNORE", $text), PHP_EOL;
echo 'Обычное преобразование : ', iconv("UTF-8", "ISO-8859-1", $text), PHP_EOL;
// тут чето не работает 

var_dump(intdiv(45, 7)); // Целочисленное деление

$nextWeek = time() + (7 * 24 * 60 * 60); // 7 дней; 24 часа; 60 минут; 60 секунд
echo 'Сейчас:           '. date('Y-m-d') ."\n";
echo 'Следующая неделя: '. date('Y-m-d', $nextWeek) ."\n";
// или с помощью strtotime():
echo 'Следующая неделя: '. date('Y-m-d', strtotime('+1 week')) ."\n";


/* расчет времени восхода солнца в Лиссабоне, Португалия
Latitude: 38.4 North
Longitude: 9 West
Zenith ~= 90
offset: +1 GMT
*/

echo date("D M d Y"). ', время восхода солнца : ' .date_sunrise(time(), SUNFUNCS_RET_STRING, 38.4, -9, 90, 1). ',' . '<br>' . 'время захода солнца : ' .date_sunset(time(), SUNFUNCS_RET_STRING, 38.4, -9, 90, 1);

$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2); //Вычислить расхождение массивов
echo "<pre>";
print_r($result);

$result1 = array_intersect($array1, $array2);//Вычисляет схождение массивов
print_r($result1);



?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>hw4</title>
</head>
<body>
</body>
</html>