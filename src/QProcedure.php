<?php

namespace ObjectSql;

class QProcedure extends QComponent
{
    protected $procedure;
    protected $parameters;

    public function __construct(string $procedure, array $parameters = [])
    {
        $this->procedure = $procedure;
        $this->parameters = $parameters;
    }

    public function __toString(): string
    {
        return "$this->procedure(" . $this->getParameterString() . ")";
    }

    public function getBindings(): array
    {
        return self::bindingsFromMixedArray($this->parameters);
    }

    private function getParameterString(): string
    {
        return implode(
            ',',
            array_map(
                function ($parameter) {
                    // This matches the structure of bindingsFromMixedArray
                    return $parameter instanceof QComponent ? $parameter : '?';
                },
                $this->parameters
            )
        );
    }
}
