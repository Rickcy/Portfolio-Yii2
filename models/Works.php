<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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


    public $file;
    public $files=[];

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
            [['file'],'file'],
            [['files'],'file']
        ];
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
            'file'=>'Main Image'
        ];
    }
}
