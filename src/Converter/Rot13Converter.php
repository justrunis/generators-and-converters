<?php
declare(strict_types=1);
namespace Converter;

class Rot13Converter implements ConverterInterface
{
    public function convert($input): string
    {
        if (is_array($input)) {
            return implode(', ', array_map('str_rot13', $input));
        }
        return str_rot13($input);
    }
}
