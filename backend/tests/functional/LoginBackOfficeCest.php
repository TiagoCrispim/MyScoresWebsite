<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class LoginBackOfficeCest
{
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
        $I->see('Este campo não pode ser deixado em branco.');
    }

    public function checkWrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('AdminTiago', 'passwordErrada'));
        $I->see('Incorrect username or password.');
    }

    // tests
    public function tryToLoginComUtilizadorRegular(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('TiagoCrispim', '123123'));
        $I->see('Não tem permissão para entrar');
        $I->seeLink('Login');
    }

    public function tryToLoginComAdministrador(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('AdminTiago', '123123'));
        $I->see('Logout (AdminTiago)');
        $I->dontSeeLink('Login');
    }
}
