<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class LoginCest
{
     /**
      * Load fixtures before db transaction begin
      * Called in _before()
      * @see \Codeception\Module\Yii2::_before()
      * @see \Codeception\Module\Yii2::loadFixtures()
      * @return array
      */

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }

    protected function formParams($login, $password)
    {
        return [
            'LoginForm[username]' => $login,
            'LoginForm[password]' => $password,
        ];
    }

    public function checkEmpty(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('', ''));
        $I->seeValidationError('Este campo não pode ser deixado em branco.');
        $I->seeValidationError('Este campo não pode ser deixado em branco.');
    }

    public function checkWrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('TiagoCrispim', 'passwordErrada'));
        $I->seeValidationError('Incorrect username or password.');
    }
    
    public function checkValidLogin(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('TiagoCrispim', '123123'));
        $I->see('Logout (TiagoCrispim)');
        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
    }

}
