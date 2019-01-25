<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class CriarJogoCest
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
    public function tryToCriarJogo(FunctionalTester $I)
    {
        //login
        $I->submitForm('#login-form', $this->formParams('TiagoCrispim', '123123'));
        $I->see('Logout (TiagoCrispim)');
        //ir para a página criar jogo
        $I->click('Criar Jogo');
        //criar equipa 1
        $I->click('Criar a primeira equipa');
        $I->fillField('Equipa[nome]', 'Equipa 1 Teste');
        $I->fillField('state_10', 'TiagoCrispim');
        $I->click('Adicionar');
        $I->fillField('state_10', 'RodrigoGameiro');
        $I->click('Adicionar');
        $I->fillField('state_10', 'DanielSarreira');
        $I->click('Adicionar');
        $I->fillField('state_10', 'FranciscoMelicias');
        $I->click('Adicionar');
        $I->fillField('state_10', 'GoncaloAmaro');
        $I->click('Adicionar');
        $I->click('Save');
        //criar equipa 2
        $I->click('Criar a segunda equipa');
        $I->fillField('Equipa[nome]', 'Equipa 2 Teste');
        $I->fillField('state_10', 'AlexandreRodrigues');
        $I->click('Adicionar');
        $I->fillField('state_10', 'AfonsoPinheiro');
        $I->click('Adicionar');
        $I->fillField('state_10', 'JoaoFernandes');
        $I->click('Adicionar');
        $I->fillField('state_10', 'RaulFranco');
        $I->click('Adicionar');
        $I->fillField('state_10', 'SergioSantos');
        $I->click('Adicionar');
        $I->click('Save');
        //finalizar jogo
        //golos equipa 1
        $I->click('Finalizar Jogo');
        $I->fillField('0equipa1', '0');
        $I->fillField('1equipa1', '0');
        $I->fillField('2equipa1', '0');
        $I->fillField('3equipa1', '0');
        $I->fillField('4equipa1', '0');
        //golos equipa 2
        $I->fillField('0equipa2', '0');
        $I->fillField('1equipa2', '0');
        $I->fillField('2equipa2', '0');
        $I->fillField('3equipa2', '0');
        $I->fillField('4equipa2', '0');
        //data
        $I->fillField('Jogo[data]', '2019-10-10');
        //hora
        $I->fillField('Jogo[hora]', '18:00');
        //local
        $I->fillField('Jogo[local]', 'Sporting Torres');
        //guardar

    }
}
