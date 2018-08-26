<?php

namespace Algos;

use RuntimeException;
use SplStack;

class Stacks
{
    /** @var array $stackData */
    protected $stackData = [];

    /** @var  int $limit*/
    protected $limit;

    /**
     * @var SplStack
     */
    protected $stackNewest;

    /**
     * @var SplStack
     */
    protected $stackOldest;

    /**
     * Stack constructor.
     * @param int $limit
     */
    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @param string|int|null $value
     * @throws \RuntimeException
     */
    public function push($value = null): void
    {
        try {
            if (!(\count($this->stackData) < $this->limit)) {
                throw new RuntimeException('Stack is full');
            }
        } catch (RuntimeException $e) {
            echo $e->getMessage();
        }

        if (!empty($value)) {
         array_unshift($this->stackData, $value);
        } else {
            echo 'value cannot be empty'; echo '</br>';
        }

    }

    /**
     * @throws \RuntimeException
     */
    public function pop()
    {
        try {
            if ($this->isEmpty()) {
                throw new RuntimeException('Stack is empty');
            }
        } catch (RuntimeException $e) {
            echo $e->getMessage(); echo '</br>';
        }

        return array_shift($this->stackData);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
       return empty($this->stackData) ? true : false;
    }

    /**
     * @return int|string
     */
    public function isTop()
    {
        return current($this->stackData);
    }
}

