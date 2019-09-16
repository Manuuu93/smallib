<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_readed_books}}`.
 */
class m190916_205102_create_users_readed_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_readed_books}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'book_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-users_readed_books-user_id',
            '{{%users_readed_books}}',
            'user_id'
        );

        $this->addForeignKey(
            'fk-users_readed_books-user_id',
            '{{%users_readed_books}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-users_readed_books-book_id',
            '{{%users_readed_books}}',
            'book_id'
        );

        $this->addForeignKey(
            'fk-users_readed_books-book_id',
            '{{%users_readed_books}}',
            'book_id',
            '{{%book}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-users_readed_books-book_id', '{{%users_readed_books}}');
        $this->dropIndex('idx-users_readed_books-book_id', '{{%users_readed_books}}');
        $this->dropForeignKey('fk-users_readed_books-user_id', '{{%users_readed_books}}');
        $this->dropIndex('idx-users_readed_books-user_id', '{{%users_readed_books}}');

        $this->dropTable('{{%users_readed_books}}');
    }
}
