<?php

namespace Tests\Generator;

use Generator\RandomStringArrayGenerator;
use PHPUnit\Framework\TestCase;

class RandomStringArrayGeneratorTest extends TestCase
{
    public function testGenerateArraySizeAndStringLength()
    {
        $arraySize = 5;
        $stringLength = 8;
        $generator = new RandomStringArrayGenerator($arraySize, $stringLength);
        $generatedArray = $generator->generate();

        $this->assertIsArray($generatedArray);
        $this->assertCount($arraySize, $generatedArray);

        foreach ($generatedArray as $string) {
            $this->assertIsString($string);
            $this->assertEquals($stringLength, strlen($string));
        }
    }
}
