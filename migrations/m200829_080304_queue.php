<?php

use yii\db\Migration;

/**
 * Class m200829_080304_queue
 */
class m200829_080304_queue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('queue', [
            'id' => $this->primaryKey(),
            'path_file' => $this->string()->notNull(),
            'category_id' => $this->integer(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'start_at' => $this->integer(),
            'finish_at' => $this->integer(),
            'is_valid' => $this->tinyInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('queue');
    }
}
