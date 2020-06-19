<?php

namespace Doomy\Translator\Locale\Helper;

use Doomy\Translator\Locale\Model\Language;

class Locale
{
    const LANGUAGE_ENG = 'ENG';
    const LANGUAGE_CZE = 'CZE';

    public static function resolveLanguage() {
        if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) return Language::LANGUAGE_ENG;

        $serverLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        return $serverLanguage == 'cs' ? Language::LANGUAGE_CZE : Language::LANGUAGE_ENG;
    }
}
