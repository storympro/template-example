<?php

use App\Helpers\Translator;

function __(string $id, array $parameters = [], string $domain = null, string $locale = null): string
{
    return Translator::trans($id, $parameters, $domain, $locale);
}