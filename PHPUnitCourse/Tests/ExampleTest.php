<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends \PHPUnit\Framework\TestCase
{
    public function testAddingTwoPlusTwoResultFout()
    {
        $this->assertEquals(4, 2 + 2);
    }
}
