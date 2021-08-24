<?php

namespace ObjectSql;

class QArray extends QComponent
{
    protected $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function __toString(): string
    {
        return 'ARRAY[' . self::bindingsString($this->getBindings()) . ']';
    }

    public function getBindings(): array
    {
        return self::bindingsFromMixedArray($this->array);
    }
}
