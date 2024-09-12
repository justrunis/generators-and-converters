<?php

namespace Generator;

class RandomStringArrayGenerator
{
    private int $arraySize;
    private int $stringLength;

    public function __construct(int $arraySize, int $stringLength)
    {
        $this->arraySize = $arraySize;
        $this->stringLength = $stringLength;
    }

    public function generate(): array
    {
        $randomStringGenerator = new RandomStringGenerator($this->stringLength);
        $array = [];
        for ($i = 0; $i < $this->arraySize; $i++) {
            $array[] = $randomStringGenerator->generate();
        }
        return $array;
    }
}
