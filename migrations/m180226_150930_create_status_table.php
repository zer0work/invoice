<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m180226_150930_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(80)
        ]);

        $statusNames = [
            ['name' => 'Ожидает отправки'],
            ['name' => 'Доставлено'],
            ['name' => 'В пути'],
            ['name' => 'Принят на склад'],
            ['name' => 'Возвращён'],
        ];
        foreach ($statusNames as $name) {
            $this->insert('status', $name);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status');
    }
}
