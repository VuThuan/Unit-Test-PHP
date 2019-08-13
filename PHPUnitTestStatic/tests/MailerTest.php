<?php

use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class MailerTest extends TestCase
{
    public function testSendMessageToEmailReturnedTrue()
    {
        $this->assertTrue(Mailer::send('vuthuan3090@gmail.com', 'Hello Thuan'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {
        $this->expectException(InvalidArgumentException::class);

        Mailer::send('', '');
    }
}
