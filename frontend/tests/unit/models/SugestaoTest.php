<?php namespace frontend\tests\models;

use common\models\Sugestao;

class SugestaoTest extends \Codeception\Test\Unit
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
    public function testGuardarSugestao()
    {
        $model = new Sugestao();

        $model->attributes = [
            'id_user' => '1',
            'mensagem' => 'Mensagem de Teste',
        ];

        expect_that($model->save());

        expect($model)->isInstanceOf('common\models\User');

        expect($model->id_user)->equals('1');
        expect($model->mensagem)->equals('Mensagem de Teste');
    }
}