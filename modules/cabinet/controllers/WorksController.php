<?php

namespace app\modules\cabinet\controllers;

use app\controllers\AuthController;
use app\models\User;
use Yii;
use app\models\Works;
use app\models\SearchWorks;
use yii\helpers\BaseFileHelper;

use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WorksController implements the CRUD actions for Works model.
 */
class WorksController extends AuthController
{



    
    public $layout ='/cabinet';
    /**
     * @inheritdoc
     */
  
    /**
     * Lists all Works models.
     * @return mixed
     */

    
    
    public function actionIndex()
    {
        $searchModel = new SearchWorks();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Works model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Works model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidParamException
     */
    public function actionCreate()
    {


        $model = new Works();

        if ($model->load(Yii::$app->request->post()) ) {
            if (Yii::$app->request->isPost) {
                $model->image_file = UploadedFile::getInstance($model, 'image_file');
                $model->image_files = UploadedFile::getInstances($model, 'image_files');
                $model->uploadImages();




            }




            return $this->redirect(['index',]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }



    /**
     * Updates an existing Works model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws \yii\base\InvalidParamException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            if (Yii::$app->request->isPost) {
                $model->image_file = UploadedFile::getInstance($model, 'image_file');
                $model->image_files = UploadedFile::getInstances($model, 'image_files');

                
                    $model->uploadImages();
                


            }




            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Works model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws \yii\base\ErrorException
     * @throws \yii\base\InvalidParamException
     * @throws \Exception
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model =Works::findOne($id);
        $w_n =$model->work_name;
        $name =str_replace(' ','',$w_n);
        $this->findModel($id)->delete();
        $path =Yii::getAlias('@app/web/uploads/'.$name);
        BaseFileHelper::removeDirectory($path);
        return $this->redirect(['index']);
    }


    public function actionImage($id)
    {
        $model = Works::findOne($id);

        if (Yii::$app->request->isPost) {
            if ($model->work_name) {
                $w_n =$model->work_name;
                $name =str_replace(' ','',$w_n);
                $path = Yii::getAlias('@app/web/uploads/' . $name . '/general_image.png');
                unlink($path);
                $model->work_image = 'uploads/default_works.jpg';

            }
        }
        $model->save();
    }
    
    
    
    public function actionImages($id,$basename){

        $model= Works::findOne($id);
        $w_n =$model->work_name;
        $name =str_replace(' ','',$w_n);
        if (Yii::$app->request->isPost) {
            $path = Yii::getAlias('@app/web/uploads/'.$name.'/images/'.$basename.'.png');
            unlink($path);
            
        }
        
    }

    /**
     * Finds the Works model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Works the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Works::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
