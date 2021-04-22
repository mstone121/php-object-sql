<?php

namespace ObjectSql;

class QAnd extends QConjuction
{
    public function __toString(): string
    {
        return "AND $this->condition";
    }
}
