<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m190912_134243_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'publish_date' => $this->date(),
            'status' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
