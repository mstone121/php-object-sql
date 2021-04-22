<?php

namespace ObjectSql;

class QCondition extends QComponent
{
    protected $condition;
    protected $bindings;

    public function __construct(string $condition, array $bindings)
    {
        $this->condition = $condition;
        $this->bindings = $bindings;
    }

    public function getBindings(): array
    {
        return $this->bindings;
    }

    public function __toString(): string
    {
        return "$this->condition";
    }
}
