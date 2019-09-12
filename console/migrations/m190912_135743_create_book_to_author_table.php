<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_to_author}}`.
 */
class m190912_135743_create_book_to_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_to_author}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer(),
            'author_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-book_to_author-book_id',
            'book_to_author',
            'book_id'
        );

        $this->addForeignKey(
            'fk-book_to_author-book_id',
            'book_to_author',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-book_to_author-author_id',
            'book_to_author',
            'author_id'
        );

        $this->addForeignKey(
            'fk-book_to_author-author_id',
            'book_to_author',
            'author_id',
            'author',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-book_to_author-book_id', 'book_to_author');
        $this->dropForeignKey('fk-book_to_author-book_id', 'book_to_author');
        $this->dropIndex('idx-book_to_author-author_id', 'book_to_author');
        $this->dropIndex('idx-book_to_author-author_id', 'book_to_author');

        $this->dropTable('{{%book_to_author}}');
    }
}
