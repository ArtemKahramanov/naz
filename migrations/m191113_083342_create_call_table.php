<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%call}}`.
 */
class m191113_083342_create_call_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%call}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'phone' => $this->string(155),
            'comment' => $this->text(),
            'product_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%call}}');
    }
}
