<?php

namespace ObjectSql;

class QSelect extends QComponent
{
    protected $columns;
    protected $distinct;

    public function __construct(array $columns, bool $distinct = false)
    {
        $this->columns = $columns;
        $this->distinct = $distinct;
    }

    public function __toString(): string
    {
        return sprintf(
            "SELECT %s %s",
            $this->distinct ? 'DISTINCT' : '',
            implode(', ', $this->columns)
        );
    }

    public function getBindings(): array
    {
        return [];
    }
}
