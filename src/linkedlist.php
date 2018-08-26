<?php

namespace Algos;

class LinkedList
{
    /** @var $firstNode */
    public $firstNode;

    /** @var  $lastNode */
    public $lastNode;

    /**
     * Add value to the single linked list
     *
     * @param mixed $value
     * @return void
     */
    public function addNode($value): void
    {
        $node = new LlNode($value);
        if (empty($this->firstNode)) {
            $this->firstNode = $node;
            $this->lastNode = $node;
            return;
        }

        $this->lastNode->next = $node;
        $this->lastNode = $this->lastNode->next;
    }

    /**
     * Delete value from the single linked list
     *
     * @param $value
     */
    public function deleteNode($value): void
    {
        $node = $this->firstNode;

        while ($node !== null) {
            if ($node->value === $value) {
                if (empty($nodePrevious)) {
                    $this->firstNode = $node->next;
                    $node->next = null;
                } else {
                    $nodePrevious->next = $node->next;
                    if ($node->next === null) {
                        $this->lastNode = $nodePrevious;
                    }

                }
                echo "deleted $value" . '</br>';
                return;
            }
            $nodePrevious = $node;
            $node = $node->next;
        }
        echo 'no value found' . '</br>';
    }

    /**
     * Print values in the single linked list
     *
     * @return void
     */
    public function printValues(): void
    {
        $nodeIterate = $this->firstNode;
        while ($nodeIterate !== null) {
            echo $nodeIterate->value;
            echo '<br/>';
            $nodeIterate = $nodeIterate->next;
        }
    }
}

class LlNode
{
    public $value;
    public $next;

    /**
     * LlNode constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }
}
