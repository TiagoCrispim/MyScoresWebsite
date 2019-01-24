<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class EditarPerfilCest
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

    // tests
    public function tryToEditarPerfil(FunctionalTester $I)
    {
        //login
        $I->submitForm('#login-form', $this->formParams('TiagoCrispim', '123123'));
        $I->see('Logout (TiagoCrispim)');
        //ir para a página perfil
        $I->click('Perfil');
        $I->see('TiagoCrispim', 'p');
        //ir para a página editar perfil
        $I->click('Editar Perfil');
        //alterar dados
        $I->fillField('email', 'tiagocrispim99@gmail.com');
        $I->click('guardaralteracoes-button');
        //verificar que atualizou dados
        $I->see('tiagocrispim99@gmail.com', 'p');
    }
}
