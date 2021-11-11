<?php

namespace ObjectSql;

class QArray extends QComponent
{
    protected $array;

    public function __construct(array $array, ?string $type = null)
    {
        $this->array = $array;
        $this->type = $type;
    }

    public function __toString(): string
    {
        return 'ARRAY[' . implode(',', self::bindingsStringFromMixedArray($this->array)) . ']'
            . ($this->type ? '::' . $this->type : '');
    }

    public function getBindings(): array
    {
        return self::bindingsFromMixedArray($this->array);
    }
}
