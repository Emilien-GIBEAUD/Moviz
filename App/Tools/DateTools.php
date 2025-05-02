<?php

namespace App\Tools;

use DateTime;
use IntlDateFormatter;

class DateTools
{

    public static function dateEnToFr(string $dateEn): string {
        // Création d'un objet DateTime
        $date = new DateTime($dateEn);
        
        $formatter = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            null,
            null,
            'd MMMM y'
        );
        return $formatter->format($date);
    }

}