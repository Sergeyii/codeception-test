<?php

namespace tests\unit;

use app\models\User;
use PHPUnit\DbUnit\TestCase;

class UserTest extends TestCase
{
    protected function getConnection()
    {
        $pdo = new \PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWORD']);
        return $this->createDefaultDBConnection($pdo, $GLOBALS['DB_NAME']);
    }

    protected function getDataSet()
    {
        return $this->createXMLDataSet(dirname(__DIR__).'/_data/users.xml');
    }

    protected function setUp(): void
    {
        User::deleteAll();
        \Yii::$app->db->createCommand()->insert(User::tableName(), [
            'username' => 'user',
            'email' => 'user@email.com',
        ]);
    }

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