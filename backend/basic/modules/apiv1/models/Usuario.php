<?php

namespace app\modules\apiv1\models;


class Usuario extends \app\models\usuario
{
    public function fields()
    {
        return['id','nombre','apellido', 'permisos', 'usuarioPermisos'];
    }
    public function extraFields()
    {
        return['edad','username'];
    }
}
