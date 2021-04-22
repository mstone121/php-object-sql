<?php

namespace ObjectSql;

class QJoinUsing extends QJoin
{
    protected $using;

    public function __construct(string $table, string $using, string $type = 'INNER')
    {
        $this->using = $using;

        parent::__construct($table, $type);
    }

    public function __toString(): string
    {
        return sprintf(
            "%s JOIN %s USING (%s)",
            $this->type,
            $this->table,
            $this->using
        );
    }
}
