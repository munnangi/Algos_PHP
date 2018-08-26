<?php

namespace Algos;

class DoubleLinkedList
{
    /** @var DllNode $firstNode*/
    public $firstNode;

    /** @var DllNode $lastNode*/
    public $lastNode;

    public function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
    }

    /**
     * Insert a double linked list node
     *
     * @param $value
     */
    public function insertNode($value)
    {
        $node = new DllNode($value);
        if ($this->firstNode === null) {
            $this->firstNode = $node;
            $this->lastNode = $node;
            return;
        }
        $node->previous = $this->lastNode;
        $this->lastNode->next =  $node;
        $this->lastNode = $this->lastNode->next;
    }

    /**
     * Delete a double linked list node
     *
     * @param $value
     */
    public function deleteNode($value)
    {
        $nodeA = $this->firstNode;

        while($nodeA !== null) {
            if ($nodeA->value === $value) {
                $previousNode = $nodeA->previous;
                $this->firstNode = $previousNode === null || empty((array)$previousNode) ? $nodeA->next : $this->firstNode;
                $previousNode === null ?: $previousNode->next = $nodeA->next;
                $nodeA->next === null ?: $nodeA->next->previous = $previousNode;
                $nodeA->previous = null;
                $nodeA->next = null;
                return;
            }
            $nodeA = $nodeA->next;
        }
        echo 'no value found';
    }

    /**
     * Print out the values of double linked list
     * (by default the value are printed out first to last in the order they were added,
     * if true, then they are printed out last to first with the newest added value being the last)
     *
     * @param bool $reverse
     */

    public function printValues($reverse = false)
    {
        if (!$reverse) {
            $nodeA = $this->firstNode;
            while ($nodeA !== null) {
                echo $nodeA->value . '</br>';
                $nodeA = $nodeA->next;
            }
        } else {
            $nodeA = $this->lastNode;
            while ($nodeA !== null) {
                echo $nodeA->value . '</br>';
                $nodeA = $nodeA->previous;
            }
        }
    }
}

/**
 * Class DllNode
 * @package Algos
 */
class DllNode
{
    public $value;
    public $previous;
    public $next;

    /**
     * DllNode constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
        $this->previous = null;
    }
}
