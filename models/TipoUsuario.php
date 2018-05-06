<?php

namespace app\models;
use Yii;
use yii\base\Model;


class TipoUsuario
{
    
    public $rolID;

    public static function esAdministrador($rolID){
        if ($rolID == 1){
            return true;
        }
        else{
            return false;
        }
    }
    public static function esRecepcionista($rolID){
        if($rolID ==2){
            return true;
        }
        else{
            return false;
        }

    }
    public static function esChofer($rolID){
        if($rolID ==3){
            return true;
        }
        else{
            return false;
        }
    }
    public static function esCliente($rolID){
        if($rolID == 4){
            return true;
        }
        else{
            return false;
        }

    }
}