<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%permisos}}`.
 */
class m231001_204742_create_permisos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%permisos}}', [
            'id' => $this->primaryKey(),
            'descripcion' => $this->string(100),
            'is_staff' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%permisos}}');
    }
}
