<?php

declare(strict_types=1);

namespace Crell\fp;

function amap(callable $c): callable
{
    return static function (iterable $it) use ($c) {
        $result = [];
        foreach ($it as $k => $v) {
            $result[$k] = $c($v);
        }
        return $result;
    };
}
function itmap(callable $c): callable
{
    return static function (iterable $it) use ($c) {
        foreach ($it as $k => $v) {
            yield $k =>$c($v);
        }
    };
}

