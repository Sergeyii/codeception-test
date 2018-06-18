<?php

namespace tests\unit;

use Codeception\Test\Unit;
use yii\validators\EmailValidator;

class EmailValidatorTest extends Unit
{
    /**
     * @dataProvider getEmailVariants
    */
    public function testEmail($email, $result)
    {
        $validator = new EmailValidator();
        $this->assertEquals($validator->validate($email), $result);
    }

    public function getEmailVariants(): array
    {
        return [
            ['mail@site.com', true],
            ['mail.dot@site.com', true],
            ['mail_site.com', false],
            ['mail@site', false],
            ['mail@123', false],
        ];
    }
}