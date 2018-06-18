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

        expect('model is invalid', $user->validate())->false();
        expect('username has error', $user->getErrors())->hasKey('username');
        expect('email has error', $user->getErrors())->hasKey('email');
        $user->save();
    }

    public function testSaveToDatabase(): void
    {
        $user = new User([
            'username' => 'user1',
            'email' => 'user@email.com',
        ]);

        expect('model is saved', $user->save())->true();
    }
}