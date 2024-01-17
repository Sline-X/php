<?php
declare(strict_types=1);

namespace Main\Zandstra\Chapter8\Decoupling;

use Main\Zandstra\Chapter8\Lesson;

class RegistrationMgr
{
    public function register(Lesson $lesson): void
    {
        //Некоторые действия с Lesson
        //и отправка кому-нибудь сообщений
        $notifier = Notifier::getNotifier();
        $notifier->inform("Новое занятие: стоимость - ({$lesson->cost()})");
    }
}
