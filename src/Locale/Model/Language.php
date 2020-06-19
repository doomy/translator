<?php

namespace Doomy\Translator\Locale\Model;

use Doomy\Repository\Model\Entity;

class Language extends Entity
{
    const TABLE = 't_language';
    const IDENTITY_COLUMN = 'LANGUAGE_CODE';

    const LANGUAGE_ENG = 'ENG';
    const LANGUAGE_CZE = 'CZE';

    public $LANGUAGE_CODE;
    public $NAME;
}
