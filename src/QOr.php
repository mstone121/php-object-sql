<?php

namespace ObjectSql;

class QOr extends QConjuction
{
    public function __toString(): string
    {
        return "OR $this->condition";
    }
}
