<?php

use yii\db\Migration;

/**
 * Class m231001_202732_crear_tabla_usuarios
 */
class m231001_202732_crear_tabla_usuarios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->createTable('usuario',[
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull(),
                'nombre' => $this->text(),
                'apellido' => $this->text(),
                'edad' => $this->integer(), 
            ]);
            
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usuario');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231001_202732_crear_tabla_usuarios cannot be reverted.\n";

        return false;
    }
    */
}
