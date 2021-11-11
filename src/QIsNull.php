<?php

namespace ObjectSql;

class QEqual extends QCondition
{
    public function __construct(string $column)
    {
        parent::__construct("$column IS NULL", []);
    }
}
