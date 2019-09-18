<?php

use yii\db\Migration;

/**
 * Class m190918_140309_add_status_column_to_author
 */
class m190918_140309_add_status_column_to_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%author}}', 'status', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%author}}', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190918_140309_add_status_column_to_author cannot be reverted.\n";

        return false;
    }
    */
}
