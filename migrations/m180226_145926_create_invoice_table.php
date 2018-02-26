<?php

use yii\db\Migration;

/**
 * Handles the creation of table `invoice`.
 */
class m180226_145926_create_invoice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('invoice', [
            'id' => $this->primaryKey(),
            'from' => $this->string(80),
            'in' => $this->string(80),
            'client' => $this->string(80),
            'status_id' => $this->integer(10)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('invoice');
    }
}
