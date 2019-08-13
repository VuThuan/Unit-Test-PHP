<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product;

        $reflector = new ReflectionClass(Product::class);

        $property = $reflector->getProperty('product_id');

        $property->setAccessible(true);

        $this->assertIsInt($property->getValue($product));
    }
}
