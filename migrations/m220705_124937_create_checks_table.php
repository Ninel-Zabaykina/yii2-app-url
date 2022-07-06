<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%checks}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%urls}}`
 */
class m220705_124937_create_checks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checks}}', [
            'id' => $this->primaryKey(),
            'url_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `url_id`
        $this->createIndex(
            '{{%idx-checks-url_id}}',
            '{{%checks}}',
            'url_id'
        );

        // add foreign key for table `{{%urls}}`
        $this->addForeignKey(
            '{{%fk-checks-url_id}}',
            '{{%checks}}',
            'url_id',
            '{{%urls}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%urls}}`
        $this->dropForeignKey(
            '{{%fk-checks-url_id}}',
            '{{%checks}}'
        );

        // drops index for column `url_id`
        $this->dropIndex(
            '{{%idx-checks-url_id}}',
            '{{%checks}}'
        );

        $this->dropTable('{{%checks}}');
    }
}
