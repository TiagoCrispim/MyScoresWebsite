<?php namespace frontend\tests\models;

use common\models\Jogo;

class JogoTest extends \Codeception\Test\Unit
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
    public function testNovoJogo()
    {
        $model = new Jogo([
            'id_equipa1' => '1',
            'id_equipa2' => '2',
            'data' => '2019-10-10',
            'hora' => '18:00',
            'local' => 'LabCenter',
        ]);

        $jogo=$model->save();

        expect($jogo)->isInstanceOf('common\models\Jogo');

        expect($jogo->id_equipa1)->equals('1');
        expect($jogo->id_equipa2)->equals('2');
        expect($jogo->data)->equals('2019-10-10');
        expect($jogo->hora)->equals('118:00');
        expect($jogo->local)->equals('LabCenter');

    }
}