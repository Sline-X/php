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

// /a[xXyY]c/ соответствует axc, aYc и т.д.

//Простейший способ удаления тегов
echo preg_replace('/<[^>]+>/', '', $text);

// задание, как будут выглядет квантификаторы *, + и ? в терминах {...}


$str = " 15-16/2000       ";
$re = '{
  ^\s*(    #начало строки
    (\d+)    #день
      \s* [[:punct:]] \s*    #разделитель
    (\d+)    #месяц
      \s* [[:punct:]] \s*    #разделитель
    (\d+)    #год
  )\s*$    #конец строки
}xs';

//разбиваем строку на куски
preg_match($re, $str, $matches) or exit("Not a date: $str");

//Теперь разбираемся с карманами
echo "Дата без пробелов: '$matches[1]' <br />";
echo "День: $matches[2] <br />";
echo "Месяц: $matches[3] <br />";
echo "Год: $matches[4] <br />";

//Раскрашивание собственого кода
$text = htmlspecialchars(file_get_contents(__FILE__));
$html = preg_replace('/(\$[a-z]\w*/is', '<b>$1</b>', $text);
echo "<pre>$html</pre>";
//Вместо $1 можно также использовать сочетание \1 или, при записи в виде строки, \\1

//находим в строке слово, обрамленное любыми парными тегами
$str = 'Hello, this <b>word</b> is bold!';
$re = '|<(\w+) [^>]* > (.*?) </\1>|xs';
preg_match($re, $str, $matches) or exit('Нет тегов.');
echo htmlspecialchars("'$matches[2]' обрамлено тегом '$matches[1]'");

//игнорирование карманов
//Чтобы исключить такой карман из массива $matches или индекса, используемого для замены в функции preg_replace(),
//применяется специальный синтаксис карманов - сразу после открывающейся круглой скобки указывается последовательность ?:
$str = '2022-07-15';
$re = '|^(?:\d{4})-(?:\d{2})-(\d{2})$|';
preg_replace($re, $str, $matches) or exit('Соответствие не найдено');
echo htmlspecialchars('День: ' . $matches[1]);

//именованные карманы
$str = '2022-07-15';
$re = '|^<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})$|';
preg_match($re, $str, $matches) or exit('Соответствие не найдено');
echo 'День: '  . $matches['day']   . '<br />';
echo 'Месяц: ' . $matches['month'] . '<br />';
echo 'Год: '   . $matches['year']  . '<br />';

//Жадные квантификаторы 28.10
$str = 'Hello, this <b>word</b> is <b>bold</b>!';
$re = '|<(\w+) [^>]* > (.*) </\1>|xs';
preg_match($re, $str, $matches) or exit('Нет тегов.');
echo htmlspecialchars("'$matches[2]' обрамлено тегом '$matches[1]'");
//'word</b> is <b>bold' обрамлено тегом 'b'
