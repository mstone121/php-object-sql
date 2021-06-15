<?php

namespace ObjectSql;

class QProcedure extends QString
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
        return "SELECT $this->procedure(" . self::bindingsString($this->parameters) . ")";
    }

    public final function addComponent(QComponent $component)
    {
        throw new \LogicException("Cannot add components to QProcedures");
    }

    public function getBindings(): array
    {
        return $this->parameters;
    }
}
