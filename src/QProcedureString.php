<?php

namespace ObjectSql;

class QProcedureString extends QString
{
    public static $resultName = 'result';

    protected $procedure;

    public function __construct(QProcedure $procedure)
    {
        $this->procedure = $procedure;
    }

    public function __toString(): string
    {
        return "SELECT $this->procedure as " . self::$resultName;
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
