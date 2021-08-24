<?php

namespace ObjectSql;

class QWhere extends QComponent
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

    public function addConditions(QConjuction ...$conditions): void
    {
        foreach ($conditions as $condition) {
            $this->addCondition($condition);
        }
    }

    public function __toString(): string
    {
        return "WHERE 1=1" . PHP_EOL . implode(PHP_EOL, $this->conditions);
    }

    public function getBindings(): array
    {
        return self::bindingsFromArray(...$this->conditions);
    }
}
