<?php
declare(strict_types=1);
namespace Generator;

class RandomStringGenerator implements GeneratorInterface
{
    private int $length;

    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function generate(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
