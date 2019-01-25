<?php namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;

class SignupCest
{
    protected $formId = '#form-signup';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/signup');
    }

    public function signupWithEmptyFields(AcceptanceTester $I)
    {
        $I->see('Signup', 'h1');
        $I->see('Preencha os seguintes campos para efetuar o registo:');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Este campo não pode ser deixado em branco.');

    }

    public function signupWithWrongEmail(AcceptanceTester $I)
    {
        $I->submitForm(
            $this->formId, [
                'SignupForm[username]' => 'Erro',
                'SignupForm[nome]' => 'Teste',
                'SignupForm[email]' => 'deviaEstarAquiUmEmail',
                'SignupForm[dataNascimento]' => '1999-12-27',
                'SignupForm[nacionalidade]' => 'Portugal',
                'SignupForm[password]' => '123123',
                'SignupForm[confirmacaoPassword]' => '123123',
            ]
        );
        $I->dontSee('Este campo não pode ser deixado em branco.', '.help-block');
        $I->see('Email: is not a valid email address.', '.help-block');
    }

    public function signupSuccessfully(AcceptanceTester $I)
    {
        $I->submitForm($this->formId, [
            'SignupForm[username]' => 'Teste',
            'SignupForm[nome]' => 'Teste',
            'SignupForm[email]' => 'teste@gmail.com',
            'SignupForm[dataNascimento]' => '1999-12-27',
            'SignupForm[nacionalidade]' => 'Portugal',
            'SignupForm[password]' => '123123',
            'SignupForm[confirmacaoPassword]' => '123123',
        ]);
        $I->see('Registo de Jogos', 'h3');
    }

}