<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%urls}}`.
 */
class m220705_050427_create_urls_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%urls}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->notNull(),
            'check_frequency' => $this->integer()->notNull()->defaultValue(1),
            'repeat_num' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%urls}}');
    }
}
