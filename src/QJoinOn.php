<?php

namespace ObjectSql;

class QJoinOn extends QJoin
{
    protected $on;

    public function __construct(string $table, string $on, string $type = 'INNER')
    {
        $this->on = $on;

        parent::__construct($table, $type);
    }

    public function __toString(): string
    {
        return sprintf(
            "%s JOIN %s ON (%s)",
            $this->type,
            $this->table,
            $this->on
        );
    }
}
