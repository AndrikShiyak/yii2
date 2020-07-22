<?php

use yii\db\Migration;

/**
 * Class m200706_174716_ownerRole
 */
class m200706_174716_ownerRole extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('owner'));
        $ownerRole = $auth->getRole('owner');
        $auth->assign($ownerRole, 8);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200706_174716_ownerRole cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200706_174716_ownerRole cannot be reverted.\n";

        return false;
    }
    */
}
