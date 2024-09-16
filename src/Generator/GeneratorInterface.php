<?php
declare(strict_types=1);

namespace Generator;

interface GeneratorInterface
{
    public function generate(): string|array;
}
