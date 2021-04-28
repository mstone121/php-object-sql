<?php

namespace ObjectSql;

class QIn extends QCondition
{
    protected $column;

    public function __construct(string $column, array $values)
    {
        if (count($values) === 0) {
            trigger_error('Array of length 0 passed to QIn constructor, using FALSE instead', E_USER_WARNING);
            parent::__construct("FALSE", []);
        }

        parent::__construct("$column IN (" . self::bindingsString($values) . ")", $values);
    }
}
