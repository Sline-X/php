<?php

//Проверить, что в строке есть число (одна цифра и более)
preg_match('/\d+/s', 'article_123.html', $matches);

// echo $matches[0]; //выводит 123


// Найти в тексте адрес E-mail. \S означает "не пробел", а [a-z0-9.] + -
// "любое число букв, цифр или точек". Модификатор 'i' после '/'
// заставляет PHP не учитывать регистр букв при поиске совпадений.
// Модификатор 's', стоящий рядом с 'i', говорит, что мы работаем
// в "однострочном режиме"
preg_match('/(\S+)@([a-z0-9.]+)/is', 'Привет от somebody@mail.ru!', $m);

//имя хоста будет в $m[2], а имя ящика (до @) - в $m[1].
// echo "В тексте найдено: ящик - $m[1], хост $m[2]";

$text = 'Привет от somebody@mail.ru, а также от other@mail.ru!';
$html = preg_replace(
    '/(\S+)@([a-z0-9.]+)/is', // найти все E-mail
    '<a href="mailto:$0">$0</a>', // заменить их по шаблону
    $text // искать в $text
);
// echo $html;

//Если встречается символ / в самом выражении, его надо экранировать

if (preg_match('/path\\/to\\/file/i', 'path/to/file') ) {
    // echo 'true';
}

// echo preg_replace('[(/file)[0-9]+]i', '$1', '/file123.txt');

echo preg_replace('/at/', 'AT', 'What is the Compatible Regex?');
