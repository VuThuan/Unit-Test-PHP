<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    /**
     * Sử dụng fixtures thay thế cho depends
     */

    protected static $queue;

    protected function setUp(): void
    {
        static::$queue->clear();
    }

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue; //thay the $this->queue
    }

    /**
     * method tearDown sử dụng khi nếu bạn muốn creating 1 resourse bên ngoài như viết 1 file khi mở 1 network soket như VD.
     * Phần lớn thời gian, tuy nhiên bạn sẽ không cần sử dụng method này 
     * */
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }


    public function testAnItemsIsAddedToTheQueue() //Queue $queue
    //sử dụng @depends để kế thừa từ cái function trước, kiểu những gì ở function trước có thì function sau cũng có thể sử dụng được
    {
        static::$queue->push('green');
        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('green');
        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());

        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push("first");
        static::$queue->push("second");

        $this->assertEquals("first", static::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemsToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);

        $this->expectExceptionMessage("Queue is full");

        static::$queue->push("wafer thin mint");
    }
}
