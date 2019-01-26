<?php namespace frontend\tests\models;

use common\models\User;

class ValidatePasswordTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testPassword()
    {
        //user com id 1
        $user = User::find()->where(['id'=> 1])->one();
        $this->assertTrue($user->validatePassword('123123'));

        $this->assertFalse($user->validatePassword('passwordErrada'));
    }
}