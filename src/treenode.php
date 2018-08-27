<?php

namespace  Algos;

class TreeNode
{
    /**
     * @var TreeNode $leftChild
     */
    public $leftChild;

    /**
     * @var TreeNode $rightChild
     */
    public $rightChild;

    /**
     * @var int|null
     */
    public $value;

    /**
     * TreeNode constructor.
     * @param int $value
     */
    public function __construct(?int $value = null)
    {
        $this->value = $value;
        $this->leftChild = null;
        $this->rightChild = null;
    }
}