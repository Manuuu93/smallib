<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_to_genre}}`.
 */
class m190912_134757_create_book_to_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_to_genre}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer(),
            'genre_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-book_to_genre-book_id',
            'book_to_genre',
            'book_id'
        );

        $this->addForeignKey(
            'fk-book_to_genre-book_id',
            'book_to_genre',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-book_to_genre-genre_id',
            'book_to_genre',
            'genre_id'
        );

        $this->addForeignKey(
            'fk-book_to_genre-genre_id',
            'book_to_genre',
            'genre_id',
            'genre',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-book_to_genre-genre_id', 'book_to_genre');
        $this->dropForeignKey('fk-book_to_genre-book_id', 'book_to_genre');
        $this->dropIndex('idx-book_to_genre-genre_id', 'book_to_genre');
        $this->dropIndex('idx-book_to_genre-book_id', 'book_to_genre');

        $this->dropTable('{{%book_to_genre}}');
    }
}
