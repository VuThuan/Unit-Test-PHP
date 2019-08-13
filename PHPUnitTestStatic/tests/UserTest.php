<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    // public function testNotifyReturnsTrue()
    // {
    //     $user = new User('vuthuan3090@gmail.com');

    //     // $mailer = new Mailer;
    //     $mailer = $this->createMock(Mailer::class);

    //     $mailer->expects($this->once())
    //         ->method('send')
    //         ->willReturn(true);

    //     $user->setMailer($mailer);

    //     $this->assertTrue($user->notify('Helloooooo'));
    // } OPTION 1

    // public function testNotifyReturnsTrue()
    // {
    //     $user = new User('vuthuan3090@gmail.com');

    //     // $user->setMailerCallable([Mailer::class, 'send']); cach 1

    //     $user->setMailerCallable(function () {
    //         echo 'Mocked';
    //         return true;
    //     });

    //     $this->assertTrue($user->notify('Hello Thuan dz'));
    // } OPTION 2

    //OPtion 3 use Mock object
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testNotifyReturnsTrue()
    {
        $user = new User('vuthuan3090@gmail.com');

        $mock = Mockery::mock('alias:Mailer');

        $mock->shouldReceive('send')
            ->once()
            ->with($user->email, 'Hello')
            ->andReturn(true);

        $this->assertTrue($user->notify('Hello'));
    }
}
