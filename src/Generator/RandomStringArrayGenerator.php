<?php
declare(strict_types=1);
namespace Generator;

class RandomStringArrayGenerator implements GeneratorInterface
{
    private int $arraySize;
    private RandomStringGenerator $randomStringGenerator;

    public function __construct(int $arraySize, RandomStringGenerator $randomStringGenerator)
    {
        $this->arraySize = $arraySize;
        $this->randomStringGenerator = $randomStringGenerator;
    }

    public function generate(): array
    {
        $array = [];
        for ($i = 0; $i < $this->arraySize; $i++) {
            $array[] = $this->randomStringGenerator->generate();
        }
        return $array;
    }
}
