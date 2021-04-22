<?php

namespace ObjectSql;

class QIn extends QCondition
{
    protected $column;

    public function __construct(string $column, array $values)
    {
        parent::__construct("$column IN (" . self::bindingsString($values) . ")", $values);
    }
}
