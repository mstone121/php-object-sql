<?php

namespace ObjectSql;

class QConditionEqual extends QCondition
{
    public function __construct(string $column, $value)
    {
        parent::__construct("$column = ?", [$value]);
    }
}
