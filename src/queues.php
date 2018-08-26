<?php

namespace Algos;

class Queues
{
    public $queueData;

    /**
     * Queues constructor.
     */
    public function __construct()
    {
        $this->queueData = [];
    }

    /**
     * Add value to the queue
     *
     * @param $value
     */
    public function enqueue($value): void
    {
        if (empty($value)) {
            return;
        }

        $this->queueData[] = $value;
    }

    /**
     * Remove the value from the queue
     */
    public function dequeue(): void
    {
        if ($this->isEmpty()) {
            echo 'the queue is empty';
            return;
        }
       echo  array_shift($this->queueData) . '<br/>';
    }

    /**
     * Print values of the queue
     */
    public function printQueue(): void
    {
        echo '<pre/>';
        print_r($this->queueData);
    }

    /**
     * Check if the queue is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->queueData);
    }
}
