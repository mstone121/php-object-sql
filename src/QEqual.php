<?php

namespace ObjectSql;

class QEqual extends QCondition
{
    public function __construct(string $column, $value)
    {
        parent::__construct("$column = ?", [$value]);
    }
}
