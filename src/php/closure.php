<?php
$message = 'Работа не может быть продолжена из-за ошибок:';
$check = function(array $errors) use ($message)
{
    if (isset($errors) && count($errors) > 0) {
        echo $message . "\n";
        foreach($errors as $error) {
            echo "$error" . "\n";
        }
    }
};

$check([]);

$errors[] = 'Заполните имя пользователя';
$check($errors);

$message = 'Список требований';
$errors = ['PHP', 'PostgreSQL', 'Redis'];
$check($errors);