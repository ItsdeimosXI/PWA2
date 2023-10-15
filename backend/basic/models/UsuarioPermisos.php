<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_permisos".
 *
 * @property int $usuario_id
 * @property int $permisos_id
 *
 * @property Permisos $permisos
 * @property Usuario $usuario
 */
class UsuarioPermisos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario_permisos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'permisos_id'], 'required'],
            [['usuario_id', 'permisos_id'], 'default', 'value' => null],
            [['usuario_id', 'permisos_id'], 'integer'],
            [['usuario_id', 'permisos_id'], 'unique', 'targetAttribute' => ['usuario_id', 'permisos_id']],
            [['permisos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Permisos::class, 'targetAttribute' => ['permisos_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario ID',
            'permisos_id' => 'Permisos ID',
        ];
    }

    /**
     * Gets query for [[Permisos]].
     *
     * @return \yii\db\ActiveQuery|PermisosQuery
     */
    public function getPermisos()
    {
        return $this->hasOne(Permisos::class, ['id' => 'permisos_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::class, ['id' => 'usuario_id']);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioPermisosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioPermisosQuery(get_called_class());
    }
}
