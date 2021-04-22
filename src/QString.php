<?php

namespace ObjectSql;

class QString extends QComponent
{
    protected $select;
    protected $from;
    protected $joins;
    protected $where;
    protected $group;
    protected $order;

    public function __construct(QComponent ...$args)
    {
        foreach ($args as $arg) {
            $this->addComponent($arg);
        }
    }

    public function addComponent(QComponent $component)
    {
        switch (get_class($component)) {
            case QSelect::class:
                $this->select = $component;
                break;
            case QFrom::class:
                $this->from = $component;
                break;
            case QJoinsCollection::class:
                $this->joins = $component;
                break;
            case QWhere::class:
                $this->where = $component;
                break;
            case QGroup::class:
                $this->group = $component;
                break;
            case QOrder::class:
                $this->order = $component;
                break;
            default:
                throw new \InvalidArgumentException('Unexpected query component: ' . get_class($component));
        }
    }

    public function __toString(): string
    {
        if (!$this->select || !$this->from) {
            throw new \Exception(" missing SELECT or FROM clause");
        }

        $query = $this->select . PHP_EOL . $this->from . PHP_EOL;

        if ($this->joins) {
            $query .= $this->joins . PHP_EOL;
        }

        if ($this->where) {
            $query .= $this->where . PHP_EOL;
        }

        if ($this->group) {
            $query .= $this->group . PHP_EOL;
        }

        if ($this->order) {
            $query .= $this->order . PHP_EOL;
        }

        return $query;
    }

    public function getBindings(): array
    {
        $bindings = array_merge(
            $this->select->getBindings(),
            $this->from->getBindings()
        );

        if ($this->joins) {
            array_push($bindings, ...$this->joins->getBindings());
        }

        if ($this->where) {
            array_push($bindings, ...$this->where->getBindings());
        }

        if ($this->group) {
            array_push($bindings, ...$this->group->getBindings());
        }

        if ($this->order) {
            array_push($bindings, ...$this->order->getBindings());
        }

        return $bindings;
    }
}
