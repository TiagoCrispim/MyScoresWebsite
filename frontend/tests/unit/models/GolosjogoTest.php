<?php namespace frontend\tests\models;

use common\models\GolosJogo;

class GolosjogoTest extends \Codeception\Test\Unit
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
    public function testGuardarGolos()
    {
        $model = new GolosJogo([
            'id_user' => '1',
            'id_equipa' => '1',
            'id_jogo' => '1',
            'golosMarcados' => '3',
        ]);

        $golosJogo = $model->save();

        expect($golosJogo)->isInstanceOf('common\models\GolosJogo');

        expect($golosJogo->id_user)->equals('1');
        expect($golosJogo->id_equipa)->equals('1');
        expect($golosJogo->id_jogo)->equals('1');
        expect($golosJogo->golosMarcados)->equals('3');
    }
}