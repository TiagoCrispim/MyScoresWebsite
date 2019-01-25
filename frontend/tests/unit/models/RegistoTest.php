<?php namespace frontend\tests\models;

use frontend\models\SignupForm;

class RegistoTest extends \Codeception\Test\Unit
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
    public function testRegistoDadosCorretos()
    {
        $model = new SignupForm([
            'username' => 'usernameTeste',
            'nome' => 'Nome do Teste',
            'email' => 'emailteste@gmail.com',
            'dataNascimento' => '1999-12-27',
            'nacionalidade' => 'Portugal',
            'password' => '123123',
            'confirmacaoPassword' => '123123',
        ]);

        $user = $model->signup();

        expect($user)->isInstanceOf('common\models\User');

        expect($user->username)->equals('usernameTeste');
        expect($user->nome)->equals('Nome do Teste');
        expect($user->email)->equals('emailteste@gmail.com');
        expect($user->dataNascimento)->equals('1999-12-27');
        expect($user->nacionalidade)->equals('Portugal');
        expect($user->validatePassword('123123'))->true();

    }

    public function testRegistoDadosIncorretos()
    {
        $model = new SignupForm([
            'username' => 'TiagoCrispim',
            'nome' => 'Tiago Crispim',
            'email' => 'tiago@gmail.com',
            'dataNascimento' => '1999-12-27',
            'nacionalidade' => 'Portugal',
            'password' => '123123',
            'confirmacaoPassword' => '123123',
        ]);

        expect_not($model->signup());

        expect_that($model->getErrors('username'));
        expect_that($model->getErrors('email'));

        expect($model->getFirstError('username'))
            ->equals('Este username já está a ser utilizado.');
        expect($model->getFirstError('email'))
            ->equals('Este email já está a ser utilizado.');

    }
}