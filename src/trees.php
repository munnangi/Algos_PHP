<?php
/**
 * Created by PhpStorm.
 * User: munna
 * Date: 8/26/2018
 * Time: 3:18 PM
 */

namespace Algos;

class Trees
{
    /**
     * @var TreeNode $treeNode
     */
    private $treeNode;

    /**
     * Tree constructor.
     *
     * @param TreeNode|null $treeNode
     * @param int|null $value
     */
    public function __construct(?int $value = null, ?TreeNode $treeNode = null)
    {
        $this->treeNode = $treeNode ?: new TreeNode($value);
    }

    /**
     * @param TreeNode $node
     */
    public function setTreeNode(TreeNode $node): void
    {
        $this->treeNode = $node;
    }

    /**
     * @param string|null $type
     *
     * Methods accepts the type of tree traversal (inOrder/preOrder/postOrder)
     */
    public function traverseTree(string $type = null): void
    {
        switch ($type)
        {
            case 'inOrder':
                echo 'InOrder Tree Traversal' . '</br>';
                $this->inOrderTraversal($this->treeNode);
                break;
            case 'preOrder':
                echo '</br>' . 'PreOrder Tree Traversal' . '</br>';
                $this->preOrderTraversal($this->treeNode);
                break;
            case 'postOrder':
                echo '</br>' . 'PostOrder Tree Traversal' . '</br>';
                $this->postOrderTraversal($this->treeNode);
                break;
            default:
                break;
        }
    }

    /**
     * @param $node
     *
     * Prints out inOrder traversal of tree
     */
    private function inOrderTraversal($node): void
    {
        if ($node === null) {
            return;
        }

        $this->inOrderTraversal($node->leftChild);
        echo $node->value . '</br>';
        $this->inOrderTraversal($node->rightChild);
    }

    /**
     * @param $node
     *
     * Prints out preOrder traversal of tree
     */
    private function preOrderTraversal($node): void
    {
        if ($node === null) {
            return;
        }

        echo $node->value . '</br>';
        $this->preOrderTraversal($node->leftChild);
        $this->preOrderTraversal($node->rightChild);
    }

    /**
     * @param $node
     *
     * Prints out postOrder traversal of tree
     */
    private function postOrderTraversal($node): void
    {
        if ($node === null) {
            return;
        }

        $this->postOrderTraversal($node->leftChild);
        $this->postOrderTraversal($node->rightChild);
        echo $node->value . '</br>';
    }

    /**
     * @param array $sortedNumbers
     * @param int $start
     * @param int $end
     * @return TreeNode|null
     *
     * Create a binary search tree from the sorted array of integers
     */
    public function BstFromArray(array $sortedNumbers, int $start, int $end): ?TreeNode
    {
        if ($start > $end) {
            return null;
        }

        $mid = ($start + $end)/2;

        $rootNode = new TreeNode($sortedNumbers[$mid]);

        $rootNode->leftChild = $this->BstFromArray($sortedNumbers, $start, $mid-1);
        $rootNode->rightChild = $this->BstFromArray($sortedNumbers, $mid+1, $end);

        return $rootNode;
    }

    /**
     * @param $node
     * @return int|mixed
     */
    public function checkBTisBalanced($node): int
    {
        if ($node === null) {
            return -1;
        }

        $leftSubtree = $this->checkBTisBalanced($node->leftChild);
        $rightSubtree = $this->checkBTisBalanced($node->rightChild);

        if (abs($leftSubtree-$rightSubtree) > 1) {
            echo 'Tree is not balanced'; die();
        }

        return 1 + max($leftSubtree, $rightSubtree);
    }
}
