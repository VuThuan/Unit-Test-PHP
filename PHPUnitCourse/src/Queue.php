<?php

/**
 * Queue
 * 
 * A first-in, first-out data structured
 */

class Queue
{
    /**
     * Maximum number of items in the Queue
     * @var integer
     */
    public const MAX_ITEMS = 5;

    /**
     * @var array
     */
    protected $items = [];


    /**
     * Add an item to the end of the queue
     * 
     * @param mixed $item The item
     * 
     * @throws QueueException if the number of item on the queue exceeds the MAX_ITEMS value
     */
    public function push($item)
    {
        if ($this->getCount() == static::MAX_ITEMS) {
            throw new QueueException("Queue is full");
        }
        $this->items[] = $item;
    }


    /**
     * @param mixed $item The item
     */
    public function pop()
    {
        return array_shift($this->items);
    }

    /**
     * @return integer
     */
    public function getCount()
    {
        return count($this->items);
    }

    public function clear()
    {
        $this->items = [];
    }
}
