<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\helpers\BaseFileHelper;
use yii\helpers\FileHelper;
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
            [['work_description'], 'string', 'max' => 2000],
            [['showMain'], 'integer'],
            [['work_name', 'work_image'], 'string', 'max' => 200],
            [['work_url', 'work_tech'], 'string', 'max' => 100],
            [['image_file'],'file',],
            [['image_files'],'file','maxFiles' => 10]
        ];
    }



    public function uploadImage()
    {

        $w_n =$this->work_name;
        $name =str_replace(' ','',$w_n);
        $path = Yii::getAlias('@app/web/uploads/'.$name);
        BaseFileHelper::createDirectory($path);

        if ($this->validate()) {
            $this->image_file->saveAs('uploads/'.$name.'/general_image.' . $this->image_file->extension);
            $this->work_image='uploads/'.$name.'/general_image.' . $this->image_file->extension;
            return true;
        } else {
            return false;
        }

    }

    public function viewsImage($work_name){
        $name =str_replace(' ','',$work_name);
        $images=[];
        $files =null;

        $path = Yii::getAlias('@app/web/uploads/'.$name.'/images');
        try {
            if(is_dir($path)) {
                $files = FileHelper::findFiles($path);

                foreach ($files as $file) {
                        $images[]=$file;


                }
            }
        }
        catch(Exception $e){}
        return $images;
        
    }

    public function defaultImage(){
        $this->work_image='uploads/default_works.jpg';
       
    }

    public function uploadImages()
    {

        $w_n =$this->work_name;
        $name =str_replace(' ','',$w_n);
        $path = Yii::getAlias('@app/web/uploads/'.$name.'/images/');
        BaseFileHelper::createDirectory($path);
        if ($this->validate()) {
            foreach ($this->image_files as $file) {

                $file->saveAs('uploads/'.$name.'/images/'. $file->baseName.time() .'.png' );
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
