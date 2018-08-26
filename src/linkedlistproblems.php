<?php

namespace Algos;


Class LinkedListProblems extends LinkedList
{
    private $uniqueData = [];

    /**
     * Remove the duplicate values in a linked list using array as buffer
     */
    public function removeDuplicatesWithBuffer(): void
    {
        $node = $this->firstNode;

        /** @var LlNode $previous */
        $previous = null;

        while ($node !== null) {
            if (\in_array($node->value, $this->uniqueData, false)) {
                $previous->next = $node->next;
            } else {
                $this->uniqueData[] = $node->value;
                $previous = $node;
            }
            $node = $node->next;
        }
    }

    /**
     * Remove the duplicate elements in a linked list without buffer
     */
    public function removeDuplicatesWithoutBuffer(): void
    {
        $node = $this->firstNode;

        while ($node !== null) {

            $nodeNext = $node->next;
            $previous = $node;

            while ($nodeNext !== null) {

                if ($node->value === $nodeNext->value) {
                    $previous->next = $nodeNext->next;
                } else {
                    $previous = $nodeNext;
                }

                $nodeNext = $nodeNext->next;
            }
            $node = $node->next;
        }
    }

    /**
     * @param LlNode|null $node
     * @param int $k
     * @return int
     */
    public function kthToLastRecursion(?LlNode $node, int $k): int
    {
        if ($node === null) {
            return 0;
        }

        $index = $this->kthToLastRecursion($node->next, $k) + 1;

        if ($index === $k) {
            echo "the {$k}th to last node value is $node->value";
            die();
        }
        return $index;
    }

    public function kthToLastIterative(?LlNode $node, int $k): void
    {
        if ($node === null) {
            echo 'empty linked list';
            die();
        }
        /** @var LlNode $nodeRunner2 */
        $nodeRunner2 = $node;

        for ($i = 1; $i <= $k; $i++) {
            try {
                if ($node->next !== null) {
                    $nodeRunner2 = $nodeRunner2->next;
                } else {
                    throw new \OutOfBoundsException('linked list out of bounds');
                }
            } catch (\OutOfBoundsException $e) {
                echo $e->getMessage();
                die();
            }
        }

        while ($nodeRunner2 !== null || $nodeRunner2->next !== null) {
            /** @var LlNode $nodeRunner2 */
            $nodeRunner2 = $nodeRunner2->next;
            $node = $node->next;
        }
        echo "the {$k}th to the last node value is $node->value";
        die();
    }

    /**
     * @param LlNode|null $node
     */
    public function deleteMiddleNode(LlNode $node): void
    {
        /** @var LlNode $nodeRunner2 */
        $nodeRunner2 = $node;

        while ($nodeRunner2->next !== null && $nodeRunner2->next->next !== null) {
            $previous = $node;
            $node = $node->next;
            $nodeRunner2 = $nodeRunner2->next->next;
        }

        $previous->next = $node->next;
    }

    /**
     * @param LlNode $node
     * @param int $pivot
     */
    public function partitionAtPivot(LlNode $node, int $pivot): void
    {
        $head = $node;

        $previous = null;
        while ($node !== null) {
            if ($node->value < $pivot && $previous !== null) {
                $previous->next = $node->next;
                $node->next = $head;
                $head = $this->firstNode = $node;
                $node = $previous->next;
            } else {
                $previous = $node;
                $node = $node->next;
            }
        }
    }

    /**
     * @param LlNode $node1
     * @param LlNode $node2
     */
    public function sumOfTwoNumbers(LlNode $node1, LlNode $node2): void
    {
        $carry = 0;
        $sumNode = null;
        $head = null;
        $tail = null;
        while ($node1 !== null || $node2 !== null) {
            $node1Value = $node1->value ?? 0;
            $node2Value = $node2->value ?? 0;
            $n = new LlNode(($node1Value + $node2Value + $carry) % 10);
            $carry = ($node1Value + $node2Value + $carry) / 10;
            if ($sumNode === null) {
                $sumNode = $n;
                $head = $sumNode;
                $tail = $sumNode;
            } else {
                $tail->next = $n;
                $tail = $tail->next;
            }
            $node1 = $node1 !== null ? $node1->next : null;
            $node2 = $node2 !== null ? $node2->next : null;
        }

         while ($head !== null) {
            echo $head->value;
            $head = $head->next;
         }
         die();
    }

    /**
     * @param LlNode $node
     * @return bool
     */
    public function checkPalindrome(LlNode $node): bool
    {
        $runner1 = $node;
        $runner2 = $node;

        while ($runner2 !== null && $runner2->next !== null) {
            $runner1 = $runner1->next;
            $runner2 = $runner2->next->next;
        }

        $runner1 = $runner2 !== null ? $runner1->next : $runner1;

        $runner1 = $this->reverseLinkedList($runner1);

        while ($runner1 !== null) {
            echo $runner1->value . '</br>';
            if ($runner1->value !== $node->value) {
                return false;
            }
            $runner1 = $runner1->next;
            $node = $node->next;
        }

        return true;
    }

    /**
     * @param LlNode $node
     * @return LlNode
     */
    public function reverseLinkedList(LlNode $node): LlNode
    {
        $head = $node;
        $previous = null;

        while ($node !== null) {
            if ($previous === null) {
                $previous = $node;
            } else {
                $previous->next = $node->next;
                $node->next = $head;
                $head  =  $node;
                $node = $previous;
            }
            $node = $node->next;
        }
        return $head;
    }

    /**
     * @param LlNode $node
     * @param $head
     * @return LlNode
     */
    public function reverseLinkedListRecursive(LlNode $node, &$head): LlNode
    {
        echo $node->value . '</br>';

        if ($node->next === null) {
            $head = $node;
            return $node;
        }
        $x = $this->reverseLinkedListRecursive($node->next, $head);
        $x->next = $node;
        $node->next = null;
        return $node;
    }

    /**
     * @param LlNode $node1
     * @param LlNode $node2
     */
  public function checkIfLinkedListIntersect(LlNode $node1, LlNode $node2): void
  {
      $sizeNode1 = 0;
      $sizeNode2 = 0;
      $current1 = $node1;
      $current2 = $node2;
      echo '---------------' . ' </br>';
      while ($current1 !== null) {
        echo $current1->value . '</br>';
          $current1 = $current1->next;
          $sizeNode1++;
      }
  echo '---------------' . ' </br>' ;
      while ($current2 !== null) {
          echo $current2->value . '</br>';

          $current2 = $current2->next;
          $sizeNode2++;
      }

      if ($current2 !== $current1) {
          echo 'lists do not intersect';
      }

      if ($sizeNode2 > $sizeNode1) {
          for ($i=1; $i < ($sizeNode2 - $sizeNode1); $i++) {
              $node2 = $node2->next;
          }
      } elseif ($sizeNode1 > $sizeNode2) {
          for ($j=1; $j < ($sizeNode1 - $sizeNode2); $j++) {
              $node1 = $node1->next;
          }
      }

      if ($node1 !== $node2) {
          $node1 = $node1->next;
          $node2 = $node2->next;
      }
      echo 'intersect value' . $node1->value;
  }
}
