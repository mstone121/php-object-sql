<?php

namespace ObjectSql;

abstract class QComponent
{
    abstract public function __toString(): string;
    abstract public function getBindings(): array;

    protected static function bindingsFromArray(array $array): array
    {
        return array_reduce(
            $array,
            function ($bindings, $component) {
                return array_merge($bindings, $component->getBindings());
            },
            []
        );
    }

    public static function bindingsString(array $bindings): string
    {
        return implode(',', array_fill(0, count($bindings), '?'));
    }
}
