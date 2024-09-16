<?php
declare(strict_types=1);

namespace Converter;

interface ConverterInterface
{
    public function convert(string|array $input): string;
}
