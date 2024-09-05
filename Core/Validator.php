<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool {
        return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
    }
    public static function isValidTelephoneNumber(string $telephone, int $minDigits = 9, int $maxDigits = 14): bool {
        if (preg_match('/^[+][0-9]/', $telephone)) { //is the first character + followed by a digit
            $count = 1;
            $telephone = str_replace(['+'], '', $telephone, $count); //remove +
        }

        //remove white space, dots, hyphens and brackets
        $telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone);

        //are we left with digits only?
        return self::isDigits($telephone, $minDigits, $maxDigits);
    }

    function normalizeTelephoneNumber(string $telephone): string {
        //remove white space, dots, hyphens and brackets
        return str_replace([' ', '.', '-', '(', ')'], '', $telephone);
    }

    //$tel = '+9112 345 6789';
    //if (isValidTelephoneNumber($tel)) {
    //    //normalize telephone number if needed
    //echo normalizeTelephoneNumber($tel); //+91123456789
    //}

}
