<?php

namespace app\modules\cabinet\controllers;

use app\controllers\AuthController;
use app\models\User;


/**
 * Default controller for the `cabinet` module
 */
class DefaultController extends AuthController
{


    
    public $layout = '/cabinet';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user = User::findIdentity(\Yii::$app->user->id);
        $model='';
        $role =User::checkRole(['ROLE_ADMIN']);
            if(!$role){
                $model.='Доступ закрыт';
            }
        if($role){
            $model.='Доступ открыт';
        }


        return $this->render('index',['model'=>$model]);
    }
}
