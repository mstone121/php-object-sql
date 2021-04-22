<?php

namespace ObjectSql;

class QGroup extends QComponent
{
    protected $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function __toString(): string
    {
        return "GROUP BY " . self::bindingsString($this->columns);
    }

    public function getBindings(): array
    {
        return $this->columns;
    }
}
