<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quote}}`.
 */
class m190919_135259_create_quote_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quote}}', [
            'id' => $this->primaryKey(),
            'content' => $this->string(512),
            'book_id' => $this->integer(),
            'user_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-quote-book_id',
            '{{%quote}}',
            'book_id'
        );

        $this->addForeignKey(
            'fk-quote-book_id',
            '{{%quote}}',
            'book_id',
            '{{%book}}',
            'id'
        );

        $this->createIndex(
            'idx-quote-user_id',
            '{{%quote}}',
            'user_id'
        );

        $this->addForeignKey(
            'fk-quote-user_id',
            '{{%quote}}',
            'user_id',
            '{{%user}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-quote-book_id', '{{%quote}}');
        $this->dropIndex('idx-quote-book_id', '{{%quote}}');
        $this->dropForeignKey('fk-quote-user_id', '{{%quote}}');
        $this->dropIndex('idx-quote-user_id', '{{%quote}}');
        $this->dropTable('{{%quote}}');
    }
}
