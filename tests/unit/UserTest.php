<?php

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        User::deleteAll();
        \Yii::$app->db->createCommand()->insert(User::tableName(), [
            'username' => 'user',
            'email' => 'user@email.com',
        ]);
    }

    // tests
    public function testValidateEmptyValues(): void
    {
        $user = new User();

        $this->assertFalse($user->validate(), 'validate empty username and email');
        $this->assertArrayHasKey('username', $user->getErrors(), 'check empty username error');
        $this->assertArrayHasKey('email', $user->getErrors(), 'check empty email error');
        $user->save();
    }

    public function testSaveToDatabase(): void
    {
        $user = new User([
            'username' => 'user1',
            'email' => 'user@email.com',
        ]);

        $this->assertTrue($user->save(), 'model is saved');
    }
}