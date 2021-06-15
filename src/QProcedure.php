<?php

namespace ObjectSql;

class QProcedure extends QComponent
{
    protected $procedure;
    protected $parameters;

    public function __construct(string $procedure, array $parameters = [])
    {
        $this->procedure = $procedure;
        $this->parameters = array_map(function ($parameter) {
            return is_bool($parameter)
                ? ($parameter ? 'true' : 'false')
                : $parameter;
        }, $parameters);
    }

    public function __toString(): string
    {
        return "$this->procedure(" . self::bindingsString($this->parameters) . ")";
    }

    public function getBindings(): array
    {
        return $this->parameters;
    }
}
