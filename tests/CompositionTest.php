<?php

declare(strict_types=1);

namespace Crell\fp;

use PHPUnit\Framework\TestCase;

class CompositionTest extends TestCase
{
    /**
     * @test
     */
    public function basic(): void
    {
        $c = compose(
            fn(string $s): int => strlen($s),
            fn(int $i): int => $i * 2,
        );

        self::assertEquals(10, $c('hello'));
    }

    /**
     * @test
     */
    public function nested(): void
    {
        $c = compose(
            [
                fn(string $s): int => strlen($s),
                fn(int $i): int => $i * 2,
            ],
            fn(int $i): int => $i * 3,
        );

        self::assertEquals(30, $c('hello'));
    }

    /**
     * @test
     */
    public function pipe(): void
    {
        $result = pipe(
            'hello',
            [
                fn(string $s): int => strlen($s),
                fn(int $i): int => $i * 2,
            ],
            fn(int $i): int => $i * 3,
        );

        self::assertEquals(30, $result);
    }

}
