<?php

use yii\db\Migration;

/**
 * Class m200829_080805_insert_category
 */
class m200829_080805_insert_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('category',[
            'name'=>'ClientPH',
            'priority'=>1,]);
        $this->insert('category',[
            'name'=>'DOC',
            'priority'=>2,]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('category',[
            'name'=>'ClientPH',
            'priority'=>1,]);
        $this->delete('category',[
            'name'=>'DOC',
            'priority'=>2,]);
    }
}
