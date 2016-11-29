<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "works".
 *
 * @property integer $id
 * @property string $work_name
 * @property string $work_description
 * @property string $work_url
 * @property string $work_tech
 * @property string $work_main_image
 * @property integer $showMain
 */
class Works extends \yii\db\ActiveRecord
{
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
            [['work_description'], 'string'],
            [['showMain'], 'integer'],
            [['work_name'], 'string', 'max' => 60],
            [['work_url'], 'string', 'max' => 155],
            [['work_tech'], 'string', 'max' => 255],
            [['work_main_image'], 'string', 'max' => 200],
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
            'work_main_image' => 'Work Main Image',
            'showMain' => 'Show Main',
        ];
    }
}
