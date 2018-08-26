<?php
/**
 * Created by PhpStorm.
 * User: munna
 * Date: 8/25/2018
 * Time: 9:59 PM
 */

namespace Algos;

use OutOfBoundsException;
use SplStack;

class QueueUsingStacks
{
    /**
     * @var SplStack
     */
    private $stackNewest;

    /**
     * @var SplStack `
     */
    private $stackOldest;

    public function __construct()
    {
        $this->stackNewest = new SplStack();
        $this->stackOldest = new SplStack();
    }

    /**
     * @param int|null value
     * @param string|null $action
     *
     * Implement Queue using two stacks
     */
    public function queueUsingStacks(?int $value = null, string $action = null): void
    {
        $returnValue = null;
        switch ($action) {
            case 'enqueue':
                $this->enqueue($value);
                break;
            case 'dequeue':
                $returnValue = $this->dequeue();
                break;
            case 'peek':
                $returnValue = $this->peek();
                break;
            default: break;
        }

        if ($returnValue !== null) {
            echo '</br>' . $returnValue . '</br>';
        }
    }

    /**
     * @param int $value
     *
     * Add an element to the queue
     */
    private function enqueue(int $value): void
    {
        if (!empty($value)) {
            $this->stackNewest->push($value);
        }
    }

    /**
     * @return int|null
     * @throws  OutOfBoundsException
     *
     * Remove an element from the queue (the oldest element)
     */
    private function dequeue(): int
    {
        try {
            $this->shiftStacks();
            if ($this->stackOldest->isEmpty()) {
                throw new OutOfBoundsException('Stack is empty');
            }
        } catch (OutOfBoundsException $e) {
            echo $e->getMessage(); die();
        }

        return $this->stackOldest->pop();
    }

    /**
     * @return int
     *
     * Return the top element in the queue(oldest stack)
     */
    private function peek(): int
    {
        try {
            $this->shiftStacks();
            if ($this->stackOldest->isEmpty()) {
                throw new OutOfBoundsException('Stack is empty');
            }
        } catch (OutOfBoundsException $e) {
            echo $e->getMessage(); die();
        }

        return $this->stackOldest->top();
    }

    /**
     * Transfer the elements from newest stack to oldest stack
     * so the oldest elements will be on top of the stack
     */
    private function shiftStacks(): void
    {
        if ($this->stackOldest->isEmpty()) {
            while (!$this->stackNewest->isEmpty()) {
                $this->stackOldest->push($this->stackNewest->pop());
            }
        }
    }
}