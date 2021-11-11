<?php

namespace ObjectSql;

class QIsNull extends QCondition
{
    public function __construct(string $column)
    {
        parent::__construct("$column IS NULL", []);
    }
}
