<?php

namespace ObjectSql;

class QOrder extends QComponent
{
    protected $columns;
    protected $direction;

    public function __construct(array $columns, string $direction = 'ASC')
    {
        $this->columns = $columns;
        $this->direction = $direction;
    }

    public function __toString(): string
    {
        return sprintf(
            "ORDER BY %s %s",
            self::bindingsString($this->columns),
            $this->direction
        );
    }

    public function getBindings(): array
    {
        return $this->columns;
    }
}
