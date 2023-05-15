<?php

namespace App\Helpers;

use Symfony\Contracts\Translation\TranslatorInterface;

class Translator
{
    private static TranslatorInterface $translator;

    public function __construct(
        TranslatorInterface $translator
    ) {
        self::$translator = $translator;
    }

    public static function trans(string $id, array $parameters = [], string $domain = null, string $locale = null): string
    {
        return self::$translator->trans($id, $parameters, $domain, $locale);
    }

    public static function getLocale(): string
    {
        return self::$translator->getLocale();
    }
}
