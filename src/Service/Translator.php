<?php

namespace Doomy\Translator\Service;

use Nette\Localization\ITranslator;
use Doomy\DataProvider\DataProvider;
use Doomy\Translator\Model\SystemTranslation;

class Translator implements ITranslator
{
    private $language;
    private $dataProvider;

    public function __construct($language, DataProvider $dataProvider) {
        $this->language = $language;
        $this->dataProvider = $dataProvider;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function translate($message, ...$parameters): string
    {
        // $message = str_replace("'", "''", $message);
        if (!$message) return '';
        $translation = $this->dataProvider->findOne(
            SystemTranslation::class,
            ['KEY' => str_replace("'", "''", $message), 'LANGUAGE_CODE' => $this->language]
        );
        if(!$translation) {
            $this->prefillTranslation($message);
            return $message;
        }
        return $translation->TRANSLATION;

        //return str_replace("''", "'", $translation->TRANSLATION);
    }

    private function prefillTranslation($message) {
        $this->dataProvider->save(
            SystemTranslation::class,
            [
                'LANGUAGE_CODE' => $this->language,
                'KEY' => $message,
                'TRANSLATION' => $message
            ]
        );
    }
}
