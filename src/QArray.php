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
        return 'ARRAY[' . implode(',', self::bindingsStringFromMixedArray($this->array)) . ']';
    }

    public function getBindings(): array
    {
        return self::bindingsFromMixedArray($this->array);
    }
}
