<?php

use yii\db\Migration;

/**
 * Class m200829_091925_insert_queue
 */
class m200829_091925_insert_queue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('queue',[
            'path_file'=>'wqrwetew1',
            'category_id'=>1,
            'user_id'=>null,
            'created_at'=>1598681447,
            'start_at'=>null,
            'finish_at'=>null,
            'is_valid'=>null,]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew2',
            'category_id'=>2,
            'user_id'=>null,
            'created_at'=>1598681447,
            'start_at'=>null,
            'finish_at'=>null,
            'is_valid'=>null,]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew3',
            'category_id'=>1,
            'user_id'=>null,
            'created_at'=>1598681447,
            'start_at'=>null,
            'finish_at'=>null,
            'is_valid'=>null,]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew4',
            'category_id'=>2,
            'user_id'=>null,
            'created_at'=>1598681447,
            'start_at'=>null,
            'finish_at'=>null,
            'is_valid'=>null,]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew5',
            'category_id'=>3,
            'user_id'=>null,
            'created_at'=>1598681447,
            'start_at'=>null,
            'finish_at'=>null,
            'is_valid'=>null,]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew6',
            'category_id'=>3,
            'user_id'=>null,
            'created_at'=>1598681447,
            'start_at'=>null,
            'finish_at'=>null,
            'is_valid'=>null,]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew7',
            'category_id'=>3,
            'user_id'=>null,
            'created_at'=>1598681447,
            'start_at'=>null,
            'finish_at'=>null,
            'is_valid'=>null,]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->insert('queue',[
            'path_file'=>'wqrwetew1',
            ]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew2',
            ]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew3',
            ]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew4',
            ]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew5',
            ]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew6',
            ]);
        $this->insert('queue',[
            'path_file'=>'wqrwetew7',
            ]);
    }
}
