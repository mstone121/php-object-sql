<?php

namespace ObjectSql;

class QProcedure extends QComponent
{
    protected $procedure;
    protected $parameters;
    protected $types;

    public function __construct(string $procedure, array $parameters = [])
    {
        $this->procedure = $procedure;

        $this->parameters = [];
        $this->types = [];

        foreach ($parameters as $parameter) {
            if (is_array($parameter)) {
                if (count($parameter) !== 2) {
                    throw new \InvalidArgumentException('Invalid array parameter type, expecting array of length 2: [value, type]');
                }

                $this->parameters[] = $parameter[0];
                $this->types[] = $parameter[1];
            } else {
                $this->parameters[] = $parameter;
                $this->types[] = null;
            }
        }
    }

    public function __toString(): string
    {
        return "$this->procedure(" . $this->getBindingsString() . ")";
    }

    public function getBindings(): array
    {
        return self::bindingsFromMixedArray($this->parameters);
    }

    protected function getBindingsString(): string
    {
        $index = 0;
        $bindings = [];
        while (isset($this->parameters[$index])) {
            $type = $this->types[$index];

            $bindings[] = $type ? '?::' . $type : '?';
            $index++;
        }

        return implode(',', $bindings);
    }
}
