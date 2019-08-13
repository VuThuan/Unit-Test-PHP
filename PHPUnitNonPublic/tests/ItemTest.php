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
        $item = new ItemChild;

        $this->assertIsInt($item->getID());
    }

    //Error because getToken() is method private
    // public function testTokenIsAString()
    // {
    //     $item = new ItemChild;

    //     $this->assertIsString($item->getToken());
    // }

    //Voi function nay ta co the test method co thuoc tinh private
    public function testTokenIsAString()
    {
        $item = new Item;

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new Item;

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}
