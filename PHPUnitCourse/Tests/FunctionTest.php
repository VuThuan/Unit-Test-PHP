<?php

use \PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddReturnTheCorrectSum()
    {
        require "function.php";

        $this->assertEquals(5, add(2, 3));
        $this->assertEquals(5, add(1, 4));
    }
}
