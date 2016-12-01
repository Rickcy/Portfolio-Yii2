<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\models\Works;
use app\models\SearchWorks;
use yii\helpers\BaseFileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WorksController implements the CRUD actions for Works model.
 */
class WorksController extends Controller
{

    public $layout ='/cabinet';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

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
     */
    public function actionCreate()
    {
        $model = new Works();
        $image=[];
        $images=[];
        if ($model->load(Yii::$app->request->post()) ) {


            $dir_name =$model->work_name;
            //Single upload image
            $file = $model->file=UploadedFile::getInstance($model,'file');
            if($file){

                $img_name ='general.'.$file->extension;
                $path_general = Yii::getAlias("@app/web/uploads/".$dir_name);

                //Create Directory
                BaseFileHelper::createDirectory($path_general);

                //Upload to server
                $file->saveAs($path_general .DIRECTORY_SEPARATOR .$img_name);
                //Write in database
                $model->work_image ='uploads/'.$dir_name.'/'.$img_name;
            }


            
            //Multiple upload image
            $images = $model->files=UploadedFile::getInstancesByName('files');
            if($images){
            $path_images = Yii::getAlias("@app/web/uploads/".$dir_name.'/images');

            //Create Directory
            BaseFileHelper::createDirectory($path_images);
            foreach ($images as $img){
            $images_name = time().'.'.$img->extension;
                $img->saveAs($path_images .DIRECTORY_SEPARATOR .$images_name);
                }
            }


            /// Save all
            $model->save();
            return $this->redirect(['view', 'id' => $model->id,'image'=>$image]);
        } else {
            return $this->render('create', [
                'model' => $model,'image'=>$image
            ]);
        }
    }

    /**
     * Updates an existing Works model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {


            $dir_name =$model->work_name;
            $file = $model->file=UploadedFile::getInstance($model,'file');
            if ($file){
                $img_name ='general.'.$file->extension;
                $path = Yii::getAlias("@app/web/uploads/".$dir_name);
                BaseFileHelper::createDirectory($path);
                $file->saveAs($path .DIRECTORY_SEPARATOR .$img_name);


                $model->work_image ='uploads/'.$dir_name.'/'.$img_name;

            }
            $images = $model->files=UploadedFile::getInstancesByName('images');
            if($images){
                $path_images = Yii::getAlias("@app/web/uploads/".$dir_name.'/images');

                //Create Directory
                BaseFileHelper::createDirectory($path_images);
                foreach ($images as $img){
                $images_name = time().'.'.$img->extension;
                    $img->saveAs($path_images .DIRECTORY_SEPARATOR .$images_name);
                }
            }





            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
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
     */
    public function actionDelete($id)
    {
        $model =Works::findOne($id);

        $this->findModel($id)->delete();
        $path =Yii::getAlias('@app/web/uploads/'.$model->work_name);
        BaseFileHelper::removeDirectory($path);
        return $this->redirect(['index']);
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
