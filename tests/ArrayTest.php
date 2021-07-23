<?php

declare(strict_types=1);

namespace Crell\fp;

use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    /**
     * @test
     */
    public function itmap(): void
    {
        $result = itmap(fn(int $x): int => $x * 2)([5, 6]);
        self::assertEquals([10, 12], iterator_to_array($result));
    }

    /**
     * @test
     */
    public function amap(): void
    {
        $result = amap(fn(int $x): int => $x * 2)([5, 6]);
        self::assertEquals([10, 12], $result);
    }

    /**
     * @test
     */
    public function itfilter(): void
    {
        $result = itfilter(fn(int $x): bool => !($x % 2))([5, 6, 7, 8]);
        self::assertEquals([1 => 6, 3 => 8], iterator_to_array($result));
    }

    /**
     * @test
     */
    public function afilter(): void
    {
        $result = afilter(fn(int $x): bool => !($x % 2))([5, 6, 7, 8]);
        self::assertEquals([1 => 6, 3 => 8], $result);
    }

    /**
     * @test
     */
    public function collect_array(): void
    {
        $result = collect()([1, 2, 3]);

        self::assertEquals([1, 2, 3], $result);
    }

    /**
     * @test
     */
    public function collect_iterator(): void
    {
        $it = static function () {
            yield 1;
            yield 2;
            yield 3;
        };

        $result = collect()($it());

        self::assertEquals([1, 2, 3], $result);
    }

    /**
     * @test
     */
    public function reduce(): void
    {
        $result = reduce(0, fn(int $collect, int $x) => $x + $collect)([1, 2, 3, 4, 5]);

        self::assertEquals(15, $result);
    }
}
