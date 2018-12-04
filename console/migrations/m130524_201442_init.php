<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        //tabela user
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'nome' => $this->string(100)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'dataNascimento' => $this->date()->notNull(),
            'nacionalidade' => $this->string(20)->notNull(),
            'golosMarcados' => $this->integer(5)->defaultValue(0)->notNull(),
            'jogosJogados' => $this->integer(5)->defaultValue(0)->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        //tabela equipa
        $this->createTable('{{%equipa}}', [
            'id' => $this->primaryKey(),
            'id_jogo' => $this->integer()->notNull(),
            'id_jogador1' => $this->integer()->notNull(),
            'id_jogador2' => $this->integer()->notNull(),
            'id_jogador3' => $this->integer()->notNull(),
            'id_jogador4' => $this->integer()->notNull(),
            'id_jogador5' => $this->integer()->notNull(),
            'id_jogador6' => $this->integer(),
            'id_jogador7' => $this->integer(),
            'id_jogador8' => $this->integer(),
            'id_jogador9' => $this->integer(),
            'id_jogador10' => $this->integer(),
        ], $tableOptions);
        //tabela jogo
        $this->createTable('{{%jogo}}', [
            'id' => $this->primaryKey(),
            'id_equipa1' => $this->integer()->notNull(),
            'id_equipa2' => $this->integer()->notNull(),
            'golosEquipa1' => $this->integer(2)->notNull(),
            'golosEquipa2' => $this->integer(2)->notNull(),
            'data' => $this->date()->notNull(),
            'hora' => $this->string()->notNull(),
            'local' => $this->string()->notNull(),
        ], $tableOptions);
        //tabela golos_jogo
        $this->createTable('{{%golos_jogo}}', [
            'id' => $this->primaryKey(),
            'id_jogador' => $this->integer()->notNull(),
            'id_jogo' => $this->integer()->notNull(),
            'golosMarcados' => $this->integer(2)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
