<?php

namespace app\modules\cabinet\controllers;

use Yii;
use app\models\Works;
use app\models\SearchWorks;
use yii\base\Exception;
use yii\helpers\BaseFileHelper;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WorksController implements the CRUD actions for Works model.
 */
class WorksController extends Controller
{

    public $layout = '/cabinet';
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

        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $image = $model->uploadImage();
            //$images = UploadedFile::getInstancesByName('images');
            $images_add=[];
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($image !== false) {
                    $path = $model->getImageFile($model->work_name);
                    $image->saveAs($path);
                }

                    $path2 = Yii::getAlias("@app/web/uploads/".$model->work_name.'/images/');
//                    BaseFileHelper::createDirectory($path2);
//                foreach ($images as $img){
//                    $name = Yii::$app->security->generateRandomString().'.'.$img->extension;
//                    $img->saveAs($path2 .DIRECTORY_SEPARATOR .$name);
//                }
                    try {
                    if(is_dir($path2)) {
                        $files = FileHelper::findFiles($path2);

                        foreach ($files as $file) {

                                $images_add[] = '<img src="/uploads/'. $model->work_name . '/images/' . basename($file) . '" width=250>';

                        }
                    }
                }
                catch(Exception $e){}



                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model'=>$model
        ]);
    }

    public function actionFileUploadImages(){
        if(Yii::$app->request->isPost){
            $work_name = Yii::$app->request->post("work_name");
            $path = Yii::getAlias('@app/web/uploads/'.$work_name.'/images/');
                BaseFileHelper::createDirectory($path);
            $file = UploadedFile::getInstanceByName('images');
            $name = time().'.'.$file->extension;
            $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
            sleep(1);
            return true;

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
        $oldFile = $model->getImageFile($model->work_name);
        $oldAvatar = $model->work_image;
        $oldFileName = $model->work_name_image;

        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $image = $model->uploadImage();

            // revert back if no valid file instance uploaded
            if ($image === false) {
                $model->work_image = $oldAvatar;
                $model->work_name_image = $oldFileName;
            }

            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if($oldFile!=null){
                    if ($image !== false && unlink($oldFile)) { // delete old and overwrite
                        $path = $model->getImageFile($model->work_name);
                        $image->saveAs($path);
                    }
                } else{
                    if($image !==false){
                        $path = $model->getImageFile($model->work_name);
                        $image->saveAs($path);
                    }
                }


                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('update', [
            'model'=>$model,
        ]);
    }

    /**
     * Deletes an existing Works model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        // validate deletion and on failure process any exception
        // e.g. display an error message
        if ($model->delete()) {
            if (!$model->deleteImage($model->work_name)) {
                Yii::$app->session->setFlash('error', 'Error deleting image');
            }
        }
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
