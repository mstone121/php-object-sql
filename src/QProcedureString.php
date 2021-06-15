<?php

namespace ObjectSql;

class QProcedureString extends QString
{
    protected $procedure;

    public function __construct(QProcedure $procedure)
    {
        $this->procedure = $procedure;
    }

    public function __toString(): string
    {
        return "SELECT $this->procedure";
    }

    public function getBindings(): array
    {
        return $this->procedure->getBindings();
    }

    public final function addComponent(QComponent $component)
    {
        throw new \LogicException("Components cannot be added to QProcedureStrings.");
    }
}
