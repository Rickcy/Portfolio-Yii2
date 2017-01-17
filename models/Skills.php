<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skills".
 *
 * @property integer $id
 * @property string $skill_name
 * @property integer $skill_percent
 */
class Skills extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['skill_name'], 'required'],
            [['skill_percent'], 'integer'],
            [['skill_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'skill_name' => 'Skill Name',
            'skill_percent' => 'Skill Percent',
        ];
    }
}
