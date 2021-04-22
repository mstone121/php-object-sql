<?php

namespace ObjectSql;

abstract class QJoin extends QComponent
{
    protected $table;
    protected $type;

    public function __construct(string $table, string $type = 'INNER')
    {
        $this->table = $table;
        $this->type = $type;
    }

    abstract public function __toString(): string;

    public function getBindings(): array
    {
        return [];
    }
}
