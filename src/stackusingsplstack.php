<?php

namespace Algos;

use SplStack;

class StackUsingSplStack extends SplStack
{
    private $minValue;
    private $top;

    /**
     * Get the current min value in the stack
     */
    public function getMin(): void
    {
        if (empty($this->top)) {
            echo 'stack is empty' . '</br>';
            return;
        }
        echo $this->top->min . '</br>';
    }

    /**
     * @param $value
     */
    public function pushMin($value): void
    {
        if ($this->minValue === null || $this->minValue > $value) {
            $this->minValue = $value;
        }

        if ($this->top === null) {
            $this->top = new StackNode($value, $this->minValue);
        } else {
            $temp = new StackNode($value, $this->minValue);
            $temp->next = $this->top;
            $this->top = $temp;
        }
    }

    /**
     * pop min from the stack
     */
    public function popMin(): void
    {
        if ($this->top === null) {
            echo 'stack is empty' . '</br>';
            return;
        }
        echo $this->top->value . '</br>';

        $this->top = $this->top->next;
    }

    /**
     * @param int $value
     */
    public function smallestItemsOnTop(int $value): void
    {
        $stackNew = new SplStack();
        if ($this->isEmpty()) {
            $this->push($value);
        } else {
            while (!$this->isEmpty() && $this->top() < $value) {
                $stackNew->push($this->pop());
            }

            $this->push($value);


            while (!$stackNew->isEmpty()) {
                echo 'top' . $stackNew->top() . '</br>';
                $this->push($stackNew->pop());
            }
        }
    }

    /**
     * Print out the elements from the stack
     */
    public function printSmallestItemsOnTop(): void
    {
        while (!$this->isEmpty()) {
            echo $this->pop() . '</br>';
        }
    }
}



Class StackNode
{
    public $value;
    public $min;
    public $next;

    public function __construct(int $value, int $min)
    {
        $this->value = $value;
        $this->min = $min;
        $this->next = null;
    }
}
