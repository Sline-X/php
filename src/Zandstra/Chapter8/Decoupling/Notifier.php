<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter8\Decoupling;

abstract class Notifier
{
    public static function getNotifier(): Notifier
    {
        // Получить конкретный класс в соответствии с
        //конфигурацией или иной логикой
        if (rand(1, 2) === 1)
        {
            return new MailNotifier();
        }
        else
        {
            return new TextNotifier();
        }
    }
    abstract public function inform($message): void;
}
