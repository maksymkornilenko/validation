<?php

use yii\db\Migration;

/**
 * Class m200829_074942_questions
 */
class m200829_074942_questions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('questions', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'question' => $this->string()->notNull(),
            'correct_variant' => $this->tinyInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('questions');
    }
}
