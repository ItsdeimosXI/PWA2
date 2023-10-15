<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $username
 * @property string|null $nombre
 * @property string|null $apellido
 * @property int|null $edad
 * @property string|null $nacimiento
 *
 * @property Permisos[] $permisos
 * @property UsuarioPermisos[] $usuarioPermisos
 */
class Usuario extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['nombre', 'apellido'], 'string'],
            [['edad'], 'integer'],
            [['nacimiento'], 'safe'],
            [['username'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'edad' => 'Edad',
            'nacimiento' => 'Nacimiento',
        ];
    }

    /**
     * Gets query for [[Permisos]].
     *
     * @return \yii\db\ActiveQuery|PermisosQuery
     */
    public function getPermisos()
    {
        return $this->hasMany(Permisos::class, ['id' => 'permisos_id'])->viaTable('usuario_permisos', ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[UsuarioPermisos]].
     *
     * @return \yii\db\ActiveQuery|UsuarioPermisosQuery
     */
    public function getUsuarioPermisos()
    {
        return $this->hasMany(UsuarioPermisos::class, ['usuario_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioQuery(get_called_class());
    }
}
