<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class SugestaoCest
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
    public function tryToEnviarSugestaoCorreta(FunctionalTester $I)
    {
        //login
        $I->submitForm('#login-form', $this->formParams('TiagoCrispim', '123123'));
        $I->see('Logout (TiagoCrispim)');
        //ir para a página enviar sugestão
        $I->click('Contacto');
        $I->see('Enviar Sugestão', 'h1');
        //preencher dados
        $I->fillField('Sugestao[mensagem]', 'isto é um teste');
        //guardar
        $I->click('Enviar');
        // verificar que guardou
        $I->see('Sugestão enviada com sucesso!');
    }

    // tests
    public function tryToEnviarSugestaoVazia(FunctionalTester $I)
    {
        //login
        $I->submitForm('#login-form', $this->formParams('TiagoCrispim', '123123'));
        $I->see('Logout (TiagoCrispim)');
        //ir para a página enviar sugestão
        $I->click('Contacto');
        $I->see('Enviar Sugestão', 'h1');
        //tentar guardar
        $I->click('Enviar');
        //erro
        $I->see('Mensagem: cannot be blank.');
    }
}
