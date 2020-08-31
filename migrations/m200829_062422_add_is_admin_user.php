<?php

use yii\db\Migration;

/**
 * Class m200829_062422_add_is_admin_user
 */
class m200829_062422_add_is_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','is_admin',$this->tinyInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','is_admin');
    }
}
