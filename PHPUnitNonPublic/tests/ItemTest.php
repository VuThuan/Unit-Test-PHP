<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item;

        $this->assertNotEmpty($item->getDesription());
    }

    public function testIdIsAnInteget()
    {
        $item = new Item;

        $this->assertIsInt($item->getID());
    }
}
