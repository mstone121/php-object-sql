<?php

namespace ObjectSql;

abstract class QConjuction extends QComponent
{
    protected $condition;

    public function __construct(QCondition $condition)
    {
        $this->condition = $condition;
    }

    abstract public function __toString(): string;

    public function getBindings(): array
    {
        return $this->condition->getBindings();
    }
}
