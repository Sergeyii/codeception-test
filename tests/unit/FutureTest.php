<?php

namespace tests\unit;

use Codeception\Test\Unit;

class FutureTest extends Unit
{
    /**
     * @group future
    */
    public function testSomeFeature()
    {
        $this->markTestIncomplete();
    }
    /**
     * @group future
    */
    public function testOtherFeature()
    {
        $this->markTestIncomplete();
    }

    /**
     * @expectedException \Exception
    */
    public function testWithException()
    {
        throw new \Exception('Just testing...');
    }

    public function testSavedToMSSQL()
    {
        if(!extension_loaded('mssql')){
            $this->markTestSkipped('Not MS SQL database!');
        }
    }
}