<?php

require '../vendor/autoload.php';

use Algos\LinkedList;
use Algos\Queues;
use Algos\QueueUsingSplQueue;
use Algos\QueueUsingStacks;
use Algos\StackUsingSplStack;
use Algos\Stacks;
use Algos\DoubleLinkedList;
use Algos\LinkedListProblems;

/*
echo 'Linked List ----' . '<br/>';

$linkedList = new LinkedList();
$linkedList->addNode(5);
$linkedList->addNode(6);
$linkedList->addNode(7);
$linkedList->printValues();
$linkedList->deleteNode(5);
$linkedList->deleteNode(6);
$linkedList->printValues();


echo '<br/>' . 'Queues----' . '<br/>';

$queue = new Queues();
$queue->enqueue(4);
$queue->enqueue(5);
$queue->enqueue(7);
$queue->printQueue();
$queue->dequeue();
$queue->dequeue();
$queue->printQueue();

echo '<br/>' . 'Queues using splQueue-----' . '<br/>';

$queueSplQueue = new QueueUsingSplQueue();
$queueSplQueue->enqueue('first item');
$queueSplQueue->enqueue('second item');
$queueSplQueue->enqueue('third item');
echo $queueSplQueue->dequeue(); echo '</br>';
echo $queueSplQueue->dequeue(); echo '</br>';
echo $queueSplQueue->dequeue(); echo '</br>';

echo '<br/>' . 'Stacks----' . '<br/>';

$stack = new Stacks(2);
$stack->push('testing one two three');
$stack->push();
$stack->push('adfasdff');
echo $stack->pop(); echo '</br>';
echo $stack->pop(); echo '</br>';
echo $stack->pop();

echo '<br/>' . 'Stacks using splStack----' . '<br/>';

$stackSplStack = new StackUsingSplStack();
$stackSplStack->push('143');
$stackSplStack->push('is this another stack');
echo $stackSplStack->top(); echo '</br>';
echo $stackSplStack->pop(); echo '</br>';
echo $stackSplStack->pop(); echo '</br>';
*/

/*echo '<br/>' . 'Double linked lists----' . '<br/>';

$doubleLl = new DoubleLinkedList();
$doubleLl->insertNode(5);
$doubleLl->insertNode(6);
$doubleLl->insertNode(10);
$doubleLl->printValues(true);
$doubleLl->deleteNode(10);
$doubleLl->printValues(true);*/

/*echo '<br/>' . 'remove duplicate from linked lists----' . '<br/>';


$duplicateLinkedList = new LinkedListProblems();
$duplicateLinkedList->addNode(7);
$duplicateLinkedList->addNode(1);

$n = new \Algos\LlNode(1);
$n1 = new \Algos\LlNode(3);
$n->next = $n1;
$duplicateLinkedList->firstNode->next->next = $n;

$duplicateLinkedList2 = new LinkedListProblems();
$duplicateLinkedList2->addNode(5);
$duplicateLinkedList2->addNode(9);
$duplicateLinkedList2->firstNode->next->next = $n;
$duplicateLinkedList2->printValues();
$duplicateLinkedList->checkIfLinkedListIntersect($duplicateLinkedList->firstNode, $duplicateLinkedList2->firstNode); */
//echo json_encode($duplicateLinkedList->checkPalindrome($duplicateLinkedList->firstNode));
/*echo '<br/>' . 'push, top, min, pop in O(1)' . '<br/>';

$stackMin = new StackUsingSplStack();
$stackMin->pushMin(5);
$stackMin->pushMin(7);
$stackMin->pushMin(2);
$stackMin->getMin();
$stackMin->popMin();
$stackMin->getMin();
$stackMin->popMin();
$stackMin->popMin();
$stackMin->popMin();
$stackMin->getMin();*/

/*echo 'smallest items on top----' . '</br>';

$smallestItemsOnTop = new StackUsingSplStack();
$smallestItemsOnTop->smallestItemsOnTop(9);
$smallestItemsOnTop->smallestItemsOnTop(5);
$smallestItemsOnTop->smallestItemsOnTop(6);
$smallestItemsOnTop->smallestItemsOnTop(4);
$smallestItemsOnTop->smallestItemsOnTop(7);
$smallestItemsOnTop->printSmallestItemsOnTop();*/

echo 'implement queue using 2 stacks' . '</br>';

$queueUsingStack = new QueueUsingStacks();
$queueUsingStack->queueUsingStacks(4, 'enqueue');
$queueUsingStack->queueUsingStacks(6, 'enqueue');
$queueUsingStack->queueUsingStacks(7, 'enqueue');
$queueUsingStack->queueUsingStacks(8, 'enqueue');
$queueUsingStack->queueUsingStacks(null, 'dequeue');
$queueUsingStack->queueUsingStacks(null, 'peek');
$queueUsingStack->queueUsingStacks(10, 'enqueue');
$queueUsingStack->queueUsingStacks(9, 'enqueue');
$queueUsingStack->queueUsingStacks(null, 'dequeue');
$queueUsingStack->queueUsingStacks(null, 'dequeue');
$queueUsingStack->queueUsingStacks(null, 'dequeue');
$queueUsingStack->queueUsingStacks(null, 'dequeue');
$queueUsingStack->queueUsingStacks(null, 'dequeue');
$queueUsingStack->queueUsingStacks(null, 'dequeue');


