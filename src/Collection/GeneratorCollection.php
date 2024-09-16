<?php
declare(strict_types=1);

namespace Collection;

use Generator\GeneratorInterface;

class GeneratorCollection
{
    private array $generators = [];

    public function addGenerator(GeneratorInterface $generator): void
    {
        $this->generators[] = $generator;
    }

    public function getGenerators(): array
    {
        return $this->generators;
    }
}
