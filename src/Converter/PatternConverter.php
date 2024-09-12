<?php

namespace Converter;

class PatternConverter
{
    public function convert($input)
    {
        if (is_array($input)) {
            return implode(', ', array_map([$this, 'convert'], $input));
        }

        $alphabet = array_merge(range('a', 'z'), range('A', 'Z'));
        $positions = array_merge(range(1, 26), range(1, 26));
        $map = array_combine($alphabet, $positions);

        $pattern = '';
        $prevWasLetter = false;
        $prevWasDigit = false;

        foreach (str_split($input) as $char) {
            if (ctype_digit($char)) {
                if ($prevWasLetter) {
                    $pattern .= '/';
                }
                $pattern .= $char;
                $prevWasDigit = true;
                $prevWasLetter = false;
            } elseif (isset($map[strtolower($char)])) {
                if ($prevWasDigit) {
                    $pattern .= '/';
                }
                if ($prevWasLetter) {
                    $pattern .= '/';
                }
                $pattern .= $map[strtolower($char)];
                $prevWasLetter = true;
                $prevWasDigit = false;
            }
        }

        return $pattern;
    }
}
