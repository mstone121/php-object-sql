<?php

namespace ObjectSql;

abstract class QComponent
{
    abstract public function __toString(): string;
    abstract public function getBindings(): array;

    protected static function bindingsFromArray(QComponent ...$array): array
    {
        return array_reduce(
            $array,
            function ($bindings, $component) {
                return array_merge($bindings, $component->getBindings());
            },
            []
        );
    }

    protected static function bindingsFromMixedArray(array $array): array
    {
        return array_reduce(
            $array,
            function ($items, $item) {
                if ($item instanceof QComponent) {
                    return array_merge($items, $item->getBindings());
                }

                if (is_bool($item)) {
                    return array_merge($items, [$item ? 'true' : 'false']);
                }

                return array_merge($items, [$item]);
            },
            []
        );
    }

    protected static function bindingsStringFromMixedArray(array $array): array
    {
        return array_map(
            function (mixed $item) {
                return $item instanceof QComponent ? $item : '?';
            },
            $array
        );
    }

    public static function bindingsString(array $bindings): string
    {
        return implode(',', array_fill(0, count($bindings), '?'));
    }
}
