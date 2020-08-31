<?php

use yii\db\Migration;

/**
 * Class m200829_081118_insert_questions
 */
class m200829_081118_insert_questions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('questions',[
            'category_id'=>1,
            'question'=>'На фото видно лицо?',
            'correct_variant'=>1,]);
        $this->insert('questions',[
            'category_id'=>1,
            'question'=>'Подозрение в мошенничестве(Fake)',
            'correct_variant'=>0,]);
        $this->insert('questions',[
            'category_id'=>1,
            'question'=>'Фото соответствует сезону?(лето/зима)',
            'correct_variant'=>1,]);
        $this->insert('questions',[
            'category_id'=>2,
            'question'=>'Текст видно четко?',
            'correct_variant'=>1,]);
        $this->insert('questions',[
            'category_id'=>2,
            'question'=>'Есть подпись?',
            'correct_variant'=>1,]);
        $this->insert('questions',[
            'category_id'=>2,
            'question'=>'Текст на русском языке?',
            'correct_variant'=>1,]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('questions',[
            'category_id'=>1,
            'question'=>'На фото видно лицо?',
            'correct_variant'=>1,]);
        $this->delete('questions',[
            'category_id'=>1,
            'question'=>'Подозрение в мошенничестве(Fake)',
            'correct_variant'=>0,]);
        $this->delete('questions',[
            'category_id'=>1,
            'question'=>'Фото соответствует сезону?(лето/зима)',
            'correct_variant'=>1,]);
        $this->delete('questions',[
            'category_id'=>2,
            'question'=>'Текст видно четко?',
            'correct_variant'=>1,]);
        $this->delete('questions',[
            'category_id'=>2,
            'question'=>'Есть подпись?',
            'correct_variant'=>1,]);
        $this->delete('questions',[
            'category_id'=>2,
            'question'=>'Текст на русском языке?',
            'correct_variant'=>1,]);
    }
}
