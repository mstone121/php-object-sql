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
        return "$this->procedure(" . self::bindingsString($this->getBindings()) . ")";
    }

    public function getBindings(): array
    {
        return array_reduce($this->parameters, function ($parameters, $parameter) {
            if ($parameter instanceof QComponent) {
                return array_merge($parameters, $parameter->getBindings());
            }

            if (is_bool($parameter)) {
                return array_merge($parameter, [$parameter ? 'true' : 'false']);
            }

            return array_merge($parameters, $parameter);
        }, []);
    }
}
