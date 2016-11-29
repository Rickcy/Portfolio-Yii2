<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "works".
 *
 * @property integer $id
 * @property string $work_name
 * @property string $work_description
 * @property string $worl_url
 * @property string $work_tech
 * @property array $work_image
 * @property string $work_name_image
 * @property integer $showMain
 */
class Works extends \yii\db\ActiveRecord
{


    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'works';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_name'], 'required'],
            [['showMain'], 'integer'],
            [['work_name', 'work_description', 'work_image'], 'string', 'max' => 200],
            [['worl_url', 'work_tech', 'work_name_image'], 'string', 'max' => 100],
            [['image'], 'file', 'extensions'=>'jpg, gif, png']
        ];
    }

    public function getImageFile()

    {
        Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/uploads/';

        return isset($this->work_image) ? Yii::$app->params['uploadPath'] . $this->work_image : null;
    }
    public function getImageUrl()
    {  Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/uploads/';
        // return a default image placeholder if your source avatar is not found
        $work_image = isset($this->work_image) ? $this->work_image : 'default_user.jpg';
        return Yii::$app->params['uploadUrl'] . $work_image;
    }


    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'image');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        $this->work_name_image = $image->name;
        $ext = end((explode(".", $image->name)));

        // generate a unique file name
        $this->work_image = Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded image instance
        return $image;
    }

    public function deleteImage() {
        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->work_image = null;
        $this->work_name_image = null;

        return true;
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_name' => 'Work Name',
            'work_description' => 'Work Description',
            'worl_url' => 'Worl Url',
            'work_tech' => 'Work Tech',
            'work_image' => 'Work Image',
            'work_name_image' => 'Work Name Image',
            'showMain' => 'Show Main',
        ];
    }
}
