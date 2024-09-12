<?php

namespace Tests\Converter;

use Converter\Rot13Converter;
use PHPUnit\Framework\TestCase;

class Rot13ConverterTest extends TestCase
{
    public function testConvert()
    {
        $converter = new Rot13Converter();

        $input = 'HelloWorld';
        $expectedOutput = 'UryybJbeyq';
        $converted = $converter->convert($input);

        $this->assertEquals($expectedOutput, $converted);
    }
}
