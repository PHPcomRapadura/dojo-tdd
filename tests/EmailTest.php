<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Email;

class EmailTest extends TestCase {

    public function testEmailInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);

        $email = new Email('teste');
    }

    public function testEmailValidoComoString()
    {
        $email = new Email('email@example.com');

        $this->assertEquals('email@example.com', $email);
    }
}