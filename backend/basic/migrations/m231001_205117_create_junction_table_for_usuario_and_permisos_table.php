<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%usuario_permisos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%usuario}}`
 * - `{{%permisos}}`
 */
class m231001_205117_create_junction_table_for_usuario_and_permisos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usuario_permisos}}', [
            'usuario_id' => $this->integer(),
            'permisos_id' => $this->integer(),
            'PRIMARY KEY(usuario_id, permisos_id)',
        ]);

        // creates index for column `usuario_id`
        $this->createIndex(
            '{{%idx-usuario_permisos-usuario_id}}',
            '{{%usuario_permisos}}',
            'usuario_id'
        );

        // add foreign key for table `{{%usuario}}`
        $this->addForeignKey(
            '{{%fk-usuario_permisos-usuario_id}}',
            '{{%usuario_permisos}}',
            'usuario_id',
            '{{%usuario}}',
            'id',
            'CASCADE'
        );

        // creates index for column `permisos_id`
        $this->createIndex(
            '{{%idx-usuario_permisos-permisos_id}}',
            '{{%usuario_permisos}}',
            'permisos_id'
        );

        // add foreign key for table `{{%permisos}}`
        $this->addForeignKey(
            '{{%fk-usuario_permisos-permisos_id}}',
            '{{%usuario_permisos}}',
            'permisos_id',
            '{{%permisos}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%usuario}}`
        $this->dropForeignKey(
            '{{%fk-usuario_permisos-usuario_id}}',
            '{{%usuario_permisos}}'
        );

        // drops index for column `usuario_id`
        $this->dropIndex(
            '{{%idx-usuario_permisos-usuario_id}}',
            '{{%usuario_permisos}}'
        );

        // drops foreign key for table `{{%permisos}}`
        $this->dropForeignKey(
            '{{%fk-usuario_permisos-permisos_id}}',
            '{{%usuario_permisos}}'
        );

        // drops index for column `permisos_id`
        $this->dropIndex(
            '{{%idx-usuario_permisos-permisos_id}}',
            '{{%usuario_permisos}}'
        );

        $this->dropTable('{{%usuario_permisos}}');
    }
}
