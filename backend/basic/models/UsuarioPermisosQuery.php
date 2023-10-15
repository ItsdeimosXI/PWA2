<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UsuarioPermisos]].
 *
 * @see UsuarioPermisos
 */
class UsuarioPermisosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UsuarioPermisos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioPermisos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
