<?php

use yii\db\Migration;

/**
 * Class m200829_113526_add_column_variant
 */
class m200829_113526_add_column_variant extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('questions','variant',$this->tinyInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('questions','variant');

    }
}
