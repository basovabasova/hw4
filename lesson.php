<?php

$a = "Why did I go to study at such an advanced age?";

echo "<pre>";
var_dump(mb_substr($a, 8, 13)); 
var_dump(str_pad($a, 52, "@", STR_PAD_BOTH));
var_dump(str_repeat(mb_substr($a, 8, 14), 3));
var_dump(str_shuffle($a));
var_dump(strrev($a));

$b = explode(' ', $a);
$c = implode(' ', $b);
print_r($b);
print_r($c);

$d = str_split($c, 15);
print_r($d);

$e = "    I go to study    ";
var_dump(trim($e));
?>








<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>дз3</title>
</head>
<body>
</body>
</html>