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

                if ($model->image_file){
                    $model->uploadImage();
                 } else{
                    $model->defaultImage();
                }
                if ($model->image_files) {

                    $model->uploadImages();
                }



            }



            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
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

                if ($model->image_file){
                    $model->uploadImage();
                }
                if ($model->image_files) {

                    $model->uploadImages();
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
