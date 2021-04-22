<?php

namespace ObjectSql;

class QFrom extends QComponent
{
    protected $table;

    public function __construct(string $table)
    {
        $this->table = $table;
    }

    public function __toString(): string
    {
        return "FROM $this->table";
    }

    public function getBindings(): array
    {
        return [];
    }
}
