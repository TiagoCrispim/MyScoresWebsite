<?php namespace frontend\tests\acceptance;
use backend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
    }

    protected function formParams($login, $password)
    {
        return [
            'LoginForm[username]' => $login,
            'LoginForm[password]' => $password,
        ];
    }

    public function checkEmpty(AcceptanceTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('', ''));
        $I->see('Este campo não pode ser deixado em branco.');
    }

    public function checkWrongPassword(AcceptanceTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('AdminTiago', 'passwordErrada'));
        $I->see('Incorrect username or password.');
    }

    // tests
    public function tryToLoginComUtilizadorRegular(AcceptanceTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('TiagoCrispim', '123123'));
        $I->see('Não tem permissão para entrar');
        $I->seeLink('Login');
    }

    public function tryToLoginComAdministrador(AcceptanceTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('AdminTiago', '123123'));
        $I->see('Logout (AdminTiago)');
        $I->dontSeeLink('Login');
    }
}
