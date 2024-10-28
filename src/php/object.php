<?php
class Config {   
}

$object = new Config;

$object->title = 'Название сайта';
$object->keywords = ['PHP', 'Pyhon', 'Ruby', 'JavaScript'];
$object->per_page = 20;

echo '<pre>';
print_r($object);
echo '</pre>';