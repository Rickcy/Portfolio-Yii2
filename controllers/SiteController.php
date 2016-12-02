<?php

namespace app\controllers;

use app\component\Common;
use app\models\ContactForm;
use app\models\Works;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\LoginForm;


class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionLogin()
    {
        $this->layout='/auth';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionWorks()
    {
        $query = new Query();
        $query_works =$query->from('works')->orderBy('id desc');
        $works=$query_works->where('showMain= 1');
        $all_works = $works->all();

        return $this->render('works',[
            'all_works'=>$all_works
        ]);
    }

    public function actionSkills(){

        $query = new Query();
        $query_skills =$query->from('skills');
        $skills=$query_skills->all();
        $count =$query_skills->count();
        
        
        return $this->render('skills',[
        'skills'=>$skills,'count'=>$count
        ]);
    }


    public function actionReviews(){

        return $this->render('reviews');
    }

    public function actionFeedback(){
        $model = new ContactForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $body ='<div>'.$model->body.'</div>';
            $body .='<p><div>Имя отправителя : '.$model->name.'</div><br>';
            $body .='<div>E-mail : '.$model->email.'</div><br></p>';
            Yii::$app->common->sendMail($model->subject,$body);
            Yii::$app->session->setFlash('success', 'Спасибо за ваше письмо. Мы свяжемся с вами в ближайшее время.');
            return $this->redirect('/');
        }

        return $this->render('feedback',['model'=>$model]);
    }

    public function actionViewWork($id){
        $model=Works::findOne($id);

        return $this->render('view_works',[
           'model'=>$model
        ]);
    }



}
