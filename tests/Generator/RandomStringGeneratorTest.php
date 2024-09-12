<?php

namespace Tests\Generator;

use Generator\RandomStringGenerator;
use PHPUnit\Framework\TestCase;

class RandomStringGeneratorTest extends TestCase
{
    public function testGenerateStringLength()
    {
        $length = 10;
        $generator = new RandomStringGenerator($length);
        $generatedString = $generator->generate();

        $this->assertIsString($generatedString);
        $this->assertEquals($length, strlen($generatedString));
    }
}
