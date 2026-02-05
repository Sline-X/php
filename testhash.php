<?php
// Шифрованный текст нечувствителен; base64_decode в порядке
$sealed_b64 = "oRBXXAV4iQBrxlV4A21Bord8Yo/D8ZlrIIGNyaRCcGBfpz0map52I3xq6l+CST+1NSgQkbV+HiYyFjXWiWiaCGupGf+zl4bgWj/A9Adtem7Jt3h3emrMsLw=";
$sealed = base64_decode($sealed_b64);

// Ключевая пара содержит криптографический секрет; использовать безопасный по времени декодер
$keypair_b64 = "KZkF8wnB7bnC2aXB3lFOqCTc0Z6MllvaQb9ASVG8o2/MsewkuE4u1uaEgTzSakeiYyIW8DGj+02/L3cWIbs9bQ==";
$keypair = sodium_base642bin($keypair_b64, SODIUM_BASE64_VARIANT_ORIGINAL);

$opened = sodium_crypto_box_seal_open($sealed, $keypair);
// var_dump($opened);

// $keypair = 'sadasdasd';
$keypair = sodium_crypto_box_keypair();

$text = 'piska';
$ctext = sodium_base642bin($text, SODIUM_BASE64_VARIANT_ORIGINAL);
$l = sodium_crypto_box_seal($text, $keypair);

print($l);

?>
