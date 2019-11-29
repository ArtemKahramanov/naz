<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m191113_085356_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'price' => $this->decimal(8, 2),
            'desc' => $this->text(),
            'photo' => $this->string(255),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
    }
}
