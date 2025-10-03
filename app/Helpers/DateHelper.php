<?php

namespace App\Helpers;

use Carbon\{Carbon, CarbonImmutable, Translator};

class DateHelper
{
    public static function currentYear()
    {
        return Carbon::parse(now())->format('Y');
    }

    public static function currentDate()
    {
        $currentDate = Carbon::today();
        $formattedDate = self::extendedDate($currentDate);

        return $formattedDate;
    }

    public static function extendedDate($data)
    {
        $pt_BR = 'pt_BR';
        $translator = Translator::get($pt_BR);
        $translator->setTranslations([
            'months' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            'months_short' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            'weekdays' => ['domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado'],
            'weekdays_short' => ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sáb'],
        ]);

        return Carbon::parse($data)
            ->locale($pt_BR)
            ->translatedFormat('l, d \d\e F \d\e Y');
    }
}
