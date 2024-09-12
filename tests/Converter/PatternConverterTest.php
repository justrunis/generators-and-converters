<?php

namespace Tests\Converter;

use Converter\PatternConverter;
use PHPUnit\Framework\TestCase;

class PatternConverterTest extends TestCase
{
    public function testConvertString()
    {
        $converter = new PatternConverter();

        $input = '22aAcd';
        $expectedOutput = '22/1/1/3/4';
        $converted = $converter->convert($input);

        $this->assertEquals($expectedOutput, $converted);
    }

    public function testConvertArray()
    {
        $converter = new PatternConverter();

        $input = ['22aAcd', '11test5'];
        $expectedOutput = '22/1/1/3/4, 11/20/5/19/20/5';
        $converted = $converter->convert($input);

        $this->assertEquals($expectedOutput, $converted);
    }
}
