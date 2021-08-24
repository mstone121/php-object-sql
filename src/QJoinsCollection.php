<?php

namespace ObjectSql;

class QJoinsCollection extends QComponent
{
    protected $joins;

    public function __construct(QJoin ...$joins)
    {
        $this->joins = $joins;
    }

    public function addJoin(?QJoin $join): void
    {
        if ($join) {
            $this->joins[] = $join;
        }
    }

    public function __toString(): string
    {
        return implode(PHP_EOL, $this->joins);
    }

    public function getBindings(): array
    {
        return self::bindingsFromArray(...$this->joins);
    }
}
