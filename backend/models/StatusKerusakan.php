<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status_kerusakan".
 *
 * @property integer $Id
 * @property string $Status
 */
class StatusKerusakan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_kerusakan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'Status'], 'required'],
            [['Id'], 'integer'],
            [['Status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Status' => 'Status',
        ];
    }  
}
