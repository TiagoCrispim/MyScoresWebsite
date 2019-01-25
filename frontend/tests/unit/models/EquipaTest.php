<?php namespace frontend\tests\models;

use common\models\Equipa;

class EquipaTest extends \Codeception\Test\Unit
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
    public function testCriarEquipa()
    {
        $model = new Equipa([
            'nome' => 'Equipa para teste',
            'id_criador' => '1',
        ]);

        $equipa = $model->save();

        expect($equipa)->isInstanceOf('common\models\Equipa');

        expect($equipa->nome)->equals('Equipa para teste');
        expect($equipa->id_criador)->equals('1');
    }

    public function testCriarEquipaComErros()
    {
        $model = new Equipa([
            'nome' => 'Equipa para teste',
            'id_criador' => '1000',
        ]);

        $equipa = $model->save();

        expect_that($model->getErrors('id_criador'));
    }
}