<?php

use yii\db\Migration;

/**
 * Class m181207_115101_init_rbac
 */
class m181207_115101_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $auth = Yii::$app->authManager;

        // add "createUser" permission
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Create a normal user';
        $auth->add($createUser);

        // add "updatePost" permission
        $blockUser = $auth->createPermission('blockUser');
        $blockUser->description = 'Block any user';
        $auth->add($blockUser);

        // add "updatePost" permission
        $createAdmin = $auth->createPermission('createAdmin');
        $createAdmin->description = 'create admins';
        $auth->add($createAdmin);

        // add "enterBackEnd" permission
        $enterBackEnd = $auth->createPermission('enterBackEnd');
        $enterBackEnd->description = 'defeining who can enter the back end of the site';
        $auth->add($enterBackEnd);

        $regular = $auth->createRole('regular');
        $auth->add($regular);
        $auth->addChild($regular, $createUser);


        // add  role and give this role the "createPost" permission
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $blockUser);
        $auth->addChild($admin, $enterBackEnd);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $god = $auth->createRole('god');
        $auth->add($god);
        $auth->addChild($god, $createAdmin);
        $auth->addChild($god, $admin);


        
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181207_115101_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
