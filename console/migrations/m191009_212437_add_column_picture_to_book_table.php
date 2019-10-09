<?php

use yii\db\Migration;

/**
 * Class m191009_212437_add_column_picture_to_book_table
 */
class m191009_212437_add_column_picture_to_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%book}}', 'picture', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%book}}', 'picture');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191009_212437_add_column_picture_to_book_table cannot be reverted.\n";

        return false;
    }
    */
}
