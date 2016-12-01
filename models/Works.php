<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;
/**
 * This is the model class for table "works".
 *
 * @property integer $id
 * @property string $work_name
 * @property string $work_description
 * @property string $work_url
 * @property string $work_tech
 * @property string $work_image
 * @property integer $showMain
 */
class Works extends ActiveRecord
{


    public $image_file;
    public $image_files;

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
            [['work_url', 'work_tech'], 'string', 'max' => 100],
            [['image_file'],'file',],
            [['image_files'],'file','maxFiles' => 10]
        ];
    }



    public function uploadImage()
    {
        $path = Yii::getAlias('@app/web/uploads/'.$this->work_name);
        BaseFileHelper::createDirectory($path);

        if ($this->validate()) {
            $this->image_file->saveAs('uploads/'.$this->work_name.'/general_image.' . $this->image_file->extension);
            $this->work_image='uploads/'.$this->work_name.'/general_image.' . $this->image_file->extension;
            return true;
        } else {
            return false;
        }

    }

    public function viewsImage(){
        
    }

    public function defaultImage(){
        $this->work_image='uploads/default_works.jpg';
       
    }

    public function uploadImages()
    {
        $path = Yii::getAlias('@app/web/uploads/'.$this->work_name.'/images/');
        BaseFileHelper::createDirectory($path);
        if ($this->validate()) {
            foreach ($this->image_files as $file) {
                $file->saveAs('uploads/'.$this->work_name.'/images/'. $file->baseName.time() . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
            

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
            'work_url' => 'Work Url',
            'work_tech' => 'Work Tech',
            'work_image' => 'Work Image',
            'showMain' => 'Show Main',
            'image_file'=>'Main Image',
            'image_files'=>'Add Image'
        ];
    }
}
