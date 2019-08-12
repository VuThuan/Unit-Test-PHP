<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\Stub\Exception;

class UserTest extends TestCase
{
    public function testReturnFullName()
    {
        $user = new User();
        $user->firstName = "Thuan";
        $user->surname = "Vu";

        $this->assertEquals("Vu Thuan", $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function user_has_first_name()
    //testUserHasFirstName. Phải sử dụng chữ test đứng đầu mỗi function. Nếu không nó sẽ không thực hiện test function đó
    {
        $user = new User;

        $user->firstName = "Thuan";
        $this->assertEquals("Thuan", $user->firstName);
    }

    public function testNotifycationIsSent()
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo("vuthuan3090@gmail.com"), $this->equalTo("Hello"))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = 'vuthuan3090@gmail.com';

        $this->assertTrue($user->notify('Hello'));
    }

    // public function testCannotNotifyUserWithNoEmail()
    // {
    //     $user = new User;

    //     // $mock_mailer->method('sendMessage')
    //     //     ->will($this->throwException(new Exception()));

    //     $mock_mailer = $this->getMockBuilder(Mailer::class)
    //         ->setMethods(null)
    //         ->getMock();

    //     $user->setMailer($mock_mailer);

    //     $this->expectException(Exception::class);

    //     $user->notify("heelo");
    // }
}
