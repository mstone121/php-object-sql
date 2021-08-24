<?php

namespace ObjectSql;

abstract class QConditionGroup extends QCondition
{
    protected $conditions;

    public function __construct(QConjuction ...$conditions)
    {
        $this->conditions = $conditions;
    }

    public function addCondition(?QConjuction $condition): void
    {
        if ($condition) {
            $this->conditions[] = $condition;
        }
    }

    public function __toString(): string
    {
        return "(1=1 " . implode(' ', $this->conditions) . ")";
    }

    public function getBindings(): array
    {
        return self::bindingsFromArray(...$this->conditions);
    }
}
