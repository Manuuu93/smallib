<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m190912_134332_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'second_name' => $this->string(),
            'last_name' => $this->string(),
            'birth_date' => $this->date(),
            'death_date' => $this->date(),
            'country_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-author-country_id',
            'author',
            'country_id'
        );

        $this->addForeignKey(
            'fk-author-country_id',
            'author',
            'country_id',
            'country',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-author-country_id', 'author');
        $this->dropIndex('idx-author-country_id', 'author');
        $this->dropTable('{{%author}}');
    }
}
