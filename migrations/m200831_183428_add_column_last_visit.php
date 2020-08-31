<?php

use yii\db\Migration;

/**
 * Class m200831_183428_add_column_last_visit
 */
class m200831_183428_add_column_last_visit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','last_visit',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','last_visit');

    }
}
