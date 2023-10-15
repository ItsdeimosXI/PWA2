<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permisos".
 *
 * @property int $id
 * @property string|null $descripcion
 * @property bool|null $is_staff
 *
 * @property UsuarioPermisos[] $usuarioPermisos
 * @property Usuario[] $usuarios
 */
class Permisos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permisos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_staff'], 'boolean'],
            [['descripcion'], 'string', 'max' => 100],
            [['descripcion'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'is_staff' => 'Is Staff',
        ];
    }

    /**
     * Gets query for [[UsuarioPermisos]].
     *
     * @return \yii\db\ActiveQuery|UsuarioPermisosQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermisos::class, ['permisos_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::class, ['id' => 'usuario_id'])->viaTable('usuario_permisos', ['permisos_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PermisosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PermisosQuery(get_called_class());
    }
}
